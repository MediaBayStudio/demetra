<?php
  $left_img_id    = $section['left_img']['ID'];
  $left_img_urls  = get_post_meta($left_img_id);
  $left_img_webp  = $upload_baseurl . $left_img_urls['webp'][0];
  $left_img_png   = $upload_baseurl . $left_img_urls['_wp_attached_file'][0];

  $right_img_id   = $section['right_img']['ID'];
  $right_img_urls = get_post_meta($right_img_id);
  $right_img_webp = $upload_baseurl . $right_img_urls['webp'][0];
  $right_img_png  = $upload_baseurl . $right_img_urls['_wp_attached_file'][0];
?>

<section class="index-hero container sect bg-light-blue"<?php $section_id ?>>
  <div class="index-hero__inner">
    <picture class="index-hero__img index-hero__img-left">
      <source srcset="<?php echo $left_img_webp ?>" type="image/webp" media="(min-width: 767.92px)">
      <source srcset="<?php echo $left_img_png ?>" type="image/png" media="(min-width: 767.92px)">
      <img src="#" alt="#">
    </picture>

    <picture class="index-hero__img index-hero__img-right">
      <source srcset="<?php echo $right_img_webp  ?>" type="image/webp">
      <source srcset="<?php echo $right_img_png  ?>" type="image/png">
      <img src="<?php echo $right_img_png  ?>" alt="image">
    </picture>

    <h1 class="index-hero__title">
      <?php echo $section['title'] ?>
    </h1>
    <span class="index-hero__subtitle"><?php echo $section['subtitle'] ?></span>
  </div>
  <?php require $template_directory . '/components/search-form.php' ?>
</section>