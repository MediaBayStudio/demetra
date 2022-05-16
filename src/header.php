<?php
  global
    $preload,
    $site_url,
    $logo_url,
    $tel,
    $tel_dry,
    $current_template,
    $template_directory_uri,
    $upload_baseurl,
    $webp_support;
    //$page_style = $GLOBALS['page_script_name'];

  if ( is_front_page() ) {
    $script_name = 'script-index';
    $style_name = 'style-index';
  } else if ( is_404() ) {
    $script_name = 'script-404';
    $style_name = 'style-404';
  } else {
    $script_name = 'script-' . $current_template;
    $style_name = 'style-' . $current_template;
  }

  $GLOBALS['page_script_name'] = $script_name;
  $GLOBALS['page_style_name'] = $style_name;
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=CustomEvent%2CIntersectionObserver%2CIntersectionObserverEntry%2CElement.prototype.closest%2CElement.prototype.dataset%2CHTMLPictureElement"></script>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- styles preload -->
  <link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/style.css">
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.css" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.576.css" media="(min-width:575.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.768.css" media="(min-width:767.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.1024.css" media="(min-width:1023.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.1280.css" media="(min-width:1279.98px)" />
  <link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/hover.css" media="(hover) and (min-width:1024px)">
  <!-- fonts preload --> <?php
	$fonts = [
		'Manrope-Bold.woff',
		'Manrope-Regular.woff',
		'Manrope-Medium.woff',
		'PlayfairDisplay-Medium.woff',
		'PlayfairDisplay-Bold.woff'
	];
	foreach ( $fonts as $font ) :
    $font_type = strripos( $font, 'ttf' ) !== false ? 'ttf' : 'woff'; ?>
      <link rel="preload" href="<?php echo $template_directory_uri . '/fonts/' . $font ?>" as="font" type="font/<?php echo $font_type; ?>" crossorigin="anonymous" />
    <?php	endforeach; ?>
  <!-- other preload --> <?php
  echo PHP_EOL;
  if ( !$preload ) {
    $preload = get_field( 'preload' );
  }

  $preload[] = $logo_url;

  if ( is_front_page() ) {
    $sect = $GLOBALS['sections'][0];

    $hero_left_img_id    = $sect['left_img']['ID'];
    $hero_left_img_urls      = get_post_meta($hero_left_img_id);
    $hero_left_img_webp  = $upload_baseurl . $hero_left_img_urls['webp'][0];
    $hero_left_img_png   = $upload_baseurl . $hero_left_img_urls ['_wp_attached_file'][0];

    $hero_right_img_id   = $sect[0]['right_img']['ID'];
    $hero_right_img_urls     = get_post_meta($hero_right_img_id);
    $hero_right_img_webp = $upload_baseurl . $hero_right_img_urls['webp'][0];
    $hero_right_img_png  = $upload_baseurl . $hero_right_img_urls['_wp_attached_file'][0];

    if ( $webp_support ) {
      $hero_left_img_url = $hero_left_img_webp;
      $hero_right_img_url = $hero_right_img_webp;
    } else {
      $hero_left_img_url = $hero_left_img_png;
      $hero_right_img_url = $hero_right_img_png;
    }

    $preload[] = [
      'url' => $hero_left_img_url,
      'media' => '(min-width:767.98px)'
    ];

    $preload[] = $hero_right_img_url;
  }

  if ( is_front_page() || $GLOBALS['current_template'] === 'search') {
    $preload[] = $template_directory_uri . '/img/icons/calendar.svg';
    $preload[] = $template_directory_uri . '/img/icons/select-arrow.svg';
  }

  if ( $preload ) {
    foreach ( $preload as $item ) {
      create_link_preload( $item );
    }
    unset( $item );
    echo PHP_EOL;
  } ?>
  <!-- favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site_url ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url ?>/favicon-16x16.png">
  <link rel="manifest" href="<?php echo $site_url ?>/site.webmanifest">
  <link rel="mask-icon" href="<?php echo $site_url ?>/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff"> <?php
  echo PHP_EOL;
  wp_head() ?>
</head>

<body <?php body_class() ?>> <?php
  wp_body_open() ?>
  <noscript>
    <!-- <noindex> -->Для полноценного использования сайта включите JavaScript в настройках вашего браузера.<!-- </noindex> -->
  </noscript>
  <div id="page-wrapper">
    <header class="hdr container bg-light-blue">

        <a href="<?php echo $site_url; ?>" class="hdr__link">
          <img src="<?php echo $logo_url; ?>" alt="логотип" class="logo hdr__logo">
        </a>

        <?php wp_nav_menu( [
          'theme_location'  => 'header_menu',
          'container'       => 'nav',
          'container_class' => 'hdr__nav',
          'menu_class'      => 'hdr__nav-list',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ] ) ?>

        <a href="tel:<?php echo $tel_dry; ?>" class="hdr__tel"><?php echo $tel; ?></a>

        <button type="button" class="hdr__burger"></button>

        <?php require 'template-parts/mobile-menu.php' ?>
    </header>