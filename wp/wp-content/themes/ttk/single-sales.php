<?php   
    get_header('main');
?>
        
            <main class="page">
                <section class="container">
                    <div class="page__inner">
                        <div class="page__left">
                            <div class="page__left-wrapper">
                               <h1 class="title page__main-title--camera">
                                   <?php 
                                    the_title();
                                   ?>
                               </h1>
                                <?php 
                                    the_content();
                                ?>
                        
                            </div>
                        </div>
                        <div class="page__right">
                            <div class="page__right-wrapper">
                                <h2 class="page__title">Другие акции</h2>
                                <div class="news__items news__items--big news__items--sidebar">


                                    <?php 
                        
                                        $args = array(
                                            'posts_per_page' => 3,
                                            'post_type' => 'sales',
                                            'post__not_in' =>array(get_the_ID()),
                                            'orderby' => 'date'
                                        );
                                        
                                        $wp_query = new WP_Query( $args );
                                        // $GLOBALS['wp_query'] = $wp_query;
                                        // var_dump($query);
                                        // Цикл
                                        if ( $wp_query->have_posts() ) {
                                            while ( $wp_query->have_posts() ) {
                                                $wp_query->the_post();
                                                ?>


                                                <div class="news__item news__item--big news__item--sidebar">
                                                    <div class="news__header news__header--stocks news__header--sidebar-stock">
                                                        <?php 
                                                            if (get_the_post_thumbnail()) {
                                                                echo get_the_post_thumbnail();
                                                            } else {
                                                                ?>
                                                                    <img src="<?= bloginfo('template_directory') ?>/assets/images/static/zagluh.svg" style="font-family: 'object-fit: none;'" />
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="news__body news__body--big news__body--sidebar news__body--sidebar-stock">
                                                        <a href="<? the_permalink() ?>" class="news__title news__title--big news__title--sidebar"><?php echo the_title(); ?></a>
                                                        <p class="news__descr news__descr--big news__descr--sctocks news__descr--sidebar">
                                                            <?php the_excerpt_max_charlength(125) ?>
                                                        </p>
                                                        <a href=<? the_permalink() ?>"
                                                             style="font-size: 20px" class="services__detailed services__detailed--sidebar services__detailed--guide detailed">
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
        
        
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        
        
        
        
        
        </div>
   <?php 
    get_footer();
   ?>