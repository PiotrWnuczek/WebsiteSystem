<?php

//WEBSITE SYSTEM by Piotr Wnuczek

//Setup

define ( 'theme', get_template_directory_uri() );

require_once ( 'redux.php' );

redux::init( 'redux' );

if ( ! function_exists( 'websitesystem_setup' ) ) :
function websitesystem_setup() {
   add_theme_support( 'automatic-feed-links' );
   add_theme_support( 'title-tag' );
   add_theme_support( 'post-thumbnails' );
   add_theme_support( 'responsive-embeds' );
   add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
   ) );
   require_once ( 'navwalker.php' );
   register_nav_menus( array(
      'menu1' => 'menu1',
      'menu2' => 'menu2',
   ) );
}
endif;
add_action( 'after_setup_theme', 'websitesystem_setup' );

//Widgets

function websitesystem_widgets_init() {
   register_sidebars( 5, array(
      'name' => 'Widget%d',
      'before_widget' => '<div class="container p-4 p-md-5 text-center">',
      'after_widget' => '</div>',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
   ) );
}
add_action( 'widgets_init', 'websitesystem_widgets_init' );

//Scripts

function websitesystem_scripts() {
   wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
   wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
   wp_enqueue_style( 'tabslideout', get_template_directory_uri() . '/css/tabs.css' );

   wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext' );
   wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css' );

   wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null);
   wp_enqueue_script('jquery');
   wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), null, true );

   wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );
   wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/scroll.js', array('jquery'), null, true );
   wp_enqueue_script( 'tabslideout', get_template_directory_uri() . '/js/tabs.js', array('jquery'), null, true );

   wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true );

   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
   }
}
add_action( 'wp_enqueue_scripts', 'websitesystem_scripts' );

add_post_type_support( 'page', 'excerpt' );

//Functions

function custom_init() {
   $args = array(
      'public' => true,
      'label' => 'Posty',
      'menu_position' => 5,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-admin-customizer',
   );
   register_post_type( 'postp', $args );
}
add_action( 'init', 'custom_init' );

function countPostViews($postID) {
   $count_key = 'post_views_count';
   $count = get_post_meta($postID, $count_key, true);
   if($count == '') {
      $count = 1;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '1');
   } else {
      $count++;
      update_post_meta($postID, $count_key, $count);
   }
}

function pagination() {
   global $wp_query;
   if ($wp_query->max_num_pages > 1) { echo '<p> Strony: ' . paginate_links( array(
      'base' => @add_query_arg('paged','%#%'),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'prev_text' => __('??'),
      'next_text' => __('??'),
   ) ) . '</p>'; }
}

require_once ('plugin.php');
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {
   $plugins = array(
      array(
         'name' => 'Redux',
         'slug' => 'redux-framework',
      ),
   );
   tgmpa( $plugins );
}

add_filter('use_block_editor_for_post_type', 'woocommerce_editor', 10, 2);
function woocommerce_editor($args, $post_type) {
	if($post_type == 'product') { $args = true; } return $args;
}

add_filter('register_post_type_args', 'learnpress_editor', 10, 2);
function learnpress_editor($args, $post_type) {
   if($post_type == 'lp_lesson') { $args['show_in_rest'] = true; } return $args;
}

//Woocommerce

