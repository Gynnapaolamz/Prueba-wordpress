<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION






// Enqueue Swiper.js Library
function dp_carousel(){
   wp_enqueue_script( 'your-swiper-js-slug', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', [] , '7.0.2', true );
   wp_enqueue_style( 'your-swiper-css-slug', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', [] , '7.0.2');
}
add_action('init', 'dp_carousel', 99);

function dp_carousel_slider_scripts() {
?>
  <script type="text/javascript">
  // adding navigation html
  (function(){
    window.addEventListener('DOMContentLoaded', function(){
        let sliders = document.querySelectorAll('.dp-carousel')
        sliders.forEach(function( slider ) {
            swiper_init(slider)
        })
    });
      
    function swiper_init(slider){
         // configuration
         if(slider === null) return;
         // extra controls
         let extraControls = '';
         // If we need pagination 
         extraControls += '<div class="swiper-pagination"></div>';
         // If we need navigation buttons 
        extraControls += '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>';
        slider.innerHTML = '<div class="swiper-container" style="overflow:hidden">' + slider.innerHTML + '</div>' + extraControls;

         // Wait for Swiper
        var waitForSwiper = setInterval( function () {
            if (typeof Swiper != "undefined") { 
                clearInterval(waitForSwiper);
                let carousel_container = slider.querySelector('.swiper-container');
                const swiper = new Swiper( carousel_container , {
                    slidesPerView: 1, // mobile value
                    loop: true,
                    spaceBetween: 0, // mobile value
                    autoplay: {
                    delay: 3000,
                    },
                    speed: 600,
                    // If we need pagination
                    pagination: {
                    el: '.swiper-pagination',
                    clickable : true,
                    dynamicBullets: true
                    },
                    // Navigation arrows
                    navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                    768: { // Tablet
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    981: { // Desktop
                        slidesPerView: 3,
                        spaceBetween: 30,
                    }
                    }
                });
            }
        }, 20);
   }
})();
</script>
<?php }
add_action( 'wp_footer', 'dp_carousel_slider_scripts'); 
