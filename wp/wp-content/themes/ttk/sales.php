<?php 
// Template Name: Акции
    get_header();
?>

            <?php 
                $sliders = get_field('slide_sales');
                if ($sliders) {
                    ?>

                        <div class="banner banner--stock">
                            <div class="container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php 
                                            foreach($sliders as $slide) {
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="banner__content">
                                                            <img src="<?= $slide['img_slide_sales'] ?>" alt="banner">
                                                            <div class="banner__info">
                                                                <h3 class="banner__title">
                                                                    <?= $slide['title_slide_sales'] ?>
                                                                </h3>
                                                                <a href="<?= $slide['url_slide_sales'] ?>" class="button button--blue">Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                    <?php
                }
            ?>
        
        
            <div class="news news--big">
                <div class="container">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="news__items news__items--big">




                    <?php 
                        // global $wp_query;
                        $paged = get_query_var('paged') ?: 1;

                        if(isset($_GET['pag']) && $_GET['pag'] !== "") {
                            $paged = (int)$_GET['pag'];
                            // var_dump($paged);
                        }
                        $args = array(
                            'posts_per_page' => 10,
                            'post_type' => 'sales',
                            'paged' => $paged
                        );
                        
                        $wp_query = new WP_Query( $args );
                        // $GLOBALS['wp_query'] = $wp_query;
                        // var_dump($query);
                        // Цикл
                        if ( $wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                ?>

                                
                                <div class="news__item news__item--big">
                                    <div class="news__header news__header--stocks">
                                        <?php 
                                            if (get_the_post_thumbnail()) {
                                                echo get_the_post_thumbnail();
                                            } else {
                                                ?>
                                                    <img src="<?= bloginfo('template_directory') ?>/assets/images/static/zagluh.svg" ?>
                                                <?php
                                            }
                                        
                                        ?>
                                    </div>
                                    <div class="news__body news__body--big">
                                        <a href="<? the_permalink() ?>" class="news__title news__title--big"><? the_title(); ?></a>
                                        <p class="news__descr news__descr--big news__descr--sctocks">
                                            <?php echo get_the_excerpt() ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="pagination">
                                <?php
                                $page_id = get_page_id('sales');
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