function mytheme_add_woocommerce_support() {
   add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if ( $redux['orf'] == 2 ) { 
   add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');
   add_filter( 'woocommerce_checkout_fields' , 'unset_fields' );
   function unset_fields( $fields ) {
      unset($fields['billing']['billing_company']);
      unset($fields['billing']['billing_country']);
      unset($fields['billing']['billing_address_1']);
      unset($fields['billing']['billing_address_2']);
      unset($fields['billing']['billing_city']);
      unset($fields['billing']['billing_postcode']);
      unset($fields['billing']['billing_phone']);
      return $fields;
   }
}

//Elementor

function is_elementor() { 
   global $post;
   return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
}

//Shortcodes

function button_func( $atts, $content ) {
	$a = shortcode_atts( array(
		'link' => 'https://piotrwnuczek.pl/',
	), $atts );
	return '<p class="m-0 p-0 mx-1 d-inline-block"><a href="'.$a['link'].'" 
   class="btn btn-outline-primary btn-lg rounded-pill">'.$content.'</a></p>';
}
add_shortcode( 'button', 'button_func' );

function buttoncn_func( $atts, $content ) {
	$a = shortcode_atts( array(
		'link' => 'https://piotrwnuczek.pl/',
	), $atts );
	return '<p class="m-0 p-0 mx-1 d-inline-block"><a href="'.$a['link'].'" target="_blank" 
   class="btn btn-outline-primary btn-lg rounded-pill">'.$content.'</a></p>';
}
add_shortcode( 'buttoncn', 'buttoncn_func' );

function block_func( $atts, $content ) {
	$a = shortcode_atts( array(
		'link' => 'https://piotrwnuczek.pl/',
	), $atts );
	return '<a href="'.$a['link'].'" class="stretched-link"></a>';
}
add_shortcode( 'block', 'block_func' );

function blockcn_func( $atts, $content ) {
	$a = shortcode_atts( array(
		'link' => 'https://piotrwnuczek.pl/',
	), $atts );
	return '<a href="'.$a['link'].'" target="_blank" class="stretched-link"></a>';
}
add_shortcode( 'blockcn', 'blockcn_func' );

function navoff_func() {
	return '<style> .page-id-'.get_the_ID().' #nav {display: none;} 
   .postid-'.get_the_ID().' #nav {display: none;} </style>';
}
add_shortcode( 'navoff', 'navoff_func' );

function headeroff_func() {
	return '<style> .page-id-'.get_the_ID().' #header {display: none;} 
   .postid-'.get_the_ID().' #header {display: none;} </style>';
}
add_shortcode( 'headeroff', 'headeroff_func' );

function footeroff_func() {
	return '<style> .page-id-'.get_the_ID().' #footer {display: none;} 
   .postid-'.get_the_ID().' #footer {display: none;} </style>';
}
add_shortcode( 'footeroff', 'footeroff_func' );

// Dashboard

function dashboard_column() {
?> <style>
   #dashboard-widgets .postbox-container {
      width: 100% !important;
   }
   #dashboard-widgets #postbox-container-2,
   #dashboard-widgets #postbox-container-3,
   #dashboard-widgets #postbox-container-4 {
      display: none;
   }
</style> <?php
}
add_action('admin_head','dashboard_column');

add_action( 'admin_menu', 'remove_menu_pages' );
function remove_menu_pages() {
   remove_menu_page('tools.php');
}

function wporg_remove_all_dashboard_metaboxes() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );

function i1_dashboard_widgets() {
wp_add_dashboard_widget('i1', 'Start', 'i1'); }
add_action( 'wp_dashboard_setup', 'i1_dashboard_widgets' );
function i1() {
   echo '<ul class="text-left">
      <li>Witam w Website System, na pocz??tku najwa??niejsze informacje</li>
      <li>Strona internetowa dzia??a pod twoj?? domen??, a panel zarz??dzania uruchamia si?? po dodaniu do linku strony: /wp-admin</li>
      <li>Prze????czaj si?? mi??dzy stron??, a panelem, klikaj??c przycisk z tytu??em strony w lewej g??rnej cz??sci ekranu</li>
      <li>Wszystekie najwa??niejsze informacje opisane s?? w ramkach poni??ej, rozwi?? ramki i zobacz instrukcje</li>
      <li>Rozpocznij od ramki: Strona, ustawienia i zacznij dodawa?? tre???? i ustawia?? opcje</li>
   </ul>';
}

function i2_dashboard_widgets() {
wp_add_dashboard_widget('i2', 'Strona, ustawienia', 'i2'); }
add_action( 'wp_dashboard_setup', 'i2_dashboard_widgets' );
function i2() {
   echo '<ul class="text-left">
      <li>Na pocz??dku mo??esz ustawi?? swoje konto w zak??adce: u??ytkownicy > twoje konto</li>
      <li>Dodaj tytu?? i opis strony w zak????dce: ustawienia > og??lne</li>
      <li>Po dodaniu tre??ci i ustawieniu ca??ej strony w????cz widoczno???? dla wyszukiwarek w zak????dce: ustawienia > czytanie</li>
      <li>Twoje centrum zarz??dzania stron?? g????wn?? i ustawieniami znajduje si?? w zak????dce: strona g????wna</li>
      <li>W centrum zarz??dzania mo??esz ustawi?? stron?? i opcje, poukada?? stron?? g????wn?? i doda?? tre????</li>
      <li>Elementy z kt??ych nie ko??ystasz mozesz wy????czy?? lub zostawi?? w wersjach domy??lnych</li>
      <li>W cz????ci opcje / ustawienia uzupe??nij wa??ne opcje i pouk??adaj modu??y</li>
      <li>W modu??ach i widgetach, dodaj tre???? i ustaw opcje strony</li>
      <li>Modu?? slajder / prezentacja to nag????wek, kt??ry jest zawsze na g??rze strony g??ownej i podstron</li>
      <li>Modu?? kontakt / informacje to stopka, kt??ra jest zawsze na dole strony g????wnej i podstron</li>
   </ul>';
}

