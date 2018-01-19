document.addEventListener('DOMContentLoaded', function(){
    function getCookie( name ) {
        let dc = document.cookie;
        let prefix = name + "=";
        let begin = dc.indexOf("; " + prefix);
        let end = null;
        if (begin === -1) {
            begin = dc.indexOf(prefix);
            if (begin !== 0) return null;
            end = document.cookie.indexOf(";", begin);
        } else {
            begin += 2;
            end = document.cookie.indexOf(";", begin);
            if (end === -1) {
                end = dc.length;
            }
        }

        return decodeURI(dc.substring(begin + prefix.length, end) ).replace(/"/g, '');
    }


    function searchCookie(){
        const gekkeCookie = getCookie('type');

        if (gekkeCookie === null){
            const cookie = document.getElementById('cookiemodal');
            cookie.style.visibility = 'visible';
        } else {
            const cookie = document.getElementById('cookiemodal');
            cookie.style.visibility = 'hidden';
        }
    }

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


    searchCookie();
    document.getElementById('cookie_part').addEventListener('click', particulier);
    document.getElementById('cookie_part2').addEventListener('click', particulier);
    document.getElementById('cookie_zak').addEventListener('click', zakelijk);
    document.getElementById('cookie_zak2').addEventListener('click', zakelijk);
});

