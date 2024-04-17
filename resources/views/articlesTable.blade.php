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
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>creator_id</th>
            <th>created date</th>
        </tr>
        @forelse ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ab_name}}</td>
                <td>{{$item->ab_price}}</td>
                <td>{{$item->ab_description}}</td>
                <td>{{$item->ab_creator_id}}</td>
                <td>{{$item->ab_createdate}}</td>
                @if (file_exists(public_path('storage/image/' . $item->id .'.jpg')))
                    <td><img src="{{asset('storage/image/' . $item->id .'.jpg') }}"  alt="{{$item->id . '.jpg'}}" width="200" height="100"/></td>
                @elseif (file_exists(public_path('storage/image/' . $item->id .'.png')))
                    <td><img src="{{asset('storage/image/' . $item->id .'.png') }}"  alt="{{$item->id . '.png'}}" width="200" height="100"/></td>
                @else
                @endif

            </tr>
        @empty
        @endforelse
    </table>
</body>
</html>
