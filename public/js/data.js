'use strict'
var data = {
    'produkte': [
        { name: 'Ritterburg', preis: 59.99, kategorie: 1, anzahl: 3 },
        { name: 'Gartenschlau 10m', preis: 6.50, kategorie: 2, anzahl: 5 },
        { name: 'Robomaster' ,preis: 199.99, kategorie: 1, anzahl: 2 },
        { name: 'Pool 250x400', preis: 250, kategorie: 2, anzahl: 8 },
        { name: 'Rasenmähroboter', preis: 380.95, kategorie: 2, anzahl: 4 },
        { name: 'Prinzessinnenschloss', preis: 59.99, kategorie: 1, anzahl: 5 }
    ],
    'kategorien': [
        { id: 1, name: 'Spielzeug' },
        { id: 2, name: 'Garten' }
    ]
};

const getMaxPreis = (data) => {
    let max = data['produkte'][0].preis;
    for( const obj of data['produkte']){
        if(obj.preis >= max) max = obj.preis;
    }
    return max;
}
console.log(getMaxPreis(data));

const getMinPreis = (data) => {
    let min = data['produkte'][0].preis;
    for( const obj of data['produkte']){
        if(obj.preis <= min) min = obj.preis;
    }
    return min;
}

const getPreisSum = (data) => {

    return data['produkte'].map(element => element.preis).reduce((accumulaltor, currentValue) => accumulaltor + currentValue);
}

const getGesamtWert = (data) => {

    return data['produkte'].map(element => element.preis * element.anzahl)
        .reduce((accumulaltor, currentValue) => accumulaltor + currentValue);
}

const getAnzahlProdukteOfKategorie = (data, kategorieName = 'Spielzeug') => {
    const produkte = data['produkte'];
    const kategorie = data['kategorien'];
    let index = -1;
    for(let i=0; i< kategorie.length; i++){
        let result = (kategorie[i].name.localeCompare(kategorieName))
        if( result === 0) {
            index = kategorie[i].id;
        }
    }

    if(index !== undefined){
        return produkte.filter(element => element.kategorie === index)
            .map(element => element.anzahl)
            .reduce((accumulaltor, currentValue) => accumulaltor + currentValue)
    }
    return "Error";
}


const showResult = () => {
    const suchValue = document.getElementById("function-name").value;
    const titleDom = document.getElementById("title");
    titleDom.textContent = suchValue;
    const result = document.getElementById("result");
    switch (suchValue) {
        case "getMaxPreis":
            result.textContent = getMaxPreis(data);
            break;
        case "getMinPreis":
            result.textContent = getMinPreis(data);
            break;
        case "getPreisSum":
            result.textContent = getPreisSum(data);
            break;
        case "getGesamtWert":
            result.textContent = getGesamtWert(data);
            break;
        case "getAnzahlProdukteOfKategorie":
            result.textContent = getAnzahlProdukteOfKategorie(data, 'Garten');
            break;
        default:
            result.textContent = "Funktion nicht gefunden";
    }
}

/*+++++++++++CREATE NAV LIST+++++++++++++*/

