function heading_animation() {
    gsap.from('#heading', {
        y: 10,
        opacity: 0,
        delay: 0.5,
        duration: 0.3,
        stagger: 0.1
    })
}
heading_animation();





