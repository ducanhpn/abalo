'use strict'
class NaviMenu {
    constructor(arr) {
        this.nav = document.createElement('nav')
        this.ul = document.createElement('ul');
        this.nav.appendChild(this.ul);
        for(let i=0; i<arr.length; i++){
            this[arr[i]] = document.createElement('li');
            this[arr[i]].textContent = arr[i];
            this.ul.appendChild(this[arr[i]]);
        }
    }

    onClick(item, callback){
        this[item].addEventListener('click', callback);
    }
    onMouseEnter(item, callback) {
        this[item].addEventListener('mouseenter', callback);
    }
    onMouseOut(item, callback) {
        this[item].addEventListener('mouseout', callback);
    }
    append(item, subNMenu){
        this[item].appendChild(subNMenu.nav);
    }
    addToDocument(){
        document.body.appendChild(this.nav);
    }
    getNav() {
        return this.nav;
    }
}


const menuItem = ['Home', 'Kategorie', 'Verkaufen', 'Unternehmen'];
const firstNav = new NaviMenu(menuItem) // Hauptmenu erstellen
const subItem = ['Philosophie', 'Karriere'];
const secondNav = new NaviMenu(subItem); // Submenu erstellen
firstNav.append('Unternehmen', secondNav);
firstNav.onMouseEnter('Unternehmen', function(){
    secondNav.getNav().hidden = false
})

firstNav.onMouseOut('Unternehmen', function() {
    secondNav.getNav().hidden = true;
})
firstNav.addToDocument();

