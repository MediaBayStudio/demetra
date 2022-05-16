<?php
  $popular_excursions = get_posts([
    'numberposts' => 3,
    'category'    => -1,
    'post_type'   => 'excursion',
    'meta_key'    => 'in_popular',
    'orderby'     => 'meta_value_num',
    'order'       => 'DESC'
  ]);

?>

<section class="popular-excursions sect container">
  <span class="sect-suptitle">Рекомендуем</span>
  <h2 class="sect-title">Популярные экскурсии</h2>

  <ul class="popular-excursions__list">
    <?php foreach ( $popular_excursions as $p_excursion ) : ?>
      <li class="popular-excursions__list-item">
        <?php getCardPreview( $p_excursion ) ?>
      </li>
    <?php endforeach ?>
  </ul>
</section>