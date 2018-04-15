<?php

/* Menu */
//register_nav_menu( 'main' , 'Menu główne' );


register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new wp_bootstrap_navwalker(),
    ) );
}

add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );


function add_classes_on_li($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


//todo delete this when you dont use sidebar
///* Sidebar */
//$args = array(
//    'name'          => __( 'sidebar' ),
//    'id'            => 'sidebar',
//    'description'   => '',
//    'class'         => '',
//    'before_widget' => '<section id="%1$s" class="widget %2$s">',
//    'after_widget'  => '</section>',
//    'before_title'  => '<h2 class="widgettitle">',
//    'after_title'   => '</h2>' );
//
//register_sidebar( $args );
//
//
//
///* Read more link */
//
//function modify_read_more_link() {
//    return '<ul class="actions"><li><a class="button big" href="' . get_permalink() . '">Continue reading</a></li></ul>';
//}
//add_filter( 'the_content_more_link', 'modify_read_more_link' );




add_theme_support('featured');
set_post_thumbnail_size(840, 341, true);
add_image_size("featured", 200, 200, true);
?>

