<?php 
    // Template Name: О компании

    get_header();
?>
            <h1 class="page__main-title">
                О компании Тулун-ТелеКом
            </h1>
            <main class="page page--guide-category page--company">
                <section class="container">
                    <div class="page__inner page__inner--camera page__inner--category">
                        <div class="page__left page__left--camera page__left--questions-block">
                            <div class="page__left-wrapper page__left-wrapper--questions-block">
        
                                <div class="page__content" data-content="0">
                                    <p>
                                        <?php the_field('text_about_company'); ?>
                                    </p>
                                </div>
                                <div class="page__content" data-content="1">
                                    <?php the_field('advantages_about_company'); ?>
                                </div>
                                <div class="page__content" data-content="2">
                                    <p>
                                    <?php the_field('requisites_about_company'); ?>
                                    </p>
                                    
                                </div>
                                <div class="page__content" data-content="3">
                                    <div class="page__doc">

                                        <?php
                                            $files = get_field("license_about_company");
                                            foreach($files as $file) {
                                                ?>
                                                     <a style="text-decoration: none;color: #26213f;" href="<?= $file['license_about_company_file'] ?>" download class="page__doc-item">
                                                        <div class="page__doc-img">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/doc.png" alt="doc">
                                                        </div>
                                        
                                                        <p class="page__doc-link" style="text-decoration: none;color: #26213f;"><?= $file['license_about_company_name'] ?></p>
                                                    </a>
                                                <?php
                                            }
                                        ?>
        
                                    </div>
                                </div>
                                <div class="page__content" data-content="4">
                                    <div class="page__doc">

                                        <?php 
                                            $documents = get_field("documents_about_company");
                                            foreach($documents as $document) {
                                                ?>

                                                    <a style="text-decoration: none;color: #26213f;" href="<?= $document['documents_about_company_file'] ?>" download class="page__doc-item">
                                                        <div class="page__doc-img">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/doc.png" alt="doc">
                                                        </div>
                                        
                                                        <p class="page__doc-link" style="text-decoration: none;color: #26213f;"><?= $document['documents_about_company_name'] ?></p>
                                                    </a>
                                                <?php

                                            }
                                        ?>
                                    </div>
        
                                </div>
                                <div class="page__content" data-content="5">
                                    <div class="services__inner services__inner--page">



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
                                            
                                                ?>
                                                    
                                                    <!-- <a href="<?= $url ?>" class="services__card services__card--main">
                                                        <div class="services__img">
                                                            
                                                            <img src='<?php the_field('img_category_services', $term); ?>' ?>
                                                            
                                                        </div>
                                                        <div class="services__info-wrapper">
                                                            <h4 class="services__title">
                                                                <?= $term->name ?>
                                                            </h4>
                                                            <p class="services__descr">
                                                                <?= $term->description ?>
                                                            </p>
                                                        </div>
                                                        <button class="services__detailed detailed">
                                                            Подробнее
                                                        </button>
                                                    </a> -->


                                                    <div class="services__card  services__card--about services__card--page">
                                                        <div class="services__ img services__img--about services__img--page">
                                                            <img src='<?php the_field('img_category_services', $term); ?>' ?>
                                                        </div>
                                                        <div class="services__info-wrapper services__info-wrapper--about">
                                                            <h4 class="services__title services__title--page">
                                                            <?= $term->name ?>
                                                            </h4>
                                                            <p class="services__descr services__descr--page">
                                                                <?= $term->description ?>
                                                            </p>
                                                        </div>
                                                        <a href='<?= $url ?>' class="services__detailed services__detailed--page detailed">
                                                            Подробнее
                                                        </a>
                                                    </div>

                                                <?php
                                            }
                                        
                                        ?>




        



                                    <div style="width: 100%; text-align: center; margin-top: 5px;">
                                        <button 
                                        class="button button--blue button--zayvka" data-application>Подать
                                        заявку</button>
                                    </div>
        
        
                                    </div>
                                </div>
        
                            </div>
                        </div>
                        <div class="page__right page__right--camera page__right--tabs" style="display:block">
                            <ul class="page__right-list page__right-list--guide-category">
                                <li class="page__right-item" data-tab="0"><span>О компании</span></li>
                                <li class="page__right-item page__right-item--active" data-tab="1"><span>Преимущества</span></li>
                                <li class="page__right-item" data-tab="2"><span>Реквизиты</span></li>
                                <li class="page__right-item" data-tab="3"><span>Лицензии</span></li>
                                <li class="page__right-item" data-tab="4"><span>Документы</span></li>
                                <li class="page__right-item" data-tab="5"><span>Услуги и сервисы</span></li>
                            </ul>
                            </select> 
                        </div>
                    </div>
                </section>
            </main>
        
        
        
        
        
        
        
        
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

        <div class="modal" data-modal>
                <div class="modal__dialog">
                    <div class="modal__content" data-content>
                        <p class="modal__close" data-close>&times;</p>
                        <h3 class="title title--modal">Свяжитесь с нами</h3>
                        <form action="" class="modal__form">
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
                                    <input type="radio" name="room" />
                                    <div class="radio__text">В квартиру</div>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="room" />
                                    <div class="radio__text">В офис</div>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="room" />
                                    <div class="radio__text">В частный дом</div>
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
                                <div
                                    class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                    Согласен(на)
                                    на обработку
                                    своих
                                    персональных
                                    данных</div>
                            </label>
                            <div id="capcha3" class="g-recaptcha" data-sitekey="6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz"></div>
                            <div class="text-danger" id="recaptchaError"></div>
                            <button type="submit" class="button button--blue button--modal">Отправить</button>
                        </form>
                    </div>
                </div>
        </div>
        <?php
            get_footer();
        ?>