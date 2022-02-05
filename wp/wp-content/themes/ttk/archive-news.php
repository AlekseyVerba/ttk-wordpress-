<?php 
    
    /*
     * Template Name: Новости
     * 
     */
    get_header();
?>

        
           


            <div class="news news--big">
                <div class="container">
                    <h1 class="title">Новости</h1>
                    <div class="news__items news__items--big">
                    <?php 
                // global $wp_query;
                $paged = get_query_var('paged') ?: 1;
                if(isset($_GET['pag']) && $_GET['pag'] !== "") {
                    $paged = (int)$_GET['pag'];
                    // var_dump($paged);
                }
                $args = array(
                    'posts_per_page' => 1,
                    'post_type' => 'news',
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
                            <div class="news__header">
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
                                <h6 class="news__data news__data--big"><?php echo get_the_time('d F Y'); ?></h6>
                                <a href="<?php the_permalink() ?>" class="news__title news__title--big"><?php echo the_title(); ?></a>
                                <p class="news__descr news__descr--big">
                                   <!-- <?php echo $post->post_content ?> -->
                                   <!-- <?php the_excerpt(); ?>  -->

                                   <?php echo get_the_excerpt() ?>
                                </p>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                        <div class="pagination">
                        <?php
                        $page_id = get_page_id('news');
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