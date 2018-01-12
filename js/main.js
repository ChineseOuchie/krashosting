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
        top: 1400,
        behavior: 'smooth'
    })
}
function over_ons() {
    window.scroll({
        top: 1850,
        behavior: 'smooth'
    })
}
function contact() {
    window.scroll({
        top: 2500,
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
        top: 2100,
        behavior: 'smooth'
    })
}
function over_onsEN() {
    window.scroll({
        top: 2500,
        behavior: 'smooth'
    })
}
function contactEN() {
    window.scroll({
        top: 3450,
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
const fotos = [
    '../img/banner1.jpg',
    '../img/banner2.jpg',
    '../img/banner3.jpg',
    '../img/banner4.jpg',
    '../img/banner5.jpg'
];
let foto = 1;
container.style.backgroundRepeat = "no-repeat";
container.style.background = `url("../img/banner1.jpg") 0% 0% / contain no-repeat`;
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
fotochange();

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
        // document.location.replace(Location.href + '?taal=' + document.documentElement.lang);
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