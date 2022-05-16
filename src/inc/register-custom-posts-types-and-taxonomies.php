<?php

add_action( 'init', function() {
  register_post_type( 'excursion', [
    'label'  => null,
    'labels' => [
      'name'               => 'Экскурсии',
      'singular_name'      => 'Экскурсии',
      'add_new'            => 'Добавить',
      'add_new_item'       => 'Добавление',
      'edit_item'          => 'Редактирование',
      'new_item'           => 'Новая ',
      'view_item'          => 'Смотреть',
      'search_items'       => 'Искать',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Экскурсии',
    ],
    'description'         => '',
    'public'              => true,
    'show_in_menu'        => null,
    'show_in_rest'        => null,
    'rest_base'           => null,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-tickets-alt',
    'hierarchical'        => false,
    'supports'            => [ 'title', 'thumbnail' ],
    'taxonomies'          => [ 'excursion_type' ],
    'exclude_from_search' => false,
    'has_archive' => true,
    'rewrite' => [
      // 'slug' => 'equipments/%equipments%',
      'with_front' => true,
      'pages' => false
    ],
    'query_var' => false
  ] );

  register_post_type( 'tours', [
    'label'  => null,
    'labels' => [
      'name'               => 'Туры',
      'singular_name'      => 'Туры',
      'add_new'            => 'Добавить',
      'add_new_item'       => 'Добавление',
      'edit_item'          => 'Редактирование',
      'new_item'           => 'Новая ',
      'view_item'          => 'Смотреть',
      'search_items'       => 'Искать',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Туры',
    ],
    'description'         => '',
    'public'              => true,
    'show_in_menu'        => null,
    'show_in_rest'        => null,
    'rest_base'           => null,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-airplane',
    'hierarchical'        => false,
    'supports'            => [ 'title', 'thumbnail' ],
    'taxonomies'          => [ 'tours_type' ],
    'exclude_from_search' => false,
    'has_archive' => true,
    'rewrite' => [
      // 'slug' => 'equipments/%equipments%',
      'with_front' => true,
      'pages' => false
    ],
    'query_var' => false
  ] );

  register_post_type( 'bookings', [
    'label'  => null,
    'labels' => [
      'name'               => 'Бронирования',
      'singular_name'      => 'Бронирование',
      'add_new'            => 'Добавить',
      'add_new_item'       => 'Добавление',
      'edit_item'          => 'Редактирование',
      'new_item'           => 'Новая ',
      'view_item'          => 'Смотреть',
      'search_items'       => 'Искать',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Бронирования',
    ],
    'description'         => '',
    'public'              => true,
    'show_in_menu'        => null,
    'show_in_rest'        => null,
    'rest_base'           => null,
    'menu_position'       => null,
    'hierarchical'        => false,
    'supports'            => [ 'title'],
    'taxonomies'          => []
  ] );

  register_post_type( 'inst_link', [
    'label'  => null,
    'labels' => [
      'name'               => 'Ссылка на пост в инстаграм',
      'singular_name'      => 'Ссылка на пост в инстаграм',
      'add_new'            => 'Добавить',
      'add_new_item'       => 'Добавление',
      'edit_item'          => 'Редактирование',
      'new_item'           => 'Новая ',
      'view_item'          => 'Смотреть',
      'search_items'       => 'Искать',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Ссылки на инстаграм посты',
    ],
    'description'         => '',
    'public'              => true,
    'show_in_menu'        => null,
    'show_in_rest'        => null,
    'rest_base'           => null,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-instagram',
    'hierarchical'        => false,
    'supports'            => [ 'title', 'thumbnail' ],
    'taxonomies'          => [ 'inst_link' ],
    'exclude_from_search' => false,
    'has_archive' => true,
    'rewrite' => [
      // 'slug' => 'equipments/%equipments%',
      'with_front' => true,
      'pages' => false
    ],
    'query_var' => false
  ] );

  register_taxonomy( 'excursion_type', ['excursion'], [
    'label'                 => '',
    'labels'                => [
      'name'              => 'Типы экскурсий',
      'singular_name'     => 'Тип экскурсии',
      'search_items'      => 'Найти',
      'all_items'         => 'Все',
      'view_item '        => 'Показать',
      'parent_item'       => 'Родитель',
      'parent_item_colon' => 'Родитель:',
      'edit_item'         => 'Изменить',
      'update_item'       => 'Обновить',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Добавить',
      'menu_name'         => 'Типы экскурсий',
    ],
    'hierarchical'          => true,
    'meta_box_cb'           => false
  ] );

  register_taxonomy( 'excursion_filters', ['excursion'], [
    'label'                 => '',
    'labels'                => [
      'name'              => 'Фильтры экскурсий',
      'singular_name'     => 'Фильтр экскурсии',
      'search_items'      => 'Найти',
      'all_items'         => 'Все',
      'view_item '        => 'Показать',
      'parent_item'       => 'Родитель',
      'parent_item_colon' => 'Родитель:',
      'edit_item'         => 'Изменить',
      'update_item'       => 'Обновить',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Добавить',
      'menu_name'         => 'Фильтр экскурсий',
    ],
    'hierarchical'          => true,
    'meta_box_cb'           => false
  ] );

  register_taxonomy( 'tours_filters', ['tours'], [
    'label'                 => '',
    'labels'                => [
      'name'              => 'Фильтры туров',
      'singular_name'     => 'Фильтр туров',
      'search_items'      => 'Найти',
      'all_items'         => 'Все',
      'view_item '        => 'Показать',
      'parent_item'       => 'Родитель',
      'parent_item_colon' => 'Родитель:',
      'edit_item'         => 'Изменить',
      'update_item'       => 'Обновить',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Добавить',
      'menu_name'         => 'Фильтры туров',
    ],
    'hierarchical'          => true,
    'meta_box_cb'           => false
  ] );

});
