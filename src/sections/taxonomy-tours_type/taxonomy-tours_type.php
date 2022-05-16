<?php
  $tours = get_posts([
    'post_type' => 'tours'
  ]);
  $filters_list = get_terms([
    'taxonomy' => 'tours_filters',
    'hide_empty' => false,
  ]);
?>

<section class="tours sect container">
  <h1 class="tours__title">Туры</h1>
  <ul class="tours__filters filters-list" role="list">
      <li class="filters-item filter">
        <label class="filter-wrapper">
          <input type="radio" name="filter" class="filter-radio" value="all" checked>
          <span class="filter-view">Все</span>
        </label>
      </li>

    <?php foreach ( $filters_list as $filter) :?>
      <li class="filters-item filter">
        <label class="filter-wrapper">
          <input type="radio" name="filter" class="filter-radio" value="<?php echo $filter->term_id ?>">
          <span class="filter-view"><?php echo $filter->name ?></span>
        </label>
      </li>
    <?php endforeach ?>

  </ul>

  <ul class="tours__list">
    <?php $i = 0; ?>
    <?php foreach ( $tours as $tour) :
      $tour_filter = wp_get_post_terms( $tour->ID, 'tours_filters');
      $tour_filter_name = $tour_filter[0]->name;

      $fields = get_fields($tour);

      $title = $tour->post_title;

      $duration   = $fields['duration'];
      $price      = $fields['price'];
      $hotel_name = $fields['hotel_name'];
      $hotel_link = $fields['hotel_link'];

      $descr = $fields['descr'];
      $descr = split_text([
        'maxwords' => 75,
        'text'     => $descr,
      ]);

      $excerpt_start = $descr['start'];
      $excerpt_end   = $descr['end'];

      $open_text_btn = '<button class="tour__descr-read-more-btn">... Далее</button>';

      $gallery  = $fields['gallery'];

      $first_gallery_img_urls         = get_post_meta($gallery[0]['img']['ID']);
      $first_gallery_img_webp         = $upload_baseurl . $first_gallery_img_urls['webp'][0];
      $first_gallery_img_png_or_jpeg  = $upload_baseurl . $first_gallery_img_urls['_wp_attached_file'][0];
    ?>

      <li class="tours__list-item tour" data-filter="<?php echo $tour_filter[0]->term_id ?>">
        <h2 class="tour__title"><?php echo $title ?> <span class="tour-type tour-type-title"><?php echo $tour_filter_name ?></span></h2>

        <div class="tour__bottom">
          <div class="tour__gallery-wrapper">
            <div class="fancybox-init">
              <img src="#" data-src="<?php echo $webp_support ? $first_gallery_img_webp : $first_gallery_img_png_or_jpeg ;?>" class="tour__gallery-current-lg-preview tour__gallery-current-lg-preview-<?php echo $i ?> fancybox lazy" alt="фото" data-slick-slide-index="0"></img>
            </div>

            <ul class="tour__gallery tour-gallery-<?php echo $i ?>">
              <?php  foreach ( $gallery as $gallery_item ) :
                $img_id   = $gallery_item['img']['ID'];
                $img_urls = get_post_meta($img_id);
                $img_webp = $upload_baseurl . $img_urls['webp'][0];
                $img_png_or_jpeg  = $upload_baseurl . $img_urls['_wp_attached_file'][0];

                $img_webp_preview_url = $upload_baseurl . $img_urls['preview_webp'][0];
                $img_preview_url = image_get_intermediate_size($img_id, 'preview')['url'];

                if (!$img_preview_url) {
                  $img_preview_url = $img_png_or_jpeg;
                  $img_webp_preview_url = $img_webp;
                };
              ?>

                <li class="tour__gallery-item">
                  <a href="<?php echo $webp_support ? $img_webp : $img_png_or_jpeg ; ?>" data-fancybox="gallery-<?php echo $i ?>" class="tour__gallery-fancy"></a>
                  <picture class="tour__gallery-img lazy">
                    <source srcset="#" data-srcset="<?php echo $img_webp_preview_url ?>" type="image/webp" alt="фото">
                    <img src="#" data-src="<?php echo $img_preview_url  ?>" alt="фото">
                  </picture>
                </li>

              <?php endforeach ?>
            </ul>
          </div>

          <div class="tour__info">
            <div class="tour__info-top">
              <span class="tour-type tour-type-info"><?php echo $tour_filter_name ?></span>
              <a href="<?php echo $hotel_link ?>" data-src="#" class="tour__hotel-map-link lazy" target="_blank">
                <span class="tour__hotel-name"><?php echo $hotel_name ?></span>
              </a>
              <span class="tour__duration lazy" data-src="#"><?php echo $duration ?></span>
            </div>

            <div class="tour__descr" data-excerpt-end="<?php echo $excerpt_end ?>">
              <p class="tour__descr-text">
                <?php echo $excerpt_start . $open_text_btn ?>
              </p>
              <button class="tour__descr-close-btn hidden">Скрыть</button>
            </div>

            <div class="tour__info-bottom">
              <span class="tour__info-price">от <?php echo $price ?> &#8381;</span>
              <button class="tour__learnmore-btn-popup btn btn-yellow" data-open-request-popup="">Узнать подбробнее</button>
            </div>
          </div>
        </div>
      </li>

      <?php $i++ ?>
    <?php endforeach ?>
  </ul>
</section>
