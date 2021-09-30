var topContainer = document.querySelector('.top-container');
var mobileNav = document.querySelector('.mobile-nav-bar');
var navClose = document.getElementById('close');
var navOpen = document.getElementById('open');

function togglemenu() {
    mobileNav.style.display = "inline-block";
    topContainer.style.marginBottom = "350px";
    navOpen.style.display = "none";
    navClose.style.display = "inline-block";
}

function closemenu() {
    navClose.style.display = "none";
    navOpen.style.display = "inline-block";
    mobileNav.style.display = "none";
    topContainer.style.marginBottom = "0px";
}

function myFunction(x) {
if (x.matches){
    mobileNav.style.display = "none";
    topContainer.style.marginBottom = "0px";
    navOpen.style.display = "none";
    navClose.style.display = "none";              
}else {
    navOpen.style.display = "inline-block";
}
}

var x = window.matchMedia('(min-width: 950px)');
myFunction(x);
x.addListener(myFunction);


