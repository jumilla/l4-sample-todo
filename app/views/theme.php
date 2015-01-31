<?php

// Fluentは、PHP配列をオブジェクトとして扱えるようにするヘルパクラスです。
// 要素へのアクセスに $metadata['key'] という表記のほか、$metadata->key としてアクセスできます。
$metadata = new \Illuminate\Support\Fluent([
	'keywords' => [
		'Laravel', 'Laravel4', 'Laravel4.2',
		'Framework', 'WebFramework',
		'Sample',
	],
	'description' => '',
	'author' => 'Fumio Furukawa',
	'url' => 'http://jumilla.me',
]);



if (!function_exists('date_string')) {
	/**
	 * ロケール 'ja' の日付表現を返します。
	 * ex) 2015年1月1日(木)
	 * 
	 * @param  \Carbon\Carbon $datetime 
	 */
	function date_string($datetime) {
		$weekdaysJa = ['日', '月', '火', '水', '木', '金', '土'];
		return $datetime->format('Y年n月j日').'('.$weekdaysJa[$datetime->dayOfWeek].')';
	}
}
