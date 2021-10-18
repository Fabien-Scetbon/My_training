const faq = document.querySelectorAll('.faq'); // ou ('.faq-toggle')

faq.forEach( element => {
    const btn = element.querySelector('.faq-toggle'); // rien ici

    btn.addEventListener('click', ()=> {
        element.classList.toggle('active');   // element.parentNode.classList
    })
})
