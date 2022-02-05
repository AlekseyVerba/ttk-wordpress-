<?php 

require(ABSPATH.'/mailer/PHPMailerAutoload.php'); 
$email_from = 'wordpress@ttk.tw1.ru';
$email_to = "hicedod540@o3live.com";



    add_action( 'wp_enqueue_scripts', 'add_scripts' );
    // add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
    function add_scripts() {
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.min.css' );
        // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );


        wp_deregister_script( 'jquery-core' );
        wp_register_script( 'jquery-core', get_template_directory_uri() . '/assets/js/jquery.min.js');
        wp_enqueue_script( 'jquery' );

        wp_enqueue_script( 'plugins',  get_template_directory_uri() . '/assets/js/plugins.min.js', array("jquery"), false, true);
        wp_enqueue_script( 'main',  get_template_directory_uri() . '/assets/js/main.min.js', array("jquery"), false, true);
    }
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );




      // удаление text/js text/css
      add_action( 'template_redirect', function(){
        ob_start( function( $buffer ){
            $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
            $buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
            return $buffer;
        });
      });



    function get_page_id($slug) {
        $page = get_page_by_path( $slug);
      
        // the_post($page->ID);
        global $post;
        $post = get_post($page->ID);

      }




    // Замена стандартного шорткода галереи
add_filter('post_gallery', 'my_gallery_output', 10, 2);
function my_gallery_output( $output, $attr ){
  $ids_arr = explode(',', $attr['ids']);
  // $ids_arr = array_map('trim', $attr['ids'] );

  $pictures = get_posts( array(
    'posts_per_page' => -1,
    'post__in'       => $ids_arr,
    'post_type'      => 'attachment',
    'orderby'        => 'post__in',
  ) );

  $out = '
    <div class="gallery">
      <div class="swiper-container g-slider g-slider--top">
        <div class="swiper-wrapper g-slider__wrapper">';

          foreach( $pictures as $pic ):
            $src = $pic->guid;
            $id = $pic->ID;
            $t = esc_attr( $pic->post_title );
            $title = ( $t && false === strpos($src, $t)  ) ? $t : '';

            $out .= '
              <div class="swiper-slide g-slider__slide">
                <a data-fancybox="gallery" href="'.wp_get_attachment_image_src( $id, 'gallery_img' )[0].'">
                  <img src="'.wp_get_attachment_image_src( $id, 'gallery_img' )[0].'" alt="'.$title.'">
                </a>
              </div>';
          endforeach;
  $out .= '
        </div>
      </div>
      <div class="g-slider__bottom">
        <div class="swiper-button-prev swiper-button g-slider__btn g-slider__btn--prev ">
            <div class="g-slider__block g-slider__block--left"></div>
        </div>
        <div class="swiper-container g-slider g-slider--thumbs">
          <div class="swiper-wrapper g-slider__wrapper">';

            foreach( $pictures as $pic ):
              $src = $pic->guid;
              $id = $pic->ID;
              $t = esc_attr( $pic->post_title );
              $title = ( $t && false === strpos($src, $t)  ) ? $t : '';

              $out .= '
                <div class="swiper-slide g-slider__slide g-slider__slide--thumbs">
                  <img src="'.wp_get_attachment_image_src( $id, 'gallery_thumb' )[0].'" alt="'.$title.'">
                </div>';
            endforeach;

  $out .= '
          </div>
        </div>
        <div class="swiper-button-next swiper-button g-slider__btn g-slider__btn--next">
            <div class="g-slider__block g-slider__block--right"></div>
    </div>
      </div>
    </div>';

  return $out;
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


function the_excerpt_max_charlength( $charlength ){
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

/*Подзагрузка AJAX*/ 

// add_action('wp_head', 'myplugin_ajaxurl');

// function myplugin_ajaxurl() {

//    echo '<script type="text/javascript">
//            var ajaxurl = "' . admin_url('admin-ajax.php') . '";
//          </script>';
// }

// wp_localize_script( 'ajax-script', 'myajax',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );


// add_action( 'wp_enqueue_scripts', 'myajax_data', 99 ); 
// function myajax_data(){ 
//   wp_localize_script('script', 'myajax', 
//     array( 
//       'ajax_url' => admin_url('admin-ajax.php') 
//     ) 
//   ); 
// }


add_action( 'wp_enqueue_scripts', 'myajax_data', 99 ); 
function myajax_data(){ 
  wp_localize_script('main', 'myajax', 
    array( 
      'url' => admin_url('admin-ajax.php') 
    ) 
  ); 
}

// wp_enqueue_script('custom'); //Name of the script. Should be unique.here is 'custom'
// wp_localize_script('custom', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));  // remove admin_script and add unique javascript file.





    ## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if( 'disable_gutenberg' ){
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
  
    // отключим подключение базовых css стилей для блоков
    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
  
    // Move the Privacy Policy help notice back under the title field.
    add_action( 'admin_init', function(){
      remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
      add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    } );
  }





      // Кастомизация меню
// верхнее
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
  /*
  * Позволяет перезаписать <ul class="sub-menu">
  */
  function start_lvl(&$output, $depth = 0, $args = array()) {
     /*
     * $depth – уровень вложенности, например 2,3 и т д
     */ 
     if($depth == 0)
      $output .= '<ul class="menu__submenu submenu">';
  }
  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output
   * @param object $item Объект элемента меню, подробнее ниже.
   * @param int $depth Уровень вложенности элемента меню.
   * @param object $args Параметры функции wp_nav_menu
   */
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
     global $wp_query;           

     $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
     /*
     * Генерируем строку с CSS-классами элемента меню
     */
     $class_names = $value = '';
       $classes = array();
       $classes_sub = array();

     if($depth == 0) {
        $classes[] = 'header-down__wrapper';
            // функция join превращает массив в строку
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
        
            /*
            * Генерируем элемент меню
            */
            $output .= $indent . '<li' . $value . $class_names .'>';
     } else {
            $classes_sub[] = 'header-down__item';
            // функция join превращает массив в строку
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes_sub ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
        
            /*
            * Генерируем элемент меню
            */
            $output .= $indent . '<li' . $value . $class_names .'>';

     }

 
     // атрибуты элемента, title="", rel="", target="" и href=""
     $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
     $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
     $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
     // ссылка и околоссылочный текст
     $item_output = $args->before;
       if($depth == 0) {
      $item_output .= '<a class="header-down__link" '. $attributes .'>';
    } else {
      $item_output .= '<a  class="header-down__item-link" '. $attributes .'>';
    }
     $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
     $item_output .= '</a>';
     $item_output .= $args->after;
 
     $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}


