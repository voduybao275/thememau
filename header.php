<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_the_title().' - '; bloginfo('name'); ?></title>
    
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <header>
        <!-- <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1> -->
        <nav>
            <?php //wp_nav_menu(array('theme_location' => 'primary')); ?>
        </nav>
    </header>
 