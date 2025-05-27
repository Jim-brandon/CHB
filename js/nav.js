const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links a')

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            }else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.6}s`;
            }
        });

        burger.classList.toggle('toggle')
    });

    navLinks.forEach((link) => {
        link.addEventListener('click', function() {
            nav.classList.remove('nav-active')
            navLinks.forEach((link, index) => {
            link.style.animation = '';
            });
            burger.classList.remove('toggle')            
        });
    });
}

navSlide();


window.onscroll = function(){scrollFunction()};


function scrollFunction(){
    if(document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
        document.getElementById("js-main").style.height ="5.5rem";
        document.getElementById("js-main").style.marginTop ="0";
    } else {
        document.getElementById("js-main").style.height="11.5rem"
        document.getElementById("js-main").style.marginTop="5rem"
    }
}


