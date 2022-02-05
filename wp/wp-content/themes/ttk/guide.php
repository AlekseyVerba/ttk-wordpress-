<?php 
    //  Template Name: Справочник абонента
    get_header('main');
?>
<?php 
    $items = get_field('vopros-otvet');
?>

        
            <h2 class="title title--guide">Справочник абонента</h2>
            <div class="services services--guide">
                <div class="container">
                    <div class="services__inner">


                    <?php 
                            // global $wp_query;
                            $args = array(
                                'posts_per_page' => -1,
                                'post_type' => 'guide',
                                'orderby' => 'count'
                            );
                            
                            $wp_query = new WP_Query( $args );
                            // $GLOBALS['wp_query'] = $wp_query;
                            // var_dump($query);
                            // Цикл
                            if ( $wp_query->have_posts() ) {
                                while ( $wp_query->have_posts() ) {
                                    $wp_query->the_post();
                                    ?>

                                    <a href="<? the_permalink() ?>" class="services__card services__card--guide">
                                        <div class="services__top services__top--guide">
                                            <div class="services__img services__img--guide">
                                                <?php echo get_the_post_thumbnail() ?>
                                            </div>
                                            <h4 class="services__title services__title--guide">
                                                <?php the_title(); ?>
                                            </h4>
                                        </div>
                                        <div class="services__bottom">
                                            <p class="services__descr services__descr--guide">
                                            <?php the_excerpt_max_charlength(125) ?>
                                            </p>
                                            <button class="services__detailed services__detailed--guide detailed">
                                                Подробнее
                                            </button>
                                        </div>
                                    </a>

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
        
        
        
            <h2 class="title title--guide title--questions">Часто задаваемые вопросы</h2>
        
            <div class="questions">
                <div class="container">
                    <div class="questions__inner">
                            <?php 
                            if (is_array($items)) {
                                foreach ($items as $item) { ?>

                                    <div class="questions__item questions__item--guide">
                                        <div class="questions__up" data-question>
                                            <h4 class="questions__title" data-question-title><?= $item['vopros'] ?></h4>
                                            <div class="questions__arrow">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/static/arrow-down.svg" class="questions__arrow-img" alt="arrow"
                                                    data-question-img>
                                            </div>
                                        </div>
                                        <div class="question__answer" data-answer>
                                            <?= $item['otvet'] ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
