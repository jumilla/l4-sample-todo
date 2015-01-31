<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ $metadata->description }}">
	<meta name="keywords" content="{{ implode(', ', $metadata->keywords) }}">
	<meta name="author" content="{{ $metadata->author }}">

	<title>{{ $metadata->page_title }}</title>

	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<style>
{{-- 解説: インラインのCSSブロックです。各ページで追記ができます。--}}
@section ('inline-style')
	footer {
		margin-bottom: 5em;
	}
@show
{{-- 解説: セクションをこの場所に展開させたい場合、@showを指定します。--}}
	</style>

	<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" defer="defer"></script>
</head>

<body>

{{-- 解説: ここに各ページの内容が展開されます。--}}
@yield ('content')

{{-- 解説: 'app/views/partials/footer.blade.php' の内容をこの箇所に展開します。 --}}
@include ('partials.footer')

	<script>
{{-- 解説: インラインのJavaScriptブロックです。各ページで追記ができます。--}}
@section ('inline-script')
@show
{{-- 解説: セクションをこの場所に展開させたい場合、@showを指定します。--}}
	</script>
</body>
</html>
