<?php get_header(); ?>
            <section class="page__main-block main">
            <div class="background-main1"></div>            
              <div class="main-block__container _container">
                    <div class="main-block__body">                    
                    <div class="background-main2"></div>
                    <div class="background-main3"></div>
                        <div class="main-content">
                          <div class="main-content_wrapper">
                            <h1 class="main-title">Создание сайтов и SEO продвижение</h1>    
                            <div class="main-subtitle">
                              <div class="main-subtitle__item"><span><img src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span> Техническая поддержка</div>
                              
                              <div class="main-subtitle__item"><span><img src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span> Копирайт</div>
                              
                              <div class="main-subtitle__item"><span><img src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span> Контекстная реклама</div>
                            </div>
                            <a href="#" class="btn main-button_href" >Задайте вопрос в What’sApp</a>
                          </div>
                        </div>

                        <div class="main-image">
                          <div class="main-image_grid">
                            <div class="main-image__el">
                              <div class="main-image__text_title">+70%</div>
                              <div class="main-image__text_subtitle">Выводим сайты клиентов в топ-10</div>
                            </div>                            
                            <div class="main-image__el">
                              <img src="<?php echo get_template_directory_uri()?>/static/img/img2.png" alt="img">
                            </div>
                            <div class="main-image__el">
                              <img src="<?php echo get_template_directory_uri()?>/static/img/img3.png" alt="img">
                            </div>
                            <div class="main-image__el">
                              <img src="<?php echo get_template_directory_uri()?>/static/img/img4.png" alt="img">
                            </div>
                          </div>  
                        </div>
                    </div>
              </div>

              <div class="main-background">
                <div class="_container">

                  <div class="main-3columns">
                    <div class="main-3columns__item">
                        <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="img"></div>
                        <div class="main-3colums__item_text">Повышаем продажи<br> партнерских товаров<br> и услуг в среднем в 3 раза</div>
                    </div>
                    <div class="main-3columns__item">
                        <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="img"></div>
                        <div class="main-3colums__item_text">7 лет работаем<br> в интернет-маркетинге</div>
                    </div>
                    <div class="main-3columns__item">
                        <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Stairs 1.svg" alt="img"></div>
                        <div class="main-3colums__item_text">Продвигаем сайты с технически<br> сложными тематиками</div>
                    </div>                  
                  </div>

                  <div class="main-3columns_mobile slider_wrapper">
                    <div class="main-slider">
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="img"></div>
                          <div class="main-3colums__item_text">Повышаем продажи партнерских товаров и услуг в среднем в 3 раза</div>
                      </div>
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="img"></div>
                          <div class="main-3colums__item_text">7 лет работаем в интернет-маркетинге</div>
                      </div>
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Stairs 1.svg" alt="img"></div>
                          <div class="main-3colums__item_text">Продвигаем сайты с технически сложными тематиками</div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>  
            </section>            

            <section class="page__services-block services">
              <div class="services-block__container _container">
                <div class="services-block__body">
                  <h2 class="_h2 services-block__title_h2 section_title"> Наши услуги</h2>
                  <div class="services-block__columns">
                    <?php
                      $args = array(              
                          'taxonomy'      => 'category',            
                          'orderby'       => 'name',
                          'order'         => 'ASC',
                          'hide_empty'    => true,
                          'parent'        => '3',                        
                          'update_term_meta_cache' => true, // подгружать метаданные в кэш
                        );
                      $term_query = new WP_Term_Query( $args );
                        foreach( $term_query->get_terms() as $term ){                            
                          ?>                           
                          <a class="services-block__item" href="/<?php echo $term->taxonomy?>/<?php echo $term->slug?>">
                            <div class="services-block__text"><?php echo $term->name?></div>
                            <div class="services-block__img"><img src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="img"></div>
                          </a>
                          <?php                          
                        }
                    ?> 
                  </div>   
                </div> 
              </div>
            </section> 
            
            <section class="page__choice-block choice">  
              <!-- <div class="background-choice"></div>             -->
              <div class="background-choice-img"></div>
              <div class="choice-block__container _container">
                <div class="choice-block__body">                
                  <div class="choice-block__text">
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2 section_title">Почему выбирают<br>нашу компанию</h2></div>   
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2-mobile section_title ">Почему выбирают нашу компанию</h2></div>                 
                    <div class="choice-block__subtitle">Миссия нашей компании-это дать сильный старт Вашему бизнесу<br>и сохранить занимаемые за вами позиции.</div>
                    <ul class="choice-block__list">
                      <li class="choice-block__el">По показателю SEO выводим клиентов на 70-90% в ТОП-10.</li>
                      <li class="choice-block__el">Способствуем расширению сферы деятельности партнеров, благодаря правильной маркетинговой стратегии.</li>
                      <li class="choice-block__el">Выводим Landing-page в ТОП-3 и улучшаем конверсионные показатели до 240%.</li>
                      <li class="choice-block__el">Повышаем продажи партнерских товаров и услуг в среднем в 3 раза.</li>  
                    </ul>
                    <div class="choice-block__button"><a class="choice-block__href" href="#">О компании</a></div>
                  </div>
                  <div class="choice-block__img">
                    <img src="<?php echo get_template_directory_uri()?>/static/img/unsplash_DUmFLtMeAbQ.jpg" alt="img">
                  </div>
                </div>
              </div>
            </section>    

            <section class="page__cases-block cases">
              <div class="cases-block__container _container">
                <div class="cases-block__body">
                  <div class="cases-block__title">
                    <h2 class="_h2 cases-block__title_h2 section_title">Свежие кейсы студии</h2>
                  </div>

                  <div class="slider_wrapper">

                      <div class="cases_slider">

                        <?php $length_cases = 0 ?>
                        <?php
                            // Взять первые 3 новости для горизонтальной ленты
                            $args_for_cases = [
                                'posts_per_page' => 9,
                                'category_name'  => 'cases',
                                'offset'         => 0,
                            ];

                            $query_cases = new WP_Query( $args_for_cases );

                            while ($query_cases->have_posts()) :
                                $query_cases->the_post();
                                $length_cases++;

                                if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url()))
                                    $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                                else
                                    $post_thumbnail_url = get_the_post_thumbnail_url();

                        ?>
                            <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                <div class="case_slide_wrapper">
                                  <img src="<?= $post_thumbnail_url ?>" alt="<?php the_title() ?>">
                                  <div class="case_slide_title_wrapper">
                                    <h3 class="case_slide__title"><?php the_title() ?></h3>
                                  </div>                                
                                </div>                              
                            </a>

                        <?php endwhile; wp_reset_query(); ?>  

                      </div>
                      <div class="slider-controls">
                        <button type="button" class="slide-m-prev"></button>
                        <div class="slide-m-dots"></div>
                        <button type="button" class="slide-m-next"></button>
                      </div>
                  </div>

                </div>
              </div>
            </section>
            
            <section class="page__reviews-block reviews">
              <div class="reviews_gradient_bg-img"></div>
              <div class="reviews-block__container _container">                
                <div class="reviews-block__body">                
                <div class="triple_stars revies_triple_stars"><img class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                  <div class="reviews-block__title">
                    <h2 class="_h2 reviews-block__title_h2 section_title">Отзывы клиентов</h2>
                  </div>
                  <div class="main_block__wrapper">
                    <div class="slider_wrapper">
                      <div class="reviews_slider">
                        <div class="reviews-block__slide reviews-slide">
                          <div class="reviews-slide__text1">Работаем с компанией Topland 1,5 года. 
                            Хочу отметить оперативность в решении всех поставленных задач, инициативу и 
                            грамотную работу специалистов. Рассчитываю на дальнейшее плодотворное сотрудничество.</div>
                          <div class="reviews-slide__text2">Вячеслав Шарыпкин1111</div>
                          <div class="reviews-slide__text3">Директор Trax.su</div>
                        </div>
                        <div class="reviews-block__slide reviews-slide">
                          <div class="reviews-slide__text1">Работаем с компанией Topland 1,5 года.
                            Хочу отметить оперативность в решении всех поставленных задач, инициативу и 
                            грамотную работу специалистов. Рассчитываю на дальнейшее плодотворное сотрудничество.</div>
                          <div class="reviews-slide__text2">Вячеслав Шарыпкин222</div>
                          <div class="reviews-slide__text3">Директор Trax.su</div>
                        </div>
                      </div>
                      <div class="slider-controls">
                        <button type="button" class="reviews_slide-m-prev slide-m-prev"></button>
                        <div class="reviews_slide-m-dots slide-m-dots"></div>
                        <button type="button" class="reviews_slide-m-next slide-m-next"></button>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </section>
            
            <section class="page__service-selection service-selection">
              <div class="service-selection__container _container">
                <div class="service-selection__body">
                  <div class="service-selection__lightning_small"><img src="<?php echo get_template_directory_uri()?>/static/img/lightning_small.svg" alt="img"></div>
                  <div class="service-selection__lightning_big"><img src="<?php echo get_template_directory_uri()?>/static/img/lightning_big.svg" alt="img"></div>
                  <div class="service-selection__title">
                    <h2 class="_h2 service-selection__title_h2 section_title">Не знаете какую услугу выбрать?</h2>
                  </div>
                  <div class="service-selection__subtitle toplend">Напишите нам. Мы подскажем какая услуга принесет вашей компании больше прибыли</div>
                  <div class="service-selection__button">
                    <a class="service-selection__href" href="#">Написать в What’sApp</a>
                  </div>
                </div>
              </div>
            </section>
            
            <section class="page__useful-articles useful-articles">
              <div class="useful-articles__container _container">
                <div class="useful-articles__body">
                  <div class="useful-articles__title">
                    <h2 class="_h2 useful-articles__title_h2 section_title">Полезные статьи</h2>
                  </div>
                  <div class="useful-articles__columns articles">
                    <?php $length = 0 ?>
                    <?php
                        // Взять первые 3 новости для горизонтальной ленты
                        $args_for_horz_news = [
                            'posts_per_page' => 3,
                            'category_name'  => 'blog',
                            'offset'         => 0,
                        ];

                        $query = new WP_Query( $args_for_horz_news );

                        while ($query->have_posts()) :
                            $query->the_post();
                            $length++;

                            if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url()))
                                $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                            else
                                $post_thumbnail_url = get_the_post_thumbnail_url();

                    ?>
                        <a class="articles__item" href="<?php the_permalink() ?>">
                            <div class="articles__img"><img src="<?= $post_thumbnail_url ?>" title="<?php the_title() ?>" alt="img"></div>
                            <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
                            <div class="articles__text"><?php the_excerpt() ?></div>
                        </a>
                    <?php
                        endwhile;

                        // Аннулирует данные последнего запроса, созданного для использования в произвольном Цикле WordPress.
                        // (Функция должна вызываться сразу после произвольного цикла).
                        wp_reset_query();
                    ?>  
                  </div>
                  <div class="useful-articles__button"><a class="useful-articles__href" href="/blog">Все статьи</a></div>
                </div>
              </div>
            </section>
            
            <section class="page__question question">
              <div class="question__container _container">
                <div class="question__body">
                  <div class="question-triple_stars_left"><img class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                  <div class="question-triple_stars_right"><img class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                  <div class="question__title">
                    <h2 class="_h2 question__title_h2 section_title">Вопрос/Ответ</h2>
                  </div>
                  <div class="main_block__wrapper">
                    <div class="accordion faq_accordion" id="faq_accordion">
                      
                    
                    <div class="accordion__item close">
                        <div class="accordion__item_header">
                        Чем ваша компания лучше других? <span>+</span>
                        </div>
                        <div class="accordion__item_body">
                        Основатели компании изначально были техническими специалистами, 
                        благодаря этому у компании есть четкая идеология работы с проектами. 
                        Мы не обещаем золотых гор, только реальные цифры и факты
                        </div>
                      </div>



                      <div class="accordion__item close">
                        <div class="accordion__item_header">
                        Я знаю более раскрученные компании. Они сделают <br> дешевле. 
                        Зачем мне переплачивать? <span>+</span>
                        </div>
                        <div class="accordion__item_body">
                        Чего Вы хотите? За что Вы готовы платить? За работу или результат? 
                        Можно взять 10 000 рублей за работу, которая стоит 30 000.
                         Заплатив 10 000 – Вы их просто выкинете. 
                         Заплатив 30 000 – Вы отдадите их за конкретные цели и результаты. Так что нужно Вам?
                        </div>
                      </div>

                      <div class="accordion__item close">
                        <div class="accordion__item_header">
                        Почему так мало кейсов, которые можете показать? <span>+</span>
                        </div>
                        <div class="accordion__item_body">
                        Основатели компании длительное время работали в найме, затем на фрилансе, 
                        затем по подряду с более крупными компаниями. 
                        Именно поэтому большинство проектов относятся к чужим компаниям. 
                        Зато работали над ними именно мы. Мы были внутренним механизмом других компаний. 
                        Так что важнее? Обертка или содержание!?
                        </div>
                      </div>

                      <div class="accordion__item close">
                        <div class="accordion__item_header">
                        Почему мы сами еще не в ТОПе? <span>+</span>
                        </div>
                        <div class="accordion__item_body">
                        Недавно мы начали заниматься своим сайтом. 
                        Так как ранее работали только в субподряде и по сарафанке, 
                        необходимости разработки и продвижения качественного сайта не было. 
                        Да и некогда было. В связи с расширением, появился отдел внутреннего маркетинга, 
                        который в данный момент и занимается данным вопросом.
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </section>
            
<?php get_footer(); ?>