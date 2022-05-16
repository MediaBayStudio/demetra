<?php
  $programm_list = $fields['programm_list'];
  $list_add_info = $fields['list_add_info'];
  $price_includes = $fields['price_includes'];

  $adrs = $fields['location_name'];
  $map_coords = json_decode( $fields['map_marker'], true );

  $is_all_days = $fields['all_days'];
  $start_time = $fields['start_time'];

  // Массив ключей для перебора в acf
  $days_en = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
  // Массив для вывода на страницу (Будет "Пн, Вт в %время начал%"). Идексты должны соответствовать $days_en
  $days_ru = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
  // Если acf возвращает true, то записываем в этот массив
  $available_days = [];
  // Сюда записываются дни, которые не отмечены в acf
  $except_days = [];

  if (!$is_all_days) {
    for ($i = 0; $i < 7; $i++) {
      if ($fields[$days_en[$i]]) {
        $available_days[] = $days_ru[$i];
      } else {
        $except_days[] = $days_ru[$i];
      }
    }
  }

  // Если длинна массива с исключенными днями равняется одному, то на странице будет "Ежеденевно, кроме $except[0]
  $except_one_day = count($except_days) === 1;

  // Соеденяем все часы начала экскурсии в одну строку
  // Если в массиве всего два элемента, то соеденяем их с помощью 'и'
  $separator = count($start_time) === 2 ? ' и ' : ', ';
  $start_time_str = '';

  foreach ( $start_time as $time ) {
    $start_time_str .= $time['time'] . $separator;
  };

  $start_time_str = $separator === ' и ' ? substr( $start_time_str, 0, -3) : substr( $start_time_str, 0, -2);

  // Строка для вывода в расписании
  $schedule = '';
  if ($is_all_days) {
    $schedule = 'Ежедневно в ' . $start_time_str;
  } elseif ($except_one_day) {
    $schedule = 'Ежедневно (кроме ' . $except_days[0] . ') в ' . $start_time_str;
  } else {
    $schedule = implode(', ', $available_days) . ' в ' . $start_time_str;
  };
?>

<section class="excursion-programm sect container">
  <span class="sect-suptitle">Детали</span>
  <h2 class="sect-title">Программа экскурсии</h2>

  <div class="excursion-programm__programm">
    <ul class="excursion-programm__list">
      <?php foreach ( $programm_list as $programm_item ) : ?>
        <li class="excursion-programm__list-item"><?php echo $programm_item['descr'] ?></li>
      <?php endforeach ?>
    </ul>

    <?php if ( $list_add_info ) : ?>
      <p class="excursion-programm__add-info"><?php echo $list_add_info ?></p>
    <?php endif ?>
  </div>

  <ul class="programm-info">
    <li class="programm-info__item programm-info__item_location">
      <h3 class="programm-info__title">Место встречи</h3>
        <span class="programm-info__point">
          <img src="#" alt="иконка" data-src="<?php echo $template_directory_uri ?>/img/icons/map-marker-darkgreen.svg" class="excursion-icon lazy">
          <?php echo $adrs ?>
        </span>
      <div class="programm-info__map" data-lat="<?php echo $map_coords['center_lat']?>" data-lng="<?php echo $map_coords['center_lng']?>">
        <div id="map"></div>
      </div>
    </li>

    <li class="programm-info__item programm-info__item_schedule">
      <h3 class="programm-info__title">Расписание</h3>

        <span class="programm-info__point">
          <img src="#" alt="иконка" data-src="<?php echo $template_directory_uri ?>/img/icons/calendar.svg" class="excursion-icon lazy">
          <?php echo $schedule ?>
        </span>
    </li>

    <li class="programm-info__item programm-info__item_duration">
      <h3 class="programm-info__title">Продолжительность</h3>
        <span class="programm-info__point">
          <img src="#" alt="иконка" data-src="<?php echo $template_directory_uri ?>/img/icons/clock.svg" class="excursion-icon lazy">
          <?php echo $duration ?>
      </span>
    </li>

    <li class="programm-info__item programm-info__item_price-inc">
      <h3 class="programm-info__title">В стоимость входит</h3>
      <ul class="price-includes">
        <?php foreach ( $price_includes as $item ) :
          $icon  = $item['icon'];
          $descr = $item['descr'];
        ?>

        <li class="price-includes__item">
          <img src="#" alt="иконка" data-src="<?php echo $icon ?>" class="excursion-icon price-includes__item-img lazy">
          <p class="price-includes__item-descr"><?php echo $descr ?></p>
        </li>

        <?php endforeach ?>
      </ul>
    </li>
  </ul>

  <script async src="https://api-maps.yandex.ru/2.1?apikey=82596a7c-b060-47f9-9fb6-829f012a9f04&lang=ru_RU"></script>

</section>