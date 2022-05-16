<?php
  $sup_title = $section['sup_title'];
  $title     = $section['title'];
  $form      = $section['form'];
?>

<section id="callback" class="callback sect sect-bg container lazy" data-src="#">
  <span class="callback__suptitle sect-suptitle"><?php echo $sup_title ?></span>
  <h2 class="callback__title sect-title"><?php echo $title ?></h2>

  <?php echo do_shortcode('[contact-form-7 id="' . $form->ID . '" title="Callback"]')?>

  <div class="callback__contacts">
    <h3 class="callback__contacts-title">Контакты</h3>

    <ul class="callback__contacts-list">
      <li class="callback__contacts-item">
        <span class="callback__contacts-name icon_address">Адрес</span>
        <span class="callback__contacts-info"><?php echo $address ?></span>
      </li>

      <li class="callback__contacts-item">
        <span class="callback__contacts-name icon_tel">Телефон</span>
        <a href="tel:<?php echo $tel_dry ?>" class="callback__contacts-info callback__contacts-link"><?php echo $tel ?></a>
      </li>

      <li class="callback__contacts-item">
        <span class="callback__contacts-name icon_email">Email</span>
        <a href="mailto:<?php echo $email ?>" class="callback__contacts-info callback__contacts-link"><?php echo $email ?></a>
      </li>
    </ul>

    <ul class="callback__socials socials socials_bg-white">
      <li class="socials__item socials__item_instagram">
        <a href="<?php echo $insta ?>" class="socials__item-link" target="_blank">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7188 14H3.28125C1.47197 14 0 12.528 0 10.7188V3.28125C0 1.47197 1.47197 0 3.28125 0H10.7188C12.528 0 14 1.47197 14 3.28125V10.7188C14 12.528 12.528 14 10.7188 14ZM3.28125 1.09375C2.07506 1.09375 1.09375 2.07506 1.09375 3.28125V10.7188C1.09375 11.9249 2.07506 12.9062 3.28125 12.9062H10.7188C11.9249 12.9062 12.9062 11.9249 12.9062 10.7188V3.28125C12.9062 2.07506 11.9249 1.09375 10.7188 1.09375H3.28125ZM10.8555 2.46094C10.4779 2.46094 10.1719 2.767 10.1719 3.14453C10.1719 3.52207 10.4779 3.82812 10.8555 3.82812C11.233 3.82812 11.5391 3.52207 11.5391 3.14453C11.5391 2.767 11.233 2.46094 10.8555 2.46094ZM7 10.5547C5.03992 10.5547 3.44531 8.96008 3.44531 7C3.64055 2.28421 10.3602 2.28558 10.5547 7.00003C10.5547 8.96008 8.96008 10.5547 7 10.5547ZM7 4.53906C5.64304 4.53906 4.53906 5.64304 4.53906 7C4.67425 10.2648 9.32624 10.2638 9.46094 6.99997C9.46094 5.64304 8.35696 4.53906 7 4.53906Z" fill=""/>
          </svg>
        </a>
      </li>
      <li class="socials__item socials__item_vkontakte">
        <a href="<?php echo $vk ?>" class="socials__item-link" target="_blank">
          <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.6171 4.82318C11.3908 4.52894 11.4555 4.39803 11.6171 4.13501C11.62 4.13201 13.4884 1.47424 13.6809 0.572907L13.6821 0.572307C13.7778 0.243838 13.6821 0.00244141 13.2195 0.00244141H11.6888C11.2992 0.00244141 11.1195 0.20961 11.0233 0.4414C11.0233 0.4414 10.2439 2.36177 9.14142 3.60658C8.78558 3.96628 8.62108 4.08157 8.42683 4.08157C8.33117 4.08157 8.18242 3.96628 8.18242 3.63781V0.572307C8.18242 0.178385 8.07333 0.00244141 7.75075 0.00244141H5.34392C5.0995 0.00244141 4.95425 0.186191 4.95425 0.357331C4.95425 0.730836 5.5055 0.816706 5.56267 1.86756V4.14762C5.56267 4.64723 5.47458 4.73911 5.27917 4.73911C4.75883 4.73911 3.49592 2.81093 2.7475 0.604132C2.59642 0.175983 2.44883 0.00304185 2.05625 0.00304185H0.525C0.0880833 0.00304185 0 0.210211 0 0.442C0 0.851534 0.520333 2.8878 2.41967 5.57799C3.6855 7.41429 5.46817 8.4093 7.08983 8.4093C8.06458 8.4093 8.18358 8.18832 8.18358 7.80821C8.18358 6.05358 8.0955 5.88785 8.58375 5.88785C8.81008 5.88785 9.19975 6.00314 10.1098 6.88886C11.1498 7.93912 11.3208 8.4093 11.9029 8.4093H13.4336C13.8699 8.4093 14.091 8.18832 13.9638 7.75237C13.6728 6.83542 11.7058 4.94928 11.6171 4.82318Z"/>
          </svg>
        </a>
      </li>
      <li class="socials__item socials__item_telegram">
        <a href="<?php echo $telegram ?>" class="socials__item-link" target="_blank">
          <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.49311 7.85566L5.26153 11.113C5.59286 11.113 5.73636 10.9707 5.90844 10.7997L7.46186 9.31516L10.6807 11.6724C11.271 12.0014 11.6869 11.8282 11.8462 11.1293L13.959 1.22899L13.9596 1.22841C14.1469 0.35574 13.644 0.0144904 13.0689 0.228574L0.649693 4.98332C-0.19789 5.31232 -0.185057 5.78482 0.50561 5.99891L3.68069 6.98649L11.0558 2.37174C11.4029 2.14191 11.7184 2.26907 11.4589 2.49891L5.49311 7.85566Z"/>
          </svg>
        </a>
      </li>
    </ul>
  </div>
</section>