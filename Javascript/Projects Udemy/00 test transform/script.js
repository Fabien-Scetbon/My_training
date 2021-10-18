const modification = document.querySelector('.modif');
const modifica = document.querySelector('.rotate');

modification.addEventListener('click', () => {
    modification.classList.toggle('active');
    console.log(modification.classList);
})

modifica.addEventListener('click', () => {
    modifica.classList.toggle('active');
    console.log(modifica.classList);
})