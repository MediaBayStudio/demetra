<?php
  $date = $_GET['date'];
  $excursion_type = $_GET['excursion_type'];

  $excursion_type_list = get_terms( [
    'taxonomy' => 'excursion_type',
    'hide_empty' => false,
  ] );
?>
<form id="search-form" action="<?php echo home_url() ?>/vse-ekskursii" class="search-form bg-blue" method="GET">
  <label for="input-date" class="field field__date">
    <span class="field__text">Дата</span>
    <input type="text" name="date" class="field__inp field__inp-date" placeholder="20.20.2020" autocomplete="off" value="<?php echo $date ? $date : '' ?>">
    <div id="input-date-calendar"></div>
  </label>

  <label class="field field__select">
    <span class="field__text">Тип экскурсии</span>
    <select id="index-select" class="tail-select field__inp" name="excursion_type">
      <option value="all" <?php echo $excursion_type === 'all' ? 'selected' : '' ?>>Все</option>
      <?php foreach ( $excursion_type_list as $excursion_type_item ) :
        $type_name = $excursion_type_item->name;
        $type_slug = $excursion_type_item->slug;
        $is_slug_in_query = $type_slug === $excursion_type;
      ?>

        <option value="<?php echo $type_slug ?>" <?php echo $is_slug_in_query ? 'selected' : '' ?>><?php echo $type_name ?></option>

      <?php endforeach ?>
    </select>
  </label>

  <button class="btn btn-yellow">Найти</button>
</form>