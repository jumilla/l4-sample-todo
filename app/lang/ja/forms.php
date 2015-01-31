<?php

// MEMO: キー名はspecs/forms.phpと連動させること
return [
	// ログインフォームのテキスト
	'login' => [
		'rules' => '@rules',
		// フォーム固有のラベル
		'attributes' => [
			'username' => 'ユーザー名',
			'password' => 'パスワード',
			'submit' => 'ログイン',
		],
		// フォーム固有のヘルプテキスト
		'helptexts' => [
			'password' => '6文字以上',
		],
	],

	// 例のテキスト
	'example' => [	
		'rules' => '@rules',
		// フォーム固有のラベル
		'attributes' => [
			'title' => 'タイトル',
			'subtitle' => 'サブタイトル',
		],
		// フォーム固有のヘルプテキスト
		'helptexts' => [
		],
	],
];
