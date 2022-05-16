<?php

add_action( 'wp_ajax_nopriv_send_booking', 'send_booking' ); 
add_action( 'wp_ajax_send_booking', 'send_booking' );

function send_booking() {

  global $email;

  $date = $_POST['date'];
  $time = $_POST['time'];
  $excursion_title = $_POST['excursion_title'];
  $excursion_id = $_POST['excursion_id'];
  $excursion_link = $_POST['excursion_link'];
  $adults_count = $_POST['adults-count'];
  $pensioners_count = $_POST['pensioners-count'];
  $school_kids_count = $_POST['school_kids-count'];
  $students_count = $_POST['students-count'];
  $preschoolers_count = $_POST['preschoolers-count'];
  $foreigners_count = $_POST['foreigners-count'];
  $total_booking_price = $_POST['total_booking_price'];
  $username = $_POST['name'];
  $usertel = $_POST['tel'];
  $useremail = $_POST['email'];
  $policy = $_POST['policy'];
  $honeypot = $_POST['username'];

  if ( $honeypot ) {
    die();
  }

  $admin_email = $email;
  // $admin_email = '89224714290a@gmail.com';

  if ($adults_count) {
    $clients_text .= '  - Взрослые: ' . $adults_count . PHP_EOL;
  }

  if ($pensioners_count) {
    $clients_text .= '  - Пенсионеры: ' . $pensioners_count . PHP_EOL;
  }

  if ($school_kids_count) {
    $clients_text .= '  - Школьники: ' . $school_kids_count . PHP_EOL;
  }

  if ($students_count) {
    $clients_text .= '  - Студенты: ' . $students_count . PHP_EOL;
  }

  if ($preschoolers_count) {
    $clients_text .= '  - Дошкольники: ' . $preschoolers_count . PHP_EOL;
  }

  if ($foreigners_count) {
    $clients_text .= '  - Иностранцы: ' . $foreigners_count . PHP_EOL;
  }

  // Получаем последний заказ
  $query = new WP_Query( [
    'post_status' => 'any',
    'orderby'     => 'post_date',
    'numberposts' => -1,
    'post_type'   => 'bookings'
  ] );

  $bookings = $query->posts;

  // Если есть, то берем его номер и прибавляем 1
  if ( $bookings ) {
    $last_booking = $bookings[0];
    $last_oreder_number = preg_replace( '/[^0-9]/', '', $last_booking->post_title );
    $booking_number = 1 + (int)$last_oreder_number;
  } else {
    // если заказов нет, то номер 1
    $booking_number = '1';
  }

  $booking_data = array(
    'post_title'    => sanitize_text_field( 'Бронирование #' . $booking_number ),
    'post_type'     => 'bookings',
    'post_content'  => $admin_message,
    'post_status'   => 'pending', // статус "ожидает подтверждения"
    'post_author'   => 1
  );

  // создаем заказ
  $booking_id = wp_insert_post( $booking_data );

  // обновялем поля заказа
  update_field( 'excursion', (int)$excursion_id, $booking_id );
  update_field( 'excursion_link', $excursion_link, $booking_id );
  update_field( 'date', $date, $booking_id );
  update_field( 'time', $time, $booking_id );
  update_field( 'price', $total_booking_price, $booking_id );
  update_field( 'tickets', $clients_text, $booking_id );
  update_field( 'name', $username, $booking_id );
  update_field( 'email', $useremail, $booking_id );
  update_field( 'tel', $usertel, $booking_id );

  $booking_link = site_url() . '/wp-admin/post.php?post=' . $booking_id . '&action=edit';

  $subject = 'Бронирование';

  $admin_message = 'Здравствуйте!' . PHP_EOL . PHP_EOL .
  'На вашем сайте новое бронирование экскурсии.' . PHP_EOL . PHP_EOL .
  'Информация о бронировании:' . PHP_EOL . PHP_EOL .
  'Название экскурсии: ' . $excursion_title . PHP_EOL .
  'Дата: ' . $date . PHP_EOL .
  'Время: ' . $time . PHP_EOL .
  'Общая стоимось: ' . $total_booking_price . PHP_EOL .
  'Билеты: ' . PHP_EOL . $clients_text . PHP_EOL .
  'Информация о пользователе:' . PHP_EOL .
  'Имя пользователя: ' . $username . PHP_EOL .
  'E-mail пользователя: ' . $useremail . PHP_EOL .
  'Телефон пользователя: ' . $usertel . PHP_EOL .
  'Посмотреть информацию о бронировании и подвтердить его вы можете в личном кабинете по ссылке: ' . $booking_link;


  $client_message = 'Здравствуйте!' . PHP_EOL . PHP_EOL .
  'Благодарим вас за бронирование экскурсии на сайте: ' . site_url() . PHP_EOL . PHP_EOL .
  'Информация о бронировании:' . PHP_EOL .
  'Название экскурсии: ' . $excursion_title . PHP_EOL .
  'URL-адрес экскурсии: ' . $excursion_link . PHP_EOL .
  'Дата: ' . $date . PHP_EOL .
  'Время: ' . $time . PHP_EOL .
  'Общая стоимость: ' . $total_booking_price . PHP_EOL .
  'Билеты: ' . PHP_EOL . $clients_text . PHP_EOL .
  'В течение 20 минут по указанным данным с вами свяжется менеджер ' . PHP_EOL .
  'С наилучшими пожеланиями, Деметра Тур!';

  // отправка на почту
  wp_mail( $admin_email, $subject, $admin_message );
  wp_mail( $useremail, $subject, $client_message );

  echo 1;

  die();
}