function i3_dashboard_widgets() {
wp_add_dashboard_widget('i3', 'Strony, wpisy, posty', 'i3'); }
add_action( 'wp_dashboard_setup', 'i3_dashboard_widgets' );
function i3() {
   echo '<ul class="text-left">
      <li>Tw??rz i dodawaj r????nego rodzaju podstrony w zak??adce: strony</li>
      <li>Dodawaj artyku??y, informacje i r????ne inne tre??ci, prezentowane na specjalnych stronach w zak??adce: wpisy</li>
      <li>Dodawaj informacje o projektach i inne tre??ci, prezentowane w specjalnych oknach w zak??adce: posty</li>
      <li>W edytorze dodajesz bloki tre??ci, mo??esz wybiera?? typy blok??w</li>
      <li>W opcjach po prawej stronie edytora, mo??esz doda?? na przyk??ad obrazek wyr????niaj??cy, kategori?? i zajawk??</li>
   </ul>';
}

function i4_dashboard_widgets() {
wp_add_dashboard_widget('i4', 'Menu, widgety', 'i4'); }
add_action( 'wp_dashboard_setup', 'i4_dashboard_widgets' );
function i4() {
   echo '<ul class="text-left">
      <li>Dodaj do menu najwa??niejsze elementy strony w zak??adce: wygl??d > menu</li>
      <li>Ustaw menu1 - mneu g????wne i menu2 - menu sklepu</li>
      <li>W menu mo??esz dodawa?? r????ne cz????ci strony takie jak podstrony i wpisy lub w??asne odno??niki</li>
      <li>Dodawaj elementy do widget??w w zak??adce: wygl??d > widgety i aktyw??j widgety w zak??adce: strona g????wna</li>
   </ul>';
}

function i5_dashboard_widgets() {
wp_add_dashboard_widget('i5', 'Media, komentarze, formularze', 'i5'); }
add_action( 'wp_dashboard_setup', 'i5_dashboard_widgets' );
function i5() {
   echo '<ul class="text-left">
      <li>Dodawaj grafiki i pliki do strony w zak??adce: media</li>
      <li>Zarz??dzaj komentarzami i edytuj je w zak??adce: komentarze</li>
      <li>Formularz kontaktowy, jest ustawiomy, nie usuwaj go, mo??esz go edytowa?? w zak??adce: formularze</li>
   </ul>';
}

function i6_dashboard_widgets() {
wp_add_dashboard_widget('i6', 'System tworzenia modu????w', 'i6'); }
add_action( 'wp_dashboard_setup', 'i6_dashboard_widgets' );
function i6() {
   echo '<ul class="text-left">
      <li>Elementor to system do tworzenia podstron, stron marketingowych, modu????w i szablon??w</li>
      <li>W zak??adce: elementor > ustawienia mo??esz zmienia?? opcje tego systemu</li>
      <li>Tw??rz specjalne strony w elementorze, dodaj stron??, tytu?? i wybierz opcj??: edytuj w elementorze</li>
      <li>Buduj w??asne modu??y w zak??adce: szablony i dodawaj do strony g????wnej i podstron, wklejaj??c kod w wybrane miejsce</li>
      <li>W edytorze wizualnym elementor dodawaj sekcje, elementy, szablony stron lub szablony sekcji</li>
      <li>Dodawanie sekcji ??? kliknij przycisk dodawania sekcji (ikona plus) w edytorze wizualnym i wybierz struktur??</li>
      <li>Dodawanie element??w ??? przeci??gnij elementy z panelu z lewej strony w wybrane miejsce na edytorze wizualnym</li>
      <li>Dodawanie szablon??w ??? kliknij przycisk dodawania szablon??w (ikona folderu) w edytorze wizualnym i wybierz szablon</li>
      <li>Edycja element??w ??? kliknij na wybrany element w edytorze wizualnym i edytuj w panelu po lewej stronie</li>
      <li>Integracja formularzy z systemem mailingowym ??? w elemencie form > action after submit wybierz i zintegruj system</li>
      <li>Zapisywanie szablon??w sekcji ??? kliknij prawym przyciskiem w edycj?? sekcji (ikona kropek) i zapisz sekcj??</li>
      <li>Zapisywanie w??asnych stron ??? kliknij przycisk zapisywania opcji (tr??jk??t obok aktualizuj) i zapisz stron??</li>
      <li>Rozpoczynanie od pustego szablonu, bez nag????wka i stopki - w zak??adce: atrybuty strony wybierz szablon brezentowy</li>
   </ul>';
}

