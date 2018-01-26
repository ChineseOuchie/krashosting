let fotos = [];
function home() {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    })
}
function pakketten() {
    window.scroll({
        top: 900,
        behavior: 'smooth'
    })
}
function nieuws() {
    window.scroll({
        top: 2400,
        behavior: 'smooth'
    })
}
function over_ons() {
    window.scroll({
        top: 3000,
        behavior: 'smooth'
    })
}
function contact() {
    window.scroll({
        top: 3900,
        behavior: 'smooth'
    })
}


function homeEN() {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    })
}
function pakkettenEN() {
    window.scroll({
        top: 500,
        behavior: 'smooth'
    })
}
function nieuwsEN() {
    window.scroll({
        top: 3100,
        behavior: 'smooth'
    })
}
function over_onsEN() {
    window.scroll({
        top: 3650,
        behavior: 'smooth'
    })
}
function contactEN() {
    window.scroll({
        top: 4800,
        behavior: 'smooth'
    })
}
document.getElementById('scroll_home').addEventListener('click', home);
document.getElementById('scroll_pakketten').addEventListener('click', pakketten);
document.getElementById('scroll_nieuws').addEventListener('click', nieuws);
document.getElementById('scroll_contact').addEventListener('click', contact);
document.getElementById('scroll_over_ons').addEventListener('click', over_ons);

document.getElementById('m_home').addEventListener('click', homeEN);
document.getElementById('m_pakketten').addEventListener('click', pakkettenEN);
document.getElementById('m_nieuws').addEventListener('click', nieuwsEN);
document.getElementById('m_contact').addEventListener('click', contactEN);
document.getElementById('m_over_ons').addEventListener('click', over_onsEN);

function mobilenav() {
    let status = document.getElementById("mobile-nav");
    if (status.className === "mobile-nav"){
        status.className += " is-open-ul";
    } else {
        status.className = "mobile-nav";
    }
}
function mobilenava() {
    let status = document.getElementById("mobile-nav-toggle");
    if (status.className === "mobile-nav-toggle"){
        status.className += " is-open";
    } else {
        status.className = "mobile-nav-toggle";
    }

}
document.getElementById("mobile-nav-toggle").addEventListener("click", mobilenav);
document.getElementById("mobile-nav-toggle").addEventListener("click", mobilenava);


const container = document.getElementById('slidercontainer');
let foto = 1;
container.style.backgroundRepeat = "no-repeat";
function fotochange() {
    setInterval(function () {
        container.style.background = `url("${fotos[foto]}") 0% 0% / contain no-repeat`;
        // container.style.backgroundSize = `contain`;
        console.log(container.style.background = `container.style.background = url("${fotos[foto]}") no-repeat`);
        foto = foto + 1;
        if (foto >= 5){
            foto = 0;
        }
    }, 4000)

}

let extraStarter = document.getElementById('extraStarter');
let extraBasic = document.getElementById('extraBasic');
let extraAdvanced = document.getElementById('extraAdvanced');

let starterKnop = document.getElementById('starter');
let basicKnop = document.getElementById('basic');
let advancedKnop = document.getElementById('advanced');

starterKnop.addEventListener('click', function () {
    extraStarter.style.display = 'block';
    extraAdvanced.style.display = 'none';
    extraBasic.style.display = 'none';

});
basicKnop.addEventListener('click', function () {
    extraStarter.style.display = 'none';
    extraAdvanced.style.display = 'none';
    extraBasic.style.display = 'block';
});
advancedKnop.addEventListener('click', function () {
    extraStarter.style.display = 'none';
    extraAdvanced.style.display = 'block';
    extraBasic.style.display = 'none';
});

//taal veranderen js
function checktaal() {
    if (refresh || window.location.href !== 'http://localhost/index.php?taal=' + document.documentElement.lang){
        document.location.replace('index.php?taal=' + document.documentElement.lang);
    }
}
checktaal();

document.getElementById('nederlands').addEventListener('click', () => {
    document.location.replace('index.php?lang=nl');
});
document.getElementById('engels').addEventListener('click', () => {
    document.location.replace('index.php?lang=en');
});




const taal = document.documentElement.lang;
const bericht = document.getElementById('ichtber');
const voornaam = document.getElementById('naamvoor');
const achternaam = document.getElementById('naamachter');
const onderwerp = document.getElementById('werponder');
const voornaamplc = document.getElementById('voornaam');
const achternaamplc = document.getElementById('achternaam');
const berichtplc = document.getElementById('bericht');
const submit = document.getElementById('submit');
const domeincheck = document.getElementById('domeincheck');
const keuze = document.getElementById('kiesoptie');
const custompak = document.getElementById('custompakket');
const alginfo = document.getElementById('algemeeninfo');
const betinfo = document.getElementById('betaalinfo');
const mpakketten = document.getElementById('m_pakketten');
const scrollpakketten = document.getElementById('scroll_pakketten');
const mnieuws = document.getElementById('m_nieuws');
const scrollnieuws = document.getElementById('scroll_nieuws');
const moverons = document.getElementById('m_over_ons');
const scrolloverons = document.getElementById('scroll_over_ons');

if (taal === 'en'){
    voornaam.innerText = 'Firstname';
    achternaam.innerText = 'Lastname';
    onderwerp.innerText = 'Subject';
    bericht.innerText = 'Message';
    voornaamplc.placeholder = 'Firstname...';
    achternaamplc.placeholder = 'Lastname...';
    berichtplc.placeholder = 'Place your message...';
    submit.value = 'Send';
    domeincheck.placeholder = 'Check here for a domainname';
    keuze.innerText = 'Choose an option...';
    custompak.innerText = 'Custom package';
    alginfo.innerText = 'General information';
    betinfo.innerText = 'Payment information';
    mpakketten.innerText = scrollpakketten.innerText = 'Packages';
    mnieuws.innerText = scrollnieuws.innerText = 'News';
    moverons.innerText = scrolloverons.innerText = 'About Us';
    fotos = [
        '../img/banner_en_1.jpg',
        '../img/banner_en_2.jpg',
        '../img/banner_en_3.jpg',
        '../img/banner_en_4.jpg',
        '../img/banner_en_5.jpg'
    ];
    container.style.background = `url("../img/banner_en_1.jpg") 0% 0% / contain no-repeat`;
}else if(taal === 'nl'){
    voornaam.innerText = 'Voornaam';
    achternaam.innerText = 'Achternaam';
    onderwerp.innerText = 'Onderwerp';
    bericht.innerText = 'Bericht';
    voornaamplc.placeholder = 'Voornaam...';
    achternaamplc.placeholder = 'Achternaam...';
    berichtplc.placeholder = 'Plaats je bericht...';
    submit.value = 'Verstuur';
    domeincheck.placeholder = 'Check hier voor een domeinnaam';
    keuze.innerText = 'Kies een optie...';
    custompak.innerText = 'Custom pakket';
    alginfo.innerText = 'Algemene informatie';
    betinfo.innerText = 'Betaal informatie';
    mpakketten.innerText = scrollpakketten.innerText = 'Pakketten';
    mnieuws.innerText = scrollnieuws.innerText = 'Nieuwsbericht';
    moverons.innerText = scrolloverons.innerText = 'Over ons';
    fotos = [
        '../img/banner1.jpg',
        '../img/banner2.jpg',
        '../img/banner3.jpg',
        '../img/banner4.jpg',
        '../img/banner5.jpg'
    ];
    container.style.background = `url("../img/banner1.jpg") 0% 0% / contain no-repeat`;
}
fotochange();