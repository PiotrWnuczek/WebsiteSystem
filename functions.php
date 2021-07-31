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
      'prev_text' => __('«'),
      'next_text' => __('»'),
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
      <li>Witam w Website System, na początku najważniejsze informacje</li>
      <li>Strona internetowa działa pod twoją domeną, a panel zarządzania uruchamia się po dodaniu do linku strony: /wp-admin</li>
      <li>Przełączaj się między stroną, a panelem, klikając przycisk z tytułem strony w lewej górnej częsci ekranu</li>
      <li>Wszystekie najważniejsze informacje opisane są w ramkach poniżej, rozwiń ramki i zobacz instrukcje</li>
      <li>Rozpocznij od ramki: Strona, ustawienia i zacznij dodawać treść i ustawiać opcje</li>
   </ul>';
}

function i2_dashboard_widgets() {
wp_add_dashboard_widget('i2', 'Strona, ustawienia', 'i2'); }
add_action( 'wp_dashboard_setup', 'i2_dashboard_widgets' );
function i2() {
   echo '<ul class="text-left">
      <li>Na począdku możesz ustawić swoje konto w zakładce: użytkownicy > twoje konto</li>
      <li>Dodaj tytuł i opis strony w zakłądce: ustawienia > ogólne</li>
      <li>Po dodaniu treści i ustawieniu całej strony włącz widoczność dla wyszukiwarek w zakłądce: ustawienia > czytanie</li>
      <li>Twoje centrum zarządzania stroną główną i ustawieniami znajduje się w zakłądce: strona główna</li>
      <li>W centrum zarządzania możesz ustawić stronę i opcje, poukadać stronę główną i dodać treść</li>
      <li>Elementy z któych nie kożystasz mozesz wyłączyć lub zostawić w wersjach domyślnych</li>
      <li>W części opcje / ustawienia uzupełnij ważne opcje i poukładaj moduły</li>
      <li>W modułach i widgetach, dodaj treść i ustaw opcje strony</li>
      <li>Moduł slajder / prezentacja to nagłówek, który jest zawsze na górze strony głownej i podstron</li>
      <li>Moduł kontakt / informacje to stopka, która jest zawsze na dole strony głównej i podstron</li>
   </ul>';
}

function i3_dashboard_widgets() {
wp_add_dashboard_widget('i3', 'Strony, wpisy, posty', 'i3'); }
add_action( 'wp_dashboard_setup', 'i3_dashboard_widgets' );
function i3() {
   echo '<ul class="text-left">
      <li>Twórz i dodawaj różnego rodzaju podstrony w zakładce: strony</li>
      <li>Dodawaj artykuły, informacje i różne inne treści, prezentowane na specjalnych stronach w zakładce: wpisy</li>
      <li>Dodawaj informacje o projektach i inne treści, prezentowane w specjalnych oknach w zakładce: posty</li>
      <li>W edytorze dodajesz bloki treści, możesz wybierać typy bloków</li>
      <li>W opcjach po prawej stronie edytora, możesz dodać na przykład obrazek wyróżniający, kategorię i zajawkę</li>
   </ul>';
}

function i4_dashboard_widgets() {
wp_add_dashboard_widget('i4', 'Menu, widgety', 'i4'); }
add_action( 'wp_dashboard_setup', 'i4_dashboard_widgets' );
function i4() {
   echo '<ul class="text-left">
      <li>Dodaj do menu najważniejsze elementy strony w zakładce: wygląd > menu</li>
      <li>Ustaw menu1 - mneu główne i menu2 - menu sklepu</li>
      <li>W menu możesz dodawać różne części strony takie jak podstrony i wpisy lub własne odnośniki</li>
      <li>Dodawaj elementy do widgetów w zakładce: wygląd > widgety i aktywój widgety w zakładce: strona główna</li>
   </ul>';
}

function i5_dashboard_widgets() {
wp_add_dashboard_widget('i5', 'Media, komentarze, formularze', 'i5'); }
add_action( 'wp_dashboard_setup', 'i5_dashboard_widgets' );
function i5() {
   echo '<ul class="text-left">
      <li>Dodawaj grafiki i pliki do strony w zakładce: media</li>
      <li>Zarządzaj komentarzami i edytuj je w zakładce: komentarze</li>
      <li>Formularz kontaktowy, jest ustawiomy, nie usuwaj go, możesz go edytować w zakładce: formularze</li>
   </ul>';
}

