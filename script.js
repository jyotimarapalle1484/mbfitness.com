let menu = document.queryselector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick =() =>
{
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}
menu.onscroll =() =>
{
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

// typing js code
const typed = new Typed('.multiple-text', {
    strings: ['Physical Fitness', 'Weight Gain', 'Strength Training', 'Fat Lose','weight lifting','Running'],
    typeSpeed: 60,
    backspeed: 60,
    backdelay: 1000,
    loop:True,
  });