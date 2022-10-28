<!DOCTYPE html>
<html lang="ru">
<head itemscope itemtype="http://schema.org/WPHeader">
  <!-- <base href="https://topland-rnd.ru"> -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
  <!-- <title itemprop="headline"><?php bloginfo('name'); ?></title>
  <meta itemprop="description"name="description" content="<?php bloginfo('description'); ?>"> -->
  <?php wp_head();?>
</head>
<body>
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
              'add_li_class'    => 'menu__item',
              'container_atts'  => array(
                'role'      => 'navigation',
                'itemscope' => 'itemscope',
                'itemtype'  => 'http://schema.org/SiteNavigationElement',
              ),     
              'items_wrap'  => 'itemprop="about" itemscope="" itemtype="http://schema.org/ItemList"'               
            );
            wp_nav_menu($args);
          ?>
          <div class="header__logo">
            <div class="logo_img"><?php the_custom_logo() ?></div>
            <div class="logo_text">top land</div>  
          </div>
          <div class="header__location">
            <div class="header__location_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/location.svg" alt="location"/></div>
            <div class="header__location_text">Ростов-на-Дону</div>
          </div>
          <div class="header__hrVert"></div>
          <div class="header__contact">
            <div class="header__contact_telefon"><a href="tel:+79934536307">+7 993 453-63-07</a></div>
            <div class="header__contact_telefon-mob"><a href="tel:+79934536307"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/phone.svg" /></a></div>
            <div class="header_contact_href"><a class="header__link" href="https://wa.me/79934536307">Написать в What’sApp</a></div>
          </div>
            
        </div>
        <hr class="header__hr">
      </div>
    </header>
  </div>
<main class="page">