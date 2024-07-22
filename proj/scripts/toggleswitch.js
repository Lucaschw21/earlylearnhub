const user = document.querySelector(".user");
const admin = document.querySelector(".admin");
const container = document.querySelector(".container");
const switches = document.querySelectorAll(".switch");

let current = 1;

function tab2(){
    container.style.marginLeft = "-100%"; 
    user.style.background = "none";
    admin.style.background = "#cdb5ff";
    switches[current-1].classList.add("active");
}

function tab1(){
    container.style.marginLeft = "0"; 
    admin.style.background = "none";
    user.style.background = "#cdb5ff";
    switches[current-1].classList.remove("active");
}