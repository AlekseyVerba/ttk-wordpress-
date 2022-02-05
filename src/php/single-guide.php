<?php 
    get_header();

    $titlePage = get_the_title();
?>
<?php 
    $items = get_field("content_guide_category");
?>
            <h1 class="page__main-title">
                Чем мы можем вам помочь?
            </h1>
            <main class="page page--guide-category">
                <section class="container">
                    <div class="page__inner page__inner--camera page__inner--category">
                        <div class="page__left page__left--camera page__left--questions-block">
                            <div class="page__left-wrapper page__left-wrapper--questions-block">


                                <?php 
                                     foreach($items as $i=>$block) {
                                         
                                           ?>
                                                <div class="page__content" data-content="<?= $i ?>">
                                                    <?php 
                                                        foreach($block['question_and_ask_block_guide_category'] as $index=>$item) { 
                                                        
                                                            
                                                            ?>
                                                            <div class="questions__item">
                                                                <div class="questions__up" data-question>
                                                                    <h4 class="questions__title" data-question-title><?= $item['question_block_guide_category'] ?></h4>
                                                                    <div class="questions__arrow">
                                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/arrow-down.svg" class="questions__arrow-img"
                                                                            alt="arrow" data-question-img>
                                                                    </div>
                                                                </div>
                                                                <div class="question__answer" data-answer>
                                                                    <?= $item['ask_block_guide_category'] ?>
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
                        <div class="page__right page__right--camera page__right--tabs" style="display: block">
                            <ul class="page__right-list page__right-list--guide-category">
                                <?php 
                                     foreach($items as $i=>$item) {
                                            if ($i == 0) {
                                                ?>
                                                    <li class="page__right-item page__right-item--active" data-tab="<?= $i ?>"><span><?= $item["name_block_guide_category"] ?></span></li>
                                    
                                                <?php
                                                continue;
                                            }
                                         ?>
                                        
                                        <li class="page__right-item" data-tab="<?= $i ?>"><span><?= $item["name_block_guide_category"] ?></span></li>
                                        <?php
                                     }
                                ?>

                                <li class="page__right-button"><button class="button button--blue button--tabs" data-addQuestion>Задать
                                        вопрос</button></li>
                            </ul>
                            <!-- <div class="page__right-list">
                                <div class="page__right-item page__right-item--active"><span
                                        class="light"></span><span>Beer</span></div>
                                <div class="page__right-item"><span class="light"></span><span>Wine</span></div>
                                <div class="page__right-item"><span class="light"></span><span>Lemonade</span></div>
                            </div> -->
        
                            <!-- <select class="page__right-list page__right-list-sel" size="2">
                                <option class="page__right-item" value="1">Тарифы</option>
                                <option class="page__right-item" value="2">Для юридических лиц</option>
                                <option class="page__right-item" value="3">Изменения тарифа</option>
                                <option class="page__right-item" value="4">Семейный пакет</option>
                            </select> -->
                        </div>
                    </div>
                </section>
            </main>
        </div>
    
        <!-- <div class="menu">
            <div class="active"><span class="light"></span><span>Beer</span></div>
            <div><span class="light"></span><span>Wine</span></div>
            <div><span class="light"></span><span>Lemonade</span></div>
        </div> -->
    
    
    
    
    
    
        <div class="modal" data-modal-question>
        <div class="modal__dialog">
            <div class="modal__content" data-content>
                <p class="modal__close" data-close>&times;</p>
                <h3 class="title title--modal">Свяжитесь с нами</h3>
                <form action="modal_contact" class="modal__form modal__form--contact">
                    <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                    <input type="hidden" value="Связаться" name="title" />
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
                    <div id="capcha5" class="g-recaptcha" data-sitekey="6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz"></div>
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
    
    <?php 
    
        get_footer();
    ?>