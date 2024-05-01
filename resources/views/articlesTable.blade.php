<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        @forelse ($result as $item)
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
                <!-- <div id="minus-{{$item->id}}">-</div> -->
            </tr>
        @empty
        @endforelse
    </table>
    <!-- create Warenkorb -->

    <div id="warenkorb" class="">
        <h1>shopping cart</h1>
        <ul id="ul-shopping"></ul>
        <button id="btn-close">X</button>
    </div>

    <script>
        const listItem = {};
        const ul = document.getElementById("ul-shopping");
        //add event listener to click item
        @forelse ($result as $item)
            document.getElementById({{$item->id}}).addEventListener('click',()=>{

                if(listItem[{{$item->id}}] === undefined){
                    listItem[ {{$item->id}} ] = { '{{$item->ab_name}}' : {{$item->ab_price}} } ; // add to object if key doesn't exist
                    //create <li> element and append to <ul>
                    const li = document.createElement("li");
                    li.innerText = "{{$item->ab_name}}" + ";" + {{$item->ab_price}};
                    li.classList.add("li-style");
                    li.setAttribute("id","li-{{$item->id}}")
                    ul.appendChild(li);
                    //add button with same unique id to delete item from shopping cart
                    const removeButton = document.createElement("div");

                    removeButton.classList.add("btn-rm");
                    removeButton.addEventListener('click', ()=>{
                        li.remove();
                        delete listItem['{{$item->id}}']
                    })
                    li.appendChild(removeButton);
                }

            })
        @empty
        @endforelse

        const showKorb = document.getElementById("showKorb");
        showKorb.addEventListener('click', renderWarenKorb)

        //function to show shopping cart
        function renderWarenKorb(){
            const cart = document.getElementById("warenkorb");
            cart.style.visibility = "visible";
        }

        //add listener for close button
        document.getElementById("btn-close").addEventListener('click', () =>{
            document.getElementById("warenkorb").style.visibility = "hidden";
        })

    </script>

</body>
</html>
