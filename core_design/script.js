// loader js
document.addEventListener("DOMContentLoaded", () => {
  const loaderWrapper = document.getElementById("loader-wrapper");
  const content = document.getElementById("content");

  // Wait for 2 seconds, then animate loader to move up and hide it
  setTimeout(() => {
    loaderWrapper.style.animation = "fadeOutAndMoveUp 2s ease-in-out forwards";

    // Wait for animation to complete before showing content
    setTimeout(() => {
      loaderWrapper.style.display = "none"; // Hide the loader after it moves up
      content.style.display = "block"; // Show the website content
      document.body.style.overflow = "auto"; // Enable scrolling
    }, 2000); // Wait for the move-up animation to finish
  }, 1000); // Wait for 2 seconds before starting the loader's move-up animation
});
// ====end screen loader js========
// ======Custom smooth scroll function==========
document.addEventListener("DOMContentLoaded", () => {
  const loaderWrapper = document.getElementById("loader-wrapper");
  const content = document.getElementById("content");
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");

  // Wait for 2 seconds, then animate loader to move up and hide it
  setTimeout(() => {
    loaderWrapper.style.animation = "fadeOutAndMoveUp 2s ease-in-out forwards";

    // Wait for animation to complete before showing content
    setTimeout(() => {
      loaderWrapper.style.display = "none"; // Hide the loader after it moves up
      content.style.display = "block"; // Show the website content
      document.body.style.overflow = "auto"; // Enable scrolling
    }, 2000); // Wait for the move-up animation to finish
  }, 2000); // Wait for 2 seconds before starting the loader's move-up animation

  // Show the button as soon as the user starts scrolling
  window.onscroll = function () {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
      scrollToTopBtn.classList.add("show");
    } else {
      scrollToTopBtn.classList.remove("show");
    }
  };

  // Custom smooth scroll function
  scrollToTopBtn.onclick = function () {
    const scrollDuration = 1000; // Duration in milliseconds (2000ms = 2 seconds)
    const start = window.pageYOffset; // Get the current scroll position
    const startTime = performance.now(); // Get the current time

    function scrollStep(currentTime) {
      const elapsed = currentTime - startTime; // Calculate elapsed time
      const progress = Math.min(elapsed / scrollDuration, 1); // Normalize progress to 0-1

      // Easing function for smooth scrolling
      const easing = easeInOutCubic(progress); // Use a different easing function

      // Scroll to the current position
      window.scrollTo(0, start * (1 - easing)); // Calculate the new scroll position

      if (progress < 1) {
        requestAnimationFrame(scrollStep); // Continue animation
      }
    }

    requestAnimationFrame(scrollStep);
  };

  // Easing function for a smoother scroll
  function easeInOutCubic(t) {
    return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2; // Easing function for smooth scroll
  }
});

// ==========navbar============
function navbar() {
  // Function to open the menu
  function openMenu(e) {
    e.preventDefault();
    document.getElementById("overlay-menu").classList.add("open-menu");
  }

  // Function to close the menu
  function closeMenu(e) {
    e.preventDefault();
    console.log("close-menu"); // Debugging line
    document.getElementById("overlay-menu").classList.remove("open-menu");
  }

  // Event listeners
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("menu-toggle").addEventListener("click", openMenu);
    document.getElementById("close-menu").addEventListener("click", closeMenu);
  });
}

navbar();

