<?php
  $sup_title = $section['sup_title'];
  $title     = $section['title'];
  $descr     = $section['descr'];
  $cards     = $section['features_cards'];
?>
<section class="index-features sect sect-bg container bg-light-blue">

    <span class="index-features__suptitle sect-suptitle"><?php echo $sup_title ?></span>
    <h2 class="index-features__title sect-title"><?php echo $title ?></h2>
    <p class="index-features__descr sect-descr"><?php echo $descr ?></p>

  <ul class="index-features__list">
    <?php foreach ( $cards as $card ) : ?>
      <li class="index-features__item">
        <img src="#" data-src="<?php echo $card['icon'] ?>" alt="icon" class="index-features__item-img lazy">
        <p class="index-features__item-descr"><?php echo $card['descr'] ?></p>
      </li>
    <?php endforeach ?>
  </ul>
</section>