// $query = new WP_Query( array(
//   'post_type' => 'service',
//   'posts_per_page'   => -1, 
//   "orderby" => "rand",
//   // 'services' => $cat_slug
//   'tax_query' => array(
//   array(
//   'taxonomy' => 'services',
//   'field'    => 'slug',
//   'terms'    => ["video-monitored", "internet_and_tv", "radio", "subscription", "tv"]
//   )
//   )
// ));
// var_dump($query);
// if ( $query->have_posts() ) {
// 	while ( $query->have_posts() ) {
// 		$query->the_post();
//     echo "ff";
// 	}
// } else {
// 	// Постов не найдено
// }
// Возвращаем оригинальные данные поста. Сбрасываем $post.
wp_reset_postdata();

add_filter( 'manage_'.'service'.'_posts_columns', 'add_views_column', 4 );
function add_views_column( $columns ){
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
		'views' => 'Категория',
    "tarif" => "Тариф"
	);

	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}



add_action('manage_'.'service'.'_posts_custom_column', 'fill_views_column', 5, 2 );
function fill_views_column( $colname, $post_id ){
	if( $colname === 'views' ){
    $res_one = [];
    $arr_one = get_the_terms( $post_id, "services" );
    foreach($arr_one as $item) {
      $res_one[] = $item-> name;
    }
    echo implode (", " , $res_one );

	}
  if ($colname === 'tarif') {
    $res = [];
    $arr = get_the_terms( $post_id, "rates" );
    foreach($arr as $item) {
      $res[] = $item-> name;
    }
    echo implode (", " , $res );
  }
}

// $terms = get_terms( 'service', [
// 	'hide_empty' => false,
// ] );
// var_dump($terms);

// $wp_query = new WP_Query( array(
//   'post_type' => 'service',
//   'posts_per_page'   => -1, 
//   "orderby" => "rand",
//   // 'services' => $cat_slug
//   'tax_query' => array(
//   array(
//   'taxonomy' => 'services',
//   'field'    => 'slug',
//   'terms'    => [""]
//   )
//   )
// ));


// var_dump($wp_query);




