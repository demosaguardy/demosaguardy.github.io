const hamburger = document.querySelector(".hamburger")
const links = document.querySelector(".links")
const aboutmebtn = document.getElementById("about_me_btn")
const aboutmesection = document.getElementById("about_me_section")
const icon = document.getElementById("icon")

hamburger.addEventListener("click", () => {
    links.classList.toggle("show");
})

aboutmebtn.addEventListener("click", () => {
    aboutmesection.classList.toggle("show")
})

icon.onclick = function(){
    document.body.classList.toggle("light-mode")
    if(document.body.classList.contains("light-mode")){
        icon.src ="asset/moon.png"
    } else{
        icon.src ="asset/sun.png"
    }
}