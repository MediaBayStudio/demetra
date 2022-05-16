;(function() {
  const mobileFiltersMenu = q('.filters-mob-menu');
  const acceptMobBtn = q('.filters-accept-btn', mobileFiltersMenu);
  const resetBtns = qa('.filters-reset-btn');

  openCloseFiltersMenu();
  filter();
  sortBy();

  acceptMobBtn.addEventListener('click', function() {
    closeFiltersMenu();
  });

  resetBtns.forEach(function(resetBtn) {
    resetBtn.addEventListener('click', function() {
      const filterBtns = qa('.filters-item');

      filterBtns.forEach(function(btn) {
        btn.classList.remove('active');
        updateExcursionsList();
      });

      showFiltersNoResultMsg();
    });
  })

  function closeFiltersMenu() {
    mobileFiltersMenu.classList.remove('open');
    document.body.classList.remove('no-scroll');
  };

  function openCloseFiltersMenu() {
    const openBtn = document.querySelector('.filters-open-mob-btn');
    const closeBtn = mobileFiltersMenu.querySelector('.filters-mob-menu__close-btn');

      // Открыть фильтры
    openBtn.addEventListener('click', function() {
      mobileFiltersMenu.classList.add('open');
      document.body.classList.add('no-scroll');
    });
    // Закрыть фильтры
    // По кнопке
    closeBtn.addEventListener('click', function() {
      closeFiltersMenu();
    });
    // По свайпу вверх
    isSwipeToTop(mobileFiltersMenu, closeFiltersMenu)

    function isSwipeToTop(elem, cb) {
      let touchStartY = 0;
      let touchEndY = 0;

      elem.addEventListener('touchstart', function(e) {
        touchStartY = e.changedTouches[0].screenY;
      }, false);

      elem.addEventListener('touchend', function(e) {
        touchEndY = e.changedTouches[0].screenY;

        if (touchStartY - 50 > touchEndY) {
          if (cb) cb();
        };
      }, false);
    }
  };

  function filter() {
    const mobFilterBtns = qa('.filters-item-mob', mobileFiltersMenu);
    const pageFilterBtns = qa('.filters-item-desk');

    mobFilterBtns.forEach(function(btn, i) {
      btn.addEventListener('click', function() {
        btn.classList.toggle('active');
        pageFilterBtns[i].classList.toggle('active');
        updateExcursionsList();
        showFiltersNoResultMsg();
      });
    });

    pageFilterBtns.forEach(function(btn, i) {
      btn.addEventListener('click', function() {
        btn.classList.toggle('active');
        mobFilterBtns[i].classList.toggle('active');
        updateExcursionsList();
        showFiltersNoResultMsg();
      });
    });
  };

  function updateExcursionsList() {
    const activeFilters = Array.from(qa('.filters-item-desk.active'));
    const excursions = qa('.display-excursions__list-item');
    const ids = activeFilters.map(function(filter) {
      return filter.dataset.filterId;
    })

    if (!ids[0]) {
      excursions.forEach(function(excursion) {
        excursion.classList.remove('hidden')
      })

      return;
    }

    excursions.forEach(function(excursion) {
      const excursionFiltersEl = q('.excursion-card', excursion);
      const excursionFilters = excursionFiltersEl.dataset.filters.split(' ');

      const includeFilter = ids.every(function(id) {
        return excursionFilters.indexOf(id) > -1;
      });



      if (includeFilter) {
        excursion.classList.remove('hidden');
      } else {
        excursion.classList.add('hidden');
      }
    })
  };

  function showFiltersNoResultMsg() {
    const excursionsOnDisplay = qa('.display-excursions__list-item:not(.hidden)');
    const filtersNoResultsMsg = q('.display-excursions__filters-no-results');
    const filtersSortBy = q('.filters__sort-by');

    if (excursionsOnDisplay.length > 0) {
      filtersNoResultsMsg.hidden = true;
      filtersSortBy.hidden = false;
    } else {
      filtersNoResultsMsg.hidden = false;
      filtersSortBy.hidden = true;
    }
  }

  function sortBy() {
    const sortBy = {
      price_down: function(a, b) {
        const excursion1Price = +q('.excursion-card', a).dataset.price;
        const excursion2Price = +q('.excursion-card', b).dataset.price;

        return excursion1Price < excursion2Price ? 1 : -1;
      },
      price_up: function(a, b) {
        const excursion1Price = +q('.excursion-card', a).dataset.price;
        const excursion2Price = +q('.excursion-card', b).dataset.price;

        return excursion1Price > excursion2Price ? 1 : -1;
      },
      popular: function(a, b) {
        const excursion1Price = +q('.excursion-card', a).dataset.popular;
        const excursion2Price = +q('.excursion-card', b).dataset.popular;

        return excursion1Price < excursion2Price ? 1 : -1;
      }
    };

    tail.select('#sort-by-select')
      .on('change', function(item) {
        const excursionsList = q('.display-excursions__list');
        const excursions = qa('.display-excursions__list-item', excursionsList, true);
        const sorted = excursions.sort(sortBy[item.key]);

        excursionsList.innerHTML = '';

        sorted.forEach(function(excursion) {
          excursionsList.append(excursion);
        });
      });
  }
})()