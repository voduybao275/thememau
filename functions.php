<?php 

add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_widgets_block_editor', '__return_false');

function my_theme_register_menus() {
    register_nav_menus(
        array()
    );
}
add_action( 'init', 'my_theme_register_menus' );

add_action( 'wp_enqueue_scripts', 'developer_base_enqueue_styles' );

function developer_base_enqueue_styles() { 
    $theme_file_path = get_theme_file_path('style.css');    
    $version = file_exists($theme_file_path) ? filemtime($theme_file_path) : '1.0';

    wp_enqueue_style(
        'developer-base-style',
        get_theme_file_uri('style.css'),
        array(),
        $version 
    ); 
}
add_action('wp_enqueue_scripts', 'developer_base_enqueue_styles');

function developer_base_enqueue_scripts() { 
    wp_enqueue_script(
        'developer-base-js',
        get_theme_file_uri( 'assets/js/jquery.min.js' ),
        array()
        
    );

    $script_path = get_theme_file_path('assets/js/script.js');
    $script_uri  = get_theme_file_uri('assets/js/script.js');    
    $version = file_exists($script_path) ? filemtime($script_path) : '1.0';
    wp_enqueue_script(
        'developer-base-script', // Tên định danh (handle)
        $script_uri,            // Đường dẫn URL đến file
        array(),                 // Các thư viện phụ thuộc (ví dụ: array('jquery'))
        $version,                // Phiên bản tự động cập nhật
        true                     // Load file ở cuối trang (trước thẻ </body>) để tối ưu tốc độ
    ); 
}
add_action('wp_enqueue_scripts', 'developer_base_enqueue_scripts');
?>