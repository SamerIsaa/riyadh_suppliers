(function ($) {
  "use-strict";

  /*------------------------------------
		loader page
	--------------------------------------*/
  $(window).on("load", function () {
    $(".loader-page").fadeOut(500);
    wow = new WOW({
      animateClass: "animated",
      offset: 50,
    });
    wow.init();
  });

  /*------------------------------------
		lightcase
	--------------------------------------*/
  $("[data-rel^=lightcase]").lightcase();

  /*------------------------------------
        menu mobile
    --------------------------------------*/
  $(
    ".header-mobile__toolbar,.mobile-menu-overlay,.main-header .btn-close-header-mobile"
  ).on("click", function () {
    $(".menu--mobile").toggleClass("menu-mobile-active");
  });

  /*------------------------------------
    steps
  --------------------------------------*/

  $(".toggle-pass").click(function () {
    var $input = $(this).closest(".input-icon").find(".form-control");
    if ($input.attr("type") == "password") {
      $input.attr("type", "text");
    } else {
      $input.attr("type", "password");
    }
  });
})(jQuery);

var swiperAbout = new Swiper(".swiper-product", {
  slidesPerView: 1,
  speed: 1500,
  spaceBetween: 30,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".slider-product .swiper--pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".slider-product .swiper-next",
    prevEl: ".slider-product .swiper-prev",
  },
});

var swiperGallary = new Swiper(".swiper-gallary", {
  slidesPerView: 1,
  speed: 1500,
  spaceBetween: 30,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-next-galary",
    prevEl: ".swiper-prev-galary",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 15,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
  },
});

var swiperBlog = new Swiper(".swiper-blog", {
  slidesPerView: 1,
  speed: 1500,
  spaceBetween: 30,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-next-blog",
    prevEl: ".swiper-prev-blog",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 15,
    },
    576: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    992: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
  },
});

const sliderThumbs = new Swiper(".slider__thumbs .swiper-container", {
  direction: "vertical",
  slidesPerView: 4,
  spaceBetween: 24,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  centerInsufficientSlides: true,
  slideToClickedSlide: true,
  navigation: {
    nextEl: ".slider__next",
    prevEl: ".slider__prev",
  },
  freeMode: true,
  breakpoints: {
    0: {
      slidesPerView: 3,
    },
    768: {
      direction: "vertical",
    },
  },
});

const sliderImages = new Swiper(".slider__images .swiper-container", {
  direction: "vertical",
  slidesPerView: 1,
  spaceBetween: 32,
  mousewheel: true,
  navigation: {
    nextEl: ".slider__next",
    prevEl: ".slider__prev",
  },
  grabCursor: true,
  thumbs: {
    swiper: sliderThumbs,
  },
  breakpoints: {
    768: {
      direction: "vertical",
    },
  },
  on: {
    slideChange: function () {
      let activeIndex = this.activeIndex + 1;
      let activeSlide = document.querySelector(
        `.slider__thumbs .swiper-slide:nth-child(${activeIndex})`
      );
      let nextSlide = document.querySelector(
        `.slider__thumbs .swiper-slide:nth-child(${activeIndex + 1})`
      );
      let prevSlide = document.querySelector(
        `.slider__thumbs .swiper-slide:nth-child(${activeIndex - 1})`
      );

      if (nextSlide && !nextSlide.classList.contains("swiper-slide-visible")) {
        this.thumbs.swiper.slideNext();
      } else if (
        prevSlide &&
        !prevSlide.classList.contains("swiper-slide-visible")
      ) {
        this.thumbs.swiper.slidePrev();
      }
    },
  },
});
