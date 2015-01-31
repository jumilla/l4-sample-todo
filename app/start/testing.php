<?php

if (Config::get('database.default') == 'sqlite') {
	// check '{{env}}.sqlite' exists
	$databaseFile = Config::get('database.connections.sqlite.database');

	if (!file_exists($databaseFile)) {
		// touch 'local.sqlite'
		Log::info('Make Sqlite File "'.$databaseFile.'"');
		file_put_contents($databaseFile, '');
	}
}
