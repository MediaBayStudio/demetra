<?php

function create_link_preload( $item ) {
  $media = '';

  if ( is_string( $item ) ) {
    $filepath = $item;
  } else {
    if ( $item['media'] ) {
      $media = ' media="' . $item['media'] . '"';
    }
    $filepath = $item['url'];
  } // endif is_string( $item )

  echo '<link rel="preload" as="image" href="' . $filepath . '"' . $media . ' />' . PHP_EOL;
}