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
    <div id="g_id_onload" data-auto_prompt = 'false' data-client_id=""></div>
    <script>
        window.srcArr = @json($srcArr);

        //<meta name="referrer" content="strict-origin-when-cross-origin" />
        //<script src="https://accounts.google.com/gsi/client" async>
    </script>

</body>
</html>
