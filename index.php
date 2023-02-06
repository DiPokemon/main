<?php
/*
*Template name: Главная
*/
?>
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
                        };
                        wp_reset_query();
                    ?> 
                  </div>   
                </div> 
              </div>
            </section> 
            
            <section>
              <div class="_container">
                <h3>Компания "TopLand"</h3>
                <p>Занимаемся интернет-маркетингом и продвижением бизнеса в ТОП 10 поисковых систем с 2016 года. </p>
                <p><b>Наши клиенты</b> – это представители  бизнеса, чья география деятельности выходит далеко за пределы Ростова и России в целом.  
                Непрерывно внедряем и развиваем собственные инструменты для повышения эффективности рекламы,продвижения сайтов в разных поисковых системах, обхода конкурентов в ТОП  позиций. 
                </p>
              </div>
            </section>

            <section class="page__choice-block choice"> 
              <div class="background-choice-img"></div>
              <div class="choice-block__container _container">
                <div class="choice-block__body">                
                  <div class="choice-block__text">
                              <!--<div class="test_banner faq_accordion">
                                <input type="checkbox" name="test_banner" id="chacor_test" />
                                <label for="chacor_test">Ключевые слова</label>
                                <div class="acor-body">
                                    <p>Seo специалист</p>
                                    <p>Seo анализ</p>
                                    <p>Отзывы</p>
                                    <p>Рейтинг</p>
                                    <p>Аудит</p>
                                    <p>Продвижение</p>
                                    <p>Гарантии</p>
                                    <p>Решения для бизнеса</p>
                                    <p>ТОП - 10</p>
                                    <p>Интернет - маркетинг </p>
                                    <p>Интернет-магазин</p>
                                    <p>Ключи </p>
                                    <p>Поисковые системы </p>
                                    <p>Маркетплейсы</p>
                                    <p>Разработка</p>
                                    <p>Яндекс</p>
                                    <p>Кейсы </p>
                                    <p>Посещаемость</p>
                                    <p>Google </p>
                                    <p>Раскрутка</p>
                                    <p>Seo </p>
                                    <p>Преимущества </p>
                                    <p>Аналитика </p>
                                    <p>Лиды </p>
                                    <p>KPI</p>
                                    <p>Контекстная реклама</p>
                                    <p>Интернет - реклама </p>
                                    <p>Для бизнес</p>
                                    <p>Трафик </p>
                                    <p>Marketing</p>
                                    <p>Цена продвижения </p>
                                    <p>Ключевые запросы</p>
                                    <p>Прибыль</p>
                                    <p>Конверсия</p>
                                    <p>Оптимизация </p>
                                    <p>Тематики</p>
                                    <p>Карточки товаров</p>
                                    <p>Блог</p>
                                    <p>Лендинг</p>
                                    <p>Продажи</p>
                                    <p>Веб-сайт</p>
                                    <p>Продвижение на картах</p>
                                    <p>Сайт под ключ</p>
                                    <p>Создание сайтов </p>
                                    <p>Техническая поддержка</p>
                                </div>
                              </div>-->
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2 section_title">Почему выбирают<br>нашу компанию</h2></div>   
                    <div class="choice-block__title"><h2 class="_h2 choice-block__title_h2-mobile section_title ">Почему выбирают нашу компанию</h2></div>                 
                    <div class="choice-block__subtitle">Миссия нашего агентства - стремительно продвигать ваш бизнес в гору, брать новые высоты вместе с Вами и находить эффективные решения</div>
                    <div class="choice-block__subtitle">Наша философия - стать надежным партнером для Вас и вашей компании в области интернет-маркетинга</div>
                    <div class="choice-block__subtitle"><strong>Наши ценности</strong></div>
                    <ul class="choice-block__list">
                      <li class="choice-block__el">поддержание долгих партнерских отношений с клиентами</li>
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
            
            <section>
              <div class="_container">
                <div>
                  <h2 class="_h2 section_title">Наши гарантии</h2>
                </div>
                <div class="slider_wrapper">
                  <div class="guarantee_slider">
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-hand-holding-usd"></i></div>
                      <div class="guarantee_text">Оплата за результат</div>
                    </div>                    
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-clipboard-check"></i></div>
                      <div class="guarantee_text">Заключение договора</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-users"></i></div>
                      <div class="guarantee_text">Команда специалистов</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-thumbs-up"></i></div>
                      <div class="guarantee_text">Белые методы продвижения</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-desktop"></i></div>
                      <div class="guarantee_text">Улучшение юзабилити сайта</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-funnel-dollar"></i></div>
                      <div class="guarantee_text">Повышение конверсии сайта</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-route"></i></div>
                      <div class="guarantee_text">Четкая стратегия развития проекта</div>
                    </div>                    
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="far fa-eye"></i></div>
                      <div class="guarantee_text">Прозрачная отчетность</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-shield-alt"></i></div>
                      <div class="guarantee_text">Безопасносность</div>
                    </div>
                    <div class="guarantee_item">
                      <div class="guarantee_icon"><i class="fas fa-handshake"></i></div>
                      <div class="guarantee_text">Индивидуальный подход</div>
                    </div>
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
                                if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url())){
                                  $post_thumbnail_url = get_template_directory_uri().'/static/empty-banner.gif';
                                }
                                    
                                else {
                                  $post_thumbnail_url = get_the_post_thumbnail_url();
                                  $image_id = get_post_thumbnail_id();
                                  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                  $image_title = get_the_title($image_id);
                                }
                                
                        ?>
                            <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                <div class="case_slide_wrapper">
                                  <img loading="lazy" src="<?= $post_thumbnail_url ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
                                  <div class="case_slide_title_wrapper">
                                    <h3 class="case_slide__title"><?php the_title() ?></h3>
                                    <div class="case__excerpt"><?php the_excerpt() ?></div>
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
            
          <section>
            <div class="_container">
              <div>
                <h2 class="_h2 section_title">Наша команда</h2>
              </div>
              <div class="staff_wrapper">
                
                    <div class="staff_item">
                      <h3 class="staff_name">Интернет-маркетолог</h3>
                      <p class="staff_desc">Отвечает за консалтинг и общую стратегию развития проекта.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">Контент-менеджер</h3>
                      <p class="staff_desc">Разрабатывает контент-стратегию в социальных сетях, отвечает за создание и размещение контента.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">SEO-специалист </h3>
                      <p class="staff_desc">Проводит аудит сайта(технический и  информационный), анализирует конкурентов и на основе полученных 
                        данных составляет стратегию продвижения. Работает над поведенческим фактором и ТЗ для ряда специалистов. 
                      </p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">UX-специалист</h3>
                      <p class="staff_desc">Специалист, задача которого сделать продукт удобным, понятным и логичным для всех пользователей.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">UI-специалист</h3>
                      <p class="staff_desc">Занимается наполнением сайта: выбором цветов, построением визуальной композиции, оформлением кнопок и другими графическими элементами. </p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">SMM-специалист</h3>
                      <p class="staff_desc">Продвигает товары и услуги, развивает бренд, отвечает за ведение и наполнение аккаунтов в Одноклассниках, ВКонтакте, Facebook, Instagram и других социальных сетях.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">Таргетолог</h3>
                      <p class="staff_desc">Настраивает и следит за эффективностью рекламных кампаний.</p>
                    </div>                 

                    <div class="staff_item">
                      <h3 class="staff_name">Аккаунт-менеджер</h3>
                      <p class="staff_desc">Отвечает за документооборот, финансы, следит за выполнением всех сроков по проекту</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">SEO-копирайтер</h3>
                      <p class="staff_desc">Написание текстов и подготовка контента по техническому заданию Seo - специалиста. </p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">Веб-мастер</h3>
                      <p class="staff_desc">Проверяет техническую сторону сайта на отсутствие ошибок и соответствие требованиям поисковых систем.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">Аналитик</h3>
                      <p class="staff_desc">Отвечает за качество аналитики, готовит отчеты, настройку интеграций рекламных кабинетов с системами сквозной аналитики.</p>
                    </div> 

                    <div class="staff_item">
                      <h3 class="staff_name">Программист/разработчик</h3>
                      <p class="staff_desc">Вносит изменения в HTML код согласно техническому заданию от SEO специалиста.</p>
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

            <section>
              <div class="_container">
                <div>
                  <h2 class="_h2 section_title">Этапы работы</h2>
                </div>
                <div class="accordion">

                  <input type="checkbox" name="chacor" id="step_1" />
                  <label for="step_1">Анализ сайта и погружение в бизнес клиента</label>
                  <div class="acor-body">
                    <p>Опираясь на десятки параметров оцениваем Ваш сайт. Учитываем такие аспекты как</p>
                    <ul>
                      <li>Техническое состояние;</li>
                      <li>Аналитические данные;</li>
                      <li>Поведенческий фактор.</li>
                    </ul>
                    <p>Анализируем  продукты/услуги Вашего бизнеса, а также  главных конкурентов. На основании собранной 
                      информации формируем план по SEO продвижению и определяем перечень задач, которые предстоит решить.</p>
                  </div>

                  <input type="checkbox" name="chacor" id="step_2" />
                  <label for="step_2">Разработка стратегии продвижения</label>
                  <div class="acor-body">
                    <p>Разрабатываем стратегию продвижения сайта для разных поисковых систем, а также подробное  техническое 
                       задание для копирайтера, контент менеджера, дизайнера, верстальщика и разработчика на основе конкурентного анализа и данных аудита сайта.</p>                    
                  </div>

                  <input type="checkbox" name="chacor" id="step_3" />
                  <label for="step_3">Оптимизация сайта и внедрение ключевых фраз </label>
                  <div class="acor-body">
                    <p>На основе технического задания подготавливаем уникальный  контент  для страниц сайта. 
                      По согласованию вносим  корректировки в структуру ресурса  с целью оптимизации под алгоритмы разных поисковиков.</p>
                    <p>Корректируем  компоновки страниц, дорабатываем  дизайн, внедряем дополнительный  функционал и продающие триггеры 
                      с целью улучшения поведенческого фактора и конверсии страниц и сайта в целом. </p>
                  </div>

                  <input type="checkbox" name="chacor" id="step_4" />
                  <label for="step_4">Постапдейтный аудит</label>
                  <div class="acor-body">
                    <p>После оптимизации сайта проводим  мониторинг позиций в поиске, оцениваем динамику 
                      визитов пользователей. Исследуем показатели эффективности и корректируем  последующий план</p>                    
                  </div>
                </div>
                          
              </div>
            </section>      

            <section>
              <div class="_container">
                <div class="tariffs_tabs__title">
                  <h2 class="_h2 section_title">Тарифы</h2>
                </div>
                <div class="tabs">                  
                    <input type="radio" name="tab_btn" id="tab_btn_1" value="" checked>
                    <label for="tab_btn_1">Разработка</label>
                    <input type="radio" name="tab_btn" id="tab_btn_2" value="">
                    <label for="tab_btn_2">SEO</label>
                    <input type="radio" name="tab_btn" id="tab_btn_3" value="">
                    <label for="tab_btn_3">Контекстная реклама</label>
                    <input type="radio" name="tab_btn" id="tab_btn_4" value="">
                    <label for="tab_btn_4">Маркетплейсы</label>                                 
                        
                  <div id="tab_1" class="tabs_block">
                      <div class="tab_header">
                        <div class="tab_title">Разработка под ключ</div>
                        <div class="tab_price">от <span>50 000</span> ₽</div>
                      </div>
                      <div class="tab_body">
                        Разрабатываем индивидуальные сайты с продающим дизайном, интерактивным функционалом под разные бизнес задачи.
                        Основательно прорабатываем каждый из этапов разработки. Особое внимание уделяем стадии тестирования перед сдачей проекта.
                      </div>
                      <div class="tab_footer">
                        <div class="tab_btn">

                        </div>
                      </div>
                  </div>
                  <div id="tab_2" class="tabs_block">
                      <div class="tab_header">
                        <div class="tab_title">SEO</div>
                        <div class="tab_price">от <span>21 000</span> ₽</div>
                      </div>
                      <div class="tab_body">
                        SEO продвижение — эффективный маркетинговый инструмент, который принесет вам новых клиентов при грамотной оптимизации. 
                        Результаты будут видны не сразу, как это происходит в рекламе. SEO — это длительная стратегия, которая и результат приносит 
                        на более долгое время.
                      </div>
                      <div class="tab_footer">
                        <div class="tab_btn">
                      
                        </div>
                      </div>
                  </div>
                  <div id="tab_3" class="tabs_block">
                      <div class="tab_header">
                        <div class="tab_title">Контекстная реклама </div>
                        <div class="tab_price">от <span>25 000</span> ₽ / месяц</div>
                      </div>
                      <div class="tab_body">
                        Контекстная реклама – один из самых эффективных источников трафика на ваш сайт. Размещение рекламы в Яндексе и Google 
                        поможет Вам в разы увеличить продажи, оповестить и завлечь нужный контингент клиентов и выработать позитивное мнение о компании.
                      </div>
                      <div class="tab_footer">
                        <div class="tab_btn">
                      
                        </div>
                      </div>
                  </div>
                  <div id="tab_4" class="tabs_block">
                      <div class="tab_header">
                        <div class="tab_title">Маркетплейсы</div>
                        <div class="tab_price">от <span>25 000</span> ₽</div>
                      </div>
                      <div class="tab_body">
                        Все больше компаний появляются на маркетплейсах для того чтобы вести там свой бизнес, и получать хорошую прибыль. 
                        Но конкуренция везде огромная. Поэтому, необходимо понимать как можно выделиться и результативно продвинуть свой 
                        товар на онлайн-площадке.
                      </div>
                      <div class="tab_footer">
                        <div class="tab_btn">
                      
                        </div>
                      </div>
                  </div>
                </div>  
              </div>
            </section>

            <section class="form_row">
              <div class="_container">
                <div class="page_contacts-form contact_form-row">
                  <?php echo do_shortcode('[contact-form-7 id="1968" title="Контактная форма 1"]'); ?>
                </div>
              </div>              
            </section>

            <section>
              <div class="_container">
                <div>
                  <h2 class="_h2 section_title">Сферы, с которыми мы работаем</h2>
                </div>
                <div class="slider_wrapper">
                  <div class="work_area_slider">

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/fitnes.png" alt=""></div>
                      <div class="work_area_text">Фитнес</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/zastroy.png" alt=""></div>
                      <div class="work_area_text">Застройщики</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/bank.png" alt=""></div>
                      <div class="work_area_text">Банки</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/nedvizh.png" alt=""></div>
                      <div class="work_area_text">Недвижимость</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/turizm_icon.png" alt=""></div>
                      <div class="work_area_text">Туризм</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/uslugi_icon.png" alt=""></div>
                      <div class="work_area_text">Услуги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/int-mag.png" alt=""></div>
                      <div class="work_area_text">Интернет-магазин</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/landing.png" alt=""></div>
                      <div class="work_area_text">Лендинг</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/car.png" alt=""></div>
                      <div class="work_area_text">Автомобили</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/salon_icon.png" alt=""></div>
                      <div class="work_area_text">Салон красоты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/uristi.png" alt=""></div>
                      <div class="work_area_text">Юридические услуги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/furniture.png" alt=""></div>
                      <div class="work_area_text">Мебель</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/med.png" alt=""></div>
                      <div class="work_area_text">Медицина</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/jewelry.png" alt=""></div>
                      <div class="work_area_text">Ювелирные изделия</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/konsalting.png" alt=""></div>
                      <div class="work_area_text">Консалтинг</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/books.png" alt=""></div>
                      <div class="work_area_text">Книги</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/news.png" alt=""></div>
                      <div class="work_area_text">Новости</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/building-company.png" alt=""></div>
                      <div class="work_area_text">Стройматериалы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kosmetika.png" alt=""></div>
                      <div class="work_area_text">Косметика</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/strahovanie.png" alt=""></div>
                      <div class="work_area_text">Страховые компании</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/auto-salon.png" alt=""></div>
                      <div class="work_area_text">Автосалоны</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kafe.png" alt=""></div>
                      <div class="work_area_text">Кафе, рестораны</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/hotel.png" alt=""></div>
                      <div class="work_area_text">Гостиницы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/flower_icon.png" alt=""></div>
                      <div class="work_area_text">Цветы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/supermarket.png" alt=""></div>
                      <div class="work_area_text">Продукты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/logistic.png" alt=""></div>
                      <div class="work_area_text">Транспорт</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/odezhda.png" alt=""></div>
                      <div class="work_area_text">Одежда</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/kompany.png" alt=""></div>
                      <div class="work_area_text">Производства</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/farmer.png" alt=""></div>
                      <div class="work_area_text">Сельхозтехника</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/tipografiya.png" alt=""></div>
                      <div class="work_area_text">Типография</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/apteka.png" alt=""></div>
                      <div class="work_area_text">Аптеки</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/korporativnij.png" alt=""></div>
                      <div class="work_area_text">Корпоративные сайты</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/portals.png" alt=""></div>
                      <div class="work_area_text">Порталы</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/b2b.png" alt=""></div>
                      <div class="work_area_text">E-Commerce</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/stroy.png" alt=""></div>
                      <div class="work_area_text">Строительство</div>
                    </div>

                    <div class="work_area-item">
                      <div class="work_area_icon"><img src="<?php echo get_template_directory_uri()?>/static/img/work_area/stom.png" alt=""></div>
                      <div class="work_area_text">Стоматология</div>
                    </div>
                  </div>
                </div>
              </div>
            </section>            

            <section>
              <div class="_container">
                <div class="reviews-block__title">
                  <h2 class="_h2 section_title">Наши технологии и инструменты</h2>
                </div>
                <div class="slider_wrapper">
                  <div class="techno_slider">
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/wp.png" alt="SEO продвижение сайтов на WordPress"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/bitrix.png" alt="SEO продвижение сайтов на Bitrix"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/ya_webmaster.png" alt="Использование Яндекс Вебмастера"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/elementor.png" alt="Создание сайтов на Elementor"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/pr_cy.png" alt="Использование PR-CY"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/figma.png" alt="Макеты сайтов в Figma"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/topvisor.png" alt="Использование TopVisor"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/g_ads.png" alt="Настройка рекламы в Google Ads"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/modx.png" alt="SEO продвижение сайтов на MODX"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/g_analytics.png" alt="Использование Google Analytics"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/ya_metrika.png" alt="Использование Яндекс Метрики"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/g_search_console.png" alt="Использование Google Search Console"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/ya_direct.png" alt="Настройка Яндекс Директ"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/jivosite.png" alt="Установка и настройка Jivosite"></div>
                    <div class="tecno_item"><img src="<?php echo get_template_directory_uri()?>/static/img/techno/miralinks.png" alt="Использование Miralinks"></div>
                  </div>
                </div>
              </div>
            </section>

            <!-- <section class="page__cases-block cases">
              <div class="cases-block__container _container">
                <div class="cases-block__body">
                  <div class="cases-block__title">
                    <h2 class="_h2 cases-block__title_h2 section_title">SEO кейсы 2</h2>
                  </div>
                  <div class="slider_wrapper">
                      <div class="cases_slider">
                        <?php $length_cases_2 = 0 ?>
                        <?php                            
                            $args_for_cases_2 = [
                                'posts_per_page' => 9,
                                'category_name'  => 'cases',
                                'offset'         => 0,
                            ];
                            $query_cases_2 = new WP_Query( $args_for_cases_2 );
                            while ($query_cases_2->have_posts()) :
                                $query_cases_2->the_post();
                                $length_cases_2++;
                                if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url())){
                                  $post_thumbnail_url_2 = get_template_directory_uri().'/static/empty-banner.gif';
                                }
                                    
                                else{
                                  $post_thumbnail_url_2 = get_the_post_thumbnail_url();
                                  $image_id_2 = get_post_thumbnail_id();
                                  $image_alt_2 = get_post_meta($image_id_2, '_wp_attachment_image_alt', TRUE);
                                  $image_title_2 = get_the_title($image_id_2);
                                }
                                    
                        ?>
                            <a class="cases-block__slide case_slide" href="<?php the_permalink() ?>">
                                <div class="case_slide_wrapper">
                                  <img loading="lazy" src="<?= $post_thumbnail_url_2 ?>" alt="<?php echo $image_alt_2 ?>" title="<?php echo $image_title_2 ?>">
                                  <div class="case_slide_title_wrapper">
                                    <h3 class="case_slide__title"><?php the_title() ?></h3>
                                    <div class="case__excerpt"><?php the_excerpt() ?></div>
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
            </section> -->

            <section class="page__useful-articles useful-articles">
              <div class="useful-articles__container _container">
                <div class="useful-articles__body">
                  <div class="useful-articles__title">
                    <h2 class="_h2 useful-articles__title_h2 section_title">Полезные статьи</h2>
                  </div>
                  <div class="useful-articles__columns articles">
                    <?php 
                        $length_articles = 0;                     
                        $args_articles = [
                            'posts_per_page' => 3,
                            'category_name'  => 'blog',
                            'offset'         => 0,
                        ];
                        $query_articles = new WP_Query( $args_articles );
                        while ($query_articles->have_posts()) :
                            $query_articles->the_post();
                            $length_articles++;
                            if (is_null(get_the_post_thumbnail_url()) || empty(get_the_post_thumbnail_url())){
                              $post_thumbnail_url_articles = get_template_directory_uri().'/static/empty-banner.gif';
                            }
                                
                            else{
                                $post_thumbnail_url_articles = get_the_post_thumbnail_url();
                                $image_id_articles = get_post_thumbnail_id();
                                $image_alt_articles = get_post_meta($image_id_articles, '_wp_attachment_image_alt', TRUE);
                                $image_title_articles = get_the_title($image_id_articles);
                            }
                                
                    ?>
                        <a class="articles__item" href="<?php the_permalink() ?>">
                            <div class="articles__img"><img src="<?= $post_thumbnail_url_articles ?>" alt="<?php echo $image_alt_articles ?>" title="<?php echo $image_title_articles ?>"></div>
                            <div class="articles__title"><h3 class="articles__title_h3"><?php the_title() ?></h3></div>
                            <?php if (get_the_tag_list()) : ?>
                              <div class="articles__tags">                            
                                <?php
                                    $tags_articles = get_the_terms( $post->ID, 'post_tag'); 
                                    foreach ($tags_articles as $tag) {
                                      echo $tag->name.' '; 
                                    }
                                ?>                            
                              </div>
                            <?php endif; ?>
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
                          <input type="checkbox" name="chacor" id="chacor9" />
                          <label for="chacor9">Какие работы вы проводите на проекте?</label>
                          <div class="acor-body">
                              <p>Команда наших специалистов вносит изменения в контент и функционал сайта. 
                                Все предварительно согласовывается с клиентом. Мы оптимизируем существующий контент 
                                и добавляем новый в соответствии с требованиями поисковых систем, при необходимости 
                                можем менять функционал и структуру посадочных страниц.</p>
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

            <section id="reviews" class="page__reviews-block reviews">
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

            <section>
              <div class="_container">
                <div class="spotlight_wrap">
                  <!-- <svg x="0px" y="0px" width="600px" height="300px" viewBox="0 0 600 300">
                    <mask id="mask">     
                      <rect width="100%" height="100%" x="0" y="0" fill="white" opacity="0.8" />
                        <g transform="translate(0, 0)">                      
                          <circle cx="30" cy="30" r="20" />                    
                        </g>
                    </mask>
                  </svg> -->
                  <div class="spotlight_text">
                    <span class="spotlight_key">Seo специалист</span>
                    <span class="spotlight_key">Seo анализ</span>
                    <span class="spotlight_key">Отзывы</span>
                    <span class="spotlight_key">Рейтинг</span>
                    <span class="spotlight_key">Аудит</span>
                    <span class="spotlight_key">Раскрутка сайта</span>
                    <span class="spotlight_key">Продвижение</span>
                    <span class="spotlight_key">Гарантии</span>
                    <span class="spotlight_key">Решения для бизнеса</span>
                    <span class="spotlight_key">ТОП - 10</span>
                    <span class="spotlight_key">Интернет - маркетинг </span>
                    <span class="spotlight_key">Интернет-магазин</span>
                    <span class="spotlight_key">Ключи</span>
                    <span class="spotlight_key">Поисковые системы</span>
                    <span class="spotlight_key">Маркетплейсы</span>
                    <span class="spotlight_key">Разработка</span>
                    <span class="spotlight_key">Яндекс</span>
                    <span class="spotlight_key">Кейсы</span>
                    <span class="spotlight_key">Посещаемость</span>
                    <span class="spotlight_key">Google</span>
                    <span class="spotlight_key">Раскрутка</span>
                    <span class="spotlight_key">Seo</span>
                    <span class="spotlight_key">Преимущества </span>
                    <span class="spotlight_key">Аналитика</span>
                    <span class="spotlight_key">Лиды</span>
                    <span class="spotlight_key">KPI</span>
                    <span class="spotlight_key">Контекстная реклама</span>
                    <span class="spotlight_key">Интернет - реклама </span>
                    <span class="spotlight_key">Для бизнеса</span>
                    <span class="spotlight_key">Трафик</span>
                    <span class="spotlight_key">Marketing</span>
                    <span class="spotlight_key">Цена продвижения</span>
                    <span class="spotlight_key">Ключевые запросы</span>
                    <span class="spotlight_key">Прибыль</span>
                    <span class="spotlight_key">Конверсия</span>
                    <span class="spotlight_key">Оптимизация</span>
                    <span class="spotlight_key">Тематики</span>
                    <span class="spotlight_key">Карточки товаров</span>
                    <span class="spotlight_key">Блог</span>
                    <span class="spotlight_key">Лендинг</span>
                    <span class="spotlight_key">Продажи</span>
                    <span class="spotlight_key">Веб-сайт</span>
                    <span class="spotlight_key">Продвижение на картах</span>
                    <span class="spotlight_key">Сайт под ключ</span>
                    <span class="spotlight_key">Создание сайтов</span>
                    <span class="spotlight_key">Техническая поддержка</span>
                  </div>
                  
                  <img id="redux" src="<?php echo get_template_directory_uri()?>/static/img/spotlight_bg.jpg" alt="">
                  
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

<?php get_footer(); ?>