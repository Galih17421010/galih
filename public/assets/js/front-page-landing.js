"use strict";
!(function () {
  var e = document.getElementById("slider-pricing"),
    i = document.getElementById("swiper-clients-logos"),
    t = document.getElementById("swiper-reviews");
  "1200" <= screen.width &&
    document.addEventListener("mousemove", function (n) {
      this.querySelectorAll(".animation-img").forEach((e) => {
        var i = e.getAttribute("data-speed"),
          t = (window.innerWidth - n.pageX * i) / 100,
          i = (window.innerWidth - n.pageY * i) / 100;
        e.style.transform = `translate(${t}px, ${i}px)`;
      });
    }),
    e &&
      noUiSlider.create(e, {
        start: [458],
        step: 1,
        connect: [!0, !1],
        behaviour: "tap-drag",
        direction: isRtl ? "rtl" : "ltr",
        tooltips: [
          {
            to: function (e) {
              return parseFloat(e).toLocaleString("en-EN", { minimumFractionDigits: 0 }) + "+";
            },
          },
        ],
        range: { min: 0, max: 916 },
      }),
    t &&
      new Swiper(t, {
        slidesPerView: 1,
        spaceBetween: 5,
        centeredSlides: !0,
        grabCursor: !0,
        autoplay: { delay: 3e3, disableOnInteraction: !1 },
        loop: !0,
        loopAdditionalSlides: 1,
        pagination: { el: ".swiper-pagination", clickable: !0 },
        breakpoints: { 992: { slidesPerView: 4, spaceBetween: 20 }, 768: { slidesPerView: 2, spaceBetween: 20 } },
      }),
    i && new Swiper(i, { slidesPerView: 2, autoplay: { delay: 3e3, disableOnInteraction: !1 }, breakpoints: { 992: { slidesPerView: 5 }, 768: { slidesPerView: 3 } } });
})();
