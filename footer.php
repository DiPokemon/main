    </main>

    <footer class="footer">
        <div class="footer__container _container">
          <div class="footer__body">
            <div class="footer_left-side">
              <div class="footer__logo">
                <div class="logo_img"><?php the_custom_logo() ?></div>
                <div class="logo_text">top land</div>  
              </div>
              <div class="footer__adress">Ростов-на-Дону,<br> ул. Стабильная 9</div>  
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
            
            <div class="footer_right-side">
              <div class="footer__contact footer-contact">
                <div class="footer_tel-list">
                  <div class="footer-contact__title">Контакты:</div>
                  <div class="footer-contact__tel"><p><a class="footer__link" href="tel:+79934536307">+7 993 453-63-07</a></p>
                                                  <p><a class="footer__link" href="tel:+79934556307">+7 993 455-63-07</a></p>
                                                  <p><a class="footer__link" href="tel:+79614236307">+7 961 423-63-07</a></p>
                  </div>
                </div>  
                <div class="footer-contact__email"><a class="footer__link" href="mailto:sales@topland-rnd.ru">sales@topland-rnd.ru</a></div>  
              </div>
            </div>            
          </div>
        </div>
    </footer>   
 </div>

<script src="js/script.js"></script> 
</body>
</html>

<?php wp_footer(); ?>