<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TestData</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @forelse ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ab_testname}}</td>
            </tr>
        @empty
        @endforelse
    </table>
</body>
</html>
