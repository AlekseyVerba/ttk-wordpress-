<?php 
    get_header('main');
?>
            <div class="breadcrumbs breadcrumbs--error">
                <div class="container">
                    <div class="breadcrumbs__inner">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                    </div>
                </div>
            </div>
        
            <h1 class="error-title">Ошибка 404</h1>
            <div class="error">
                <div class="container">
                    <div class="error__content">
                        <div class="error__img">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/Vector.svg" alt="voskl">
                        </div>
                        <ol class="error__list" type="1">
                            <li class="error__item">Чтобы быть уверенным, проверьте, правильно ли вы ввели адрес, или же
                                попробуйте выполнить поиск в правом верхнем углу. </li>
                            <li class="error__item">Если ничего не помогает, мы рекомендуем вернуться на <a href="<?php echo get_home_url(); ?>">главную
                                    страницу</a>.</li>
                            <li class="error__item">Решение наиболее частых проблем можете найти в <a href="/guide/">справочнике
                                    абонента</a>.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<?php 
    get_footer();
?>