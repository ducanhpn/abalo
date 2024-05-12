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
    <h2 id="message"></h2>
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
    <!-- **********************PRAKTIKUM 3 Aufgabe 1 -->
    <script>
        function getMessageJson(){
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "{{asset('static/message.json')}}");
            xhr.onreadystatechange = function (){
                if( xhr.readyState === 4){
                    if(xhr.status === 200){
                        document.getElementById("message").innerText = JSON.parse(xhr.responseText)["message"];
                    }
                    else{
                        document.getElementById("message").innerText = xhr.statusText;
                    }
                }
            }
            xhr.send();
        }
        setInterval(getMessageJson, 3000);

    </script>
</body>
</html>
