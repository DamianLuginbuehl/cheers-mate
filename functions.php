<?php

/** Theme Supports */

function cm_theme_theme_supports()
{
    // Beitragsbild aktivieren
    add_theme_support('post-thumbnails');

    // Editor Styles hinzufügen
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Eignes Logo/Favicon
    add_theme_support('custom-logo');

    add_theme_support('widgets');

    // HTML5 Support
    add_theme_support(
        'html5',
        [
            'search-form',
            'gallery',
            'captions',
            'script',
            'style'
        ]
    );
}

add_action('after_setup_theme', 'cm_theme_theme_supports');

function cm_theme_custom_logo_setup()
{
    $defaults = array(
        'height'               => 90,
        'width'                => 77,
        'flex-height'          => true,
        'flex-width'           => true,
        'unlink-homepage-logo' => false,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'cm_theme_custom_logo_setup');




/** Stylesheet einbinden */

function cm_theme_include_stylesheets()
{

    // Font Awesome einbinden
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', [], '1.0.0', 'all');

    // style.css einbinden
    wp_enqueue_style('cm_theme-style', get_stylesheet_uri());
    wp_enqueue_style('cm_theme-backend-style', get_template_directory_uri() . '/assets/css/backend-style.css');
}

add_action('wp_enqueue_scripts', 'cm_theme_include_stylesheets');




/** Block Stylesheet einbidnen */

function cm_theme_include_blockstyles()
{

    // block-styles.css einbinden
    wp_enqueue_style('cm_theme-blockstyle', get_template_directory_uri() . '/assets/css/block-style.css');
}

add_action('enqueue_block_assets', 'cm_theme_include_blockstyles');




/** Scripts einbinden */

function cm_theme_include_scripts()
{
    wp_enqueue_script('cm_theme-jquery', get_template_directory_uri() . '/assets/js/jquery.js');
    wp_enqueue_script('cm_theme-scripts', get_template_directory_uri() . '/assets/js/main.js');
}

add_action('wp_enqueue_scripts', 'cm_theme_include_scripts');




/** Google Fonts einbinden */

function cm_theme_include_googlefonts()
{
    wp_enqueue_style('google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');
}

add_action('wp_enqueue_scripts', 'cm_theme_include_googlefonts');




/** Menüs Setup */

function cm_theme_menus()
{

    // Location für verscheidene Navigationen
    $locations = [
        'main' => __('Primärnavigation', 'DL Theme'),
        'social' => __('Social-Media Navigation', 'DL Theme'),
        'copyright' => __('Copyright Info', 'DL Theme')
    ];

    register_nav_menus($locations);
}

add_action('init', 'cm_theme_menus');




/** Kategorien Titel entfernen */

function wp_list_categories_remove_title_attributes($output)
{
    $output = preg_replace('` title="(.+)"`', '', $output);
    return $output;
}
add_filter('wp_list_categories', 'wp_list_categories_remove_title_attributes');

remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
remove_action('block_editor_settings_all', 'wp_add_editor_classic_theme_styles');


/** Backend Style */
function cm_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/backend/circles_standard.png');
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'cm_login_logo');


function cm_login_stylesheet()
{
    wp_enqueue_script('custom-login-jquery', get_template_directory_uri() . '/assets/js/jquery.js');
    wp_enqueue_script('custom-login', get_template_directory_uri() . '/assets/js/script-login.js');
}
add_action('login_enqueue_scripts', 'cm_login_stylesheet');


/** Allow SVG upload */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_theme_support('custom-header');



/** increase max upload size */
@ini_set('upload_max_size', '256M');
@ini_set('post_max_size', '256M');
@ini_set('max_execution_time', '300');





?>

?>