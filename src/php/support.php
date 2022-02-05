<?php
    
// Template Name: Поддержка
    get_header('main');
    $titlePage = get_the_title();
?>
        
            <h1 class="title">
                Служба поддержки
            </h1>
        
        
            <div class="support">
                <div class="container">
                    <div class="support__inner">
                        <div class="support__info">
                            <div class="supprt__wrapper-info">

                                <?php the_field("tekst_support"); ?>
                            </div>
                        </div>
                        <div class="support__form">
                            <div class="white-form white-form--support">
                                <h3 class="white-form__title white-form__title--support">Свяжитесь с нами</h3>
                                <form class="white-form__form"  method="post" action="white_form">
                                    <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                                    <input type="hidden" value="Поддержка" name="title" />
                                    <label data-modal-Inputwrap class="white-form__label">
                                        <span class="white-form__subtitle">Имя*</span>
                                        <input type="text" name="name" placeholder="Ваше имя"
                                            class="white-form__input white-form__input--support">
                                    </label>
                                    <label data-modal-Inputwrap class="white-form__label">
                                        <span class="white-form__subtitle">Электронная почта</span>
                                        <input type="text" name="mail" placeholder="email@domain.zone"
                                            class="white-form__input white-form__input--support">
                                    </label>
                                    <label data-modal-Inputwrap class="white-form__label">
                                        <span class="white-form__subtitle">Телефон*</span>
                                        <input type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                            class="white-form__input white-form__input--support">
                                    </label>
                                    <label data-modal-Inputwrap class="white-form__label">
                                        <span class="white-form__subtitle">Номер договора*</span>
                                        <input type="text" name="number-dog" placeholder="Номер договора"
                                            class="white-form__input white-form__input--support">
                                    </label>
                                    <label data-modal-Inputwrap class="white-form__label">
                                        <span class="white-form__subtitle">Комментарий</span>
                                        <textarea name="comment" placeholder="Ваш комментарий"
                                            class="white-form__input white-form__input--area white-form__input--area-support"></textarea>
                                    </label>
                                    <label data-modal-Inputwrap class="checkbox" data-modal-Inputwrap>
                                        <input type="checkbox" name="checkbox" class="block-question__checkbox" checked/>
                                        <div
                                            class="checkbox__text checkbox__text--block-question-text block-question__text block__modal-text">
                                            Согласен(на)
                                            на обработку
                                            своих
                                            персональных
                                            данных</div>
                                    </label>
                                    <div id="capcha6" class="g-recaptcha" data-sitekey="6LcprRkbAAAAAEBQCjQ_te7OhFSjE22sqgGpafGz"></div>
                                    <div class="text-danger" id="recaptchaError"></div>
                                    <button type="submit" class="button button--blue button--modal">Отправить</button>
                                </form>
                            </div>
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
 <?php 
    get_footer();
?>