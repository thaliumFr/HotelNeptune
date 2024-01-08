const parralaxPower = 0.5;
const parallaxElements = document.querySelectorAll("*[data-parallax]");

function parallax() {
    let scrollY = window.scrollY*parralaxPower;
    parallaxElements.forEach(element => {
        element.style.backgroundPosition = "center "+scrollY+"px";
    });
}


document.addEventListener('scroll', (e) => {
    parallax();
})

document.addEventListener('DOMContentLoaded', () => {
    parallax();
})