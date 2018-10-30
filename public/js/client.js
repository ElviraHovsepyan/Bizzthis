const header = document.querySelector('.open-block');
const menu = document.querySelector('.menu');
const openToggle = document.querySelector('.open-block .entypo-right-open-big');
const closeToggle = document.querySelector('.menu .entypo-left-open-big');

openToggle.addEventListener('click', function() {
    header.classList.add('expand-active');
    menu.classList.add('expand-active');
});

closeToggle.addEventListener('click', function() {
    header.classList.remove('expand-active');
    menu.classList.remove('expand-active');
});
