;(function () {
  $('.popular-excursions__list').slick({
    arrows: false,
    infinite: false,
    variableWidth: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    dots: true,

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
        settings: 'unslick'
      }
    ]
  })
})()