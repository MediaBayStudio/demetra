<?php
  $sup_title = $section['sup_title'];
  $title     = $section['title'];
  $cards     = $section['cards'];
?>

<section class="about-team sect container">
  <span class="index-features__suptitle sect-suptitle"><?php echo $sup_title ?></span>
  <h2 class="index-features__title sect-title"><?php echo $title ?></h2>

  <ul class="about-team__list">
    <?php foreach ( $cards as $card ) :
      $img_id   = $card['img']['ID'];
      $img_urls = get_post_meta($img_id);
      $img_webp = $upload_baseurl . $img_urls['webp'][0];
      $img_png  = $upload_baseurl . $img_urls['_wp_attached_file'][0];

      $name =  $card['name'];
      $descr = $card['descr'];
    ?>

    <li class="about-team__list-item tour-guide">
      <picture class="tour-guide__img lazy">
        <source srcset="#" type="image/webp" data-srcset="<?php echo $img_webp ?>">
        <img srcset="#" data-srcset="<?php echo $img_png ?>">
      </picture>

      <span class="tour-guide__name"><?php echo $name ?></span>

      <p class="tour-guide__descr"><?php echo $descr ?></p>
    </li>

    <?php endforeach ?>
  </ul>
</section>