/*-----------Récupération d'élément html-------------*/

const navLinks = document.getElementById('nav_links');
const formFirst = document.getElementById('form_first');
const formLogin = document.getElementById('formLogin');
const mainHome = document.querySelector('main');
let burgerButton = document.getElementById('burger');
let searchBook = document.getElementById('appBook');
const contactDirect = document.getElementById('contact_direct');
const rencontreFoire = document.getElementById('rencontre_foire');
const demandeSpec = document.getElementById('demande_spec');
const nousContacter = document.getElementById('nous_contacter');

// récupération d'une classe contenant tous les éléments du DOM à afficher ou à masquer dans une variable
let displayAll = document.querySelectorAll('.displayAll');

//Récupération de tous les élément du DOM à afficher sur la page de contact
let displayContact = document.querySelector('.displayC');

//  Tableau pour les liens de droite de la Navbar
const arrayNavLinks = navLinks.children;

//------------- Fonction d'affichage dynamique------------/

function displayMain() {
    arrayNavLinks[2].addEventListener('click', (e) => {
        for (let displayA of displayAll) {
            displayA.style.display = "none"; //  boucle premettant de parcourir tous les éléments à masquer
        }
        formFirst.style.display = "block";
        displayContact.style.display = "none";
    })
    arrayNavLinks[0].addEventListener('click', (e) => {
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        displayContact.style.display = "none";
        mainHome.style.display = 'block';
    })
    arrayNavLinks[3].addEventListener('click', (e) => {
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        displayContact.style.display = "none";
        formLogin.style.display = 'block';
    })
    arrayNavLinks[1].addEventListener('click', (e) => {
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        displayContact.style.display = "none";
        searchBook.style.display = 'block';
    })
    arrayNavLinks[4].addEventListener('click', (e) => {
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        displayContact.style.display = "block";
    })
}

function toggleMenu() {
    const navbar = document.querySelector('.navbar');
    const burger = document.querySelector('.burger');
    burger.addEventListener('click', (e) => {
        navbar.classList.toggle('show-nav');
    });
}
toggleMenu()
/*
function closeMenu() {
    const close = document.querySelector('.navbar__links');
    const navbar = document.querySelector('.navbar');
    close.addEventListener('click', (e) => {
        navbar.classList.toggle('show-nav');
    });
}
closeMenu();
*/
displayMain();