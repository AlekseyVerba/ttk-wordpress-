<?php
/*
Template Name: Главная
*/
get_header('main');
$titlePage = get_the_title();
?>

            <?php 
                $sliders = get_field("slide");
                if ($sliders) {
                    ?>
                    <div class="banner">
                        <div class="container">
                            <div class="banner__inner">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php 
                                
                                            foreach ($sliders as $slide) { ?>
                                                <div class="swiper-slide">
                                                    <div class="banner__content">
                                                        <img src='<?= $slide["slide_img"] ?>' alt="banner">
                                                        <div class="banner__info">
                                                            <h3 class="banner__title">
                                                                <?= $slide["slide_text"] ?>
                                                            </h3>
                                                            <a href="<?= $slide["url_in_button"] ?>" class="button button--slider button--blue">Подробнее</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?} ?>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>

        
            <div class="block">
                <div class="container">
                    <div class="block__inner">


                        <?php 
                            $blocks = get_field('knopki_v_nachale_straniczy');

                            foreach($blocks as $block) {
                 

                                if (!$block['ssylka_na_knopke']) {
                                    ?>
                                        <div data-application class="block__item">
                                            <div class="block__item-img">
                                                <img src="<?= $block['kartinka_knopki'] ?>" alt="icon">
                                            </div>
                                            <h4 class="block__title">
                                                <?= $block['nazvanie_knopki'] ?>
                                            </h4>
                                        </div>
                                    <?php
                                } else {
                                    ?>

                                        <a href="<?= $block['ssylka_na_knopke']?>" class="block__item">
                                            <div class="block__item-img">
                                                <img src="<?= $block['kartinka_knopki'] ?>" alt="icon">
                                            </div>
                                            <h4 class="block__title">
                                                <?= $block['nazvanie_knopki'] ?>
                                            </h4>
                                        </a>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        
            <div class="services">
                <div class="container">
                    <div class="services__inner services__inner--main">


                            <?php 
                                $terms = get_terms('services', "orderby=id&hide_empty=0");
                                // var_dump($terms);
                                foreach($terms as $term) {
                                    // var_dump($term->term_id);
                                    $url = '';
                                    if (get_field('url_category_services', $term)) {
                                        $url = get_field('url_category_services', $term);
                                    } else {
                                        $url = get_term_link($term->term_id);
                                    }
                                        if ($term->term_id !== 14 ) {
                                            ?>
                                                 <a href="<?= $url ?>" class="services__card services__card--main">
                                                    <div class="services__img">
                                                        
                                                        <img src='<?php the_field("img_category_services", $term); ?> ' alt="icon"/>
                                                        
                                                    </div>
                                                    <div class="services__info-wrapper">
                                                        <h4 class="services__title">
                                                            <?= $term->name ?>
                                                        </h4>
                                                        <p class="services__descr">
                                                            <?= $term->description ?>
                                                        </p>
                                                    </div>
                                                    <div style="display: inline-block" class="services__detailed detailed">
                                                        Подробнее
                                                    </div>
                                                </a>
                                            <?php
                                        } else {

                                        }
                                    ?>
                                        

                                    <?php
                                }
                            
                            ?>


                    </div>
                    <div style="width: 100%; text-align: center; margin-top: 5px;"><button data-application
                            class="button button--blue button--zayvka">Подать
                            заявку</button></div>
                </div>
            </div>

            <!-- НАЧАЛО Информера ПЭК -->
            <div style="display: flex">
            <iframe src="https://calc.pecom.ru/iframe/calculator/?address-from=Россия, Москва&intake=1&address-to=Россия, Санкт-Петербург&delivery=1&weight=1&volume=0.01&declared-amount=100&packing-rigid=0&transportation-type=auto&auto-run=1" width="320" height="552" frameborder="0"></iframe>
    <!-- <iframe frameborder="0" width="100%" height="500" src="https://pecom.ru/calc/filial-maps.php"></iframe> -->
            </div>
<!-- КОНЕЦ Информера ПЭК -->
        
            <div class="rate">
                <div class="container">
                    <h1 class="title">Услуги и тарифы</h1>
                    <div class="rate__catalog">
                        <?php 

                            $terms = get_terms('rates');
                            foreach($terms as $i=>$term) {
                                $urlId = get_term_link($term->term_id);
                                if ($i == 0) {
                                    ?>
                                        <a class="rate__catalog-link rate__catalog-link--active " data-url="<?= $urlId ?>" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                    <?php
                                } else {

                                
                                ?>
                                    <a class="rate__catalog-link " data-url="<?= $urlId ?>" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                <?php
                                }
                            }
                    
                        ?>
                    </div>
                    <?php 
                        $terms = get_terms('rates', "hide_empty=0");
                        foreach($terms as $i=>$term) {
                                if ($i == 0) {
                                    ?>
                                        <div class="rate__content rate__content--active" data-mainContent="<?= $i ?>">
                                    <?php
                                } else {
                                    ?>
                                        <div class="rate__content" data-mainContent="<?= $i ?>">
                                    <?php
                                }
                            ?>
                                
                                


                                <?php 
                                    $category = get_terms('services', "orderby=id&hide_empty=0");
                                    foreach ($category as $cat) {
                                        // var_dump($cat);
                                        if ($cat->slug == "subscription" || $cat->slug == "radio") {
                                            
                                            continue;
                                        }
                                        ?>
                                            <div class="rate__content-item rate__content-item--internet">
                                                <label class="rate__label checkbox">
                                                    <?php 
                                                        if ($cat->slug === "internet_and_tv") {
                                                            ?>
                                                                <input type="checkbox" class="rate__checkbox rate__checkbox--internet" data-checkRate checked />
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <input type="checkbox" class="rate__checkbox rate__checkbox--internet" data-checkRate />
                                                            <?php
                                                        }
                                                    ?>
                                                    <span style="display:block" class="rate__checkbox checkbox__text"><?= $cat->name ?></span>
                                                </label>

                                                <div class="rate__content-items">

                                                    <?php

                                                    $query = new WP_Query( [
                                                        'post_type' => 'service',
                                                        'posts_per_page'   => -1, 
                                                        'orderby' => 'date',
                                                        'tax_query' => [
                                                            'relation' => 'AND',
                                                            [
                                                                'taxonomy' => 'services',
                                                                'field'    => 'slug',
                                                                'terms'    => $cat->slug,
                                                            ],
                                                            [
                                                                'taxonomy' => 'rates',
                                                                'field'    => 'slug',
                                                                'terms'    => $term->slug,
                                                            ]
                                                        ]
                                                    ] );


                                                    if ( $query->have_posts() ) {
                                                        while ( $query->have_posts() ) {
                                                            $query->the_post();
                                                            if (get_field("vyvodit_na_glavnoj", $post)[0] == "yes") {
                                                                $styleTwo = "";
                                                                if (get_field("color_card_service", $post)) {
                                                                    $styleTwo = get_field("color_card_service");
                                                                }
                                                            
                                                                // var_dump(get_field("populyarnaya", $post));
                                                                
                                                            
                                                                ?>
                                                                    <!-- <div style="position:relative"> -->
                                                                    
                                                                      <div class="rate__content-card">
                                                                        <div class="rate__content-card-wrapper-main">
                                                                        <?php 
                                                                            if (get_field("populyarnaya", $post)[0]) {
                                                                                ?>
                                                                                    <span class="rate__content-popular">Популярный</span>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    <div class="rate__content-card-header rate__content-card-header--one" style="<?= $styleTwo ?>">
                                                                        <?php 
                                                                            
                                                                            if (get_field("dobavlyat_nazvanie_v_kartochku", $post)[0] !== "no") {
                                                                                ?>
                                                                                    <?= $post->post_title ?>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                    <div class="rate__content-card-body">
                                                                    <?php 
                                                                    $style = "";
                                                                            
                                                                        if (get_field("otstup_dlya_podzagolovka", $post)) {
                                                                            $pad = get_field("otstup_dlya_podzagolovka", $post);
                                                                            $style = "padding: 0 ".$pad."px";
                                                                        }
                                                                        
                                                                    ?>
                                                                        <p class="rate__content-card-info" style="<? echo $style ?>">
                                                                            <?php the_field('subtitle_card_service', $post) ?>
                                                                        </p>
                                                                        <?php 
                                                                            if (get_field("price_card_service", $post)) {
                                                                                ?>
                                                                                    <div class="rate__content-card-price-block">
                                                                                        <h3 class="rate__content-card-price">
                                                                                            <?php the_field('price_card_service', $post) ?> ₽
                                                                                        </h3>
                                                                                        <span class="rate__content-card-subtitle"><?php the_field('period_card_service', $post) ?></span>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <h5 class="rate__content-card-speed"><?php the_field('speed_card_service', $post) ?></h5>
                                                                        <div class='rate__content-card-item-block-info'>
                                                                            <?php the_field('text_card_service', $post) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rate__content-footer">
                                                                        <a href="/constructor/?service-id=<?=$post->ID ?>&category=<?= $term->slug ?>" class="rate__content-card-link">Настроить тариф</a>
                                                                        <button class="button button--blue button--rate-card" data-request>Оставить
                                                                            заявку</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                        <!-- </div> -->
                                                                <?php
                                                            }
                                                            
                                                        
                                                        }
                                                    } else {
                                                        ?>
                                                            <h3 class='rate__error'>В этой категории ничего не нашлось</h3>
                                                        <?php
                                                    }
                                                    // Возвращаем оригинальные данные поста. Сбрасываем $post.
                                                    wp_reset_postdata();

                                                    ?>

                                                </div>
                                            
                                            </div>
                                        <?php
                                    }
                                ?>
                                </div>

                            <?php
                        }
                    
                    ?>
                </div>
            </div>
            <div class="all-rate">
                <div class="container">
                    <div class="all-rate__inner">
                        <div class="all-rate__left">
                            <div class="all-rate__img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/question.svg" alt="question">
                            </div>
                            <h3 class="all-rate__title">
                                Не нашли подходящее предложение?
                            </h3>
                        </div>
                        <a href="/services/" class="button--red button--all-rate">Посмотреть все тарифы</a>
                    </div>
                </div>
            </div>
            <div class="news">
                <div class="container">
                    <h2 class="title">Новости</h2>
                    <div class="news__items">


                        <?php 

                            $args = array(
                                'posts_per_page' => 4,
                                'post_type' => 'news',
                                'orderby' => 'date'
                            );

                            $wp_query = new WP_Query( $args );
                            // $GLOBALS['wp_query'] = $wp_query;
                            // var_dump($query);
                            // Цикл
                            if ( $wp_query->have_posts() ) {
                                while ( $wp_query->have_posts() ) {
                                    $wp_query->the_post();
                                    ?>


                                    <div class="news__item news__item--moreWidth">
                                        <div class="news__header news__header--main">
                                            <?php 
                                                if (get_the_post_thumbnail()) {
                                                    echo get_the_post_thumbnail();
                                                } else {
                                                    ?>
                                                        <img src="<?= bloginfo('template_directory') ?>/assets/images/static/zagluh.svg" style="font-family: 'object-fit: none;'" alt="zagluh"/>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="news__body">
                                            <h6 class="news__data"><?php echo get_the_time('d F Y'); ?></h6>
                                            <h3 class="news__title"><?php the_title(); ?></h3>
                                            <p class="news__descr">
                                                <?php the_excerpt_max_charlength(125) ?>
                                            </p>
                                            <a href="<? the_permalink() ?>" class="detailed detailed--news">
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>


                                    

                                    <?php
                                }
                            } else {
                                // Постов не найдено
                            }
                            // Возвращаем оригинальные данные поста. Сбрасываем $post.
                            wp_reset_postdata();
                            ?>

                           
                    </div>

                    <a href="/news/" class="detailed link__redAll" style="position: relative">
                        Читать все новости
                    </a>
                </div>
            </div>
            <div class="block-question">
                <div class="container">
                    <div class="block-question__inner">
                        <div class="block-question__wrapper">
                            <img class="block-question__img block-question__img--one" src="<?php echo get_template_directory_uri() ?>/assets/images/static/one-tabl.svg"
                                alt="tabl">
                            <img class="block-question__img block-question__img--two" src="<?php echo get_template_directory_uri() ?>/assets/images/static/two-tabl.svg"
                                alt="tabl">
                            <img class="block-question__img block-question__img--three"
                                src="<?php echo get_template_directory_uri() ?>/assets/images/static/three-tabl.svg" alt="tabl">
                            <img class="block-question__img block-question__img--four"
                                src="<?php echo get_template_directory_uri() ?>/assets/images/static/four-tabl.svg" alt="tabl">
                            <img class="block-question__img block-question__img--five"
                                src="<?php echo get_template_directory_uri() ?>/assets/images/static/five-tabl.svg" alt="tabl">
                            <img class="block-question__img block-question__img--six" src="<?php echo get_template_directory_uri() ?>/assets/images/static/six-tabl.svg"
                                alt="tabl">
                            <h3 class="block-question__title">Ответим на любой вопрос!</h3>
                            <form class="block-question__form" action="block_question">
                            <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                            <input type="hidden" name="title" value="Ответим на любой вопрос" />
                                <div class="block-question__form-wrap">
                                    <label class="input-status" data-modal-Inputwrap>
                                        <input type="text" class="block-question__input" name="phone"
                                            placeholder="+7 (___) ___-__-__" />
                                    </label>
                                    <button type="submit" class="button button--red button--block-question-submit">Оставить
                                        заявку</button>
                                    <div class="block-question__wrapper-checkbox">
                                        <div
                                            style="position: relative; display: inline-block; text-align: center; margin: 0 auto;">
                                            <label class="checkbox" data-modal-Inputwrap>
                                                <input type="checkbox" name="checkbox" class="block-question__checkbox" checked />
                                                <span style="display: block"
                                                    class="checkbox__text checkbox__text--block-question-text block-question__text">
                                                    Согласен(на) на
                                                    обработку своих
                                                    персональных
                                                    данных</span>
                                            </label>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
                <div class="footer__inner">
                    <div class="footer__up">
                        <div class="container">
                            <div class="footer__wrap">
                                <a href="#" class="footer__logo">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/footer-logo.png" alt="logo">
                                </a>
                                <a href="#" class="footer__logo footer__logo--mobile">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/footer-logo-mobile.png" alt="logo">
                                </a>
                                <div class="footer__nav-wrapper footer__nav-wrapper--one">
                                    <div class="footer__nav">

                                    <?php
                                        wp_nav_menu([
                                            'container'       => false,
                                            'menu' =>          'Подвал. 1 столб',
                                            'theme_location' 	=> '11', 
                                            'menu_class' 		=> '',
                                            'walker'          => new Primary_Walker_Nav_Menu_Footer(),
                                            'depth'           => 0,
                                        ]) 
                                    ?>

                                        <!-- <li class="footer__item">
                                            <a href="#" class="footer__link">Услуги</a>
                                        </li>
                                        <li class="footer__item">
                                            <a href="#" class="footer__link">Акции</a>
                                        </li>
                                        <li class="footer__item">
                                            <a href="#" class="footer__link">Камеры онлайн</a>
                                        </li>
                                        <li class="footer__item">
                                            <a href="#" class="footer__link">Новости</a>
                                        </li>
                                        <li class="footer__item">
                                            <a href="#" class="footer__link">Справочник абонента</a>
                                        </li> -->
                                    </div>
                                </div>
                                <div class="footer__nav-wrapper footer__nav-wrapper--two">
                                    <div class="footer__nav">
                                        <?php
                                            wp_nav_menu([
                                                'container'       => false,
                                                'menu' =>          'Подвал. 2 столб',
                                                'theme_location' 	=> '11', 
                                                'menu_class' 		=> '',
                                                'walker'          => new Primary_Walker_Nav_Menu_Footer(),
                                                'depth'           => 0,
                                            ]) 
                                        ?>
                                    </div>
                                </div>




                                <form class="search search--one" role="search"  method="get" id="searchform-two" action="<?php echo home_url( '/' ) ?>">
                                    <input type="text" class="search__input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="s" id="footer-mobile">
                                    <button type="submit" class="search__loup search__loup--one">
                                        <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/white-loup.svg" alt="loup"> -->
                                        <svg class="search__loup-img">
                                            <use xlink:href="#white-loup"></use>
                                        </svg>
                                    </button>
                                </form>





                            
                                <div class="footer__nav-wrapper footer__nav-wrapper--three">
                                    <ul class="footer__nav footer__nav-wrapper footer__nav-wrapper--mobile">
                                        <li class="footer__item">
                                            <span class="footer__item__title">Контакты:</span>
                                        </li>
                                        <li class="footer__item footer__item--mail">
                                            <a href="mailto:<? the_field('pochtovyj_adress', 2); ?>" class="footer__link"><? the_field('pochtovyj_adress', 2); ?></a>
                                        </li>
                                        <li class="footer__item footer__item--phone">
                                            <a href="tel:<?= str_replace(' ', '',  get_field('nomer_telefona', 2)) ?>" class="footer__link"><? the_field('nomer_telefona', 2) ?></a>
                                        </li>
                                        <li class="footer__item footer__item--adress">
                                            <address class="footer__link "><? the_field('adres', 2); ?></address>
                                        </li>
                                        <li class="footer__item footer__item--download">
                                            <a href="<? the_field('rekvizity_fajl', 2) ?>" download class="footer__item-link--download">Скачать реквизиты</a>
                                        </li>
                                        <li class="footer__item footer__item--download">
                                            <a href="/privacy-policy/" class="footer__item-link--download">Политика конфиденциальности</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer__info">



                                <div style="text-align: right">
                                <form class="search search--two" role="search"  method="get" id="searchform-mobile-footer" action="<?php echo home_url( '/' ) ?>">
                                        <input type="text" class="search__input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="s" id="footer-n">
                                        <button type="submit" class="search__loup search__loup--two" style="left: 14px">
                                            <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/white-loup.svg" alt="loup"> -->
                                            <svg class="search__loup-img search__loup-img--two">
                                                <use xlink:href="#white-loup"></use>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                          


                                    <div class="social">
                                        <a href="<? the_field('ssylka_na_facebook', 2) ?>" target="_blank" class="social__item">
                                            <svg class="social__item-footer">
                                                <use xlink:href="#facebook"></use>
                                            </svg>
                                        </a>
                                        <a href="<? the_field('ssylka_na_instagram', 2) ?>" target="_blank" class="social__item">
                                            <svg class="social__item-footer">
                                                <use xlink:href="#icon-instagram"></use>
                                            </svg>
                                        </a>
                                        <a href="<?php the_field('ssylka_na_youtube', 2) ?>" target="blanc" class="social__item">
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/youtube-icon.svg" alt="youtube"> -->
                                                <svg class="social__item-footer">
                                                    <use xlink:href="#youtube-icon"></use>
                                                </svg>
                                            </a>
                                        <a href="<?php the_field('ssylka_na_odnoclass', 2) ?>" target="blanc" class="social__item">
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/youtube-icon.svg" alt="youtube"> -->
                                                <svg class="social__item-footer">
                                                    <use xlink:href="#odnoclass"></use>
                                                </svg>
                                            </a>
                                        <a href="<? the_field('ssylka_na_vk', 2) ?>" target="_blank" class="social__item">
                                            <svg class="social__item-footer">
                                                <use xlink:href="#vk-icon"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__down">
                    <div class="footer__down-desc-container">
                        <audio id="radio_player" src="<?php echo get_field("url_radio", 2) ?>"></audio>
                        <!-- <div>
                            <button onclick="document.getElementById('player').play()">Play</button>
                            <button onclick="document.getElementById('player').pause()">Pause</button>
                            <button onclick="document.getElementById('player').volume += 0.1">Vol+ </button>
                            <button onclick="document.getElementById('player').volume -= 0.1">Vol- </button>
                        </div> -->
                        <div class="radio" style="justify-content: space-between"> 
                            <div class="radio__left">
                                <div class="radio__img">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/radio-img.png" alt="radio">
                                </div>
                                <div class="radio__info">
                                    <h5 class="radio__title">Наше радио</h5>
                                    <h6 class="radio__subtitle">Наше радио Москва</h6>
                                </div>
                            </div>
                            <div class="radio__line">
                                <input type="range" min="1" max="100" value="50">
                            </div>
                            <!-- <div class="radio__range">
                                <input type="range" value="0" max="100" />
                            </div> -->
                            <div class="radio__menu">
                                <div class="sound">
                                    <button class="radio__sound" data-sound>
                                        <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/sound.svg" alt="sound"> -->
                                        <svg class="radio__sound-img">
                                            <use xlink:href="#sound"></use>
                                        </svg>
                                    </button>
                                    <div class="sound__wrapper">
                                        <input type="range" min="0" max="100" class="radio__sound-regular">
                                    </div>
                                </div>
                                <button class="radio__play" data-radioBtn>
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/pause.vg" alt="pause"> -->
                                    <svg class="radio__pause-img">
                                        <use xlink:href="#pause"></use>
                                    </svg>
                                </button>
                                <button class="radio__pause radio-btn--active" data-radioBtn>
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/pause.svg" alt="pause"> -->
                                    <svg class="radio__play-img">
                                        <use xlink:href="#play"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="footer__down-mobile-container footer__down-mobile-container--active">
                        <div class="radio-mini">
                            <div class="radio-mini__img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/mini-logo.png" alt="logo">
                            </div>
                            <div class="radio-mini__controls">
                                <span class="radio-mini__info">Сейчас играет</span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/red-player.svg" alt="play">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal" data-modal>
                <div class="modal__dialog">
                    <div class="modal__content" data-content>
                        <p class="modal__close" data-close>&times;</p>
                        <h3 class="title title--modal">Свяжитесь с нами</h3>
                        <form action="modal_contact" class="modal__form modal__form--contact">
                            <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                            <input type="hidden" name="title" value="Связаться"><br>
                            <label class="modal__label-name" data-modal-Inputwrap>
                                Имя*<br>
                                <input type="text" name="name" class="modal__input-name" placeholder="Ваше имя"><br>
                            </label>
                            <label class="modal__label-mail" data-modal-Inputwrap>
                                Электронная почта<br>
                                <input type="text" name="mail" class="modal__input-mail" placeholder="email@domain.zone"><br>
                            </label>
                            <label class="modal__label-phone" data-modal-Inputwrap>
                                Телефон*<br>
                                <input type="text" name="phone" class="modal__input-phone" placeholder="+7 (___) ___-__-__"><br>
                            </label>
                            <div class="modal__radio">
                                <label class="radio">
                                    <input type="radio" name="room" value="В квартиру"/>
                                    <span style="display: block" class="radio__text">В квартиру</span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="room" value="В офис"/>
                                    <span style="display: block" class="radio__text">В офис</span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="room" value="В частный дом"/>
                                    <span style="display: block" class="radio__text">В частный дом</span>
                                </label>
                            </div>
                            <label class="modal__label-adress" data-modal-Inputwrap>
                                Адрес*<br>
                                <input type="text" name="adress" class="modal__input-adress" placeholder="Адрес"><br>
                            </label>
                            <div class="modal__info-block"></div>
                            <label class="modal__label-comment">
                                Комментарий<br>
                                <!-- <input type="text" name="adress" class="modal__input-adress" placeholder="Адрес"> -->
                                <textarea name="comment" placeholder="Ваш комментарий"></textarea><br>
                            </label>
                            <label class="checkbox" data-modal-Inputwrap>
                                <input type="checkbox" class="block-question__checkbox" name="checkbox" checked/>
                                <span style="display:block"
                                    class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                    Согласен(на)
                                    на обработку
                                    своих
                                    персональных
                                    данных</span>
                            </label>
                            <div id="capcha1" class="g-recaptcha"></div>
                            <div class="text-danger" id="recaptchaError"></div>
                            <button type="submit" class="button button--blue button--modal">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal modal--send" data-modal>
                <div class="modal__dialog">
                    <div class="modal__content modal__content--send" data-content>
                        <p class="modal__close modal__close--send" data-close>&times;</p>
                        <h3 class="good-form__title">Успешно!</h3>
                        <p class="good-form__descr">
                            Наш менеджер свяжется с вами<br>
                                в ближайшее время
                        </p>
                    </div>
                </div>
            </div>




            <div class="modal modal--request"  data-modal-request>
            <div class="modal__dialog modal__dialog--request">
                <div class="modal__content" data-content>
                    <p class="modal__close" data-close>&times;</p>
                    <h3 class="title title--modal">Заполните заявку</h3>
                    <form action="form_zayvka" method="post" class="modal__form modal__form--zayvka">
                        <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                        <input type="hidden" name="title" value="Заявка"><br>
                        <label class="modal__label-name" data-modal-Inputwrap>
                            Имя*<br>
                            <input type="text" name="name" class="modal__input-name" placeholder="Ваше имя"><br>
                        </label>
                        <label class="modal__label-mail" data-modal-Inputwrap>
                            Электронная почта<br>
                            <input type="text" name="mail" class="modal__input-mail" placeholder="email@domain.zone"><br>
                        </label>
                        <label class="modal__label-phone" data-modal-Inputwrap>
                            Телефон*<br>
                            <input type="text" name="phone" class="modal__input-phone" placeholder="+7 (___) ___-__-__"><br>
                        </label>
                        <label class="modal__label-adress" data-modal-Inputwrap>
                            Адрес*<br>
                            <input type="text" name="adress" class="modal__input-adress" placeholder="Адрес"><br>
                        </label>
                        <div class="modal__info-block"></div>
                        <label class="modal__label-comment">
                            Комментарий<br>
                            <!-- <input type="text" name="adress" class="modal__input-adress" placeholder="Адрес"> -->
                            <textarea name="comment" placeholder="Ваш комментарий"></textarea><br>
                        </label>
                        <label class="checkbox" data-modal-Inputwrap>
                            <input type="checkbox" class="block-question__checkbox" name="checkbox" checked/>
                            <span style="display: block"
                                class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                Согласен(на)
                                на обработку
                                своих
                                персональных
                                данных</span>
                        </label>
                        <div id="capcha2" class="g-recaptcha"></div>
                        <div class="text-danger" id="recaptchaError"></div>
                        <button type="submit" class="button button--blue button--modal">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
     
        <script>
            window.addEventListener("load", function(event) {
                var jQueryrequest = jQuery.get("<?php echo home_url() . '/counters/';?>"); // make request
                jQueryrequest.done(function(data) { // success
                    jQuery('head').append(data);
                });
            })
        </script>
    <!-- </div> -->
    <?php wp_footer(); ?>
    <div class="svg-main" style="position: absolute; opacity: 0; bottom: 0; z-index: -500;">
        <!-- <include src="build/<?php echo get_template_directory_uri() ?>/assets/sprites/sprite.html"></include> -->
        <?php get_template_part('assets/sprites/sprite'); ?>
    </div>
</body>

</html>