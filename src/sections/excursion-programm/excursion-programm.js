;(function () {
  let myMap;

  const mapInfo = q('.programm-info__map');
  const lat = mapInfo.dataset.lat;
  const lng = mapInfo.dataset.lng;

  setTimeout(() => {
    ymaps.ready(loadMap)
  }, 1000);

  function loadMap() {
    myMap = new ymaps.Map('map', {
      center: [lat, lng],
      zoom: 14,
      controls: ['zoomControl']
    }, {
      zoomControlPosition: {
        top: 10,
        left: 10
      }
    })

    const marker = new ymaps.Placemark(myMap.getCenter())

    myMap.geoObjects.add(marker)
  };
})()