let price = document.querySelector('#price_label');
let date = document.querySelector('#date');

const url='https://blockchain.info/ticker';

function actualiser() {

    // obtenir date format normal

    let dateActuelle = new Date();

    let dateLocale = dateActuelle.toLocaleString(navigator.language, {
    weekday: 'long', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric', 
    hour: 'numeric', 
    minute: 'numeric',
    second: 'numeric'
    });

    date.textContent = `${dateLocale}`;

    // obtenir valeur Bitcoin

    let requete = new XMLHttpRequest();

    requete.open('GET',url);
    requete.responseType = 'json';
    requete.send();
    requete.onload = function() {

        if(requete.readyState === XMLHttpRequest.DONE) {

            if(requete.status === 200) {
                let reponse = requete.response;
                let bitcoin = reponse.EUR.last ;
                price.textContent = `${bitcoin}`;

            } else {
                alert('Un problème est survenu.');
            } 
        }
    }
}

let intervalle = setInterval(actualiser, 100);
