
<div class="footer">
            <div class="footer__inner">
                <div class="footer__up footer__up--services">
                    <div class="container">
                        <div class="footer__wrap">
                            <a href="<?= get_home_url()?>" class="footer__logo">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/footer-logo.png" alt="logo">
                            </a>
                            <a href="<?= get_home_url()?>" class="footer__logo footer__logo--mobile">
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





                            <form class="search search--one" role="search"  method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
                                <input type="text" class="search__input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="f" id="f">
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
                                    <a href="tel:<? the_field('nomer_telefona', 2) ?>" class="footer__link"><? the_field('nomer_telefona', 2) ?></a>
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
            <div class="development">
                <div class="container">
                    <div class="development__inner">
                        <div class="development__year">© 2021</div>
                        <a  href="https://t-code.ru/" target="_blank" class="development__name">Разработка и продвижение сайта — true.code</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
   </div>
    <div class="svg-main" style="position: absolute; opacity: 0; bottom: 0; z-index: -500;">
        <?php get_template_part('assets/sprites/sprite'); ?>
    </div>
    <?php 
        var_dump($_SERVER['SERVER_NAME']);
        if (stristr($_SERVER['SERVER_NAME'], 't-tk')) {
            ?>
                    <script src='https://www.google.com/recaptcha/api.js'></script>

            <?php
        }
    ?>
    <script>
        window.addEventListener("load", function(event) {
            var jQueryrequest = jQuery.get("<?php echo home_url() . '/counters/'?>"); // make request
            jQueryrequest.done(function(data) { // success
                jQuery('head').append(data);
            });
        })
    </script>
    <?php wp_footer(); ?>
</body>

</html>