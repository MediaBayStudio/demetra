;(function(){
  $('.about-team__list').slick({
    arrows: false,
    infinite: false,
    variableWidth: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 767.98,
        settings: 'unslick'
      }
    ]
  })
})()