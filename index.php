<?php get_header(); ?>
            <section class="page__main-block main">
              <div class="main-background1-img"></div>
              <div class="main-background2-img"></div>
              <div class="main-background3-img"></div>                        
                <div class="main-block__container _container">
                      <div class="main-block__body"> 
                          <div class="main-content">
                            <div class="main-content_wrapper">
                              <h1 class="main-title">Комплексное SEO продвижение сайтов</h1>    
                              <div class="main_subtext">Эффективные решения для вашего бизнеса</div>
                              <div class="main-subtitle">
                                <div class="main-subtitle__item"><span><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span>SEO продвижение</div>                              
                                <div class="main-subtitle__item"><span><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span>Создание сайтов</div>                              
                                <div class="main-subtitle__item"><span><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Soft Star.svg" alt="img"></span>Решения для бизнеса</div>
                              </div>
                              <a href="https://wa.me/79514976107" class="btn main-button_href" >Задайте вопрос в What’sApp</a>
                            </div>
                          </div>
                          <div class="main-image">
                            <div class="main-image_grid">
                              <div class="main-image__el">
                                <div class="main-image__text_title">Для любой задачи есть решение!</div>
                              </div>                            
                              <div class="main-image__el">
                                <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/img2.png" alt="img">
                              </div>
                              <div class="main-image__el">
                                <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/img3.png" alt="img">
                              </div>
                              <div class="main-image__el">
                                <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/img4.png" alt="img">
                              </div>
                            </div>  
                          </div>
                      </div>
                </div>
                <div class="main-background">
                  <div class="_container">
                    <div class="main-3columns">
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="Повышение продаж"></div>
                          <div class="main-3colums__item_text">SEO продвижение как в Ростове на Дону, так и по всей России</div>
                      </div>
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="Веб студия в Ростове-на-Дону"></div>
                          <div class="main-3colums__item_text">7 лет работаем в интернет-маркетинге</div>
                      </div>
                      <div class="main-3columns__item">
                          <div class="main-3columns__item_img"><img src="<?php echo get_template_directory_uri()?>/static/img/Stairs 1.svg" alt="SEO Продвижение сайтов"></div>
                          <div class="main-3colums__item_text">Продвигаем сайты с технически<br> сложными тематиками</div>
                      </div>                  
                    </div>
                    <div class="main-3columns_mobile slider_wrapper">
                      <div class="main-slider">
                        <div class="main-3columns__item">
                            <div class="main-3columns__item_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="Повышение продаж"></div>
                            <div class="main-3colums__item_text">SEO продвижение как в Ростове на Дону, так и по всей России</div>
                        </div>
                        <div class="main-3columns__item">
                            <div class="main-3columns__item_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Lightning 2.svg" alt="Веб студия в Ростове-на-Дону"></div>
                            <div class="main-3colums__item_text">7 лет работаем в интернет-маркетинге</div>
                        </div>
                        <div class="main-3columns__item">
                            <div class="main-3columns__item_img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Stairs 1.svg" alt="SEO Продвижение сайтов"></div>
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
                  <h2 class="_h2 services-block__title_h2 section_title">Наши услуги</h2>
                  <div class="services-block__columns">
                    <?php
                      $args = array(              
                          'taxonomy'      => 'category',            
                          'orderby'       => 'name',
                          'order'         => 'ASC',
                          'hide_empty'    => true,
                          'parent'        => '59',                        
                          'update_term_meta_cache' => true,
                        );
                      $term_query = new WP_Term_Query( $args );
                        foreach( $term_query->get_terms() as $term ){                            
                          ?>                           
                          <a class="services-block__item" href="/services/<?php echo $term->slug?>">
                            <div class="services-block__text"><?php echo $term->name?></div>
                            <div class="services-block__img"><img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Frame 1.svg" alt="<?php echo $term->name?>"></div>
                          </a>
                          <?php                          
                        }
                    ?> 
                  </div>   
                </div> 
              </div>
            </section> 
            
            <section class="page__choice-block choice"> 
              <div class="background-choice-img"></div>
              <div class="choice-block__container _container">
                <div class="choice-block__body">                
                  <div class="choice-block__text">
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2 section_title">Почему выбирают<br>нашу компанию</h2></div>   
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2-mobile section_title ">Почему выбирают нашу компанию</h2></div>                 
                    <div class="choice-block__subtitle">Миссия нашего агентства - стремительно продвигать ваш бизнес в гору, брать новые высоты вместе с Вами и находить эффективные решения</div>
                    <div class="choice-block__subtitle">Наша философия - стать надежным партнером для Вас и вашей компании в области интернет-маркетинга</div>
                    <div class="choice-block__subtitle"><strong>Наши ценности</strong></div>
                    <ul class="choice-block__list">
                      <li class="choice-block__el">поддержание долгих партнерских  отношений</li>
                      <li class="choice-block__el">комплексный подход к проекту</li>
                      <li class="choice-block__el">прозрачность процесса работы</li>
                      <li class="choice-block__el">помощь в определении задач</li>  
                      <li class="choice-block__el">гарантия безопасности используемых методов</li>  
                    </ul>
                    <div class="choice-block__button"><a class="choice-block__href" href="/about">О компании</a></div>
                  </div>
                  <div class="choice-block__img">
                    <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/unsplash_DUmFLtMeAbQ.jpg" alt="Разработка и СЕО продвижение сайтов в Ростове-на-Дону">
                  </div>
                </div>
              </div>
            </section>    

            <section class="page__cases-block cases">
              <div class="cases-block__container _container">
                <div class="cases-block__body">
                  <div class="cases-block__title">
                    <h2 class="_h2 cases-block__title_h2 section_title">SEO кейсы</h2>
                  </div>
                  <div class="slider_wrapper">
                      <div class="cases_slider">
                        <?php $length_cases = 0 ?>
                        <?php                            
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
                                $image_id = get_post_thumbnail_id();
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                $image_title = get_the_title($image_id);
                        ?>
                            <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                <div class="case_slide_wrapper">
                                  <img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
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
            
            <section class="achievements_section">
              <div class="_container">
                <div class="cases-block__title">
                  <h2 class="_h2 achievements-block__title_h2 section_title">Наши достижения</h2>
                </div>

                <div class="achievements_wrapper">
                  <div class="achievements_left">
                    <ul>
                      <li>С помощью SEO выводим сайты на показатели до 70-90% собранных коммерческих ключевых запросов в ТОП-10</li>
                      <li>Наполняем смыслом маркетинговые стратегии</li>
                      <li>Повышаем продажи с сайтов наших клиентов в 3 раза</li>
                    </ul>
                  </div>
                  <div class="achievements_right">
                    <ul>
                      <li>Постоянно контролируем  качество и сроки выполняемых работ</li>
                      <li>Повышаем  доверие к Вашему бренду</li>
                      <li>Улучшаем  техническое и информационное состояние сайта</li>
                      <li>Работаем с технически сложными тематиками</li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </section>

            <section class="page__reviews-block reviews">
              <div class="reviews_gradient_bg-img"></div>
              <div class="reviews-block__container _container">                
                <div class="reviews-block__body">                
                <div class="triple_stars revies_triple_stars"><img loading="lazy" class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                  <div class="reviews-block__title">
                    <h2 class="_h2 reviews-block__title_h2 section_title">Отзывы клиентов</h2>
                  </div>
                  <div class="main_block__wrapper">
                    <div class="slider_wrapper">
                      <div class="reviews_slider">

                        <?php echo do_shortcode('[topland_reviews]'); ?>

                        <!-- <div itemscope itemtype="https://schema.org/Review" class="reviews-block__slide reviews-slide">
                          <meta itemprop="datePublished" content="2022-07-15"/>
                          <meta itemprop="name" content="Шарыпкин Вячеслав о TopLand">
                          <link itemprop="url" href="https://topland-rnd.ru">
                          <div itemprop="reviewBody" class="reviews-slide__text1">Работаем с компанией Topland 1,5 года. 
                            Хочу отметить оперативность в решении всех поставленных задач, инициативу и 
                            грамотную работу специалистов. Рассчитываю на дальнейшее плодотворное сотрудничество.</div>
                          <div itemprop="author" itemscope itemtype="https://schema.org/Person" class="reviews-slide__text2"><span itemprop="name">Вячеслав</span> <span itemprop="familyName">Шарыпкин</span></div>
                          <div class="reviews-slide__text3">Директор Trax.su</div>

                          <div class="d-none" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Organization">
                              <meta itemprop="name" content="Отзыв о компании TopLand">
                              <meta itemprop="telephone" content="+7 993 453-63-07">
                              <link itemprop="url" href="https://topland-rnd.ru/"/>
                              <meta itemprop="email" content="sales@topland-rnd.ru">
                              <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                  <meta itemprop="addressLocality" content="Ростов">
                                  <meta itemprop="streetAddress" content="Стабильная, 9">
                              </p>
                          </div>
                          <div class="d-none" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                              <meta itemprop="worstRating" content="1">
                              <meta itemprop="ratingValue" content="5">
                              <meta itemprop="bestRating" content="5"/>
                          </div>
                        </div> -->

                        <!-- <div class="reviews-block__slide reviews-slide">
                          <div class="reviews-slide__text1">Работаем с компанией Topland 1,5 года.
                            Хочу отметить оперативность в решении всех поставленных задач, инициативу и 
                            грамотную работу специалистов. Рассчитываю на дальнейшее плодотворное сотрудничество.</div>
                          <div class="reviews-slide__text2">Вячеслав Шарыпкин222</div>
                          <div class="reviews-slide__text3">Директор Trax.su</div>
                        </div> -->

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
                            <div class="service-selection__lightning_left">
                                <img class="lightning_left" loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Light_left.svg" alt="lightning left">
                            </div>
                            <div class="service-selection__content">         
                                <div class="service-selection__title">
                                    <h2 class="_h2 service-selection__title_h2 section_title">Не знаете какую услугу выбрать?</h2>
                                </div>
                                <div class="service-selection__subtitle toplend">Напишите нам. Мы подскажем какая услуга принесет вашей компании больше прибыли</div>
                                <div class="page_contacts-form contact_form-grid">
                                    <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                                </div>
                                <!-- <div class="service-selection__button">
                                    <a class="service-selection__href" href="https://wa.me/79934536307">Написать в What’sApp</a>
                                </div> -->
                            </div>
                            <div class="service-selection__lightning_right">
                                <img loading="lazy" src="<?php echo get_template_directory_uri()?>/static/img/Light_right.svg" alt="lightning right">
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
                            $image_id = get_post_thumbnail_id();
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                            $image_title = get_the_title($image_id);
                    ?>
                        <a class="articles__item" href="<?php the_permalink() ?>">
                            <div class="articles__img"><img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>"></div>
                            <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
                            <div class="articles__text"><?php the_excerpt() ?></div>
                        </a>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>  
                  </div>
                  <div class="useful-articles__button"><a class="useful-articles__href" href="/category/blog">Все статьи</a></div>
                </div>
              </div>
            </section>

            <!-- <?php echo do_shortcode('[topland_cloudtag]'); ?> -->

            <section class="page__question question">
              <div class="question__container _container">
                <div class="question__body">
                  <div class="question-triple_stars_left"><img loading="lazy" class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                  
                  <div class="question-content">
                     <div class="question__title">
                       <h2 class="_h2 question__title_h2 section_title">Вопрос/Ответ</h2>
                     </div>
                     <div class="main_block__wrapper">
                       <div itemscope itemtype="https://schema.org/FAQPage" class="accordion faq_accordion" id="faq_accordion">

                               
    
                          <!-- <input type="checkbox" name="chacor" id="chacor1" checked="checked" />
                          <label for="chacor1">Чем ваша компания лучше других?</label>
                          <div class="acor-body">
                              <p>Основатели компании изначально были техническими специалистами, 
                           благодаря этому у компании есть четкая идеология работы с проектами. 
                           Мы не обещаем золотых гор, только реальные цифры и факты</p>
                          </div>
                          
                          <input type="checkbox" name="chacor" id="chacor2" />
                          <label for="chacor2">Я знаю более раскрученные компании. Они сделают дешевле. Зачем мне переплачивать?</label>
                          <div class="acor-body">
                              <p>Чего Вы хотите? За что Вы готовы платить? За работу или результат? 
                        Можно взять 10 000 рублей за работу, которая стоит 30 000.
                         Заплатив 10 000 – Вы их просто выкинете. 
                         Заплатив 30 000 – Вы отдадите их за конкретные цели и результаты. Так что нужно Вам?</p>
                          </div>
                          
                          <input type="checkbox" name="chacor" id="chacor3" />
                          <label for="chacor3">Почему так мало кейсов, которые можете показать?</label>
                          <div class="acor-body">
                              <p>Основатели компании длительное время работали в найме, затем на фрилансе, 
                        затем по подряду с более крупными компаниями. 
                        Именно поэтому большинство проектов относятся к чужим компаниям. 
                        Зато работали над ними именно мы. Мы были внутренним механизмом других компаний. 
                        Так что важнее? Обертка или содержание!?</p>
                          </div>

                          <input type="checkbox" name="chacor" id="chacor4" />
                          <label for="chacor4">Почему мы сами еще не в ТОПе?</label>
                          <div class="acor-body">
                              <p>Недавно мы начали заниматься своим сайтом. 
                        Так как ранее работали только в субподряде и по сарафанке, 
                        необходимости разработки и продвижения качественного сайта не было. 
                        Да и некогда было. В связи с расширением, появился отдел внутреннего маркетинга, 
                        который в данный момент и занимается данным вопросом.</p>
                          </div> -->
                        
                          <input type="checkbox" name="chacor" id="chacor5" />
                          <label for="chacor5">Что такое SEO?</label>
                          <div class="acor-body">
                              <p>Seo (Search Engine Optimization) —  это совокупность работ, 
                                направленных на внутреннюю и внешнюю  оптимизацию, за счет чего  
                                происходит продвижение  сайта в ТОП-10 поисковой выдачи Яндекс или Google 
                                по целевым запросам пользователей. ТОПом считается первая страница поисковика. 
                                Поднять сайт в ТОП-10 — главная цель Seo-специалистов.</p>
                          </div>

                          <input type="checkbox" name="chacor" id="chacor6" />
                          <label for="chacor6">Когда будет результат от SEO?</label>
                          <div class="acor-body">
                              <p>После проведение работ с сайтом поисковикам нужно время, чтобы его проиндексировать.
                                 Поисковые запросы со временем начинают ранжироваться все выше и выше,
                                  пока не попадут в  ТОП-10 позиций. 
                                  Этот временной интервал всегда разный – в среднем от 2 до 6 месяцев.</p>
                          </div>

                          <input type="checkbox" name="chacor" id="chacor7" />
                          <label for="chacor7">Какие гарантии вы можете  предоставить?</label>
                          <div class="acor-body">
                              <p>С каждым клиентом мы заключаем официальный договор. С помощью Seo  
                                выведем Ваш сайт на показатели  70-90% собранных коммерческих ключевых 
                                запросов в ТОП-10 по Ростову на Дону, а также всей России. Предоставим 
                                подробную отчетность на каждом из этапов проделываемых работ. Вы можете 
                                ознакомится с результаты наших успешных проектов  в разделе кейсы.</p>
                          </div>

                          <input type="checkbox" name="chacor" id="chacor8" />
                          <label for="chacor8">Вы работаете только в Ростове на Дону?</label>
                          <div class="acor-body">
                              <p>Мы предоставляем услуги Seo как в Ростове на Дону, так и по 
                                всей России. Также вы можете заказать раскрутку за рубежом.</p>
                          </div>
                      
                      





                         <!-- <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion__item close">
                           <div class="accordion__item_header">
                           <span itemprop="name">Чем ваша компания лучше других?</span> <img loading="lazy" class="Vector1" src="<?php echo get_template_directory_uri()?>/static/img/Vector1.svg" alt="img">
                           </div>
                           <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="accordion__item_body">
                           <span itemprop="text">Основатели компании изначально были техническими специалистами, 
                           благодаря этому у компании есть четкая идеология работы с проектами. 
                           Мы не обещаем золотых гор, только реальные цифры и факты</span>
                           </div>
                         </div>

                          <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion__item close">
                            <div class="accordion__item_header">
                              <span itemprop="name">Я знаю более раскрученные компании. Они сделают <br> дешевле. 
                                Зачем мне переплачивать?</span> <img loading="lazy" class="Vector1" src="<?php echo get_template_directory_uri()?>/static/img/Vector1.svg" alt="img">
                            </div>
                            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="accordion__item_body">
                                <span itemprop="text">Чего Вы хотите? За что Вы готовы платить? За работу или результат? 
                                Можно взять 10 000 рублей за работу, которая стоит 30 000.
                                Заплатив 10 000 – Вы их просто выкинете. 
                                Заплатив 30 000 – Вы отдадите их за конкретные цели и результаты. Так что нужно Вам?</span>
                            </div>
                          </div>

                      <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion__item close">
                        <div class="accordion__item_header">
                        <span itemprop="name">Почему так мало кейсов, которые можете показать?</span> <img loading="lazy" class="Vector1" src="<?php echo get_template_directory_uri()?>/static/img/Vector1.svg" alt="img">
                        </div>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="accordion__item_body">
                        <span itemprop="text">Основатели компании длительное время работали в найме, затем на фрилансе, 
                        затем по подряду с более крупными компаниями. 
                        Именно поэтому большинство проектов относятся к чужим компаниям. 
                        Зато работали над ними именно мы. Мы были внутренним механизмом других компаний. 
                        Так что важнее? Обертка или содержание!?</span>
                        </div>
                      </div>

                      <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion__item close">
                        <div class="accordion__item_header">
                          <span itemprop="name">Почему мы сами еще не в ТОПе?</span> <img loading="lazy" class="Vector1" src="<?php echo get_template_directory_uri()?>/static/img/Vector1.svg" alt="img">
                        </div>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="accordion__item_body">
                          <span itemprop="text">Недавно мы начали заниматься своим сайтом. 
                          Так как ранее работали только в субподряде и по сарафанке, 
                          необходимости разработки и продвижения качественного сайта не было. 
                          Да и некогда было. В связи с расширением, появился отдел внутреннего маркетинга, 
                          который в данный момент и занимается данным вопросом.</span>
                        </div>
                      </div> -->

                        </div>
                      </div>
                    </div>
                  <div class="question-triple_stars_right"><img loading="lazy" class="triple-stars" src="<?php echo get_template_directory_uri()?>/static/img/triple_stars.svg" alt="img"></div>
                </div>
              </div>
            </section>
<?php get_footer(); ?>