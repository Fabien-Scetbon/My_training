const panels = document.querySelectorAll('.panel');

panels.forEach((panel) => {
    panel.addEventListener('click' , () => {
        removeActiveClasses();   /* le programme poursuit son execution durant la transition ? */
        panel.classList.add('active');
    })
});

function removeActiveClasses() {
    panels.forEach((panel) => {
        panel.classList.remove('active');
});
}