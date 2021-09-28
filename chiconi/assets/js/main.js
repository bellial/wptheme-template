(function($){
    /* If this line runs, it means Javascript is enabled in the browser
     * so replace no-js class with js for the body tag
     */
    document.body.className = document.body.className.replace("no-js","js");
 
     
   /* -----------------------------------------------------------------*/
   /* Activate accessible superfish
   /* -----------------------------------------------------------------*/
   $('.primary-navigation').find('.menu').superfish({
       smoothHeight : true,
       delay : 600,
       animation : {
          opacity :'show',
          height  :'show'
       },
       speed : 'fast', 
       autoArrows : false 
   });
   /* -----------------------------------------------------------------*/
   /* Bootstrap Carousel
   /* -----------------------------------------------------------------*/
   $('.carousel').carousel({
    interval: 2000
  })
// // Banner Home - carrossel da scher
//   // ----------------------------------------------------------------------------
//   if ($('#carousel-home').length > 0) {
//     $('#carousel-home').owlCarousel({
//       loop: true,
//       margin: 0,
//       nav: false,
//       dots: true,
//       items: 1,
//       smartSpeed: 400,
//       autoplay: true,
//       autoplayTimeout: 5000
//     });
//   }
  // Open nav menu slide
  // ----------------------------------------------------------------------------
  $('.menu-mobile').click(function () {
    $('.site-header').toggleClass('open');
  });


  $('.cart-count, .mfp-close').click(function () {
    $('.side-cart').toggleClass('open-cart');
  });

  $('#ico-search-busca').on('click', function(){
    $('.woocommerce-product-search').addClass('active-search'); //class no form
  });
     
 })(jQuery);