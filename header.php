<!DOCTYPE html>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />

<title><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">

<?php wp_head();?>

      <div class="wrapper">
      
      <header class="header">
        <div class="header__container _container">
          <div class="header_wrapper">
              <div class="header__burger">
                <span></span>
              </div>
              <?php
                  $args = array(
                      'container'       => 'nav',          
                      'container_class' => 'header__menu menu',           
                      'menu_class'      => 'menu__list',          
                      'fallback_cb'     => 'wp_page_menu',            
                      'link_class'     => 'menu__link',           
                      'theme_location'  => 'main_menu',
                      'add_li_class'    => 'menu__item'
                  );
                  wp_nav_menu($args);
              ?>
          <div class="header__logo">
              <div class="logo_img"><?php the_custom_logo() ?></div>
              <div class="logo_text">top land</div>  
          </div>
        
            <div class="header__location">
              <div class="header__location_img"><img src="<?php echo get_template_directory_uri()?>/static/img/location.svg" alt="location"/></div>
              <div class="header__location_text">Ростов-на-Дону</div>
            </div>

            <div class="header__hrVert"></div>

            <div class="header__contact">
              <div class="header__contact_telefon"><a href="tel:+79934536307">+7 993 453-63-07</a></div>
              <div class="header__contact_telefon-mob"><a href="tel:+79934536307"><img src="<?php echo get_template_directory_uri()?>/static/img/phone.svg" /></a></div>
              <div class="header_contact_href"><a class="header__link" href="https://wa.me/79934536307">Написать в What’sApp</a></div>
            </div>
            
          </div>
          <hr class="header__hr">
        </div>
      </header>

        <main class="page">