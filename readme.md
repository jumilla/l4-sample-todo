
## Laravel4サンプル02 - シングルページTODOリスト

### デモサイト

[http://laravel4.samples.jumilla.me/todos](http://laravel4.samples.jumilla.me/todos)

### 著作権とライセンス

&copy; Fumio Furukawa  
[MITライセンス](http://opensource.org/licenses/MIT)

### ソースコードについて

このソースコードは[「Laravelエキスパート養成読本」(技術評論社)](http://amzn.to/1IOCifo)に記載されたChapter2の記事のソースコードです。
MITライセンスが許諾する範囲内で利用は自由ですが、全て「自己責任」でお願いします。

### 書籍(初版第1刷)からの変更点

クロスサイトスクリプティング脆弱性が含まれていたため、修正を入れました。

#### クロスサイトスクリプティングとは？

下記サイトの記事がわかりやすいです。

クロスサイトスクリプティングの基礎の基礎  
http://gihyo.jp/dev/serial/01/php-security/0007

#### 対応方法

HTMLページへのTodoのtitle出力を、BladeテンプレートエンジンのRAW出力```{{ $variable }}```からHTMLエスケープ出力```{{{ $variable }}}```に変更する。

#### 該当箇所

7箇所あります。(Thanks Kenji!)
詳しくはコミットログを参照してください。

### サポートページ

書籍の最新情報（正誤表など）は、技術評論社サイト内の[サポートページ](http://gihyo.jp/book/2015/978-4-7741-7313-9)を参照してください。
