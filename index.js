document.addEventListener('scroll', (e) => {
    const parralaxPower = 0.5;
    let scrollY = window.scrollY*parralaxPower;
    let parallaxElements = document.querySelectorAll("*[data-parallax]");

    parallaxElements.forEach(element => {
        element.style.backgroundPosition = "center "+scrollY+"px";
    });
})