function i6_dashboard_widgets() {
wp_add_dashboard_widget('i6', 'System tworzenia modułów', 'i6'); }
add_action( 'wp_dashboard_setup', 'i6_dashboard_widgets' );
function i6() {
   echo '<ul class="text-left">
      <li>Elementor to system do tworzenia podstron, stron marketingowych, modułów i szablonów</li>
      <li>W zakładce: elementor > ustawienia możesz zmieniać opcje tego systemu</li>
      <li>Twórz specjalne strony w elementorze, dodaj stronę, tytuł i wybierz opcję: edytuj w elementorze</li>
      <li>Buduj własne moduły w zakładce: szablony i dodawaj do strony głównej i podstron, wklejając kod w wybrane miejsce</li>
      <li>W edytorze wizualnym elementor dodawaj sekcje, elementy, szablony stron lub szablony sekcji</li>
      <li>Dodawanie sekcji – kliknij przycisk dodawania sekcji (ikona plus) w edytorze wizualnym i wybierz strukturę</li>
      <li>Dodawanie elementów – przeciągnij elementy z panelu z lewej strony w wybrane miejsce na edytorze wizualnym</li>
      <li>Dodawanie szablonów – kliknij przycisk dodawania szablonów (ikona folderu) w edytorze wizualnym i wybierz szablon</li>
      <li>Edycja elementów – kliknij na wybrany element w edytorze wizualnym i edytuj w panelu po lewej stronie</li>
      <li>Integracja formularzy z systemem mailingowym – w elemencie form > action after submit wybierz i zintegruj system</li>
      <li>Zapisywanie szablonów sekcji – kliknij prawym przyciskiem w edycję sekcji (ikona kropek) i zapisz sekcję</li>
      <li>Zapisywanie własnych stron – kliknij przycisk zapisywania opcji (trójkąt obok aktualizuj) i zapisz stronę</li>
      <li>Rozpoczynanie od pustego szablonu, bez nagłówka i stopki - w zakładce: atrybuty strony wybierz szablon brezentowy</li>
   </ul>';
}

function i7_dashboard_widgets() {
wp_add_dashboard_widget('i7', 'System sklepu internetowego', 'i7'); }
add_action( 'wp_dashboard_setup', 'i7_dashboard_widgets' );
function i7() {
   echo '<ul class="text-left">
      <li>Woocommerce to system sklepu inetrnetowego i autoamtycznej sprzedarzy</li>
      <li>Ustaw najważniejsze opcje sklepu w zakładce: woocommerce > ustawienia</li>
      <li>Dodaj produkty, opisy, informacje i grafiki do systemu w zakłądec: produkty</li>
      <li>Kontroluj zamówienia w zakładce: woocommerce > zamówienia</li>
      <li>W zakładce: woocommerce > ustawienia > integracje połącz swój sklep z facebook lub mailerlite</li>
      <li>Połącz sklep z płatnościami, utwórz konto dotpay i ustaw opcje w zakładce woocommerce > ustawienia > płatności</li>
      <li>Ustaw formularz zamówienia w zakładce: woocommerce > pola zamówienia</li>
   </ul>';
}

function i8_dashboard_widgets() {
wp_add_dashboard_widget('i8', 'Najważniejsze dodatki', 'i8'); }
add_action( 'wp_dashboard_setup', 'i8_dashboard_widgets' );
function i8() {
   echo '<ul class="text-left">
      <li>Seo - dodaj ustawienia seo na dole stron edycyjnych i w zakładce: seo</li>
      <li>Messenger - ustaw chat w zakładce: customer chat</li>
      <li>Tłumaczenia - ustaw wersje w zakładce: ustawienia > translatepress, a w zakładce: translate site dodaj tłumaczenie</li>
      <li>Widget builder - dodaj widget layout builder i ustaw własną strukturę widgetów</li>
      <li>Page builder - na stronach edycyjnych w opcji dodawania bloków wybierz bloki układu strony i ustaw własną strukturę</li>
      <li>Edytor zaawansowany - w zakładce ustawienia: tinymce możesz ustawić edytor</li>
   </ul>';
}

function i9_dashboard_widgets() {
wp_add_dashboard_widget('i9', 'Ikony – Fontawesome', 'i9'); }
add_action( 'wp_dashboard_setup', 'i9_dashboard_widgets' );
function i9() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://fontawesome.com/icons?d=gallery&m=free" 
      target="_blank">fontawesome.com</a></li>
      <li>Wybierz ikony szukając słowami kluczowymi lub kategoriami</li>
      <li>Kliknij w wybrane ikony i przepisz ich nazwy (np. fas fa-laptop) w odpowiednie pola w panelu opcji</li>
   </ul>';
}

