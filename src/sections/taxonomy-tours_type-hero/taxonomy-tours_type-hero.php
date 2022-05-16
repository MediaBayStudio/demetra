<?php
  $title         = $section['title'];
  $subtitle      = $section['subtitle'];
  $is_profitable = $section['is_profitable'];

  $img_id   = $section['img']['ID'];
  $img_urls = get_post_meta($img_id);
  $img_webp = $upload_baseurl . $img_urls['webp'][0];
  $img_png  = $upload_baseurl . $img_urls['_wp_attached_file'][0];
?>
<section class="tours-hero sect container">
  <div class="tours-hero__info">
    <div class="tours-hero__info-left lazy" data-src="#">
      <h2 class="tours-hero__info-title"><?php echo $title ?></h2>
      <p class="tours-hero__info-subtitle"><?php echo $subtitle ?></p>
      <button class="tours-hero__info-btn-popup">Подробнее</button>
    </div>
    <div class="tours-hero__info-right">
      <picture class="tours-hero__info-right-img lazy">
        <source srcset="#" data-srcset="<?php echo $img_webp ?>" type="image/webp">
        <img src="#" alt="#" data-src="<?php echo $img_png ?>">
      </picture>
    </div>
    <?php if ( $is_profitable ) : ?>
      <span class="tours-hero__info-profitable">Выгодное предложение</span>
    <?php endif ?>
  </div>
</section>