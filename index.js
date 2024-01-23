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

function ToggleId(id) {
    const el = document.getElementById(id);
    console.log(el.style.display);
    if (el.style.display == "none" || el.style.display == "") {
        el.style.display = "block";
        console.log("block")
      } else {
        el.style.display = "none";
        console.log("none")
      }
}