function navbarScrollHide() {
  const nav1Center = document.querySelector(".nav1-center");
  const navLinks = document.querySelector(".nav2");
  const nav = document.querySelector("nav");
  const nav1 = document.querySelector(".nav1");
  const nav2 = document.querySelector(".nav2");
  const menuButton = document.querySelector(".nav1-left");
  const bookButton = document.querySelector(".nav1-right");
  const topNav = document.querySelector(".top-nav");

  let lastScrollTop = 0;
  const threshold = 100;

  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop === 0) {
      // At the top, reset everything
      nav1Center.classList.remove("hide");
      nav1Center.classList.add("show");
      navLinks.classList.remove("hide");
      navLinks.classList.add("show");
      nav.classList.remove("hidden");
      nav1.classList.remove("hide-border");
      nav2.classList.remove("hide-border");
      topNav.classList.remove("hide");

      // Remove the fixed position from buttons
      menuButton.classList.remove("move-to-top");
      bookButton.classList.remove("move-to-top");
    } else if (scrollTop > lastScrollTop) {
      // Scrolling down
      nav1Center.classList.remove("show");
      nav1Center.classList.add("hide");
      navLinks.classList.remove("show");
      navLinks.classList.add("hide");
      nav.classList.add("hidden");
      nav1.classList.add("hide-border");
      nav2.classList.add("hide-border");
      topNav.classList.add("hide");

      // Move buttons to the top-nav position
      menuButton.classList.add("move-to-top");
      bookButton.classList.add("move-to-top");
    } else {
      // Scrolling up
      if (scrollTop < lastScrollTop && scrollTop < threshold) {
        // Near the top, revert elements
        nav1Center.classList.remove("hide");
        nav1Center.classList.add("show");
        navLinks.classList.remove("hide");
        navLinks.classList.add("show");
        nav.classList.remove("hidden");
        nav1.classList.remove("hide-border");
        nav2.classList.remove("hide-border");
        topNav.classList.remove("hide");

        // Remove the fixed position from buttons
        menuButton.classList.remove("move-to-top");
        bookButton.classList.remove("move-to-top");
      }
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Handle scroll position correctly
  });
}
navbarScrollHide();

// =================================
//        Room navbar js
// =====================================
function commonroomnavbar() {
  // Function to open the menu
  function openMenu(e) {
    e.preventDefault();
    document
      .getElementById("room-overlay-menu")
      .classList.add("room-open-menu");
  }

  // Function to close the menu
  function closeMenu(e) {
    e.preventDefault();
    console.log("room-close-menu"); // Debugging line
    document
      .getElementById("room-overlay-menu")
      .classList.remove("room-open-menu");
  }

  // Event listeners
  document.addEventListener("DOMContentLoaded", function () {
    document
      .getElementById("room-menu-toggle")
      .addEventListener("click", openMenu);
    document
      .getElementById("room-close-menu")
      .addEventListener("click", closeMenu);
  });
}

commonroomnavbar();

function RoomnavbarScrollHide() {
  const nav1Center = document.querySelector(".room-nav1-center");
  const navLinks = document.querySelector(".room-nav2");
  const nav = document.querySelector(".room-nav-new"); // .room-nav-new element
  const nav1 = document.querySelector(".room-nav1"); // .room-nav1 element for border-bottom
  const nav2 = document.querySelector(".room-nav2");
  const menuButton = document.querySelector(".room-nav1-left");
  const bookButton = document.querySelector(".room-nav1-right");
  const topNav = document.querySelector(".room-top-nav");

  let lastScrollTop = 0;
  const threshold = 100;

  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop === 0) {
      // Top of the page, reset everything
      nav1Center.classList.remove("room-hide");
      nav1Center.classList.add("room-show");
      navLinks.classList.remove("room-hide");
      navLinks.classList.add("room-show");
      nav.classList.remove("room-hidden");
      nav1.classList.remove("room-hide-border");
      nav2.classList.remove("room-hide-border");
      topNav.classList.remove("room-hide");

      // Reset background color and border-bottom
      nav.style.backgroundColor = ""; // Reset .room-nav-new background
      nav1.style.borderBottom = ""; // Reset .room-nav1 border-bottom

      // Move buttons back to default position
      menuButton.classList.remove("room-move-to-top");
      bookButton.classList.remove("room-move-to-top");
    } else if (scrollTop > lastScrollTop) {
      // Scrolling down
      nav1Center.classList.remove("room-show");
      nav1Center.classList.add("room-hide");
      navLinks.classList.remove("room-show");
      navLinks.classList.add("room-hide");
      nav.classList.add("room-hidden");
      nav1.classList.add("room-hide-border");
      nav2.classList.add("room-hide-border");
      topNav.classList.add("room-hide");

      // Hide background color and border-bottom
      nav.style.backgroundColor = "transparent"; // Hide background of .room-nav-new
      nav1.style.borderBottom = "none"; // Hide border-bottom of .room-nav1

      // Move buttons to the top
      menuButton.classList.add("room-move-to-top");
      bookButton.classList.add("room-move-to-top");
    } else {
      // Scrolling up
      if (scrollTop < lastScrollTop && scrollTop < threshold) {
        // Near the top, show elements again
        nav1Center.classList.remove("room-hide");
        nav1Center.classList.add("room-show");
        navLinks.classList.remove("room-hide");
        navLinks.classList.add("room-show");
        nav.classList.remove("room-hidden");
        nav1.classList.remove("room-hide-border");
        nav2.classList.remove("room-hide-border");
        topNav.classList.remove("room-hide");

        // Restore background color and border-bottom
        nav.style.backgroundColor = ""; // Restore .room-nav-new background
        nav1.style.borderBottom = ""; // Restore .room-nav1 border-bottom

        // Move buttons back to default position
        menuButton.classList.remove("room-move-to-top");
        bookButton.classList.remove("room-move-to-top");
      }
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Handle scroll position
  });
}

