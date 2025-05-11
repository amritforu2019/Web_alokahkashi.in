 <!-- =======================
                     gsap cdn
         ======================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/split-type@0.3.4/umd/index.min.js"></script>



    <!-- =======================
         hero slider swiper js
         ======================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <!--   *****   JQuery Link   *****   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  
  <!-- =======================
                             aos js
                  ======================== -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- =======================
            lightbox js
======================== -->


    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <!-- Lightbox2 JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
 
  <!--   *****   Owl Carousel js Link  *****  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script src="assets/web/script/script.js"></script>
     
    <script>
        (function (w, d, s, u) {
            w.gbwawc = {
                url: u,
                options: {
                    waId: "+91 9151454301",
                    siteName: "Alokah Kashi",
                    siteTag: "Online ",
                    siteLogo: "https://www.alokahkashi.in/web/assets/images/fev.png",
                    widgetPosition: "LEFT",
                    triggerMessage: "",
                    welcomeMessage: "Welcome To Alokahkashi Hotel, Varanasi’s Pinnacle Of Elegance",
                    brandColor: "#25D366",
                    messageText: "Hi sir, I want to book a",
                    replyOptions: ['Signature Room', 'Classic Room', 'Luxe Dormitory', 'SeeRa Restaurant'],
                },
            };
            var h = d.getElementsByTagName(s)[0],
                j = d.createElement(s);
            j.async = true;
            j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
            h.parentNode.insertBefore(j, h);
        })(window, document, "script", "https://waw.gallabox.com");
    </script>
    <script>
        AOS.init();
    </script>
   <script>
        lightbox.option({
            'resizeDuration': 100,  // Image opening speed
            'wrapAround': true,     // Allows circular navigation between images
            'alwaysShowNavOnTouchDevices': true // Ensures navigation is visible on touch devices
        })
    </script>
   
<script>
        // Ensure jQuery is loaded and the DOM is fully ready
        $(document).ready(function () {
            $('.owl-carousel-room').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                }
            });
        });
    </script>

 <script async src="https://www.googletagmanager.com/gtag/js?id=G-8CDVG1VSB5"></script>
 <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
   dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-8CDVG1VSB5');
 </script>
