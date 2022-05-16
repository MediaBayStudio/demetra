<?php
  $sup_title = $section['sup_title'];
  $title     = $section['title'];

  require $template_directory . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

  use Phpfastcache\Helper\Psr16Adapter;

  $instagram_links = get_posts( [
    'post_type' => 'inst_link',
    'numberposts' => -1
  ] );

  $posts_data = [];

  // текущее время
  $current_date_in_ms = time();

  // проверять на обновление раз в день (для увеличения добавить в выражение умножение на число дней)
  $update_period_in_ms = (3 * 24 * 60 * 60);

  foreach ( $instagram_links as $instagram_link ) {
    $fields = get_fields( $instagram_link );
    $data = [
      'user_name',
      'user_link',
      'user_prof_img',
      'post_update_time',
      'post_date',
      'post_img',
      'post_text',
      'post_link',
      'likes_count',
      'comments_count',
    ];

    $post_update_time = $fields['post_update_time'];

    $post_link = $fields['post_link'];

    // (($post_update_time + $update_period_in_ms) < $current_date_in_ms)

    if ( !$post_update_time ) {
      var_dump('in if');
      $instagram = new \InstagramScraper\Instagram(new \GuzzleHttp\Client());
      $media     = $instagram->getMediaByUrl($post_link);

      $account   = $media->getOwner();

      $post_update_time = time();
      $post_date        = date('d.m.Y', $media->getCreatedTime());
      $user_name        = $account->getFullName();
      $user_link        = 'https://www.instagram.com/' . $account->getUsername();
      $user_prof_img    = 'data:image/jpg;base64,' . base64_encode( file_get_contents( $account->getProfilePicUrl() ) );
      $post_img         = 'data:image/jpg;base64,' . base64_encode( file_get_contents( $media->getImageHighResolutionUrl() ) );
      $post_text        = $media->getCaption();
      $likes_count      = $media->getLikesCount();
      $comments_count   = $media->getCommentsCount();

      $data = [
        'user_name'        => $user_name,
        'user_link'        => $user_link,
        'user_prof_img'    => $user_prof_img,
        'post_update_time' => $post_update_time,
        'post_date'        => $post_date,
        'post_img'         => $post_img,
        'post_text'        => $post_text,
        'post_link'        => $post_link,
        'likes_count'      => $likes_count,
        'comments_count'   => $comments_count,
      ];

      foreach ( $data as $key => $value) {
        update_field($key, $value, $instagram_link);
      };

      $posts_data[] = $data;

    } else {
      for ($i = 0, $len = count($data); $i < $len; $i++) {
        $data[$data[$i]] = $fields[$data[$i]];
        unset($data[$i]);
      }

      $posts_data[] = $data;
    };
  };
?>

<section class="index-reviews sect container">
  <span class="index-reviews__suptitle sect-suptitle"><?php echo $sup_title ?></span>
  <h2 class="index-reviews__title sect-title"><?php echo $title ?></h2>

  <ul class="index-reviews__list">
    <?php foreach ( $posts_data as $inst_post ) :
      $user_name        = $inst_post['user_name'];
      $user_prof_img    = $inst_post['user_prof_img'];
      $post_update_time = $inst_post['post_update_time'];
      $post_date        = $inst_post['post_date'];
      $post_link        = $inst_post['post_link'];
      $post_img         = $inst_post['post_img'];
      $post_text        = split_text([
        'maxwords' => 20,
        'text'     => $inst_post['post_text']
      ])['start'];
      $likes_count      = $inst_post['likes_count'];
      $comments_count   = $inst_post['comments_count'];
    ?>

    <li class="index-reviews__list-item inst-post-card">
      <a href="<?php echo $post_link ?>" class="inst-post-card__post-link"></a>
      <div class="inst-post-card__top">
        <img src="#" data-src="<?php echo $template_directory_uri ?>/img/icons/instagram-in-review.svg"  alt="instagram logo" class="inst-post-card__inst-logo lazy">
        <img src="#" data-src="<?php echo $post_img ?>" alt="image from instagram post" class="inst-post-card__img lazy">
        <div class="inst-post-card__user-pic-wrapper">
          <img src="#" data-src="<?php echo $user_prof_img ?>" alt="instagram user avatar" class="inst-post-card__user-pic lazy">
          <svg class="inst-post-card__user-pic-border" width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="28" cy="28" r="27" stroke="url(#paint0_linear)" stroke-width="2"/>
            <defs>
            <linearGradient id="paint0_linear" x1="-5.77778" y1="43.5556" x2="51.1111" y2="17.3333" gradientUnits="userSpaceOnUse">
            <stop offset="0.223502" stop-color="#F8AD6D"/>
            <stop offset="0.61198" stop-color="#DD4571"/>
            <stop offset="1" stop-color="#8340AB"/>
            </linearGradient>
            </defs>
          </svg>
        </div>
      </div>

      <div class="inst-post-card__bottom">
        <span class="inst-post-card__user-name"><?php echo $user_name ?></span>
        <span class="inst-post-card__post-date"><?php echo $post_date ?></span>
        <p class="inst-post-card__post-text"><?php echo $post_text ?>...</p>

        <div class="inst-post-card__post-count-info">
          <span class="inst-post-card__post-likes">
            <img src="#" data-src="<?php echo $template_directory_uri ?>/img/icons/inst-likes.svg" alt="like icon" class="inst-post-card__icon lazy">
            <?php echo $likes_count ?>
          </span>
          <span class="inst-post-card__post-comments">
            <img src="#" data-src="<?php echo $template_directory_uri ?>/img/icons/inst-comments.svg" alt="comments icon" class="inst-post-card__icon lazy">
            <?php echo $comments_count ?>
          </span>
        </div>
      </div>
    </li>

    <?php endforeach ?>
  </ul>
</section>