function i7_dashboard_widgets() {
wp_add_dashboard_widget('i7', 'System sklepu internetowego', 'i7'); }
add_action( 'wp_dashboard_setup', 'i7_dashboard_widgets' );
function i7() {
   echo '<ul class="text-left">
      <li>Woocommerce to system sklepu inetrnetowego i autoamtycznej sprzedarzy</li>
      <li>Ustaw najwa??niejsze opcje sklepu w zak??adce: woocommerce > ustawienia</li>
      <li>Dodaj produkty, opisy, informacje i grafiki do systemu w zak????dec: produkty</li>
      <li>Kontroluj zam??wienia w zak??adce: woocommerce > zam??wienia</li>
      <li>W zak??adce: woocommerce > ustawienia > integracje po????cz sw??j sklep z facebook lub mailerlite</li>
      <li>Po????cz sklep z p??atno??ciami, utw??rz konto dotpay i ustaw opcje w zak??adce woocommerce > ustawienia > p??atno??ci</li>
      <li>Ustaw formularz zam??wienia w zak??adce: woocommerce > pola zam??wienia</li>
   </ul>';
}

function i8_dashboard_widgets() {
wp_add_dashboard_widget('i8', 'Najwa??niejsze dodatki', 'i8'); }
add_action( 'wp_dashboard_setup', 'i8_dashboard_widgets' );
function i8() {
   echo '<ul class="text-left">
      <li>Seo - dodaj ustawienia seo na dole stron edycyjnych i w zak??adce: seo</li>
      <li>Messenger - ustaw chat w zak??adce: customer chat</li>
      <li>T??umaczenia - ustaw wersje w zak??adce: ustawienia > translatepress, a w zak??adce: translate site dodaj t??umaczenie</li>
      <li>Widget builder - dodaj widget layout builder i ustaw w??asn?? struktur?? widget??w</li>
      <li>Page builder - na stronach edycyjnych w opcji dodawania blok??w wybierz bloki uk??adu strony i ustaw w??asn?? struktur??</li>
      <li>Edytor zaawansowany - w zak??adce ustawienia: tinymce mo??esz ustawi?? edytor</li>
   </ul>';
}

function i9_dashboard_widgets() {
wp_add_dashboard_widget('i9', 'Ikony ??? Fontawesome', 'i9'); }
add_action( 'wp_dashboard_setup', 'i9_dashboard_widgets' );
function i9() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://fontawesome.com/icons?d=gallery&m=free" 
      target="_blank">fontawesome.com</a></li>
      <li>Wybierz ikony szukaj??c s??owami kluczowymi lub kategoriami</li>
      <li>Kliknij w wybrane ikony i przepisz ich nazwy (np. fas fa-laptop) w odpowiednie pola w panelu opcji</li>
   </ul>';
}

function i10_dashboard_widgets() {
wp_add_dashboard_widget('i10', 'Grafiki ??? Pixabay', 'i10'); }
add_action( 'wp_dashboard_setup', 'i10_dashboard_widgets' );
function i10() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://pixabay.com/pl/" 
      target="_blank">pixabay.com</a></li>
      <li>Wybierz grafiki szukaj??c s??owami kluczowymi</li>
      <li>Kliknij w wybrane grafiki i pobierz w wersji najmniejszej jakiej potrzebujesz (du??e grafiki spowalniaj?? stron??)</li>
      <li>Pobrane grafiki dodaj do biblioteki medi??w</li>
   </ul>';
}

