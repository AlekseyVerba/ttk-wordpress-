<?php 
    get_header('main');
    $titlePage = get_the_title();
?>
        
            <main class="page">
                <section class="container">
                    <div class="page__inner page__inner--camera">
                        <div class="page__left page__left--camera">
                            <div class="page__left-wrapper">
                                <h1 class="page__main-title page__main-title--camera">
                                    Камера на улице Ленина
                                </h1>
        
                                <div class='youtube-container'>
                                    <iframe title="Как вставить видео с YouTube в статью на сайт WordPress?" width="500"
                                        height="375" src="https://www.youtube.com/embed/78t5DJ3X85g?feature=oembed"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen=""></iframe>
                                </div>
        
                                <p>
                                    Наше радио начало вещание 14 декабря 1998 года. Радио объединило поклонников русского рока,
                                    как в России,  так и за рубежом.
                                </p>
                                <p>
                                    Ежедневная аудитория радио - более 2 мил. слушателей, включая онлайн трансляции через
                                    интернет. Среди исполнителей: ДДТ, Алиса, Сплин, Би2, Земфира и многие другие. Также на
                                    Нашем Радио можно услышать совершенно <a href="#">неизвестные группы и исполнителей</a>.
                                </p>
        
                            </div>
                        </div>
                        
                        <div class="page__right page__right--camera">
                            <div class="page__right-wrapper">
                                <div class="camers__item camers__item--camera">
                                    <div class="camers__header">
                                        <!-- <iframe src="" frameborder="0"></iframe> -->
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/camera.jpg" alt="camera">
                                    </div>
                                    <div class="camers__body camers__body--camera">
                                        <h4 class="camers__name">Парк Победы</h4>
                                        <a href="#" class="detailed detailed--news detailed--camers">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="white-form">
                                <h3 class="white-form__title">Вы можете оставить комментарий</h3>
                                <form class="white-form__form">
                                <input type="hidden" name="name_page" value="<?= $titlePage ?>" />
                                    <label data-modal-Inputwrap class="white-form__label white-form__label--name">
                                        <input type="text" name="name" placeholder="Ваше имя" class="white-form__input">
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
   <?php 
    get_footer();
   ?>