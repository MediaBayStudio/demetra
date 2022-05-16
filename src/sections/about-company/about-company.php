<?php
  $sup_title         = $section['sup_title'];
  $title             = $section['title'];
  $descr             = $section['descr'];

  $desctop_img_id    = $section['desctop_img']['ID'];
  $desctop_img_urls  = get_post_meta($desctop_img_id);
  $desctop_img_webp  = $upload_baseurl . $desctop_img_urls['webp'][0];
  $desctop_img_png   = $upload_baseurl . $desctop_img_urls['_wp_attached_file'][0];

  $mobile_img_id    = $section['mobile_img']['ID'];
  $mobile_img_urls  = get_post_meta($mobile_img_id);
  $mobile_img_webp  = $upload_baseurl . $mobile_img_urls['webp'][0];
  $mobile_img_png   = $upload_baseurl . $mobile_img_urls['_wp_attached_file'][0];
?>

<section class="about-company sect container">

    <span class="about-company__suptitle sect-suptitle"><?php echo $sup_title ?></span>
    <h2 class="about-company__title sect-title">
      <?php echo $title ?>
    </h2>

    <picture class="about-company__img lazy">
      <source media="(min-width: 767.98px)" type="image/webp" srcset="#" data-srcset="<?php echo $desctop_img_webp ?>">
      <source media="(min-width: 767.98px)" type="image/png" srcset="#" data-srcset="<?php echo $desctop_img_png ?>">
      <source type="image/webp" srcset="#" data-srcset="<?php echo $mobile_img_webp ?>">
      <source type="image/png" srcset="#" data-srcset="<?php echo $mobile_img_webp ?>">
      <img src="#" alt="image">
    </picture>

    <div class="about-company__descr sect-descr"><?php echo $descr ?></div>
</section>