function i11_dashboard_widgets() {
wp_add_dashboard_widget('i11', 'Grafiki ??? Canva', 'i11'); }
add_action( 'wp_dashboard_setup', 'i11_dashboard_widgets' );
function i11() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://www.canva.com/" 
      target="_blank">canva.com</a></li>
      <li>Za?????? konto w programie</li>
      <li>Tw??rz grafiki wybieraj??c i edytuj??c szablony szablony</li>
      <li>Pobrane grafiki dodaj do biblioteki medi??w</li>
   </ul>';
}

function i12_dashboard_widgets() {
wp_add_dashboard_widget('i12', 'Mailing - Mailerlite', 'i12'); }
add_action( 'wp_dashboard_setup', 'i12_dashboard_widgets' );
function i12() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://www.mailerlite.com/" 
      target="_blank">mailerlite.com</a></li>
      <li>Utw??rz konto w systemie mailingowym</li>
      <li>Dodaj kod Mailerlite w zak??adce: Strona G????wna > ustawienia</li>
      <li>Aby doda?? popup Mailerlite dodaj kod popup w Panelu opcji do wybranego przycisku</li>
   </ul>';
}

function i13_dashboard_widgets() {
wp_add_dashboard_widget('i13', 'Google ??? Konto', 'i13'); }
add_action( 'wp_dashboard_setup', 'i13_dashboard_widgets' );
function i13() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://accounts.google.com/" 
      target="_blank">accounts.google.com</a></li>
      <li>Utw??rz konto Google dla swojej strony</li>
   </ul>';
}

function i14_dashboard_widgets() {
wp_add_dashboard_widget('i14', 'Google ??? Analytics', 'i14'); }
add_action( 'wp_dashboard_setup', 'i14_dashboard_widgets' );
function i14() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://analytics.google.com/" 
      target="_blank">analytics.google.com</a></li>
      <li>Utw??rz konto w Google Analytics</li>
      <li>Dodaj tag od Google w zak??adce: Strona G????wna > ustawienia</li>
   </ul>';
}

function i15_dashboard_widgets() {
wp_add_dashboard_widget('i15', 'Google ??? Search Console', 'i15'); }
add_action( 'wp_dashboard_setup', 'i15_dashboard_widgets' );
function i15() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://search.google.com/search-console/" 
      target="_blank">search.google.com</a></li>
      <li>Utw??rz konto w Google Search Console</li>
      <li>Wybierz typ us??ugi ??? prefiks adresu url</li>
      <li>Zweryfikuj stron?? za pomoc?? tagu HTML, kt??ry dodaj w zak??adce: Strona G????wna > ustawienia w polu HTML head</li>
   </ul>';
}

function i16_dashboard_widgets() {
wp_add_dashboard_widget('i16', 'Google ??? reCaptcha', 'i16'); }
add_action( 'wp_dashboard_setup', 'i16_dashboard_widgets' );
function i16() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://www.google.com/recaptcha/" 
      target="_blank">google.com/recaptcha</a></li>
      <li>Utw??rz konto w Google reCaptcha</li>
      <li>Dodaj klucze recaptcha w zak??adce: formularze > integracje > recaptcha</li>
   </ul>';
}

function i17_dashboard_widgets() {
wp_add_dashboard_widget('i17', 'Google - Custom Search', 'i17'); }
add_action( 'wp_dashboard_setup', 'i17_dashboard_widgets' );
function i17() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://cse.google.com/" 
      target="_blank">cse.google.com</a></li>
      <li>Utw??rz konto w Google Custom Search</li>
      <li>Dodaj identyfikator Google CSE w Panelu Opcji w zak??adce: settings/options > basic w odpowiednim polu</li>
   </ul>';
}

function i18_dashboard_widgets() {
wp_add_dashboard_widget('i18', 'Facebook ??? user ID', 'i18'); }
add_action( 'wp_dashboard_setup', 'i18_dashboard_widgets' );
function i18() {
   echo '<ul class="text-left">
      <li>Przejd?? na stron?? <a href="https://findmyfbid.com/" 
      target="_blank">findmyfbid.com</a></li>
      <li>Podaj link do swojego facebooka i dodaj user ID w Panelu Opcji w zak??adce: settings/options > basic w polu FB admin</li>
   </ul>';
}
