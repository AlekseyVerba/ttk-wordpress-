<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="b63549bbba660281" />
    <meta name="google-site-verification" content="VD9bOWgDEGtRaJV217LLzZ_-Be_eyHwOoJ_xfFiXnwc" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/static/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>

</head>

<body>
<?php 
    if(get_field("dobavit_preloader", 2)) {
        if( is_front_page() || stristr($_SERVER['REQUEST_URI'], 'sales') || stristr($_SERVER['REQUEST_URI'], 'cameras') || stristr($_SERVER['REQUEST_URI'], 'news')){
            // код
            ?>
            <div id="preloader"  class="preloader" style=" background: url(<?= get_template_directory_uri() ?>/assets/images/static/animate-bg.jpg); z-index: 10000">
                <div class="preloader__content">
                    <h2 class="preloader__title">Медленный интернет?</h2>
                    <p class="preloader__descr">Обратитесь к нам!</p>

                    <div class="dws-progress-bar"></div>
                </div>
            </div>



        <?php
        }
    }
?>

    <div class="wrapper">
        <div class="content">
            <header>
                <div class="header-up">
                    <div class="container">
                        <div class="header-up__inner">
                            <div class="header-up__logo">
                            <?php
                                ?>
                                    
                                        <a href="<?php echo get_home_url(); ?>">
                                            <img class="header-up__logo--desc logo" src="<?php echo get_template_directory_uri() ?>/assets/images/static/logo-main.svg" alt="logo"/>
                                        </a>
                                <?php
            
                            ?>
                                
                                <a href="<?php echo get_home_url(); ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/logo-mobile.svg" class="header-up__logo--mobile logo"
                                        alt="logo">
                                </a>
                            </div>
                            <div class="header-up__right">
                                <a href="tel:<?= str_replace(" ", "", get_field("nomer_telefona", 2)) ?>" class="header-up__phone"><?php the_field("nomer_telefona", 2) ?></a>
                                <div class="header-up__img header-up__img--loup" data-input-loup>
                           
                                <form role="search"  method="get" class='header-up__form' id="searchform" action="<?php echo home_url( '/' ) ?>" >
                                    <label class="screen-reader-text" for="s"></label> 
                                    <input type="text" class="header-up__form-input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="s" id="s" />
                                    <button type="submit" id="searchsubmit" class="header-up__form-submit">
                                        <svg class="header-up__loup">
                                            <use xlink:href="#loup" />
                                        </svg>
                                    </button>
                                </form> 


                                    <!-- <form action="<?php echo bloginfo("template_url"); ?>/search/" method="post" class="header-up__form">
                                        <input type="text" class="header-up__form-input" placeholder="Поиск...">
                                        <button type="submit" class="header-up__form-submit">
                                            <svg class="header-up__loup">
                                                <use xlink:href="#loup" />
                                            </svg>
                                        </button>
                                    </formc> -->
                                </div>
                                <a href="<?php the_field("ssylka_na_lichnyj_kabinet", 2) ?>" target="_blank" class="header-up__img header-up__img-person">
                                    <svg class="header-up__person">
                                        <use xlink:href="#person" />
                                    </svg>
                                </a>
                                <a href="<?php echo get_permalink("25") ?>" class="button button--blue button--header">Экспресс-оплата</a>
                                <button id="hamburger-icon" title="Menu">
                                    <span class="line line-1"></span>
                                    <span class="line line-2"></span>
                                    <span class="line line-3"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-down">
                    <div class="container">
                   

                        <nav>
                            <?php
                                    wp_nav_menu([
                                        'container'       => false,
                                        'theme_location' 	=> '', 
                                        'menu'              => 'Главное меню',
                                        'menu_class' 		=> '',
                                        'walker'          => new Primary_Walker_Nav_Menu(),
                                        'depth'           => 0,
                                    ]) 
                                ?>
                            <form  class="search search--header" role="search"  method="get" id="searchform-mobile" action="<?php echo home_url( '/' ) ?>">
                                <button type='submit' class="search__loup">
                                    <svg class="header-up__loup header-up__loup--search">
                                        <use xlink:href="#loup" />
                                    </svg>
                                </button>
                                <input type="text" class="search__input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="s" id="mobile-head">
                            </form>
                            <div class="social--header">
                                <a href="<? the_field('ssylka_na_facebook', 2) ?>" target="_blank" class="social__item">
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/icon-instagram.svg" alt="insta"> -->
                                    <svg class="social__item-icon social__item-icon--inst">
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                </a>
                                <a href="<? the_field('ssylka_na_instagram', 2) ?>" target="_blank" class="social__item">
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/icon-instagram.svg" alt="insta"> -->
                                    <svg class="social__item-icon social__item-icon--inst">
                                        <use xlink:href="#icon-instagram"></use>
                                    </svg>
                                </a>
                                <a href="<? the_field('ssylka_na_youtube', 2) ?>" target="_blank" class="social__item">
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/youtube-icon.svg" alt="youtube"> -->
                                    <svg class="social__item-icon social__item-icon--youtube">
                                        <use xlink:href="#youtube-icon"></use>
                                    </svg>
                                </a>
                                <a href="<? the_field('ssylka_na_vk', 2) ?>" target="_blank" class="social__item">
                                    <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/vk-icon.svg" alt="vk"> -->
                                    <svg class="social__item-icon social__item-icon--vk">
                                        <use xlink:href="#vk-icon"></use>
                                    </svg>
                                </a>
                            </div>
                            <a href='/method-pay/'  class="button button--blue button--header header-down__button">Экспресс-оплата</a>
                        </nav>
                    </div>
                </div>
            </header>
            <?php 

                if( !is_front_page() && !is_404() && get_the_title() !== "Успешная отправка формы" ){
                    ?>
                        <div class="breadcrumbs">
                            <div class="container">
                                <div class="breadcrumbs__inner">
                                    <!-- <a href="#" class="breadcrumbs__link">Главная</a> /
                                    <span class="breadcrumbs__item">Услуги для физических лиц</span> -->
                                    <?php if(function_exists('bcn_display'))
                                    {
                                        bcn_display();
                                    }?>

                                </div>
                            </div>
                        </div>
                    <?php
                 }
            ?>

