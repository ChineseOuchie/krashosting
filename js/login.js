const modal = document.getElementById('myModal');
const container = document.getElementById('container');
const span = document.getElementsByClassName("close")[0];
const email = document.getElementById("email");

span.onclick = function() {
    modal.style.display = "none";
};

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
if (x === 3){
    container.innerHTML = '';
    modal.style.display = "block";
    email.style.display = "block";
}
console.log(x);