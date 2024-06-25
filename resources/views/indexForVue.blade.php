<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Abalo-Vue</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" data-count="{{$amountArticle}}">
    </div>
    <script>
        window.srcArr = @json($srcArr);


    </script>

</body>
</html>
