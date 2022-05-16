<?php
 $age_list = $fields['age_prices'][0];
?>

<section id="excursion-booking" class="excursion-booking sect container">
  <div class="form-wrapper bg-light-blue">
    <h2 class="sect-title">Забронировать экскурсию</h2>

    <form id="booking-form" action="<?php echo $site_url ?>/wp-admin/admin-ajax.php" class="booking-form">

      <div class="booking-form__inner">
        <label for="input-date" class="field field__date"> <?php
          // $days_en объявляется в excursion-programm
          // $days_ru объявляется в excursion-programm
          // $is_all_days объявляется в excursion-programm
          // $available_days объявляется в excursion-programm

          if ( $available_days ) {
            $data_days = ' data-days="' . implode( ' ', $available_days ) . '"';
          } else {
            $data_days = '';
          }

          // var_dump( $data_days )
        ?>
          <span class="field__text">Дата</span>
          <input type="text" name="date" class="field__inp field__inp-date"<?php echo $data_days ?> required autocomplete="off" placeholder="24.12.2021">
          <div id="input-date-calendar"></div>
          <input type="text" name="action" class="cf7-form-field" value="send_booking">
          <input type="text" name="username" class="cf7-form-field">
          <input type="text" name="excursion_id" class="cf7-form-field" value="<?php echo $post->ID ?>">
          <input type="text" name="excursion_title" class="cf7-form-field" value="<?php echo $post->post_title ?>">
          <input type="text" name="excursion_link" class="cf7-form-field" value="<?php echo get_permalink( $post->ID ) ?>">
        </label>

        <label class="field field__select">
          <span class="field__text">Время</span>
          <select id="booking-select" class="tail-select field__inp" name="time" required> <?php
          // $start_time объявляется в excursion-programm
            for ($i = 0; $i < count($start_time); $i++) : ?>
              <option value="<?php echo $start_time[$i]['time'] ?>"<?php echo $i === 0 ? ' selected' : ''?>>
                  <?php echo $start_time[$i]['time'] ?>
              </option>
            <?php endfor ?>
          </select>
        </label>

        <ul class="booking-form__age-list age-list">
          <!-- Adults -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">

              <span class="age-list-item__name">Взрослые</span>
              <span class="age-list-item__price"><?php echo $age_list['adults'] ?></span>

            </div>

            <div class="age-list-item__inner">

              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="adults-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>

          <!-- Pensioners -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">

              <span class="age-list-item__name">Пенсионеры</span>
              <span class="age-list-item__price"><?php echo $age_list['pensioners'] ?></span>

            </div>

            <div class="age-list-item__inner">

              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="pensioners-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>

          <!-- School_kids -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">

              <span class="age-list-item__name">Школьники</span>
              <span class="age-list-item__price"><?php echo $age_list['school_kids'] ?></span>

            </div>

            <div class="age-list-item__inner">

              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="school_kids-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>

          <!-- Students -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">

              <span class="age-list-item__name">Студенты</span>
              <span class="age-list-item__price"><?php echo $age_list['students'] ?></span>

            </div>

            <div class="age-list-item__inner">

              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="students-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>

          <!-- Preschoolers -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">
              <span class="age-list-item__name">Дошкольники</span>
              <span class="age-list-item__price"><?php echo $age_list['preschoolers'] ?></span>
            </div>

            <div class="age-list-item__inner">
              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="preschoolers-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>

          <!-- Foreigners -->
          <li class="booking-form__age-list-item age-list-item">
            <div class="age-list-item__inner">
              <span class="age-list-item__name">Иностранцы</span>
              <span class="age-list-item__price"><?php echo $age_list['foreigners'] ?></span>
            </div>

            <div class="age-list-item__inner">
              <span class="age-list-item__counter">
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-minus">-</button>
                <span class="age-list-item__counter-total">0</span>
                <input type="hidden" name="foreigners-count"></input>
                <button type="button" class="age-list-item__counter-btn age-list-item__counter-plus">+</button>
              </span>

              <span class="age-list-item__total-price">0</span>
            </div>
          </li>
        </ul>

        <div class="booking-form__total">
          <label>
            Итого: <span class="booking-form__total-price">0</span>
            <input type="text" name="total_booking_price" id="total_booking_price" required tabindex="-1">
          </label>
        </div>
      </div>

      <div class="booking-form__inner">
        <label class="field field_name">
          <span class="field__text">Имя</span>
          <input type="text" name="name" class="field__inp" placeholder="Ваше имя" required>
        </label>

        <label class="field field_email">
          <span class="field__text">E-mail</span>
          <input type="email" name="email" class="field__inp" placeholder="E-mail" required>
        </label>

        <label class="field field_tel">
          <span class="field__text">Телефон</span>
          <input type="tel" name="tel" class="field__inp" placeholder="+7 (___)-___-__-__" required>
        </label>

        <label class="check check_tick">
          <input class="check__inp" type="checkbox" name="policy" checked="true" required>
          <span class="check__text">Даю&nbsp;согласие на&nbsp;обработку персональных данных в&nbsp;соответствии с&nbsp;<a href="/policy.pdf" target="_blank" title="Посмотреть политику конфиденциальности" class="check__link">политикой конфиденциальности</a></span>
        </label>

        <button type="submit" class="btn btn-yellow">Отправить заявку</button>

        <span class="booking-form__info">После отправки формы в&nbsp;течение 20&nbsp;минут с&nbsp;вами свяжется менеджер</span>
      </div>
    </form>
  </div>
</section>