class Primary_Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
  /*
  * Позволяет перезаписать <ul class="sub-menu">
  */
  function start_lvl(&$output, $depth = 0, $args = array()) {
     /*
     * $depth – уровень вложенности, например 2,3 и т д
     */ 
     if($depth == 0)
      $output .= '<ul class="menu__submenu submenu">';
  }
  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output
   * @param object $item Объект элемента меню, подробнее ниже.
   * @param int $depth Уровень вложенности элемента меню.
   * @param object $args Параметры функции wp_nav_menu
   */
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
     global $wp_query;           

     $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
     /*
     * Генерируем строку с CSS-классами элемента меню
     */
     $class_names = $value = '';
       $classes = array();
       $classes_sub = array();

     if($depth == 0) {
        $classes[] = 'footer__item';
            // функция join превращает массив в строку
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
        
            /*
            * Генерируем элемент меню
            */
            $output .= $indent . '<li' . $value . $class_names .'>';
     } else {
            $classes_sub[] = 'header-down__item';
            // функция join превращает массив в строку
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes_sub ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
        
            /*
            * Генерируем элемент меню
            */
            $output .= $indent . '<li' . $value . $class_names .'>';

     }

 
     // атрибуты элемента, title="", rel="", target="" и href=""
     $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
     $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
     $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
     // ссылка и околоссылочный текст
     $item_output = $args->before;
       if($depth == 0) {
      $item_output .= '<a class="footer__link" '. $attributes .'><span>';
    } else {
      $item_output .= '<a  class="header-down__item-link" '. $attributes .'>';
    }
     $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
     $item_output .= '</span></a>';
     $item_output .= $args->after;
 
     $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}











       // Отправка формы партнеры
// add_action('wp_ajax_application_fun', 'parthers'); 

add_action('wp_ajax_block_question', 'parthers');
add_action('wp_ajax_nopriv_block_question', 'parthers');
add_action('wp_ajax_form_zayvka', 'parthers');
add_action('wp_ajax_nopriv_form_zayvka', 'parthers');
add_action('wp_ajax_modal_contact', 'parthers');
add_action('wp_ajax_nopriv_modal_contact', 'parthers');
add_action('wp_ajax_white_form', 'parthers');
add_action('wp_ajax_nopriv_white_form', 'parthers');



// white_form
// modal_contact


function parthers() { 
  var_dump($_POST['form']);
  global $email_from; 
  global $email_to; 
  $mail = new PHPMailer; 
  $mail->setFrom($email_from, 'Заявка с сайта');
  $mail->addAddress($email_to); 
  $mail->addAddress("test@t-code.ru");
  $mail->IsHTML(true); 
  $mail->CharSet = 'UTF-8'; 

  $form = $_POST['form']; 

  $mail->Subject = 'Письмо с сайта'; 
  $echo = "Ваше сообщение отправлено"; 

  $mail->Body = ''; 


  foreach($form as $data){ 
    switch($data['name']){ 

      case 'title': 
      $mail->Body .= 'Тема письма: '.$data['value'].'<br>'; 
      break;
      case 'name_page': 
        $mail->Body .= 'Отправлено со страницы: '.$data['value'].'<br>'; 
        break; 

      case 'nameCard':
        $mail->Body .= 'Название карточки: '.$data['value'].'<br>'; 
        break;

        // priceCard
      case 'priceCard':
        $mail->Body .= 'Цена карточки: '.$data['value'].'<br><br><br>'; 
        break;

      case 'name': 
        $mail->Body .= 'Имя: '.$data['value'].'<br>'; 
        break;

      case 'service': 
        $mail->Body .= 'Услуга: '.$data['value'].'<br>'; 
        break;

      case 'category': 
        $mail->Body .= 'Категория: '.$data['value'].'<br>'; 
        break;
      

        // category
        
      case 'adress': 
        $mail->Body .= 'Адрес: '.$data['value'].'<br><br>'; 
        break; 

      case 'mail': 
        $mail->Body .= 'email: '.$data['value'].'<br>'; 
        break; 
      case 'number-dog': 
        $mail->Body .= 'Номер договора: '.$data['value'].'<br>'; 
        break; 

    

      case 'phone': 
      $mail->Body .= 'Номер телефона: '.$data['value'].'<br>'; 
      break; 

      case 'room': 
        $mail->Body .= 'Помещение '.$data['value'].'<br>'; 
        break; 
        
      case 'priceMonth':
        $mail->Body .= 'Оплата в месяц '.$data['value'].'<br>'; 
        break; 

      case 'priceYear':
        $mail->Body .= 'Единоразовая оплата '.$data['value'].'<br>'; 
        break;

  
      case 'comment': 
      $mail->Body .= 'Комментарий: '.$data['value'].'<br>'; 
      break; 
      
    

      }

  } 

  $mail->Send(); 

  echo $echo; 

  die(); 
};




?>