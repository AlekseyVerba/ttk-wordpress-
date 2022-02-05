<?php 
  // Template Name: Камеры
get_header('main'); ?>
            <div class="camers-title">
                <div class="container">
                    <h1 class="title title--camers"><?php the_title(); ?></h1>
                    <p class="camers-title__descr">
                        
                        <?= the_field("podzagolovok_camers") ?>
                    </p>
                </div>
            </div>
        
            <div class="camers">
                <div class="container">
                    <div class="camers__content">

                    <?php 

                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'cameras',
                        );
                        
                        $wp_query = new WP_Query( $args );
                        // $GLOBALS['wp_query'] = $wp_query;
                        // var_dump($query);
                        // Цикл
                        if ( $wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                ?>


                                <div class="camers__item">
                                    <div class="camers__header">
                                        <!-- <iframe src="" frameborder="0"></iframe> -->
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
                                    <div class="camers__body">
                                        <h4 class="camers__name"><? the_title(); ?></h4>
                                        <a href="<? the_permalink() ?>" class="detailed detailed--news detailed--camers">
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
  <?php get_footer(); ?>