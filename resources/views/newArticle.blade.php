<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>new article</title>
    <link href="{{asset('/form.css')}}" rel="stylesheet" />
</head>
<body>

    <h2 id="status"></h2>
    <script>
        @if (session('warning'))
            alert("store failed");
        @endif
        function setAttributes(ref, obj){
            for(let key in obj){
                ref.setAttribute(key, obj[key]);
            }
        }

        const form = document.createElement("form");
        setAttributes(form, {"action":"/articles", "method": "post", "id" : "form"});

        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let csrfTokenField = document.createElement('input');
        csrfTokenField.type = 'hidden';
        csrfTokenField.name = '_token';
        csrfTokenField.value = csrfToken;
        form.appendChild(csrfTokenField);

        const label = {
            name : document.createElement("label"),
            price : document.createElement("label"),
            description : document.createElement("label"),
        }

        //change content of labels
        label.name.innerText = "name";
        label.price.innerText = "price";
        label.description.innerText = "description";

        //set attributes for label
        setAttributes(label.name, {"for":"name", "class" : "lbl" });
        setAttributes(label.price,  {"for": "price", "class" : "lbl"});
        setAttributes(label.description,  {"for": "description", "class" : "lbl"});


        const input = {
            name : document.createElement("input"),
            price : document.createElement("input"),
            description : document.createElement("textarea"),
            creator_id: document.createElement("input")
        }

        const nameAttributes = {
            "type" : "text",
            "id" : "name",
            "name" : "name",
            "required" : "",
            "class" : "input"
        }

        const priceAttributes = {
            "type" : "number",
            "id" : "price",
            "name" : "price",
            "required" : "",
            "class" : "input",
            "value" : "0",
        }

        const descriptionAttributes = {
            "id" : "description",
            "name" : "description",
            "rows" : "10",
            "cols" : "50"
        }

        //add attributes to input
        setAttributes(input.name, nameAttributes);
        setAttributes(input.price, priceAttributes);
        setAttributes(input.description, descriptionAttributes);

        //create button
        const button = document.createElement("button");
        setAttributes(button, {});
        button.innerText = "submit";
        button.classList.add("btn");


        const fieldset = document.createElement("fieldset")

        const legend = document.createElement("legend");
        legend.innerText = "New Article";

        const div = document.createElement("div");
        div.classList.add("form")

        // add to form
        form.appendChild(fieldset);
        fieldset.appendChild(legend)
        fieldset.appendChild(div);
        div.appendChild(label.name);
        div.appendChild(input.name);
        div.appendChild(label.price);
        div.appendChild(input.price);
        div.appendChild(label.description);
        div.appendChild(input.description);
        document.body.appendChild(button);

        /********CREATE AJAX FUNCTION**********/
        function submitThroughAjax(formObject){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/articles");
            let formData = new FormData(formObject);
            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                        document.getElementById("status").innerText = JSON.parse(xhr.response)['success'];
                    }
                    else{
                        document.getElementById("status").innerText = JSON.parse(xhr.response)['error'];
                    }
                }
            }
            xhr.send(formData);
        }

        //add event listener for button
        button.addEventListener('click', (e)=>{
            e.preventDefault();
            //check name
            if(document.getElementById("name").value.trim().localeCompare("") === 0){
                alert("invalid name");
                return;
            }
            console.log(document.getElementById("price").value);
            //check number
            if(parseInt(document.getElementById("price").value) === 0){
                alert("price must be more than 0");
                return;
            }
            //document.getElementById("form").submit();
            submitThroughAjax(form);
        })

        //add to body
        document.body.appendChild(form);

    </script>
</body>
</html>
