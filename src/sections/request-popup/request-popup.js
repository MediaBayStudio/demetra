;(function() {
  requestPopup = new Popup('.request-popup__wrapper', {
    closeButtons: '.request-popup__close-btn',
    openButtons: '.tour__learnmore-btn-popup, .tours-hero__info-btn-popup'
  });

  requestPopup.addEventListener('popupbeforeopen', function() {
    let caller = this.caller,
      info = caller.closest('.tour__info') || caller.closest('.tours-hero__info-left'),
      title = q('.tour__hotel-name', info) || q('.tours-hero__info-title', info),
      tourNameInput = q('[name="tour-name"]', requestPopup);

    tourNameInput.value = title.textContent;
  });
  // const popup = q('.request-popup__wrapper');
  // const popupCloseBtn = q('.request-popup__close-btn', popup);
  // const popupOpenBtns = qa('[data-open-request-popup]');
  // const firstInp = q('.field__inp', popup);

  // popupOpenBtns.forEach(function(btn) {
  //   btn.addEventListener('click', function() {
  //     popup.classList.add('open');
  //     btn.blur();
  //     document.body.classList.add('no-scroll');

  //     popup.addEventListener('transitionend', function(e) {
  //       if (e.propertyName === 'opacity') {
  //         firstInp.focus();
  //       }
  //     }, {once: true})
  //   })
  // })

  // popup.addEventListener('click', function(e) {
  //   e.stopPropagation();
  //   if (!e.target.closest('.request-popup__inner')) {
  //     popup.classList.remove('open')
  //     document.body.classList.remove('no-scroll')
  //   }
  // })

  // popupCloseBtn.addEventListener('click', function() {
  //   popup.classList.remove('open');
  //   document.body.classList.remove('no-scroll')
  // })

  // document.addEventListener('keydown', function(e) {
  //   if (e.key === 'Escape') {
  //     popup.classList.remove('open');
  //   } else {
  //     return
  //   }
  // })
})()