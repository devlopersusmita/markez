$(document).ready(function () {
    //Banner Slider
    $('.hero-slider').owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        nav: false,
        dots: true,
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 7000,
    });


    // Multi step form

       const multiStepForm = new MultiStepForm("#form-container");

    // Dashboard close sidebar


    $('ul.vertical-nav-menu > li ').click(function () {
        $(' ul.vertical-nav-menu li ').removeClass("mm-active");
        $(this).addClass("mm-active");
    });

    // Smooth scrolling

    // Sidebar submenu open

    $(".vertical-nav-menu.metismenu .mm-active").click(function(){
        alert("Hello");
        $('.hide-menu').show(1000);
    });

    $('body').on('click','.vertical-nav-menu.metismenu .mm-active',function(){
         alert("Hello");

    });


    });