function i10_dashboard_widgets() {
wp_add_dashboard_widget('i10', 'Grafiki – Pixabay', 'i10'); }
add_action( 'wp_dashboard_setup', 'i10_dashboard_widgets' );
function i10() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://pixabay.com/pl/" 
      target="_blank">pixabay.com</a></li>
      <li>Wybierz grafiki szukając słowami kluczowymi</li>
      <li>Kliknij w wybrane grafiki i pobierz w wersji najmniejszej jakiej potrzebujesz (duże grafiki spowalniają stronę)</li>
      <li>Pobrane grafiki dodaj do biblioteki mediów</li>
   </ul>';
}

function i11_dashboard_widgets() {
wp_add_dashboard_widget('i11', 'Grafiki – Canva', 'i11'); }
add_action( 'wp_dashboard_setup', 'i11_dashboard_widgets' );
function i11() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://www.canva.com/" 
      target="_blank">canva.com</a></li>
      <li>Załóż konto w programie</li>
      <li>Twórz grafiki wybierając i edytując szablony szablony</li>
      <li>Pobrane grafiki dodaj do biblioteki mediów</li>
   </ul>';
}

function i12_dashboard_widgets() {
wp_add_dashboard_widget('i12', 'Mailing - Mailerlite', 'i12'); }
add_action( 'wp_dashboard_setup', 'i12_dashboard_widgets' );
function i12() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://www.mailerlite.com/" 
      target="_blank">mailerlite.com</a></li>
      <li>Utwórz konto w systemie mailingowym</li>
      <li>Dodaj kod Mailerlite w zakładce: Strona Główna > ustawienia</li>
      <li>Aby dodać popup Mailerlite dodaj kod popup w Panelu opcji do wybranego przycisku</li>
   </ul>';
}

function i13_dashboard_widgets() {
wp_add_dashboard_widget('i13', 'Google – Konto', 'i13'); }
add_action( 'wp_dashboard_setup', 'i13_dashboard_widgets' );
function i13() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://accounts.google.com/" 
      target="_blank">accounts.google.com</a></li>
      <li>Utwórz konto Google dla swojej strony</li>
   </ul>';
}

function i14_dashboard_widgets() {
wp_add_dashboard_widget('i14', 'Google – Analytics', 'i14'); }
add_action( 'wp_dashboard_setup', 'i14_dashboard_widgets' );
function i14() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://analytics.google.com/" 
      target="_blank">analytics.google.com</a></li>
      <li>Utwórz konto w Google Analytics</li>
      <li>Dodaj tag od Google w zakładce: Strona Główna > ustawienia</li>
   </ul>';
}

function i15_dashboard_widgets() {
wp_add_dashboard_widget('i15', 'Google – Search Console', 'i15'); }
add_action( 'wp_dashboard_setup', 'i15_dashboard_widgets' );
function i15() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://search.google.com/search-console/" 
      target="_blank">search.google.com</a></li>
      <li>Utwórz konto w Google Search Console</li>
      <li>Wybierz typ usługi – prefiks adresu url</li>
      <li>Zweryfikuj stronę za pomocą tagu HTML, który dodaj w zakładce: Strona Główna > ustawienia w polu HTML head</li>
   </ul>';
}

function i16_dashboard_widgets() {
wp_add_dashboard_widget('i16', 'Google – reCaptcha', 'i16'); }
add_action( 'wp_dashboard_setup', 'i16_dashboard_widgets' );
function i16() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://www.google.com/recaptcha/" 
      target="_blank">google.com/recaptcha</a></li>
      <li>Utwórz konto w Google reCaptcha</li>
      <li>Dodaj klucze recaptcha w zakładce: formularze > integracje > recaptcha</li>
   </ul>';
}

function i17_dashboard_widgets() {
wp_add_dashboard_widget('i17', 'Google - Custom Search', 'i17'); }
add_action( 'wp_dashboard_setup', 'i17_dashboard_widgets' );
function i17() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://cse.google.com/" 
      target="_blank">cse.google.com</a></li>
      <li>Utwórz konto w Google Custom Search</li>
      <li>Dodaj identyfikator Google CSE w Panelu Opcji w zakładce: settings/options > basic w odpowiednim polu</li>
   </ul>';
}

function i18_dashboard_widgets() {
wp_add_dashboard_widget('i18', 'Facebook – user ID', 'i18'); }
add_action( 'wp_dashboard_setup', 'i18_dashboard_widgets' );
function i18() {
   echo '<ul class="text-left">
      <li>Przejdź na stronę <a href="https://findmyfbid.com/" 
      target="_blank">findmyfbid.com</a></li>
      <li>Podaj link do swojego facebooka i dodaj user ID w Panelu Opcji w zakładce: settings/options > basic w polu FB admin</li>
   </ul>';
}
