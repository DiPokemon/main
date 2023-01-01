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
                    <p><a itemprop="telephone" class="footer__link" href="tel:+79614236307">+7 961 423 63 07</a></p>        
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
          
          <div class="cities">
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
          </div>
        </div>
    </footer>   

 </div>

</body>
</html>

<?php wp_footer(); ?>