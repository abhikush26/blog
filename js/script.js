const responsive = {
    0:{
        items:1
    },
    360:{
        items:1
    },
    580:{
        items:2
    },
    960:{
        items:3
    }
}

$(document).ready(function(){

    $nav = $('.nav');
    $togglecollapse = $('.toggle_collapse');

    /* click event on toggle */
    $togglecollapse.click(function(){
        $nav.toggleClass('collapse');
    });

    /* owl carousel */
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:false,
        nav:true,
        navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
        responsive:responsive
    });

    //click to scroll
    $('.moveup').click(function(){
        $('html,body').animate({
            scrollTop:0
        },1000)
    });

    //animation 

    AOS.init();

    
});

