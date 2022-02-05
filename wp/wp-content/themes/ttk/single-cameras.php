<?php 
    get_header('main');
    $titlePage = get_the_title();
?>

        
            <main class="page page--cameras">
                <section class="container">
                    <div class="page__inner page__inner--camera">
                        <div class="page__left page__left--camera">
                            <div class="page__left-wrapper">
                                <h1 class="page__main-title page__main-title--camera">
                                    <?php the_title(); ?>
                                </h1>
        
                                <div class='youtube-container'>
                                    <iframe  src="<?php the_field("url_camera") ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <?php the_content(); ?>
        
                            </div>
                        </div>
                        <div class="page__right page__right--camera">
                            <div class="page__right-wrapper">



                            <?php 

                                $args = array(
                                    'posts_per_page' => 1,
                                    'post_type' => 'cameras',
                                    'post__not_in' =>array(get_the_ID()),
                                    'orderby' => 'rand'
                                );
                                $wp_query = new WP_Query( $args );
                                // $GLOBALS['wp_query'] = $wp_query;
                                // var_dump($query);
                                // Цикл
                                if ( $wp_query->have_posts() ) {
                                    while ( $wp_query->have_posts() ) {
                                        $wp_query->the_post();
                                        ?>



                                        <div class="camers__item camers__item--camera">
                                            <div class="camers__header">
                                                <?php 
                                                    if (get_the_post_thumbnail()) {
                                                        echo get_the_post_thumbnail();
                                                    } else {
                                                        ?>
                                                            <img src="<?= bloginfo('template_directory') ?>/assets/images/static/zagluh.svg" style="font-family: 'object-fit: none;'" ?>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="camers__body camers__body--camera">
                                                <h4 class="camers__name"><? the_title(); ?></h4>
                                                <a href="<? the_permalink() ?>" class="detailed detailed--news detailed--camers">
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
                            <div class="white-form">
                                <h3 class="white-form__title">Вы можете оставить комментарий</h3>
                                <form class="white-form__form" method="post" action="white_form">
                                <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                                    <input type="hidden" name="title" value="Комментарий" />
                                    <label data-modal-Inputwrap class="white-form__label white-form__label--name">
                                        <input type="text" name="name" placeholder="Ваше имя" class="white-form__input">
                                    </label>
                                    <label data-modal-Inputwrap class="white-form__label" style="margin-bottom: 15px">
                                        <!-- <span class="white-form__subtitle">Телефон*</span> -->
                                        <input type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                            class="white-form__input white-form__input--support">
                                    </label>
                                    <textarea name="comment" placeholder="Комментарий"
                                        class="white-form__input white-form__input--area"></textarea>
                                    <label class="checkbox" data-modal-Inputwrap>
                                        <input type="checkbox" name="checkbox" class="block-question__checkbox" checked/>
                                        <div
                                            class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                            Согласен(на)
                                            на обработку
                                            своих
                                            персональных
                                            данных</div>
                                    </label>
                                    <button type="submit" class="button button--blue button--modal">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
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
   <?php get_footer(); ?>