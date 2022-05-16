;(function () {
  $('.excursion-descr__gallery').slick({
    arrows: false,
    infinite: false,
    variableWidth: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    dots: true,

    prevArrow: '<span class="excursion-descr__gallery-arrow excursion-descr__gallery-prev" role="button">' +
                 '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                   '<path fill-rule="evenodd" clip-rule="evenodd" d="M16 18.4338L5.2195 10L16 1.58575L15.5358 1L4 10L15.5432 19L16 18.4338Z" fill="#2B4758"/>' +
                 '</svg>' +
               '</span>',
    nextArrow: '<span class="excursion-descr__gallery-arrow excursion-descr__gallery-next" role="button">' +
                 '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                   '<path fill-rule="evenodd" clip-rule="evenodd" d="M4 1.56625L14.7805 10L4 18.4142L4.46425 19L16 10L4.45675 1L4 1.56625Z" fill="#2B4758"/>' +
                 '</svg>' +
               '</span>',

    customPaging: function () {
      return `<button class='dot'></button>`;
    },

    dotsClass: 'dots',

    responsive: [
      {
        breakpoint: 767.98,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 1023.98,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 3,
        },
      },
    ],
  });

  const largePreview = q('.excursion-descr__gallery-current-lg-preview');
  const slider = q('.slick-list');
  const slides = qa('.slick-slide', slider);

  slides.forEach(function (slide) {
    slide.addEventListener('click', function () {
      slideImg = q('.excursion-descr__gallery-img', slide);
      changeLargePreview(slideImg);
    });
  });

  function changeLargePreview(slidePic) {
    const img = q('img', slidePic);
    const slickSlide = slidePic.parentElement;
    largePreview.dataset.slickSlideIndex = slickSlide.dataset.slickIndex;

    if (img.currentSrc == '') {
      img.onload = img.onerror = function() {
        largePreview.src = img.currentSrc;
      }
    } else {
      if (img.currentSrc.indexOf('uploads') !== -1) {
        largePreview.src = img.currentSrc;
      } else {
        largePreview.src = img.getAttribute('data-src');
      }
    }
  }

  $(largePreview).on('click', function () {
    const slideId = largePreview.dataset.slickSlideIndex;
    $('a[data-fancybox="gallery"]').eq(slideId).trigger('click');
  });

  $('a[data-fancybox="gallery"]').fancybox({
    beforeClose: function (e) {
      const pic = q('.excursion-descr__gallery-img', slides[e.currIndex]);
      changeLargePreview(pic);
      $('.excursion-descr__gallery').slick('slickGoTo', e.currIndex - 1)
    },
  });
})()
