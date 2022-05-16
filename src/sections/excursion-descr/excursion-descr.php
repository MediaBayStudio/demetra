<?php
  $title     = $post->post_title;
  $fields    = get_fields($post);
  $duration  = $fields['duration'];
  $price     = min($fields['age_prices'][0]);
  $descr     = $fields['descr'];

  $gallery = $fields['gallery'];

  $first_gallery_img_urls         = get_post_meta($gallery[0]['img']['ID']);
  $first_gallery_img_webp         = $upload_baseurl . $first_gallery_img_urls['webp'][0];
  $first_gallery_img_png_or_jpeg  = $upload_baseurl . $first_gallery_img_urls['_wp_attached_file'][0];
?>

<ul class="breadcrumbs container">
  <li class="breadcrumbs__item"><a href="<?php echo home_url()?>/vse-ekskursii">Все экскурсии</a></li>
  <li class="breadcrumbs__item"><?php echo $title ?></li>
</ul>

<section class="excursion-descr sect container">
  <h1 class="excursion-descr__title sect-title"><?php echo $title ?></h1>
  <div class="excursion-descr__undertitle">
    <span class="excursion-descr__duration">
      <?php echo $duration ?>
    </span>
    <span class="excursion-descr__price">от <?php echo $price ?></span>
  </div>
  <div class="excursion-descr__gallery-wrapper">
    <div class="fancybox-init">
      <img src="#" data-src="<?php echo $webp_support ? $first_gallery_img_webp : $first_gallery_img_png_or_jpeg ;?>" class="excursion-descr__gallery-current-lg-preview fancybox lazy" alt="фотография с экскурсии" data-slick-slide-index="0"></img>
    </div>

    <ul class="excursion-descr__gallery">
      <?php foreach ( $gallery as $gallery_item ) :
        $img_id          = $gallery_item['img']['ID'];
        $img_urls        = get_post_meta($img_id);
        $img_webp        = $upload_baseurl . $img_urls['webp'][0];
        $img_png_or_jpeg = $upload_baseurl . $img_urls['_wp_attached_file'][0];

        $img_webp_preview_url = $upload_baseurl . $img_urls['preview_webp'][0];
        $img_png_or_jpeg_preview_url  = image_get_intermediate_size($img_id, 'preview')['url'];
      ?>

      <li class="excursion-descr__gallery-item">
        <a href="<?php echo $webp_support ? $img_webp : $img_png_or_jpeg ; ?>" data-fancybox="gallery" class="excursion-descr__gallery-fancy"></a>
        <picture class="excursion-descr__gallery-img lazy">
          <source srcset="#" data-srcset="<?php echo $img_webp_preview_url ?>" type="image/webp" alt="фотография с эскурсии">
          <img src="#" data-src="<?php echo $img_png_or_jpeg_preview_url  ?>" alt="фотография с экскурсии">
        </picture>
      </li>

      <?php endforeach ?>
    </ul>
  </div>

  <div class="excursion-descr__inner">
    <div class="excursion-descr__descr"><?php echo $descr ?></div>
    <a href="#excursion-booking" class="btn btn-yellow">Забронировать</a>
  </div>
</section>