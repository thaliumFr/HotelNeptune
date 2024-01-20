const parallaxElements = document.querySelectorAll("*[data-parallax]");

function parallax() {
    parallaxElements.forEach(element => {
        let scrollY = window.scrollY*element.dataset.parallax;
        element.style.backgroundPosition = "center "+scrollY+"px";
    });
}

document.addEventListener('scroll', (e) => {
    parallax();
})

document.addEventListener('DOMContentLoaded', () => {
    parallax();
})