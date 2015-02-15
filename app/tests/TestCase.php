<?php

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	public function call($method, $uri, $parameters = [], $files = [], $server = [], $content = null, $changeHistory = true)
	{
		try {
			return parent::call($method, $uri, $parameters, $files, $server, $content, $changeHistory);
		}
		catch (HttpExceptionInterface $ex) {
			return Response::make('Http Exception', $ex->getStatusCode());
		}
	}

}
