const parallaxElements = document.querySelectorAll("*[data-parallax]");

function parallax() {
    parallaxElements.forEach(element => {
        const scrollY = window.scrollY*element.dataset.parallax;
        const offset = element.dataset.offset; 
        element.style.backgroundPosition = "center "+(scrollY)+"px";
    });
}

document.addEventListener('scroll', (e) => {
    parallax();
})

document.addEventListener('DOMContentLoaded', () => {
    parallax();
})