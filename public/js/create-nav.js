'use strict'
const nav = document.getElementById("nav");
const ul = document.createElement("ul");

nav.appendChild(ul);

const li = [];
const menuItem = ['Home', 'Kategorie', 'Verkaufen', 'Unternehmen'];

//add <li> to <ul>
for(let i=0; i<4; i++){
    li.push(document.createElement("li"));
    li[i].textContent = menuItem[i];
    li[i].classList.add(menuItem[i]);
    ul.appendChild(li[i]);
}

const subItem = ['Philosophie', 'Karriere'];
const subLiItem = [];
const subUl = document.createElement(("ul"))
subUl.hidden = true;

li[li.length - 1].appendChild(subUl); // add <ul> to <li>Unternehmen</li>

//add sub <li> to sub <ul>
for(let i=0; i < subItem.length; i++){
    subLiItem.push(document.createElement('li'));
    subLiItem[i].textContent = subItem[i]
    subLiItem[i].classList.add(subItem[i]);
    subUl.appendChild(subLiItem[i]);
}

//handle routing
li[1].addEventListener('click', function(){
    window.location.href = '/article';
})

// config sub list
li[li.length-1].addEventListener('mouseenter', function(){
    subUl.hidden= false;
})
subUl.addEventListener('mouseout', function(){
    subUl.hidden= true;
})
