<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Todo extends Model {

	const STATUS_INCOMPLETE = 1;		// 未完了状態
	const STATUS_COMPLETED = 2;			// 完了状態

 	// ソフトデリート機能をクラスに追加する
	use SoftDeletingTrait;

	/**
	 * このモデルで使用するデータベースのテーブル名。
	 *
	 * @var string
	 */
//	protected $table = 'todos';

	/**
	 * create() / fill() で代入を許可しないDBカラム名のリスト。
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * タイムスタンプ(作成日時・更新日時)カラムを有効にします。
	 * デフォルトはtrueです。
	 * trueの場合、created_at, updated_atを日付型(\Carbon\Cabon)として扱います。
	 *
	 * @var array
	 */
//	public $timestamps = true;

	/**
	 * 追加の日付カラム。
	 * デフォルトは[]です。
	 * ここで指定されたカラムの値は、日付型(\Carbon\Cabon)で取得できます。
	 *
	 * @var array
	 */
	protected $dates = ['completed_at', 'deleted_at'];

}
