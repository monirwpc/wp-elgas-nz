jQuery(document).ready(function(){

    //slicknav mobile menu
    jQuery('#menu').slicknav({
        prependTo:'#menu-holder',
        label: 'menu',
        closedSymbol: '',
        openedSymbol: ''
    });

    //add class second level li if have it's child menu item
    jQuery( ".main-menu ul li ul li ul" ).parent('li').addClass('list-active');
    jQuery( ".main-menu ul li ul" ).parent('li').addClass('caret');

    // scroll top/bottom
    jQuery('.back-to-top').click(function(){
        var Lochref = jQuery(this).children().attr('href');
        jQuery("html, body").stop().animate({
          scrollTop: jQuery(Lochref).offset().top
        }, 500 );
        return false;
    });

    // enc-banner-slider
    jQuery('.enc-banner-slider.owl-carousel').owlCarousel({
        loop:true,
        items:1,
        dots:true,
        autoplay: true,
        autoplaySpeed: 700,
        mouseDrag: true,
        nav:false
    });
    
    backToTop();
});

// function will fire on window scroll
jQuery(window).scroll(function(){
    backToTop();
});

// back to top function
function backToTop() {
    var winH = jQuery(document).height();
    var scroll = jQuery(window).scrollTop();
    if( scroll >=  350 ) {
        jQuery('.back-to-top').fadeIn(100);
    } else {
       jQuery('.back-to-top').fadeOut(100);
    }
}