RoomnavbarScrollHide();

// =====================

// =====================
// ==========Index Page gsap==========
if (document.body.classList.contains("index-page")) {
  window.addEventListener("load", function () {
    ScrollTrigger.refresh(); // Ensure ScrollTrigger initializes correctly after the page has loaded.
  });

  function slider() {
    // HERO SLIDER
    var menu = [];
    jQuery(".swiper-slide").each(function (index) {
      menu.push(jQuery(this).find(".slide-inner").attr("data-text"));
    });
    var interleaveOffset = 0.5;
    var swiperOptions = {
      loop: true,
      speed: 1000,
      parallax: true,
      autoplay: {
        delay: 6500,
        disableOnInteraction: false,
      },
      watchSlidesProgress: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      on: {
        progress: function () {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress;
            var innerOffset = swiper.width * interleaveOffset;
            var innerTranslate = slideProgress * innerOffset;
            swiper.slides[i].querySelector(".slide-inner").style.transform =
              "translate3d(" + innerTranslate + "px, 0, 0)";
          }
        },

        touchStart: function () {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = "";
          }
        },

        setTransition: function (speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".slide-inner").style.transition =
              speed + "ms";
          }
        },
      },
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);

    // DATA BACKGROUND IMAGE
    var sliderBgSetting = $(".slide-bg-image");
    sliderBgSetting.each(function (indx) {
      if ($(this).attr("data-background")) {
        $(this).css(
          "background-image",
          "url(" + $(this).data("background") + ")"
        );
      }
    });
  }
  slider();
  function welcomeImagePinAnimation() {
    gsap.registerPlugin(ScrollTrigger);

    const mediaQuery = window.matchMedia("(max-width: 575.98px)");

    function handleMediaChange(e) {
      if (e.matches) {
        // Mobile view
        ScrollTrigger.getAll().forEach((trigger) => {
          if (trigger.vars.trigger?.classList.contains("img-welcome-ani")) {
            trigger.kill();
          }
        });

        gsap.fromTo(
          ".img-welcome-ani-1",
          { x: "-100%", opacity: 0 },
          {
            x: "0%",
            opacity: 1,
            duration: 1.8,
            ease: "power2.out",
            scrollTrigger: {
              trigger: ".img-welcome-ani-1",
              start: "top 90%",
              end: "top 40%",
              scrub: 1,
            },
          }
        );

        gsap.fromTo(
          ".img-welcome-ani-2",
          { x: "100%", opacity: 0 },
          {
            x: "0%",
            opacity: 1,
            duration: 1.8,
            ease: "power2.out",
            scrollTrigger: {
              trigger: ".img-welcome-ani-2",
              start: "top 90%",
              end: "top 40%",
              scrub: 1,
            },
          }
        );
      } else {
        // Desktop view
        ScrollTrigger.getAll().forEach((trigger) => {
          if (trigger.vars.trigger?.classList.contains("img-welcome-ani")) {
            trigger.kill();
          }
        });

        gsap.to(".img-welcome-ani", {
          clipPath: "circle(100% at 50% 50%)",
          ease: "none",
          scrollTrigger: {
            trigger: ".welcome-main-image",
            start: "top top",
            end: "bottom top",
            scrub: true,
            pin: true,
            anticipatePin: 1,
          },
        });
      }
    }

    handleMediaChange(mediaQuery);
    mediaQuery.addEventListener("change", handleMediaChange);
  }

  welcomeImagePinAnimation();

  function sliderLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl4 = gsap.timeline({
      scrollTrigger: {
        trigger: ".hero-slider",
        start: "top 90%",
        end: "bottom top",
        scrub: 1,
      },
    });

    tl4.to(".hero-slider .line-to-line", {
      height: "15%",
    });
  }

  sliderLine();

  function welcometext() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".welcome-text-main",
        start: "top 100%",
        end: "bottom top",
        scrub: 1,
        stagger: 2,
      },
    });

    // Timeline animation for the text
    tl5.from(
      ".line span",
      1.8,
      {
        y: 100,
        ease: "power4.out",
      },
      "anim5"
    );
    tl5.from(
      ".welcom-text h3",
      1.8,
      {
        y: -90,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  welcometext();

  // ========== Welcome Image ==========

  // ============swiper our offering slider ===================

  // =================our offering heading======================
  function ourOfferingHeading() {
    gsap.registerPlugin(ScrollTrigger);

    const tl31 = gsap.timeline({
      scrollTrigger: {
        trigger: ".offering-heading-main",
        start: "top 75%", // Adjusted start position
        end: "top 30%", // Adjusted end position
        scrub: 1,
      },
    });

    // Timeline animation for the text
    tl31.from(".line-offering span", 1.8, {
      y: 100,
      ease: "power4.out",
    });
  }
  ourOfferingHeading();

  function ourOfferingLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".offering ",
        start: "top 60%",
        end: "bottom top",
        scrub: 1,
      },
    });

    // Timeline animation for the line
    tl5.to(
      ".offering-line",
      {
        height: "50px",
        duration: 1,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  ourOfferingLine();
  function commonofferingslider() {
    const sliders = document.querySelectorAll(".custom-slider");

    sliders.forEach((slider) => {
      const wrapper = slider.querySelector(".slider-wrapper");
      const slides = wrapper.querySelectorAll(".slider-slide");
      const dotsContainer = slider.querySelector(".slider-dots");
      let index = 0;

      // Custom settings
      const slideInterval = 4000; // Customize auto-slide interval (5000ms = 5 seconds)
      const transitionSpeed = "1s"; // Customize the transition speed (1 second in this case)

      // Apply the custom transition speed to the slider
      wrapper.style.transition = `transform ${transitionSpeed} ease`;

      // Create dots
      slides.forEach((_, i) => {
        const dot = document.createElement("button");
        dot.addEventListener("click", () => {
          index = i;
          updateSliderPosition();
          updateActiveDot();
          resetAutoSlide();
        });
        dotsContainer.appendChild(dot);
      });

      const dots = dotsContainer.querySelectorAll("button");

      const updateSliderPosition = () => {
        wrapper.style.transform = `translateX(-${index * 100}%)`;
      };

      const updateActiveDot = () => {
        dots.forEach((dot) => dot.classList.remove("active"));
        dots[index].classList.add("active");
      };

      // Auto-slide function
      const autoSlide = () => {
        index = (index + 1) % slides.length;
        updateSliderPosition();
        updateActiveDot();
      };

      // Start the auto-slider
      let autoSlideInterval = setInterval(autoSlide, slideInterval);

      // Reset the auto-slide interval when manually sliding
      const resetAutoSlide = () => {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(autoSlide, slideInterval);
      };

      // Initialize the first active dot
      updateActiveDot();
    });
  }
  commonofferingslider();

  // Register the ScrollTrigger plugin
  gsap.registerPlugin(ScrollTrigger);

  // Function to animate the Room section
  function roomSectionAnimation() {
    const roomSections = document.querySelectorAll(".room-box");

    roomSections.forEach((roomSection) => {
      const tl6 = gsap.timeline({
        scrollTrigger: {
          trigger: roomSection,
          start: "top 80%", // Adjust as needed
          end: "bottom bottom",
          scrub: 1,
        },
      });

      const roomLeft = roomSection.querySelector(".room-left");
      const roomElements = roomLeft.querySelectorAll("*");

      tl6.from(roomElements, {
        xPercent: 90,
        scale: 1.2,
        duration: 1,
        ease: "power1.inOut",
        opacity: 0,
        stagger: 0.3,
      });

      tl6.to("body", { backgroundColor: "#fdebd0", duration: 1 }, "-=1");
    });
  }

  // Function to animate the Restaurant section
  function restaurantSectionAnimation() {
    const restaurantSections = document.querySelectorAll(".restaurent-box");

    restaurantSections.forEach((restaurantSection) => {
      const tl7 = gsap.timeline({
        scrollTrigger: {
          trigger: restaurantSection,
          start: "top 45%", // Adjust as needed
          end: "top 20%",
          scrub: 1,
        },
      });

      const restaurantLeft =
        restaurantSection.querySelector(".restaurent-left");
      const restaurantElements = restaurantLeft.querySelectorAll("*");

      tl7.from(restaurantElements, {
        xPercent: -100,
        scale: 1.2,
        duration: 1,
        ease: "power1.inOut",
        opacity: 0,
        stagger: 0.3,
      });

      tl7.to("body", { backgroundColor: "#f6ddcc", duration: 1 }, "-=1");
    });
  }

  // Function to animate the Banquet section
  function banquetSectionAnimation() {
    const banquetSections = document.querySelectorAll(".Banquet-box");

    banquetSections.forEach((banquetSection) => {
      const tl8 = gsap.timeline({
        scrollTrigger: {
          trigger: banquetSection,
          start: "top 85%", // Adjust as needed
          end: "bottom bottom",
          scrub: 1,
        },
      });

      const banquetLeft = banquetSection.querySelector(".Banquet-left");
      const banquetElements = banquetLeft.querySelectorAll("*");

      tl8.from(banquetElements, {
        xPercent: 90,
        scale: 1.2,
        duration: 1,
        ease: "power1.inOut",
        opacity: 0,
        stagger: 0.3,
      });

      tl8.to("body", { backgroundColor: "#fdebd0", duration: 1 }, "-=1");
    });
  }

  // Call all section animations
  roomSectionAnimation();
  restaurantSectionAnimation();
  banquetSectionAnimation();

  //  =============================
  // our offering responsive code
  // ===============================

  //  =============================
  // End our offering responsive code
  // ===============================

  // =================our testimonail slider======================

  function testimonial() {
    $(document).ready(function () {
      $(".testimonials-container").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        margin: 10,
        nav: false,
        dots: false,
        // navText: [
        //   "<i class='fa-solid fa-arrow-left'></i>",
        //   "<i class='fa-solid fa-arrow-right'></i>",
        // ],
        responsive: {
          0: {
            items: 1,
            nav: false,
          },
          600: {
            items: 1,
            nav: true,
          },
          768: {
            items: 1,
          },
        },
      });
    });
  }
  testimonial();
  function testimonialHeading() {
    gsap.registerPlugin(ScrollTrigger);

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".testimonial-text h1",
        start: "top 80%",
        end: "bottom top",
        scrub: 1,
      },
    });

    // Timeline animation for the text
    tl.from(".line-testimonial span", 1.8, {
      y: 100,
      ease: "power4.out",
      stagger: {
        amount: 0.3,
      },
    });
  }
  testimonialHeading();

  // ============google map heading===========
  function googleLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".google-main ",
        start: "top 60%",
        end: "bottom top",
        scrub: 1,
      },
    });

    // Timeline animation for the text
    tl5.to(
      ".google-line",
      {
        height: "50px",
        duration: 1,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  googleLine();

  function googleHeading() {
    gsap.registerPlugin(ScrollTrigger);

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".google-text h1", // Element that triggers the animation
        start: "top 80%", // When the top of the element hits 80% of the viewport
        end: "bottom top", // When the bottom of the element hits the top of the viewport
        scrub: 1, // Smooth scrubbing effect
      },
    });

    // Timeline animation for the text
    tl.from(".line-google span", {
      y: 100,
      ease: "power4.out",
      duration: 1.8, // Duration of the animation
      stagger: {
        amount: 0.3, // Stagger the appearance of each span
      },
    });

    // Smooth background color transition
    tl.to(
      "body",
      {
        backgroundColor: "#fff", // The color you want to change to
        duration: 2, // Duration of the color transition
        ease: "power1.inOut", // Smooth easing
      },
      "-=1.5" // Start this transition 1.5 seconds before the previous animation ends
    );
  }

  // Call the function to initialize the animation
  googleHeading();

  function googleMain() {
    gsap.registerPlugin(ScrollTrigger);
    let revealContainers = document.querySelectorAll(".google-main");

    revealContainers.forEach((container) => {
      let images = container.querySelectorAll(".google-main *"); // Targeting all child elements

      let t35 = gsap.timeline({
        scrollTrigger: {
          trigger: container,
          stagger: 2,
          start: "top 80%",
          end: "bottom bottom",
          scrub: 2,
          toggleActions: "play none none reverse",
        },
      });

      t35.set(container, { autoAlpha: 1 });

      // Smooth background color transition for body
      // t35.to(
      //   "body",
      //   {
      //     backgroundColor: "#fff",
      //     duration: 2,
      //     ease: "power1.inOut",
      //   },
      //   "-=1.5"
      // );
    });
  }

  // Ensure the DOM is fully loaded before running the animation
  document.addEventListener("DOMContentLoaded", googleMain);

  // ===========================
  function testimonailLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".testimonial ",
        start: "top 60%",
        end: "bottom top",
        scrub: 1,
      },
    });

    tl5.to(
      ".testimonial-line",
      {
        height: "50px",
        duration: 1,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  testimonailLine();

  // ==============bookingBenefitsHeading==================
  function bookingBenefitsHeading() {
    gsap.registerPlugin(ScrollTrigger);

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".booking-text h1",
        start: "top 80%",
        end: "bottom top",
        scrub: 1,
      },
    });

    // Timeline animation for the text
    tl.from(".line-booking span", 1.8, {
      y: 100,
      ease: "power4.out",
      stagger: {
        amount: 0.3,
      },
    });
  }
  bookingBenefitsHeading();
  // ============bookingBenefitsLine===============
  function bookingBenefitsLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".booking-benefits ",
        start: "top 60%",
        end: "bottom top",
        scrub: 1,
      },
    });

    tl5.to(
      ".booking-line",
      {
        height: "50px",
        duration: 1,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  bookingBenefitsLine();
  // =================map gsap======================

  // Ensure ScrollTrigger is registered

  function facilitiesHeading() {
    gsap.registerPlugin(ScrollTrigger);

    const facilitiesHeading = gsap.timeline({
      scrollTrigger: {
        trigger: ".Facilities-heading-main h1",
        start: "top 80%",
        end: "bottom top",
        scrub: 1,
      },
    });

    // Timeline animation for the text
    facilitiesHeading.from(".line-Facilities span", 1.8, {
      y: 100,
      ease: "power4.out",
      stagger: {
        amount: 0.3,
      },
    });
    // Change background color
    facilitiesHeading.to("body", { backgroundColor: "#FFF" }, "-=1");
  }

  facilitiesHeading();
  function FacilitiesLine() {
    gsap.registerPlugin(ScrollTrigger);

    const tl5 = gsap.timeline({
      scrollTrigger: {
        trigger: ".Facilities ",
        start: "top 60%",
        end: "bottom top",
        scrub: 1,
      },
    });

    tl5.to(
      ".Facilities-line",
      {
        height: "50px",
        duration: 1,
        ease: "power4.out",
      },
      "anim5"
    );
  }
  FacilitiesLine();

  // function facilitiesData() {
  //   gsap.registerPlugin(ScrollTrigger);

  //   // GSAP animation for stagger effect on scroll
  //   gsap.from(".facilities-box", {
  //     // opacity: 0,
  //     y: 50,
  //     duration: 1,
  //     stagger: 0.3, // Stagger for each facilities-box
  //     scrollTrigger: {
  //       trigger: ".facilities-container", // The container of the boxes
  //       start: "top 80%", // Start when the top of the container is at 80% of the viewport height
  //       end: "bottom 20%", // End when the bottom of the container is at 20% of the viewport height
  //       scrub: 2, // Smooth scrubbing
  //     },
  //   });
  // }
  // facilitiesData();

  function LocationData1() {
    gsap.registerPlugin(ScrollTrigger);

    // GSAP animation for stagger effect on scroll
    gsap.from(".map-location-data", {
      y: 50,

      duration: 1,
      stagger: 0.3, // Stagger for each map-location-data
      scrollTrigger: {
        trigger: ".location-data", // The container of the data
        start: "top 90%", // Start when the top of the container is at 80% of the viewport height
        end: "bottom 50%", // End when the bottom of the container is at 30% of the viewport height
        scrub: 1, // Smooth scrubbing
      },
    });
  }
  LocationData1();

  // =============================
  //      gsap responsive code
  //   =============================
  const mm = gsap.matchMedia();
  mm.add("(max-width: 575.98px)", () => {
    const tl4 = gsap.timeline({
      scrollTrigger: {
        trigger: ".hero-slider",
        start: "top 90%",
        end: "bottom top",
        scrub: 1,
        // markers: true,
      },
    });

    // Timeline animation for the text
    tl4.to(
      ".hero-slider .line-to-line",
      {
        height: "10%",
        // duration: 1,
        // ease: "power4.out",
      },
      "anim3"
    );
    // ======our offering seciton responsive code======
  });
  // =============================
  //     End gsap responsive code
  //   =============================
}

// =================================
//      common Room Slider js
// =====================================

function allCommonSlider() {
  const sliders = document.querySelectorAll(".all-common-slider");

  sliders.forEach((slider, sliderIndex) => {
    const wrapper = slider.querySelector(".slider-wrapper");
    const slides = wrapper.querySelectorAll(".slider-slide img");
    const dotsContainer = slider.querySelector(".slider-dots");
    let index = 0;

    // Get custom interval from data attribute or fallback to default
    const slideInterval = slider.getAttribute("data-interval") || 4000;
    const transitionSpeed = "1s";

    wrapper.style.transition = `transform ${transitionSpeed} ease`;

    // Create dots
    slides.forEach((_, i) => {
      const dot = document.createElement("button");
      dot.addEventListener("click", () => {
        index = i;
        updateSliderPosition();
        updateActiveDot();
        resetAutoSlide();
      });
      dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll("button");

    const updateSliderPosition = () => {
      wrapper.style.transform = `translateX(-${index * 100}%)`;
    };

    const updateActiveDot = () => {
      dots.forEach((dot) => dot.classList.remove("active"));
      dots[index].classList.add("active");
    };

    const autoSlide = () => {
      index = (index + 1) % slides.length;
      updateSliderPosition();
      updateActiveDot();
    };

    let autoSlideInterval = setInterval(autoSlide, slideInterval);

    const resetAutoSlide = () => {
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(autoSlide, slideInterval);
    };

    updateActiveDot();

    // Lightbox Modal functionality
    const lightboxModal = document.createElement("div");
    lightboxModal.classList.add("lightbox-modal");
    lightboxModal.innerHTML = `
      <div class="lightbox-slider-wrapper">
        <img id="lightbox-img-${sliderIndex}" class="lightbox-content" src="" alt="Image" />
      </div>
      <button class="close-btn">&times;</button>
    `;
    document.body.appendChild(lightboxModal);

    const lightboxImg = document.getElementById(`lightbox-img-${sliderIndex}`);
    const closeBtn = lightboxModal.querySelector(".close-btn");

    // Add event listeners for slides
    slides.forEach((slide, i) => {
      slide.addEventListener("click", () => {
        index = i; // Set the index to the clicked image
        lightboxImg.src = slide.src; // Set the lightbox image source to the clicked image
        lightboxModal.style.display = "flex"; // Show the lightbox modal

        // Disable sliding for all other images except the clicked one
        disableSliderForOthers(slide.src);
      });
    });

    closeBtn.addEventListener("click", () => {
      lightboxModal.style.display = "none"; // Hide the lightbox modal
    });

    lightboxModal.addEventListener("click", (e) => {
      if (e.target === lightboxModal || e.target === closeBtn) {
        lightboxModal.style.display = "none"; // Close the modal if clicking outside the image or on close button
      }
    });

    // Function to disable slider for other images except the clicked one
    const disableSliderForOthers = (clickedImageSrc) => {
      slides.forEach((slide) => {
        if (slide.src !== clickedImageSrc) {
          slide.style.display = "none"; // Hide all other images
        } else {
          slide.style.display = "block"; // Show only the clicked image
        }
      });
    };
  });
}

allCommonSlider();

if (document.body.classList.contains("restaurant-page")) {
  function slider() {
    // HERO SLIDER
    var menu = [];
    jQuery(".swiper-slide").each(function (index) {
      menu.push(jQuery(this).find(".slide-inner").attr("data-text"));
    });
    var interleaveOffset = 0.5;
    var swiperOptions = {
      loop: true,
      speed: 1000,
      parallax: true,
      autoplay: {
        delay: 6500,
        disableOnInteraction: false,
      },
      watchSlidesProgress: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      on: {
        progress: function () {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress;
            var innerOffset = swiper.width * interleaveOffset;
            var innerTranslate = slideProgress * innerOffset;
            swiper.slides[i].querySelector(".slide-inner").style.transform =
              "translate3d(" + innerTranslate + "px, 0, 0)";
          }
        },

        touchStart: function () {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = "";
          }
        },

        setTransition: function (speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".slide-inner").style.transition =
              speed + "ms";
          }
        },
      },
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);

    // DATA BACKGROUND IMAGE
    var sliderBgSetting = $(".slide-bg-image");
    sliderBgSetting.each(function (indx) {
      if ($(this).attr("data-background")) {
        $(this).css(
          "background-image",
          "url(" + $(this).data("background") + ")"
        );
      }
    });
  }
  slider();
  // ====
  function testimonial() {
    $(document).ready(function () {
      $(".testimonials-container").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 10,
        nav: false,
        dots: false,
        // navText: [
        //   "<i class='fa-solid fa-arrow-left'></i>",
        //   "<i class='fa-solid fa-arrow-right'></i>",
        // ],
        responsive: {
          0: {
            items: 1,
            nav: false,
          },
          600: {
            items: 1,
            nav: true,
          },
          768: {
            items: 1,
          },
        },
      });
    });
  }
  testimonial();
}

// Get the button
// Get the button
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Show or hide the button based on scroll position
window.onscroll = function () {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
};

// =========================
// about faq js
// =========================

let question = document.querySelectorAll(".question");

question.forEach((question) => {
  question.addEventListener("click", (event) => {
    const active = document.querySelector(".question.active");
    if (active && active !== question) {
      active.classList.toggle("active");
      active.nextElementSibling.style.maxHeight = 0;
    }
    question.classList.toggle("active");
    const answer = question.nextElementSibling;
    if (question.classList.contains("active")) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = 0;
    }
  });
});
