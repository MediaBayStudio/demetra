<?php
  function getCardPreview( $post ) {
    global $upload_baseurl,
           $template_directory_uri;

    $fields = get_fields( $post->ID );

    $title       = $post->post_title;
    $link        = get_permalink( $post->ID );
    $duration    = $fields['duration'];
    $short_descr = $fields['short_descr'];
    $price       = min($fields['age_prices'][0]);
    $in_popular  = $fields['in_popular'];

    $filters = wp_get_post_terms( $post->ID, 'excursion_filters');

    $img_id   = $fields['gallery'][0]['img']['ID'];
    $img_urls = get_post_meta( $img_id );
    $img_webp_preview_url = $upload_baseurl . $img_urls['preview_webp'][0];
    $img_png_preview_url = image_get_intermediate_size($img_id, 'preview')['url'];

     // ___Формарование дата атрибута со списком фильтров___

    $filters_data_atr = '';
    $filters_data_atr_start = 'data-filters="';
    $filters_data_atr_end = '"';

    $filters_length = count($filters);

    foreach ( $filters as $key => $filter ) {
      $filters_data_atr_start .= $filter->term_id;

      if ( $key < $filters_length - 1 ) {
        $filters_data_atr_start .= ' ';
      }
    };

    $filters_data_atr .= $filters_data_atr_start . $filters_data_atr_end;


    // *** ФОРМАИРОВАНИЕ ЭЛЕМЕНТА КАРТОЧКИ ЭКСКУРСИИ ***
    $card = '';
    $start_card = '<div class="excursion-card" ' . 'data-price="' . $price . '" ' . 'data-popular="' . $in_popular . '"' . $filters_data_atr . '>' ;
    $end_card = '</div>';

    // ___Формарование главной картинки карточки экскурсии___
    $img_link = '';
    $img_link_start =
      '<a href="' . $link . '" class="excursion-card__img-link">' .
        '<picture class="excursion-card__img-pic lazy">';

    $img_link_end = '</picture></a>';

    $webp_source_el = '';
    $png_source_el = '';
    $default_img = '';

    if ( $img_urls['preview_webp'] ) {
      $webp_source_el = '<source srcset="#" data-srcset="' .$img_webp_preview_url . '" type="image/webp" alt="фото с экскурсии">';
      $img_link_start .= $webp_source_el;
    }

    if ( $img_png_preview_url ) {
      $png_source_el = '<source srcset="#" data-srcset="' . $img_png_preview_url . '" type="image/png" alt="фото с экскурсии">';
      $default_img = '<img src="#" data-src="' . $img_png_preview_url .'" alt="фото с экскурсии">';
      $img_link_start .= $png_source_el . $default_img;
    }

    $img_link .= $img_link_start . $img_link_end;

    // ___Формарование основной информации об экскурсии в карточке___
    $card_info = '';
    $card_info_start = '<div class="excursion-card__info">';
    $card_info_end = '</div>';

    // Добавление длительности экскурсии
    $card_info_duration =
      '<span class="excursion-card__duration">
        <img src="" data-src="' . $template_directory_uri . '/img/icons/clock.svg" alt="иконка" class="excursion-card__icon excursion-icon lazy">' .
        $duration .
      '</span>';
    $card_info_start .= $card_info_duration;

    // Добавление заголовка
    $card_info_title = '<a href="' . $link . '" class="excursion-card__title-link"><h3 class="excursion-card__title">' . $title . '</h3></a>';
    $card_info_start .= $card_info_title;

    // Добавление короткого описания
    $card_info_short_descr = '<p class="excursion-card__descr">' . $short_descr . '</p>';
    $card_info_start .= $card_info_short_descr;

    // Добавление цены и ссылки на саму экскурсию
    $card_info_bottom =
      '<div class="excursion-card__bottom">' .
        '<span class="excursion-card__price">от ' . $price . '</span>' .
        '<a href="' . $link . '" class="excursion-card__more">Подбробнее</a>' .
      '</div>';

    $card_info = $card_info_start . $card_info_bottom . $card_info_end;

    $card = $start_card .$img_link . $card_info . $end_card;

    echo $card;
  }
?>