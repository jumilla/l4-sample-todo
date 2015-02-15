<?php

class RouteTest extends TestCase {

	/**
	 * Rootのテスト
	 *
	 * @return void
	 */
	public function testRootRoute()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(302, $response->getStatusCode());
	}

	/**
	 * TodosControllerのテスト
	 *
	 * @return void
	 */
	public function testTodosRoutes()
	{
		// フィルタを有効にする
		Route::enableFilters();

		// GET /todos
		$response = $this->call('GET', '/todos');
		$this->assertEquals(200, $response->getStatusCode());

		// POST /todos
		$input = [
			'_token' => Session::token(),
		];
		$response = $this->call('POST', '/todos', $input);
		$this->assertEquals(302, $response->getStatusCode());
		$this->assertHasOldInput();

		// POST /todos/1/update
		$input = [
			'_token' => Session::token(),
		];
		$response = $this->call('POST', '/todos/1/update', $input);
		$this->assertEquals(404, $response->getStatusCode());

		// PUT /todos/1/title
		$input = [];
		$response = $this->call('PUT', '/todos/1/title', $input);
		$this->assertEquals(404, $response->getStatusCode());

		// POST /todos/1/delete
		$input = [
			'_token' => Session::token(),
		];
		$response = $this->call('POST', '/todos/1/delete', $input);
		$this->assertEquals(404, $response->getStatusCode());

		// POST /todos/1/restore
		$input = [
			'_token' => Session::token(),
		];
		$response = $this->call('POST', '/todos/1/restore', $input);
		$this->assertEquals(404, $response->getStatusCode());
	}

}
