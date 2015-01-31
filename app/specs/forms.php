<?php

// MEMO: フォームで使われるルールを定義する。
// MEMO: InputModelは、ルールのキーリストを使ってInput::only()を呼び出す。
// MEMO: キー名はlang/*/forms.phpと連動させること
return [
	// ログインフォームのルール
	'login' => [
		'username' => '@username',	// '@'で始まる値は、vocabulary.phpの値を参照する。
		'password' => 'required',
	],

	// 例
	'example' => [
		'title' => 'required',
		'subtitle' => '',			// オプションの場合は''で定義しておく。
	],
];
