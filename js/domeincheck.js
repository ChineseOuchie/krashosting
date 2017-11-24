function ping(url) { //ping functie geleverd door dennis
    return new Promise(function (resolve, reject) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    const e = JSON.parse(xmlhttp.response).exists;
                    resolve(e);
                }
                else if (xmlhttp.status == 400) {
                    reject(false);
                }
                else {
                    reject(false);
                }
            }
        }
        xmlhttp.open("GET", 'http://www.dennisvanriet.nl/ping/ping_ws.php?url=' + url + '&t=' + Math.random(), true);
        xmlhttp.send();
    });
} //eind ping functie
document.addEventListener("DOMContentLoaded", function () { //start script pas naardat DOMtree (pagina code) geladen is.
    const taal = document.documentElement.lang;
    const domaincheck = document.querySelector(".comaincheck");
    //variable met domain form
    const domaincheck_input = document.querySelector(".domaincheck input[type=\"text\"]");
    //variable met domain invoer veld
    const domaincheck_submit = document.querySelector(".domaincheck input[type=\"submit\"]");
    //variable met domain submit button
    function domain_check_msg(msg, icon, color) { //weergeef bericht onder domein checker.
        const domain_div = document.querySelector(".domaincheck_msg");
        const domain_msg = document.querySelector(".domaincheck_msg .msg");
        const domain_icon = document.querySelector(".domaincheck_msg .icon");
        domain_div.classList.add("show");
        domain_msg.innerHTML = msg;
        domain_icon.innerHTML = icon;
        domain_icon.style.color = color;
    }
    domaincheck_submit.addEventListener("click", function (ev) {
        ev.preventDefault(); //voorkom dat form doorgaat naar post/get
        let url = domaincheck_input.value; //haal invoer uit input veld
        if (url != "") {
            if (url.match('^[a-z0-9\-]+[.][a-z\.]{2,}$')) {
                if (url.substring(0, 7) != "http://" && url.substring(0, 8) != "https://") {
                    //check of url begint met http:// of https://
                    url = "http://" + url; //voeg http:// toe aan url
                }
                //eind eige code
                ping(url).then(function (e) { //ping code geleverd door Dennis
                    if (e === 'true') {
                        if(taal == "nl"){
                            domain_check_msg(url + ' is niet beschikbaar.', '&#10008;', 'red');
                        }else if(taal == "en"){
                            domain_check_msg(url + ' is not available.', '&#10008;', 'red');
                        }
                    }
                    else {
                        if(taal == "nl"){
                            domain_check_msg(url + ' is beschikbaar!', '&#10003;', 'green');
                        }else if(taal == "en"){
                            domain_check_msg(url + ' is available!', '&#10003;', 'green');
                        }
                    }
                }).catch(function (err) {
                    if(taal == "nl"){
                            domain_check_msg(url + ' is niet beschikbaar.', '&#10008;', 'red');
                        }else if(taal == "en"){
                            domain_check_msg(url + ' is not available.', '&#10008;', 'red');
                        }
                
                }); //eind ping code   
            }else{
                if(taal == "nl"){
                    domain_check_msg(url + ' is geen geldige url!.', '&#10008;', 'red');
                }else if(taal == "en"){
                    domain_check_msg(url + ' is not a valid url!', '&#10008;', 'red');
                }
            }
        }
    });
});