      <?php
        global
          $site_url,
          $address,
          $tel,
          $tel_dry,
          $email,
          $insta,
          $vk,
          $telegram,
          $template_directory_uri;
      ?>
      <footer class="ftr container sect-bg">
        <div class="ftr__top">
          <a href="<?php echo $site_url ?>" class="ftr__logo">
            <img src="#" alt="logo" data-src="<?php echo $template_directory_uri . '/img/ftr-logo.svg'?>" class="ftr__logo-img lazy">
          </a>
          <?php wp_nav_menu( [
              'theme_location'  => 'footer_menu',
              'container'       => 'nav',
              'container_class' => 'ftr__nav',
              'menu_class'      => 'ftr__nav-list',
              'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
            ] )
          ?>
        </div>

        <ul class="ftr__socials socials socials_bg-white lazy" data-src="#">
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

        <div class="ftr__contacts">
          <a href="tel:<?php echo $tel_dry?>" class="ftr__contacts-item"><?php echo $tel ?></a>
          <span class="ftr__contacts-item"><?php echo $address ?></span>
          <a href="mailto:<?php echo $email ?>" class="ftr__contacts-item"><?php echo $email ?></a>
        </div>

        <div class="ftr__rights">
          <span class="ftr__rights-copy">© Деметра Тур <?php echo date('Y') ?></span>
          <a href="#" class="ftr__rights-policy" target="_blank">Политика конфиденциальности</a>
        </div>

        <div class="ftr__dev">
          <span>Разработка сайта</span>
          <a href="https://media-bay.ru/" class="ftr__dev-link" target="_blank" title="Перейти на сайт разработчика">
            <svg class="ftr__dev-logo" width="84" height="16" viewBox="0 0 84 16" xmlns="http://www.w3.org/2000/svg" fill="none"><path class="ftr__dev-logo-line" d="M83.056 10.352h-48.135v2.824h48.135v-2.824z" fill="#FD8694"></path><path d="M12.233 12.235h-1.818v-4.36c0-.838-.12-1.445-.361-1.82-.235-.375-.634-.563-1.199-.563-.475 0-.88.237-1.214.712-.329.473-.494 1.042-.494 1.704v4.328h-1.826v-4.508c0-1.489-.529-2.234-1.583-2.234-.491 0-.897.224-1.215.672-.313.448-.47 1.029-.47 1.742v4.329h-1.817v-8h1.819v1.266h.031c.58-.969 1.422-1.454 2.53-1.454.553 0 1.036.153 1.449.461.418.301.702.7.854 1.195.595-1.105 1.484-1.656 2.663-1.656 1.765 0 2.648 1.086 2.648 3.257v4.931zm10.293-3.508h-5.468c.021.74.248 1.31.681 1.711.439.401 1.039.601 1.803.601.856 0 1.642-.255 2.358-.766v1.462c-.732.458-1.698.687-2.899.687-1.18 0-2.107-.362-2.78-1.086-.669-.728-1.003-1.752-1.003-3.07 0-1.244.368-2.258 1.104-3.039.742-.786 1.661-1.179 2.758-1.179 1.098 0 1.946.351 2.546 1.054.601.703.901 1.68.901 2.93v.696zm-1.755-1.281c-.005-.651-.159-1.157-.463-1.515-.302-.365-.72-.548-1.252-.548-.523 0-.966.19-1.333.57-.36.38-.582.878-.665 1.493h3.713zm12.064 4.789h-1.817v-1.359h-.032c-.585 1.031-1.486 1.546-2.702 1.546-.987 0-1.779-.357-2.375-1.07-.59-.719-.885-1.695-.885-2.93 0-1.322.327-2.383.98-3.179.658-.797 1.533-1.195 2.624-1.195 1.082 0 1.869.433 2.36 1.297h.03v-4.953h1.818v11.844zm-1.793-3.657v-1.047c0-.568-.186-1.049-.557-1.446-.371-.395-.844-.593-1.418-.593-.68 0-1.215.252-1.606.758-.387.504-.579 1.205-.579 2.102 0 .812.185 1.455.557 1.929.376.469.879.703 1.511.703.622 0 1.126-.226 1.512-.68.387-.458.579-1.034.579-1.727h.001zm6.368-6.024c-.298 0-.554-.096-.768-.289-.207-.187-.321-.456-.313-.734 0-.296.104-.544.313-.743.214-.198.47-.296.768-.296.308 0 .569.099.783.296.214.198.321.446.321.743 0 .281-.107.523-.321.727-.214.198-.476.296-.783.296zm.899 9.68h-1.817v-8h1.817v8zm9.825 0h-1.763v-1.25h-.031c-.553.958-1.366 1.437-2.436 1.437-.789 0-1.408-.214-1.857-.64-.444-.427-.665-.993-.665-1.696 0-1.511.872-2.391 2.616-2.64l2.382-.336c0-1.141-.544-1.711-1.63-1.711-.956 0-1.818.328-2.586.984v-1.586c.847-.501 1.824-.75 2.931-.75 2.026-.001 3.04.995 3.04 2.983v5.205zm-1.756-3.929l-1.684.234c-.522.068-.916.195-1.183.382-.261.183-.392.505-.392.969 0 .339.12.616.359.836.245.214.572.32.98.32.554 0 1.01-.192 1.371-.578.365-.391.547-.88.547-1.468v-.696.001zm11.532 2.774h-.031v1.156h-1.818v-11.844h1.818v5.25h.031c.622-1.063 1.53-1.593 2.727-1.593 1.013 0 1.805.36 2.374 1.078.575.713.862 1.672.862 2.875 0 1.338-.321 2.411-.964 3.219-.642.802-1.52 1.203-2.632 1.203-1.045 0-1.833-.448-2.366-1.344v.001zm-.047-3.18v.992c0 .584.186 1.079.557 1.484.376.407.851.61 1.425.61.674 0 1.202-.261 1.583-.781.387-.527.58-1.258.58-2.196 0-.786-.179-1.4-.54-1.844-.356-.448-.839-.672-1.45-.672-.648 0-1.17.23-1.567.687-.392.459-.588 1.032-.588 1.72zm15.119 4.336h-1.763v-1.25h-.031c-.554.958-1.367 1.437-2.437 1.437-.788 0-1.407-.214-1.856-.64-.444-.427-.666-.993-.666-1.696 0-1.511.872-2.391 2.617-2.64l2.381-.336c0-1.141-.543-1.711-1.629-1.711-.956 0-1.818.328-2.586.984v-1.586c.847-.501 1.823-.75 2.93-.75 2.026 0 3.039.995 3.039 2.984v5.204h.001zm-1.755-3.929l-1.684.234c-.523.068-.917.195-1.184.382-.261.183-.392.505-.392.969 0 .339.12.616.361.836.245.214.572.32.979.32.554 0 1.011-.192 1.371-.578.365-.391.548-.88.548-1.468v-.696.001zm12.213-4.071l-3.62 9.281c-.752 1.657-1.808 2.485-3.166 2.485-.381 0-.699-.034-.956-.102v-1.508c.288.094.549.141.783.141.68 0 1.186-.334 1.52-1.001l.541-1.313-3.189-7.984h2.014l1.911 5.813.142.578h.038l.142-.563 2.006-5.828h1.834z" fill="#fff"></path></svg>
          </a>
        </div>

      </footer>
      <div id="fake-scrollbar"></div> <?php
      wp_footer() ?>
    </div>
  </body>
</html>