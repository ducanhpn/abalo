<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TestData</title>
    <link href="{{asset('/style.css')}}" rel="stylesheet"  />
    <link href="{{asset('/articles.css')}}" rel="stylesheet"  />
    @for ($i=1; $i<= 30; $i++)
        @if (file_exists(public_path('storage/image/' . $i.'.jpg')))
            <link rel="prefetch" href="{{asset('storage/image/' . $i. '.jpg')}}" />
        @elseif (file_exists(public_path('storage/image/' . $i.'.png')))
            <link rel="prefetch" href="{{asset('storage/image/' . $i. '.png')}}" />
        @else
        @endif

    @endfor
</head>
<body>
    @csrf
    <script>
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "api/shoppingcart");
        xhr.send();
    </script>
    <script src="{{ asset('/js/cookiecheck.js') }}"></script>
    <button id="showKorb">Show Warenkorb</button>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>creator_id</th>
            <th>created date</th>
        </tr>
        @foreach ($result as $item)
            <tr id="{{$item->id}}" class="interactive">

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
                <td>
                    <div class="container-btn">
                        <button id="add-{{$item->id}}">add</button>
                        <button id="remove-{{$item->id}}">remove</button>
                    </div>
                </td>
            </tr>

        @endforeach
    </table>
    <!-- create Warenkorb -->

    <div id="warenkorb" class="">
        <h1>shopping cart</h1>
        <ul id="ul-shopping">
        </ul>
        <button id="btn-close">X</button>
    </div>

    <script>
        const listItem = {};
        const ul = document.getElementById("ul-shopping");
        //add event listener to click item
        @forelse ($result as $item)
            document.getElementById('add-{{$item->id}}').addEventListener('click',()=>{
                const xhr = new XMLHttpRequest();
                xhr.open('POST','api/shoppingcart');
                xhr.setRequestHeader('Accept','application/json');
                xhr.setRequestHeader('Content-Type','application/json');
                xhr.send(JSON.stringify({
                    "article_id" : {{$item->id}},
                }));
            })
            document.getElementById('remove-{{$item->id}}').addEventListener('click',()=>{
                const xhr = new XMLHttpRequest();
                xhr.open('DELETE','api/shoppingcart/{{$item->id}}');
                xhr.send();
            })
        @empty
        @endforelse

        const showKorb = document.getElementById("showKorb");
        showKorb.addEventListener('click', renderWarenKorb)

        //function to show shopping cart
        function renderWarenKorb(){
            const xhr1 = new XMLHttpRequest();
            xhr1.open("GET", "/api/shoppingcart");
            xhr1.onreadystatechange = function() {
                if (xhr1.readyState === 4) {
                    const arr = JSON.parse(xhr1.response);
                    console.log(arr);
                    for(let i=0 ; i< arr.length; i++){
                        //render list
                        //const obj = JSON.parse(arr[i]);
                        const li = document.createElement("li");
                        li.innerText = arr[i]["ab_name"] + ";" + arr[i]["ab_price"];
                        li.classList.add("li-style");
                        li.setAttribute("id","li-{{$item->id}}")
                        ul.appendChild(li);
                    }
                }
            };
            xhr1.send();

            const cart = document.getElementById("warenkorb");
            cart.style.visibility = "visible";
        }

        //add listener for close button
        document.getElementById("btn-close").addEventListener('click', () =>{
            document.getElementById("warenkorb").style.visibility = "hidden";
            ul.replaceChildren();
        })

    </script>

</body>
</html>
