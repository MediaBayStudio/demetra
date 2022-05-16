;(function() {
  const tours = qa('.tour');

  for (let i = 0; i < tours.length; i++) {
    const tour = tours[i];

    $(`.tour-gallery-${i}`).slick({
      arrows: false,
      infinite: false,
      variableWidth: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      mobileFirst: true,
      dots: true,
      prevArrow: '<span class="tour__gallery-arrow tour__gallery-prev" role="button">' +
                   '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                     '<g clip-path="url(#clip0)">' +
                     '<path fill-rule="evenodd" clip-rule="evenodd" d="M9.6001 11.0602L3.1318 5.9999L9.6001 0.951352L9.32155 0.599902L2.4001 5.9999L9.32605 11.3999L9.6001 11.0602Z" fill="#2B4758"/>' +
                     '</g>' +
                     '<defs>' +
                     '<clipPath id="clip0">' +
                     '<rect width="12" height="12" fill="white" transform="translate(12 12) rotate(-180)"/>' +
                     '</clipPath>' +
                     '</defs>' +
                   '</svg>' +
                 '</span>',
      nextArrow: '<span class="tour__gallery-arrow tour__gallery-next" role="button">' +
                    '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                      '<path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 0.939848L8.8682 6.0001L2.3999 11.0486L2.67845 11.4001L9.5999 6.0001L2.67395 0.600098L2.3999 0.939848Z" fill="#2B4758"/>' +
                    '</svg>' +
                 '</span>',

      customPaging: function() {
        return `<button class='dot'></button>`;
      },

      dotsClass: 'dots',

      responsive: [
        {
          breakpoint: 767.98,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 1023.98,
          settings: {
            dots: false,
            arrows: true,
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 1279.98,
          settings: {
            slidesToShow: 3,
            dots: false,
            arrows: true,
          }
        },
      ]
    });

    const largePreview = q(`.tour__gallery-current-lg-preview-${i}`, tour);
    const slider = q('.slick-list', tour);
    const slides = qa('.slick-slide', slider);

    slides.forEach( function(slide) {
      slide.addEventListener('click', function() {
        slidePic = q('.tour__gallery-img', slide)
        changeLargePreview(slidePic)
      })
    })

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

    $(largePreview).on('click', function() {
      const slideId = largePreview.dataset.slickSlideIndex;
      $(`a[data-fancybox="gallery-${i}"]`).eq(slideId).trigger('click')
    })

    $(`a[data-fancybox="gallery-${i}"]`).fancybox({
      beforeClose: function(e) {
        const slider = $(`.tour-gallery-${i}`);
        const pic = q('.tour__gallery-img', slides[e.currIndex]);
        changeLargePreview(pic);
        slider.slick('slickGoTo', e.currIndex - 1);
      }
    })
  }
})()

;(function() {
  const filtersList = q('.filters-list');
  const radioBtns = qa('.filter-radio', filtersList);

  radioBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      const currentFilter = q('.filter-radio:checked', filtersList);
      const curFilterVal = currentFilter.value;
      updateToursList(curFilterVal);
    })
  })

  function updateToursList(filterId) {
    const tours = qa('.tours__list-item');

    tours.forEach(function(tour) {
      if (filterId === 'all') {
        tour.classList.remove('hidden');
        return
      }

      if (tour.dataset.filter !== filterId) {
        tour.classList.add('hidden')
      } else {
        tour.classList.remove('hidden')
      }
    })
  }
})()

;(function() {
  const toursList = q('.tours__list');

  toursList.addEventListener('click', function(e) {
    const tour = e.target.closest('.tour');
    const openBtn = q('.tour__descr-read-more-btn', tour);

    if (e.target === openBtn) {
      const descr = q('.tour__descr', tour);
      const closeBtn = q('.tour__descr-close-btn', descr);
      const currentText = q('.tour__descr-text', descr);
      const endText = descr.dataset.excerptEnd;
      const btnHTMLStart = currentText.innerHTML.indexOf(openBtn.outerHTML);

      currentText.innerHTML = currentText.innerHTML.substring(0, btnHTMLStart) + endText;
      closeBtn.classList.remove('hidden')

      closeBtn.addEventListener('click', function() {
        currentText.innerHTML = currentText.innerHTML.substring(0, btnHTMLStart);
        currentText.append(openBtn);
        closeBtn.classList.add('hidden');
      }, {once: true})
    }

  });
})()