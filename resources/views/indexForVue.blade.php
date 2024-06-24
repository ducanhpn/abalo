<!Doctype>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Abalo-Vue</title>
    @vite('resources/css/app.scss')
</head>
<body>
@vite('resources/js/app.js')
    <div id="app" data-count="{{$amountArticle}}">
    </div>
    <script>
        window.srcArr = @json($srcArr);
        console.log(window.srcArr);
    </script>

</body>
</html>
