<?php

// MEMO: キー名はspecs/forms.phpと連動させること
return [
	// ログインフォームのテキスト
	'login' => [
		'rules' => '@rules',
		// フォーム固有のラベル
		'attributes' => [
			'username' => 'User Name',
			'password' => 'Password',
			'submit' => 'Login',
		],
		// フォーム固有のヘルプテキスト
		'helptexts' => [
			'password' => 'over 6bytes.',
		],
	],

	// 例のテキスト
	'example' => [	
		'rules' => '@rules',
		// フォーム固有のラベル
		'attributes' => [
			'title' => 'Title',
			'subtitle' => 'Subtitle',
		],
		// フォーム固有のヘルプテキスト
		'helptexts' => [
		],
	],
];
