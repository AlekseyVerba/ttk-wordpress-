<?php 
    // Template Name: Метод оплаты
    get_header('main');
?>
        <h1 class="title">
            Способы оплаты
        </h1>
        <div class="method-pay">
            <div class="container">
                <div class="method-pay__items">



                        <?php 
                        // global $wp_query;
                        $paged = get_query_var('paged') ?: 1;

                        if(isset($_GET['pag']) && $_GET['pag'] !== "") {
                            $paged = (int)$_GET['pag'];
                            // var_dump($paged);
                        }
                        $args = array(
                            'posts_per_page' => 10,
                            'post_type' => 'pays',
                            'paged' => $paged
                        );
                        
                        $wp_query = new WP_Query( $args );
                        // Цикл
                        if ( $wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                ?>

                                    <div class="method-pay__item">
                                        <?php 
                       
                                            if (get_field("kartochka_budet_polnostyu_fotografiej") == "no") {
                                                ?>
                                                <div class="method-pay__wrapper">
                                                    <?= get_the_post_thumbnail() ?>
                                                    <div class="method-pay__buttons">
                                                    <?php 
                                                        $buttons = get_field("button_card");
                                                        foreach($buttons as $button) {
                                                       
                                                            if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
                                                                
                                                                if ($button['knopka_dlya_mobilnoj_versii']) {
                                                                    $style = "";
                                                                    if ($button['button_card_color']) {
                                                                        $style = "background:".$button['button_card_color'];
                                                                    }
                                                                    ?>
                                                                    <a href="<?= $button['button_card_url'] ?>" style=<?= $style ?> class="method-pay__button"><?= $button["button_card_text"] ?></a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                   
                                                                    
                                                                <?php
                                                            } else {
                                                                // var_dump($button['knopka_dlya_mobilnoj_versii']);
                                                                
                                                                if ($button['knopka_dlya_mobilnoj_versii'] !== "yes") {
                                                                    $style = "";
                                                                    if ($button['button_card_color']) {
                                                                        $style = "background:".$button['button_card_color'];
                                                                    }
                                                                    ?>
                                                                        <a href="<?= $button['button_card_url'] ?>" style=<?= $style ?>  class="method-pay__button"><?= $button["button_card_text"] ?></a>
                                                                    <?php
                                                                }
                                                                
                                                            }
                                                            ?>
                                                                
                                                            <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                                <p class="method-pay__descr">
                                                    <?= the_field('description_method_pay') ?>
                                                </p>
                                                <?php
                                            } else {
                                                ?>
                                                          <a target='_blank' href="<?= the_field('url_method_pay') ?>" class="method-pay__img method-pay__img--full ">
                                                                    <?= get_the_post_thumbnail() ?>
                                                            </a>
                                                            <p class="method-pay__descr">
                                                                <?= the_field('description_method_pay') ?>
                                                            </p>
                                                <?php
                                            }
                                        ?>
                                    </div>




                                <?php
                            }
                            ?>
                                <div class="pagination">
                                <?php
                                $page_id = get_page_id('method-pay');
                                the_posts_pagination(array(
                                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                                    'end_size'     => 1,     // количество страниц на концах
                                    'mid_size'     => 1,     // количество страниц вокруг текущей
                                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                                    'prev_text'    => '<div class="pagination__arrow pagination__arrow--left"></div>',
                                    'next_text'    => ' <div class="pagination__arrow pagination__arrow--right"></div>',
                                    'screen_reader_text' => "",
                                    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                                    'screen_reader_text' => __( 'Posts navigation' ),
                                    'base'  => get_page_link($page_id) . '%_%',
                                    'format' => '?pag=%#%',
                                )); ?>
                            </div>
                            <?php
                        } else {
                            // Постов не найдено
                        }
                        // Возвращаем оригинальные данные поста. Сбрасываем $post.
                        wp_reset_postdata();
                    ?>



                    
    
                </div>
            </div>
        </div>
    
    
    </div>
     <?php 
        get_footer();
     ?>