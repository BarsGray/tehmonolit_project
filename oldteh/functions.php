<?php
//подключение стилей и скриптов
add_action('wp_print_styles', 'theme_name_styles');

function theme_name_styles(){
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Roboto+Slab:100,300,400,700');
    wp_enqueue_style('fontawesome.css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '1.0.0');
    wp_enqueue_style('jquery.bxslider.min.css', get_template_directory_uri() . '/css/jquery.bxslider.min.css', array(), '1.0.0');
    wp_enqueue_style('style.css', get_stylesheet_uri(), array(), '1.0.1');
}

add_action('wp_print_scripts', 'theme_name_scripts');

function theme_name_scripts() {
    wp_enqueue_script( 'jquery.bxslider.min.js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('myScript.js', get_template_directory_uri() . '/js/myScript.js', array('jquery'), '1.0.1', true);
}

//Произвольное меню
if ( function_exists( 'register_nav_menus' ) )
{
register_nav_menus(array('header_menu'=>'header_menu'));
}

function header_menu(){
echo '<ul>';
    wp_list_pages('title_li=&');
    echo '</ul>';
}

//миниатюры
add_theme_support( 'post-thumbnails' );

//размеры миниатюр
add_image_size('img_home-slider-first', 669, 365, true);
add_image_size('img_slider_foto_gallery_home', 275, 173, true);
add_image_size('foto_gallery', 196, 147, true);

//Breadcrumb
function the_breadcrumb() {
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home').'">';
        echo 'Главная';
        echo "</a> <span class='divider'>	&#8594;</span></li> ";
        if (is_category() || is_single()) {
            echo "<li>";
            single_cat_title();
            echo "</li>";
            if (is_single()) {
                the_category(', ');
                echo " <span class='divider'>	&#8594;</span><li> ";
                the_title();
                echo "</li>";
            }
        } elseif (is_page()) {
            echo "<li>";
            echo the_title();
            echo "</li>";
        }
        elseif (is_tag()) {
            echo 'Записи с меткой "';
            single_tag_title();
            echo '"'; }
        elseif (is_day()) {echo "Архив за"; the_time('  jS F Y');}
        elseif (is_month()) {echo "Архив "; the_time(' F  Y');}
        elseif (is_year()) {echo "Архив за "; the_time(' Y');}
        elseif (is_author()) {echo "Архив автора";}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Архив блога";}
        elseif (is_search()) {echo "Результаты поиска";}
        elseif (is_404()) {	echo '404 - Страница не найдена';}
    }
}


//Постраничная навигация

function kama_pagenavi( $before = '', $after = '', $echo = true, $args = array(), $wp_query = null ) {
    if( ! $wp_query ){
        wp_reset_query();
        global $wp_query;
    }

    // параметры по умолчанию
    $default_args = array(
        'text_num_page'   => '', // Текст перед пагинацией. {current} - текущая; {last} - последняя (пр. 'Страница {current} из {last}' получим: "Страница 4 из 60" )
        'num_pages'       => 10, // сколько ссылок показывать
        'step_link'       => 10, // ссылки с шагом (значение - число, размер шага (пр. 1,2,3...10,20,30). Ставим 0, если такие ссылки не нужны.
        'dotright_text'   => '…', // промежуточный текст "до".
        'dotright_text2'  => '…', // промежуточный текст "после".
        'back_text'       => '« назад', // текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
        'next_text'       => 'вперед »', // текст "перейти на следующую страницу". Ставим 0, если эта ссылка не нужна.
        'first_page_text' => '« к началу', // текст "к первой странице". Ставим 0, если вместо текста нужно показать номер страницы.
        'last_page_text'  => 'в конец »', // текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
    );

    $default_args = apply_filters('kama_pagenavi_args', $default_args ); // чтобы можно было установить свои значения по умолчанию

    $args = array_merge( $default_args, $args );

    extract( $args );

    $posts_per_page = (int) $wp_query->get('posts_per_page');
    $paged          = (int) $wp_query->get('paged');
    $max_page       = $wp_query->max_num_pages;

    //проверка на надобность в навигации
    if( $max_page <= 1 )
        return false;

    if( empty( $paged ) || $paged == 0 )
        $paged = 1;

    $pages_to_show = intval( $num_pages );
    $pages_to_show_minus_1 = $pages_to_show-1;

    $half_page_start = floor( $pages_to_show_minus_1/2 ); //сколько ссылок до текущей страницы
    $half_page_end = ceil( $pages_to_show_minus_1/2 ); //сколько ссылок после текущей страницы

    $start_page = $paged - $half_page_start; //первая страница
    $end_page = $paged + $half_page_end; //последняя страница (условно)

    if( $start_page <= 0 )
        $start_page = 1;
    if( ($end_page - $start_page) != $pages_to_show_minus_1 )
        $end_page = $start_page + $pages_to_show_minus_1;
    if( $end_page > $max_page ) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = (int) $max_page;
    }

    if( $start_page <= 0 )
        $start_page = 1;

    //выводим навигацию
    $out = '';

    // создаем базу чтобы вызвать get_pagenum_link один раз
    $link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
    $first_url = get_pagenum_link( 1 );
    if( false === strpos( $first_url, '?') )
        $first_url = user_trailingslashit( $first_url );

    $out .= $before . "<div class='wp-pagenavi'>\n";

    if( $text_num_page ){
        $text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
        $out.= sprintf( "<span class='pages'>$text_num_page</span> ", $paged, $max_page );
    }
    // назад
    if ( $back_text && $paged != 1 )
        $out .= '<a class="prev" href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $back_text .'</a> ';
    // в начало
    if ( $start_page >= 2 && $pages_to_show < $max_page ) {
        $out.= '<a class="first" href="'. $first_url .'">'. ( $first_page_text ? $first_page_text : 1 ) .'</a> ';
        if( $dotright_text && $start_page != 2 ) $out .= '<span class="extend">'. $dotright_text .'</span> ';
    }
    // пагинация
    for( $i = $start_page; $i <= $end_page; $i++ ) {
        if( $i == $paged )
            $out .= '<span class="current">'.$i.'</span> ';
        elseif( $i == 1 )
            $out .= '<a href="'. $first_url .'">1</a> ';
        else
            $out .= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
    }

    //ссылки с шагом
    $dd = 0;
    if ( $step_link && $end_page < $max_page ){
        for( $i = $end_page+1; $i<=$max_page; $i++ ) {
            if( $i % $step_link == 0 && $i !== $num_pages ) {
                if ( ++$dd == 1 )
                    $out.= '<span class="extend">'. $dotright_text2 .'</span> ';
                $out.= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
            }
        }
    }
    // в конец
    if ( $end_page < $max_page ) {
        if( $dotright_text && $end_page != ($max_page-1) )
            $out.= '<span class="extend">'. $dotright_text2 .'</span> ';
        $out.= '<a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $last_page_text ? $last_page_text : $max_page ) .'</a> ';
    }
    // вперед
    if ( $next_text && $paged != $end_page )
        $out.= '<a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $next_text .'</a> ';

    $out .= "</div>". $after ."\n";

    $out = apply_filters('kama_pagenavi', $out );

    if( $echo )
        return print $out;

    return $out;
}
/**
 * 2.5 - 2.5.1 - автоматический сброс основного запроса.
 */