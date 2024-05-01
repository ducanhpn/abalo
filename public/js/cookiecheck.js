console.log(document.cookie)

// create pop up window
if(getCookie("hide") === undefined){
    createPopupCookieBox()
}

// get cookie
function getCookie(name){
    const cookies = document.cookie.split(';');

    for(let i=0; i<cookies.length; i++) {
        if (cookies[i].includes(name)) {
            const temp = cookies[i].split('=');
            const obj = {};
            obj[temp[0]] = temp[1]
            return obj;
        }
    }
}

//set cookie
function setCookie(name, value){
    document.cookie = name + "=" + value + ";";
}

function createPopupCookieBox(){
    // create 3 Buttons
    const buttonAllesErlaubt = document.createElement('button');
    buttonAllesErlaubt.innerText = 'alles Cookies akzeptieren';
    buttonAllesErlaubt.classList.add('btn-cookie');

    const buttonNotwendigeErlaubt = document.createElement('button');
    buttonNotwendigeErlaubt.innerText = 'nur notwendige Cookies erlaubt';
    buttonNotwendigeErlaubt.classList.add('btn-cookie');

    const buttonAblehnen = document.createElement('button');
    buttonAblehnen.innerText = 'ablehnen';
    buttonAblehnen.classList.add('btn-cookie');

    // create container
    const container = document.createElement('div');
    container.classList.add('ctn-cookie');
    container.setAttribute("display","flex");

    // add event listener to buttons
    buttonAllesErlaubt.addEventListener('click', (e)=>{
        e.preventDefault();
        setCookie("erlaubt", "alles");
        setCookie("hide", "true");
        container.style.display = 'none'
        //container.setAttribute("hidden","");
    })
    buttonNotwendigeErlaubt.addEventListener('click',(e)=>{
        e.preventDefault();
        setCookie("erlaubt", "optional");
        setCookie("hide", "true");
        container.style.display = 'none'
        //container.setAttribute("hidden","");
    })
    buttonAblehnen.addEventListener('click', (e)=>{
        e.preventDefault();
        setCookie("erlaubt", "none");
        setCookie("hide", "true");
        container.style.display = 'none'
        //container.setAttribute("hidden","");
    })

    const title = document.createElement('h4');
    title.innerText = "Cookie Optionen auswählen";
    container.appendChild(title);
    // add btn to div container
    container.appendChild(buttonAblehnen);
    container.appendChild(buttonNotwendigeErlaubt);
    container.appendChild(buttonAllesErlaubt);
    //add div to document
    document.body.appendChild(container);



}


