<html
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title('|', true, 'right'); ?></title>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- todo clear -->
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' ?>"
          rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo get_stylesheet_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' ?>"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/style.css' ?>"/>


    <?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" role="navigation">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?>
        </a>
        <?php
        wp_nav_menu(array(
                'menu' => 'primary',
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => "navbarResponsive",
                'menu_class' => 'nav navbar-nav navbar-right',
                'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',


                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker())
        );
        ?>

    </div>
</nav>


<!-- Header -->
<header class="intro-header" id="header">
    <div class="container">

    </div>
</header>


<!-- Navigation -->


<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
