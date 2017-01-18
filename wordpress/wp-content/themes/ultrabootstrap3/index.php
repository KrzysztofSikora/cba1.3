<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultrabootstrap
 */

get_header(); ?>
    <!-- Header Image -->
<?php if (has_header_image()): ?>
    <div class="text-center">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
             width="<?php echo get_custom_header()->width; ?>" alt=""/>

<!--<div id="name"><h4>KRZYSZTOF SIKORA</h4> <br/> <br/><br/><h4>SOFTWARE DEVELOPER</h4></div>-->

        <!--        text into image-->
    </div>
<?php endif; ?>
    <!-- Header Image -->

    <div class="container" id="aboutContainer">
        <div class="col-md-12"><p id="about">ABOUT ME</p></div>


        <div class="col-md-12">
            <h4>My name - Krzysztof Sikora</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>

        </div>



    </div>
    <div class="container" id="skew1"></div>

    <div class="spacer">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php if (have_posts()) : ?>

                <?php if (is_home() && !is_front_page()) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>
                <div class="container">
                    <div class="row post-list">
                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php the_posts_navigation(); ?>

                        <?php else : ?>

                            <?php get_template_part('template-parts/content', 'none'); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>

    <!--skew section-->
    <div class="container" id="skew2"></div>

    <!--section services-->
    <div class="container" id="servicesContainer">

        <div class="col-md-12"><p id="services">SKILLS</p></div>


        <div class="col-md-4"><h4>BACKEND</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p class="justifyClass">My favorite technology is node.js. I use it with loopback framework.
                Second framework which I prefer is Symfony 2 with Doctrine library.
                I have been used these tools into my engineering thesis. I have been used these tools into my engineering thesis.  <br/>
                <br/>
                <br/></p>
        </div>
        <div class="col-md-4"><h4>FRONTEND</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p class="justifyClass">Into my project I prefer to use backbone.js/marionette.js. It is scalable and fast framework.</p>
        </div>
        <div class="col-md-4"><h4>ANOTHER</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p class="justifyClass">I can professional use databases like mongoDB and MySql.</p>
            <br/>
            <br/>
            <br/>
        </div>


    </div>

    <!-- gallery-->
    <div class="container" id="galleryContainer">
        <div class="col-md-12"> <p id="gallery"></p></div>

    </div>
    <!--last section probably for gallery-->
    <div class="container" id="achivmentsContainer">
        <div class="col-md-12"> <p id="achivments">MY ACHIVMENTS</p></div>
        <div class="col-md-4"><h4>DESIGN</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
        </div>
        <div class="col-md-4"><h4>GLOBAL COVERAGE</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum
                enim.</p>
        </div>
        <div class="col-md-4"><h4>FREE COFFE</h4>
            <p><i class="fa fa-facebook"></i></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsumenim.</p>
            <br/>
            <br/>
        </div>
    </div>

<?php get_footer(); ?>