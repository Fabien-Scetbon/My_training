const bouton = document.querySelector('#mode');
const texte = document.querySelector('span');

if (localStorage.getItem('theme')) {
    if(localStorage.getItem('theme') == 'sombre') {
        modeSombre();
    }
}

bouton.addEventListener('click',()=> {

    if (document.body.classList.contains('dark')) {

        document.body.classList.remove('dark');
        texte.textContent = "Thème sombre";
        localStorage.setItem('theme','clair');

    } else {
        modeSombre();
    }

})

function modeSombre() {
    document.body.classList.add('dark');
    texte.textContent = "Thème clair";
    localStorage.setItem('theme','sombre');

}