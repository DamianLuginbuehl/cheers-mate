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

    // Custom (more beautiful) Scollbar
    wp_enqueue_style('cm_scrollbar', 'https://resources.dl-projects.ch/css/scrollbar/dark.css');


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
    wp_enqueue_style('google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,800;1,500&display=swap');

    //apply font formatting
    wp_enqueue_style('cm_theme-fontstyle', get_template_directory_uri() . '/assets/css/font.css');
}

add_action('wp_enqueue_scripts', 'cm_theme_include_googlefonts');




/** Menüs Setup */

function cm_theme_menus()
{

    // Location für verscheidene Navigationen
    $locations = [
        'header' => __('Headeravigation', 'Cheers Mate!'),
        'footer' => __('Footernavigation', 'Cheers Mate!'),
        'social' => __('Social-Media Navigation', 'Cheers Mate!')
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


/** Custom login logo */
function cm_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/app-logo.svg');
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'cm_login_logo');



/** Allow SVG upload */
function cm_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cm_mime_types');




?>
