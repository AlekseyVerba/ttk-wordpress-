<?php 
    // Template Name: Поиск
    get_header('main');
?>
            
            <div class="search-block">
                <div class="container">
                    <div class="search-block__inner">
                        <form class="search-block__form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
                            <input type="text" class="search-block__input" placeholder="Поиск..." value="<?php echo get_search_query() ?>" name="s" id="s">
                            <button type='submit' class="button button--blue button--search-block">Найти</button>
                        </form>
                        
                        <?php 
                $get = "........";
                $count = 0;
                if ($_GET['s']) {
                    $get = mb_strtolower($_GET['s']);
                } 
                $query = new WP_Query( array(
                    'post_type' => array( 'news', 'sales', 'cameras', 'guide' ),
                    'posts_per_page' => -1,
                ) );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $item = mb_strtolower($post->post_title);
                        if (stristr($item, $get) != false) {
                         
                            $count++;
                        }
                    }
                } else {
                    // Постов не найдено
                }
                // Возвращаем оригинальные данные поста. Сбрасываем $post.
                wp_reset_postdata();
            ?>
                        <div class="search-block__result">
                            <span class="search-block__info"><?= $count ?> результат(ов)</span>
                            <div class="search-block__items">

                            <?php 
                                if ($_GET['s']) {
                                    $get = mb_strtolower($_GET['s']);
                                } 
                                $query = new WP_Query( array(
                                    'post_type' => array( 'news', 'sales', 'cameras', 'guide', 'pays' ),
                                    'posts_per_page' => -1,
                                ) );
                                if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                        $query->the_post();
                                        // var_dump($post);
                                        $item = mb_strtolower($post->post_title);
                                        if (stristr($item, $get) != false) {
                                            $category = '';
                                            switch ($post->post_type) {
                                                case 'service':
                                                    $category = 'Услуги';
                                                    break;
                                                case 'news':
                                                    $category = "Новости";
                                                    break;
                                                case 'guide':
                                                    $category = "Справочник абонента";
                                                    break;
                                                case 'cameras':
                                                    $category = "Трансляции";
                                                    break;
                                                case 'pays':
                                                    $category = "Метод оплаты";
                                                    break;
                                                case 'sales':
                                                    $category = "Акции";
                                                    break;
                                            }
                                            ?>
                                                <div class="search-block__item">
                                                    <div class="search-block__name">
                                                        <span class="search-block__category"><?=  $category ?></span>
                                                        <span class="search-block__slash"> / </span>
                                                        <a href="<?= the_permalink() ?>" class="search-block__section"><?= $post->post_title ?> </a>
                                                    </div>
                                                    <p class="search-block__descr">
                                                        <?php the_excerpt_max_charlength(125) ?>
                                                    </p>
                                                </div>

                                            <?php


                                            
                                        }
                                    }
                                } else {
                                    // Постов не найдено
                                }
                                // Возвращаем оригинальные данные поста. Сбрасываем $post.
                                wp_reset_postdata();
                                if ($count == 0) {
                                    ?>
                                        <h3 class='search__no-result'>По вашему запросу ничего не было найдено</h3>
                                    <?php
                                }
                            ?>

                            </div>
                        </div>
                        <!-- <div class="search-block__no-result">
                            <p class="search-block__desctop">
                                По вашему запросу ничего не было найдено
                            </p>
                            <p class="search-block__mobile">
                                Ничего не найдено
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        
        </div>
  <?php 
    get_footer();
  ?>