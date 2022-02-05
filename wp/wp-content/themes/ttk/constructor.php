<?php 
    // Template Name: Конструктор
    get_header("main");
    $get = "";
    if($_GET) {
        $get = $_GET['service-id'];
    }
?>
    
    
        <div class="rate rate--constructor">
            <div class="container">
                <h1 class="title">Конструктор индивидуального заказа</h1>
                <div class="rate__catalog">

                    <?php 
                        
                        $terms = get_terms('rates', "hide_empty=0");
                        foreach($terms as $i=>$term) {

                            if ($_GET['category']) {
                                if ($term->slug == $_GET['category']) {
                                    ?>
                                    
                                    <a class="rate__catalog-link rate__catalog-link--active" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                    <?php
                                } else {
                                ?>
                                   <a class="rate__catalog-link" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                <?php
                                }
                            } else {

                                if ($i == 0) {
                                    ?> 
                                        <a class="rate__catalog-link rate__catalog-link--active" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                    <?php
                                    
                                } else {
                                    ?>
                                        <a class="rate__catalog-link" data-mainTab="<?= $i ?>"><?= $term->name ?></a>
                                    <?php
                                }
                                
                                    
                                
                            }

                            
                        }
                
                    ?>

                </div>

                



                <?php 
                    $terms = get_terms('rates', "hide_empty=0");
                    foreach($terms as $i=>$term) {
                        if ($_GET['category']) {
                            if ($term->slug == $_GET['category']) {
                                ?>
                                    <div class="rate__content rate__content--active" data-mainContent="<?= $i ?>">
                                <?php
                            } else {
                                ?>
                                    <div class="rate__content" data-mainContent="<?= $i ?>">
                                <?php
                            }
                            
                        } else {
                            if ($i == 0) {
                                ?>
                                    <div class="rate__content rate__content--active" data-mainContent="<?= $i ?>">
                                <?php 
                            } else {
                                ?>
                                    <div class="rate__content " data-mainContent="<?= $i ?>">
                                <?php
                            }
                        }

                        ?>

            
                        


                            <?php 
                                 $category = get_terms('services', "orderby=term_order");
                                 foreach ($category as $cat) {
                                     if ($cat->slug == "subscription" || $cat->slug == "radio") {
                                         
                                         continue;
                                     }


                                     ?>

                        

                                    <div class="rate__content-item">
                                        <div class="rate__content-wrapper">
                                            <label class="checkbox">
                                                <?php 
                                                
                                                    if ($cat->slug == "video-monitored" || $cat->slug =="thematic-television") {
                                                        ?>
                                                            <input type="checkbox" class="rate__checkbox--internet" data-checkRate  />
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <input type="checkbox" class="rate__checkbox--internet" data-checkRate checked  />
                                                        <?php
                                                    }

                                                ?>
                                                
                                                <div class="checkbox__text checkbox__text--constructor"><?= $cat->name ?></div>
                                            </label>
                                            <div class="rate__content-items rate__content-items--constructor">
                                                

                                            <?php
                                                
                                                $query = new WP_Query( [
                                                    'post_type' => 'service',
                                                    'posts_per_page'   => -1, 
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
                                                        $per = '';
                                                        // var_dump($post->ID);
                                                        if (mb_strtolower(get_field('period_card_service', $post)) == 'в месяц') {
                                                            $per = 'month';
                                                        } else {
                                                            $per = 'now';
                                                        }
                                                        if ($post->ID == $get && $term->slug == $_GET["category"]) {
                                                            ?>
                                                                <div class="rate__content-card rate__content-card--constructor"  data-card-constructor 
                                                                data-card-constructor-name="<?= $post->post_title ?>" data-selected data-card-constructor-price=<?php the_field('price_card_service', $post) ?> data-card-constructor-pay="<?= $per ?>">
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <div class="rate__content-card rate__content-card--constructor"  data-card-constructor 
                                                                data-card-constructor-name="<?= $post->post_title ?>" data-card-constructor-price=<?php the_field('price_card_service', $post) ?> data-card-constructor-pay="<?= $per ?>">
                                                            <?php
                                                        }
                                                        ?>
                                                                <?php 
                                                                    $styleTwo = "";
                                                                    // var_dump(get_field("color_card_service", $post));
                                                                    if (get_field("color_card_service", $post)) {
                                                                        $styleTwo = get_field("color_card_service");
                                                                    }
                                                                ?>
                                                                <?php 
                                                                            if (get_field("populyarnaya", $post)[0]) {
                                                                                ?>
                                                                                    <span class="rate__content-popular">Популярный</span>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                <div class="rate__content-card-header rate__content-card-header--one" style="<?php echo $styleTwo ?>">
                                                                    
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
                                                                    <p class="rate__content-card-info" style="<?= $style ?>">
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
                                                                <button class="rate__content-card-add rate__content-card-add--active">
                                                                    <svg class="rate__content-plus">
                                                                        <use xlink:href="#plus" ></use>
                                                                    </svg>
                                                                    <svg class="rate__content-galka">
                                                                        <use xlink:href="#gal" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        <?php
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
                    
                    
                    
                                    </div>


                                     <?php
                                    
                                }
                            ?>
                        </div>
                        <?php

                    }
                ?>









                
                
                    <!-- <div class="rate__content-item">
                        <div class="rate__content-wrapper">
                            <label class="checkbox">
                                <input type="checkbox" class="rate__checkbox--internet" data-checkRate checked />
                                <div class="checkbox__text checkbox__text--constructor">Интернет</div>
                            </label>
                            <div class="rate__content-items rate__content-items--constructor">
                                <div class="rate__content-card rate__content-card--constructor"  data-card-constructor 
                                data-card-constructor-name="Безлимит 15.1" data-card-constructor-price=150 data-card-constructor-pay="month">
                                    <div class="rate__content-card-header rate__content-card-header--one">
                                        Безлимит 15
                                    </div>
                                    <div class="rate__content-card-body">
                                        <p class="rate__content-card-info">
                                            Интернет на скорости 15 Мбит/сек по цене
                                        </p>
                                        <div class="rate__content-card-price-block">
                                            <h3 class="rate__content-card-price">
                                                300 ₽
                                            </h3>
                                            <span class="rate__content-card-subtitle">в месяц</span>
                                        </div>
                                        <h5 class="rate__content-card-speed">15 Мбит/сек</h5>
                                        <ul class="rate__content-card-list rate__content-card-list--one">
                                            <li class="rate__content-card-item rate__content-card-item--one">Ночное ускорение до
                                                30 Мб/с</li>
                                            <li class="rate__content-card-item rate__content-card-item--one">Без ограничений по
                                                трафику</li>
                                            <li class="rate__content-card-item rate__content-card-item--one">Неограниченные
                                                звонки</li>
                                        </ul>
                                        <ul class="rate__content-card-list--two rate__content-card-list--two">
                                            <li class="rate__content-card-item rate__content-card-item--two">Скидка для семьи
                                            </li>
                                            <li class="rate__content-card-item rate__content-card-item--two">Неограниченные
                                                звонки</li>
                                        </ul>
                                    </div>
                                    <div class="rate__content-card-add rate__content-card-add--active">
                                         <svg class="rate__content-plus">
                                            <use xlink:href="#plus" ></use>
                                        </svg>
                                        <svg class="rate__content-galka">
                                            <use xlink:href="#gal" />
                                        </svg>
                                    </div>
                                </div>

        
                            </div>
                        </div>
    
    
    
                    </div> -->
                
        







            </div>
        </div>
    
        <div class="result">
            <div class="container">
                <div class="result__inner">
                    <div class="result__left">
                        <div class="result__left-title">
                            <span class="result__left-name">Наименование услуги</span>
                            <span class="result__left-price">Стоимость</span>
                        </div>
                        <ul class="result__left-list">
    
                        </ul>
                    </div>
                    <div class="result__right">
                        <h3 class="result__right-title">Итого</h3>
                        <ul class="result__right-list">
                            
                            <!-- <li class="result__right-item result__right-item--now">
                                <span class="result__right-item-name">Единоразовая оплата:</span>
                                <span class="result__right-item-price">10 000 ₽</span>
                            </li> -->
                            <li class="result__right-item result__right-item--month">
                                <span class="result__right-item-name">Помесячная оплата:</span>
                                <span class="result__right-item-price result__right-item-price--month">0 ₽ </span>
                            </li>
                        </ul>
                        <button class="button button--blue result__right-button" data-request>Заказать</button>
                    </div>
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
                        <form class="block-question__form" action="block_question">
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
                                            <input type="checkbox" name="checkbox"  class="block-question__checkbox" checked />
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
                        <input type="hidden" name="title" value="Заявка с конструктора" />
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
                            <div
                                class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                Согласен(на)
                                на обработку
                                своих
                                персональных
                                данных</div>
                        </label>
                        <div id="capcha4" class="g-recaptcha" data-sitekey="6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz"></div>
                        <div class="text-danger" id="recaptchaError"></div>
                        <button type="submit" class="button button--blue button--modal">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
 <?php 
    get_footer();
 ?>