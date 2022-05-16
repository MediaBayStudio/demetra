<?php
  function split_text( $args = '') {
    $rg = (object) array_merge( [
      'maxwords'     => 35,
      'text'        => '',
    ], $args);

    $text = $rg->text;
    $text = strip_tags(
			$text,
			'<br>',
		);

    $text = explode( ' ', $text );
    $text_length = count($text);

    $text_start = '';
    $text_end = '';

    for ($i = 0; $i < $rg->maxwords; $i++) {
        $text_start .= $text[$i] . ' ';
    };

    $text_start = trim( $text_start );

    for ($i = $rg->maxwords; $i < $text_length; $i++) {
      $text_end .= ' ' . $text[$i];
    };

    $text_start_last_char = mb_substr( $text_start, -1);
    $symbols_arr = ['.', ','];

    if ( in_array( $text_start_last_char, $symbols_arr) ) {
      $text_start = mb_substr( $text_start, 0, -1 );
      $text_end = $text_start_last_char . $text_end;
      $text_end = trim( $text_end );
    };

    return [
      'start' => $text_start,
      'end'   => $text_end,
    ];
  }
?>