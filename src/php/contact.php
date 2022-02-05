<?php 
    // Template Name: Контакты
    get_header('main');
?>

        
            <h1 class="title"><?php the_title(); ?></h1>
        
            <div class="contact">
                <div class="container">
                    <div class="contact__inner">
                        <div class="contact__left">
                            <h2 class="contact__name">Тулун-ТелеКом</h2>
                            <div class="contact__wrap">
                                <a href="mailto:<?php the_field('pochtovyj_adress', 2) ?>" class="contact__item contact__item--mail"><?php the_field('pochtovyj_adress', 2) ?></a>
                            </div>
                            <div class="contact__wrap">
                                <a href="tel:<?php the_field('nomer_telefona'); ?>" class="contact__item contact__item--phone"><?php the_field('nomer_telefona', 2); ?></a>
                            </div>
                            <address class="contact__item contact__item--address"><?php the_field('podrobnyj_adres', 2); ?></address>
                            <div class="social social--contact">
                                <?php 
                                    if (get_field('ssylka_na_facebook', 2)) {
                                        ?>
                                            <a href="<?php the_field('ssylka_na_facebook', 2) ?>" target="blanc" class="social__item">
                                                <svg class="social__item-footer social__item-contact">
                                                    <use xlink:href="#facebook"></use>
                                                </svg>
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/icon-instagram.svg" alt="insta"> -->
                                            </a>
                                        <?php
                                    }
                                    if (get_field('ssylka_na_instagram', 2)) {
                                        ?>
                                            <a href="<?php the_field('ssylka_na_instagram', 2) ?>" target="blanc" class="social__item">
                                                <svg class="social__item-footer social__item-contact">
                                                    <use xlink:href="#icon-instagram"></use>
                                                </svg>
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/icon-instagram.svg" alt="insta"> -->
                                            </a>
                                        <?php
                                    }
                                    if (get_field('ssylka_na_youtube', 2)) {
                                        ?>
                                           <a href="<?php the_field('ssylka_na_youtube', 2) ?>" target="blanc" class="social__item">
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/youtube-icon.svg" alt="youtube"> -->
                                                <svg class="social__item-footer social__item-contact">
                                                    <use xlink:href="#youtube-icon"></use>
                                                </svg>
                                            </a>
                                        <?php
                                    }
                                ?>

                                <?php 
                                    if (get_field('ssylka_na_odnoclass', 2)) {
                                        ?>
                                            <a href="<?php the_field('ssylka_na_odnoclass', 2) ?>" target="blanc" class="social__item">
                                                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/youtube-icon.svg" alt="youtube"> -->
                                                <svg class="social__item-footer social__item-contact">
                                                    <use xlink:href="#odnoclass"></use>
                                                </svg>
                                            </a>

                                        <?php
                                    }
                                
                                ?>

                                <?php 
                                    if (get_field('ssylka_na_vk', 2)) {
                                    ?>
                                        <a href="<?php the_field('ssylka_na_vk', 2) ?>" target="blanc" class="social__item">
                                            <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/vk-icon.svg" alt="vk"> -->
                                            <svg class="social__item-footer social__item-contact">
                                                <use xlink:href="#vk-icon"></use>
                                            </svg>
                                        </a>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="contact__right">
                            <div id="map" class="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="bank-details">
                <div class="container">
                    <div class="bank-details__inner">
                        <h2 class="bank-details__title">Реквизиты</h2>
                        <p class="bank-details__descr">
                            <?php 
                                  the_field('requisites_about_company',9);
                            ?>
                        </p>
                    </div>
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
                            <form class="block-question__form" action="modal_contact">
                            <input type="hidden" name="title" value="Связаться"><br>
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
                                                <div
                                                    class="checkbox__text checkbox__text--block-question-text block-question__text">
                                                    Согласен(на) на
                                                    обработку своих
                                                    персональных
                                                    данных</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
        
        </div>
      
        <script>

        function getYaMap() {
            var myMap = new ymaps.Map("map", {
                center: [<? the_field("koordinaty_karty") ?>],
                controls: [],
                zoom: <?= the_field("masshtab_karty_zoom") ?>
            },
                {
                    searchControlProvider: 'islands#redDotIcon'
                }
            );

            var placemark = new ymaps.Placemark([<? the_field("koordinaty_karty") ?>], {}, {
                // Задаем стиль метки (метка в виде круга).
                preset: "islands#redDotIcon",
                // Задаем цвет метки (в формате RGB).
                iconColor: '#ff0000'
            });
            myMap.geoObjects.add(placemark);


            //     myPlacemark = new ymaps.Placemark(myMap.getCenter());

            // myMap.geoObjects.add(myPlacemark);


            myMap.controls.remove();
        }

        function downloadJSAtOnload() {
            var element = document.createElement("script");
            element.src = "https://api-maps.yandex.ru/2.1/?&lang=ru_RU&onload=getYaMap";
            document.head.appendChild(element);
        }

        window.addEventListener('load', function () {
            downloadJSAtOnload();
        });
    </script>
        <?php get_footer(); ?>





