//Forslider js
  $(document).ready(function(){
    $('.slider').bxSlider({
        auto:true
    });
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:true
            },
            500:{
                items:2,
                nav:true
            },
            800:{
                items:3,
                nav:true
            },
            1000:{
                items:4,
                nav:true
            }
        }
    })
 
  });


  