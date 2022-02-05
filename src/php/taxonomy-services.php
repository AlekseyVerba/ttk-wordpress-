<?php 
    // Template Name: Услуги
    get_header('main');
    $titlePage = get_the_title();
?>
            <?php 
                // $query = new WP_Query( array( 'services' => 'video-monitored' ) );
                $term_title = single_term_title('', 0);
                
                
                $cat_slug= "";

                $categories = get_terms('services', 'orderby=term_order&hide_empty=0');
                // var_dump($title);
            ?>
        
            <!-- <div class="services">
                <div class="container">
        
                </div>
            </div> -->
            <div class="rate">
                <div class="container">
                    <h1 class="title">Услуги и тарифы</h1>
                    <div class="rate__catalog rate__catalog--services">
                        <?php 
                            if ($categories) {
                                foreach ($categories as $key=>$category) {
                                    $className = '';
                                    $url = '';
                                    if (get_field('url_category_services', $category)) {
                                        $url = get_field('url_category_services', $category);
                                    } else {
                                        $url = get_term_link($category->term_id);
                                    }
                                    // if (!$term_title && $key==0) {
                                    //     $className = "rate__catalog-link rate__catalog-link--active";
                                    // }
                                    if (($term_title == $category->name) || (!$term_title && $key==0)) {
                                        $className = "rate__catalog-link rate__catalog-link--active";
                                        $cat_slug =  $category -> slug;
                        
                                    } else {
                                        $className = "rate__catalog-link";
                                    }
                                    
                                    ?>
                                        <a href="<?= $url ?>" class="<?= $className ?>"><?= $category->name ?></a>
                                    <?php
                                }
                        
                            }
                        ?>
                    </div>
                    <div class="rate__content" style="display: block">
                        <?php
                        
                        $category = get_terms( array(
                            'taxonomy' => 'rates',
                         ));
                            foreach($category as $key => $cat) {

                                ?>
                                <div class="rate__content-item rate__content-item--internet">
                                     <label class="rate__label checkbox">
                                    
                                        <input type="checkbox" class="rate__checkbox rate__checkbox--internet" data-checkRate />
                                        <span style="display:block" class="rate__checkbox checkbox__text"><?= $cat->name ?></span>
                                    </label>

                                <?php
                                ?>
                            <div class="rate__content-items rate__content-items--services">

                                
                            <?php
                            $wp_query = new WP_Query( array(
                                'post_type' => 'service',
                                'posts_per_page'   => -1, 
                                "orderby" => "date",
                                'services' => $cat_slug,
                                'tax_query' => array(
                                array(
                                'taxonomy' => 'rates',
                                'field'    => 'slug',
                                'terms'    => $cat->slug
                                )
                                )
                            ));

    
                    // $wp_query = new WP_Query( $args );
                    // var_dump($wp_query->query_vars);
                    // Цикл
                    if ( $wp_query->have_posts() ) {
                        while ( $wp_query->have_posts() ) {
                            $wp_query->the_post();

                            ?>  

                                <div class="rate__content-card">
                                <div class="rate__content-card-wrapper-main">
                                    <?php 
                                        if (get_field("populyarnaya", $post)[0]) {
                                            ?>
                                                <span class="rate__content-popular">Популярный</span>
                                            <?php
                                        }
                                    ?>
                                    <div class="rate__content-card-header rate__content-card-header--one" style='<?php the_field('color_card_service'); ?>'>
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
                                    <div class="rate__content-footer">
                                        <a href="/constructor/?service-id=<?= $post->ID ?>&category=<?= $cat->slug ?>" class="rate__content-card-link">Настроить тариф</a>
                                        <button class="button button--blue button--rate-card" data-request>Оставить
                                            заявку</button>
                                    </div>
                                </div>
                                </div>
                                
                            <?php
                        }
                    } else {
                        echo "<h3 class='rate__error'>В этой категории ничего не нашлось</h3>";
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
                    </div>
                </div>
            <!-- </div> -->
        
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
                            <div
                                class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                Согласен(на)
                                на обработку
                                своих
                                персональных
                                данных</div>
                        </label>
                        <div id="capcha8" class="g-recaptcha" data-sitekey="6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz"></div>
                        <div class="text-danger" id="recaptchaError"></div>
                        <button type="submit" class="button button--blue button--modal">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
<?php 
    get_footer();
?>