(function($){
  /* If this line runs, it means Javascript is enabled in the browser
   * so replace no-js class with js for the body tag
   */
  document.body.className = document.body.className.replace("no-js","js");

   
 $('.cart-count, .mfp-close').click(function () {
  $('.side-cart').toggleClass('open-cart');
});

$('#ico-search-busca').on('click', function(){
  $('.woocommerce-product-search').addClass('active-search'); //add class on form
});


//  Slick sliders
// ----------------------------------------------------------------------------

class SlickCarousel {
  constructor() {
    this.initiateCarousel();
  }

  initiateCarousel() {
    $( '.posts-carousel' ).slick( {
      infinite: true,
      autoplay: true,
      dots: false,
      arrows: true,
      initialSlide: 0,
      autoplaySpeed: 1000,
      slidesToShow: 4,
      slidesToScroll: 1,
      centerMode: false,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        
      ]
    } );
    if (window.matchMedia("(max-width: 991px)").matches) {
      /* the viewport is less than 991 pixels wide */
      $( '.related ul.products' ).slick( {
         infinite: true,
        autoplay: true,
        dots: false,
        arrows: true,
         initialSlide: 1,
         autoplaySpeed: 1000,
         slidesToShow: 1,
         slidesToScroll: 1,
         centerMode: true,
         variableWidth: true,
        
       } );
		 $( '.loja-carousel' ).slick( {
         infinite: true,
        autoplay: true,
        dots: false,
        arrows: true,
         initialSlide: 1,
         autoplaySpeed: 1000,
         slidesToShow: 1,
         slidesToScroll: 1,
         centerMode: true,
         variableWidth: true,
        
       } );
    } 
    
  }
}

new SlickCarousel();


})(jQuery);


