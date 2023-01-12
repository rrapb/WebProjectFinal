var hamburger = document.getElementById('hamburger');
var navUL = document.getElementById('nav-ul');
console.log(navUL);
hamburger.addEventListener('click', () => {
    navUL.classList.toggle('hide');
    navUL.classList.toggle('show');
});
