document.addEventListener('DOMContentLoaded', function(){
    const cookie = document.getElementById('cookiemodal');
    cookie.style.visibility = 'visible';

    function particulier(){
        document.cookie = "type=particulier; expires=Thu, 18 Dec 2222 12:00:00 UTC";
        verdwijn();
    }

    function zakelijk(){
        document.cookie = "type=zakelijk; expires=Thu, 18 Dec 2222 12:00:00 UTC";
        verdwijn();
    }

    function verdwijn(){
        const cookie2 = document.getElementById('cookiemodal');
        cookie2.style.visibility = "hidden";
    }



    document.getElementById('cookie_part').addEventListener('click', particulier);
    document.getElementById('cookie_zak').addEventListener('click', zakelijk);
});

