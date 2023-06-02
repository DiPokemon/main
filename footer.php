</main>
    <footer itemscope itemtype="http://schema.org/WPFooter" class="footer">
        <div itemscope itemtype="http://schema.org/Organization" class="footer__container _container">
          <div class="footer__body">
            <div class="footer_left-side">
              <div class="footer__logo">
                <div class="logo_img"><?php the_custom_logo() ?></div>
                <div itemprop="name" class="logo_text">TopLand</div>  
              </div>
              <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="footer__adress"><span itemprop="addressLocality">Ростов-на-Дону</span>,<br><span itemprop="streetAddress"> ул. Стабильная</span> 9</div>  
              <div class="footer__contact footer-contact">
                <div class="footer_tel-list">
                  <div class="footer-contact__title">Контакты:</div>
                  <div class="footer-contact__tel">       
                    <p><a itemprop="telephone" class="footer__link" href="tel:+79934481000">+7 993 448 10 00</a></p>                          
                    <p><a itemprop="telephone" class="footer__link" href="tel:+79514976107">+7 951 497 61 07</a></p>                    
                  </div>
                </div>  
                <div class="footer-contact__email"><a itemprop="email" class="footer__link" href="mailto:sales@topland-rnd.ru">sales@topland-rnd.ru</a></div>  
              </div>
            </div>

            <div class="footer__navigation">
              <?php
                    wp_nav_menu( array(
                        'container'       => 'nav',          
                        'container_class' => 'footer__menu menu-footer',           
                        'menu_class'      => 'menu-footer__list',          
                        'fallback_cb'     => 'wp_page_menu',            
                        'link_class'     => 'menu-footer__link',           
                        'theme_location'  => 'footer_menu',
                        'add_li_class'    => 'menu-footer__item'               
                    ) );
                ?>              
            </div>    
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
                'itemscope' => '',
                'itemtype'  => 'http://schema.org/SiteNavigationElement',
              ),     
              'items_wrap'  => '<ul itemprop="about" itemscope="" itemtype="http://schema.org/ItemList" id="%1$s" class="%2$s">%3$s</ul>',
              'echo'          => false,               
            );
            $temp_menu = wp_nav_menu($args);
            // $temp_menu = str_replace('<a', '<a itemprop="url" ', $temp_menu);
            // $temp_menu = str_replace('<li', '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ItemList" ', $temp_menu);
            $temp_menu = str_replace('<ul class="sub-menu"', '<ul class="sub-menu" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ItemList"', $temp_menu);
            preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matchesz);
            foreach($matchesz[0] as $value){
              if(strpos($value, "<span") === false){
                $temp_value = preg_replace("~<a (.*?)>(.*)</a>~", "<a $1><span itemprop='name'>$2</span></a>", $value);

                $temp_menu = str_replace($value, $temp_value, $temp_menu);
              }else{
                $temp_value = str_replace("<span", "<span itemprop='name'", $value);

                $temp_menu = str_replace($value, $temp_value, $temp_menu);
              }
            }
            echo $temp_menu;
          ?>
          
          <!-- <div class="cities">
            <span>Москва</span>
            <span>Сочи</span>
            <span>Новосибирск</span>
            <span>Ростов-на-Дону</span>
            <span>Уфа</span>
            <span>Красноярск</span>
            <span>Волгоград</span>
            <span>Краснодар</span>
            <span>Тюмень</span>
            <span>Тольятти</span>
            <span>Набережные Челны</span>
            <span>Казань</span>
            <span>Воронеж</span>
            <span>Екатеринбург</span>
            <span>Ижевск</span>
            <span>Краснодар</span>
            <span>Нижний Новгород</span>
            <span>Омск</span>
            <span>Пермь</span>
            <span>Самара</span>
            <span>Саратов</span>
            <span>Санкт-Петербург</span>
            <span>Челябинск</span>
          </div> -->
        </div>
    </footer>   

 </div>

</body>
</html>

<?php wp_footer(); ?>