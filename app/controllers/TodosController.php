<?php

class TodosController extends BaseController {

	/**
	 * Todoリストページを表示する。
	 *
	 * @return void
	 */
	public function index()
	{
		// 1. 3つのグループのデータを取得する

		// 1.1. 未完了リストを取得する
		{
			// クエリを作成する
			$query = Todo::query()->where('status', '=', Todo::STATUS_INCOMPLETE)->orderBy('updated_at', 'desc');

			// クエリを実行し、結果を取得する
			// MEMO 1件の場合はfirst()を使う
			$incompleteTodos = $query->get();
		}

		// 1.2. 完了リストを取得する
		// MEMO シンタックスシュガーを使うとこのようにシンプルに書ける。
		$completedTodos = Todo::whereStatus(Todo::STATUS_COMPLETED)->orderBy('completed_at', 'desc')->get();

		// 1.3. 削除済みリストを取得する
		// MEMO ソフトデリートされたデータのフィルタリングはonlyTrashed()を使う。
		$trashedTodos = Todo::onlyTrashed()->get();

		// 2. ビューを生成する
		// MEMO 引数のための配列を生成するとき、compact()関数を使ってもいい。
		return View::make('pages.todos.index', [
			'incompleteTodos' => $incompleteTodos,
			'completedTodos' => $completedTodos,
			'trashedTodos' => $trashedTodos,
		]);
	}

	/**
	 * 新規Todoを追加する。
	 *
	 * @return void
	 */
	public function store()
	{
		// バリデーションルールの定義
		$rules = [
			'title' => 'required|min:2',	// 'title'は必須で2文字以上。
		];

		// フォームの入力データをフィールド名を指定して取得する
		$input = Input::only(['title']);

		// バリデーターを生成する
		$validator = Validator::make($input, $rules);

		// バリデーションを行う
		if ($validator->fails()) {
			// バリデーションに失敗したら、バリデーションのエラー情報とフォームの入力値を追加してリストページにリダイレクトする。
			return Redirect::route('todos.index')->withErrors($validator)->withInput();
		}

		// Todoデータを作成する（SQL発行）
		$todo = Todo::create([
			'title' => $input['title'],
			'status' => Todo::STATUS_INCOMPLETE,
		]);

		// リストページにリダイレクトする
		return Redirect::route('todos.index');
	}

	/**
	 * Todoを更新する。
	 *
	 * @param  integer  $id  TodoのID
	 * @return void
	 */
	public function update($id)
	{
		$todo = Todo::find($id);

		if ($todo === null) {
			App::abort(404);
		}

		// バリデーションルールの定義
		// MEMO 文字列でルールを'|'で区切ることで複数指定できる。
		// MEMO 配列でルールを複数指定することもできる。
		$rules = [
			'title' => 'required|min:2',
			'status' => ['required', 'numeric', 'min:1', 'max:2'],
			'dummy' => '',	// ルールを指定しないとオプション扱いにできる
		];

		// 入力データを取得する
		// MEMO $inputの内容をログに出力して確認してみる。dummyキーはあるが値は空(null)になっている。
		$input = Input::only(array_keys($rules));
		Log::debug(print_r($input, true));

		// バリデーションを実行する
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			return Redirect::route('todos.index')->withErrors($validator)->withInput();
		}

		// titleが指定されていたら
		if ($input['title'] !== null) {
			// titleカラムを更新する
			$todo->fill([
				'title' => $input['title'],
			]);
		}

		// statusが指定されていたら
		if ($input['status'] !== null) {
			// statusとcompleted_atカラムを更新する
			$todo->fill([
				'status' => $input['status'],
				'completed_at' => $input['status'] == Todo::STATUS_COMPLETED ? new DateTime : null,
			]);
		}

		// データを更新する（SQL発行）
		$todo->save();

		// リストページにリダイレクトする
		return Redirect::route('todos.index');
	}

	/**
	 * タイトルを更新する。
	 *
	 * @param  integer  $id  TodoのID
	 * @return void
	 */
	public function ajaxUpdateTitle($id)
	{
		// Todoオブジェクトを取得する
		$todo = Todo::find($id);

		if ($todo === null) {
			App::abort(404);
		}

		// バリデーションルールの定義
		$rules = [
			'title' => 'required|min:2',
		];

		// 入力データを取得する
		$input = Input::only(['title']);

		// バリデーションを実行する
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			// Ajaxレスポンスを返す
			return Response::json(['result' => 'NG', 'errors' => $validator->errors()], 400);
		}

		// titleカラムを更新する
		$todo->fill([
			'title' => $input['title'],
		]);

		// データを更新する（SQL発行）
		$todo->save();

		// Ajaxレスポンスを返す
		return Response::json(['result' => 'OK'], 200);
	}

	/**
	 * Todoを削除する。
	 *
	 * @param  integer  $id  TodoのID
	 * @return void
	 */
	public function delete($id)
	{
		// Todoオブジェクトを取得する
		$todo = Todo::find($id);

		// 指定IDのデータが存在しなかったら
		if ($todo === null) {
			// 404を返す
			App::abort(404);
		}

		// データを削除する（SQL発行）
		$todo->delete();

		// リストページにリダイレクトする
		return Redirect::route('todos.index');
	}

	public function restore($id)
	{
		// Todoオブジェクトを取得する
		$todo = Todo::onlyTrashed()->find($id);

		// 指定IDのデータが存在しなかったら
		if ($todo === null) {
			// 404を返す
			App::abort(404);
		}

		// データを復元する（SQL発行）
		$todo->restore();

		// リストページにリダイレクトする
		return Redirect::route('todos.index');
	}

}
