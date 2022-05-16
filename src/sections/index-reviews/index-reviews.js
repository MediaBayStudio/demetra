;(function () {
  $('.index-reviews__list').slick({
    arrows: false,
    infinite: false,
    variableWidth: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    dots: true,
    prevArrow: '<span class="index-reviews__list-arrow index-reviews__list-prev" role="button">' +
                  '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<g clip-path="url(#clip0)">' +
                    '<path fill-rule="evenodd" clip-rule="evenodd" d="M20 23.245L5.626 12L20 0.781L19.381 -5.41147e-08L4 12L19.391 24L20 23.245Z" fill="#05090C"/>' +
                    '</g>' +
                    '<defs>' +
                    '<clipPath id="clip0">' +
                    '<rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)"/>' +
                    '</clipPath>' +
                    '</defs>' +
                  '</svg>' +
               '</span>',
    nextArrow: '<span class="index-reviews__list-arrow index-reviews__list-next" role="button">' +
                 '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path fill-rule="evenodd" clip-rule="evenodd" d="M4 0.755L18.374 12L4 23.219L4.619 24L20 12L4.609 0L4 0.755Z" fill="#05090C"/>' +
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
          slidesToShow: 3,
          arrows: true,
        }
      },
    ]
  })
})()