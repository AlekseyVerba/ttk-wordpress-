<?php 
    get_header("main");
?>


    <main class="page">
                <section class="container">
                    <div class="page__inner">
                        <div class="page__left">
                            <div class="page__left-wrapper">
                               <!-- <h1 class="title page__main-title--camera">
                               </h1> -->
                                <?php 
                                    the_content();
                                ?>
                        
                            </div>
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
<?php 
    get_footer();
?>