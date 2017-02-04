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

    <!--    custom buttom and text-->
    <div class="container custom-header">
        <div class="row">
            <div class="col-md-12 text-center padding-bottom-10">
                <h1>KRZYSZTOF SIKORA</h1>
                <h2>SOFTWARE DEVELOPER</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#skills" class="btn btn-primary btn-lg btn-color" role="button" aria-disabled="true">Skills</a>
                <a href="#contact" class="btn btn-primary btn-lg btn-color"
                   role="button"
                   aria-disabled="true">Contact</a>
            </div>
        </div>


    </div>


    <!--    !custom buttom and text-->
    <div class="text-center">
        <img class="image-full-width" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
             width="<?php echo get_custom_header()->width; ?>" alt=""/>
    </div>
<?php endif; ?>
    <!-- Header Image -->


    <!--first section about-->
    <div class="container-fluid background-color-white min-height-300 padding-top-50">
        <div class="row">
            <div class="col-md-12"><h1 class="text-center"><strong>ABOUT ME</strong></h1></div>

        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><p class="text-justify lead padding-top-50 padding-bottom-50">Ukończyłem Wyższą Szkołę
                    Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                    Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
            </div>
            <div class="col-md-2"></div>


        </div>
    </div>


    <!--!first section about-->
    <div class="container-fluid padding-top-50 font-color-white">
        <div class="row">
            <div class="col-md-12"><h1 class="text-center"><strong>FROM MY BLOG</strong></h1></div>
        </div>

    </div>

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
        <div id="skills"></div>
    </div>
    <!--second section about skills-->

    <div class="container-fluid background-color-white min-height-300 padding-top-50">
        <div class="row">
            <div class="col-md-12"><h1 class="text-center"><strong>SKILLS</strong></h1></div>

        </div>
        <div class="row padding-top-30">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center"><h4><strong>BACKEND</strong></h4>
                        <p class="text-justify padding-bottom-50">

                            Ukończyłem Wyższą
                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>

                </div>


            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center"><h4><strong>FRONTEND</strong></h4>
                        <p class="text-justify padding-bottom-50">Ukończyłem Wyższą

                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>
                    <div class="col-md-2"></div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8 text-center"><h4><strong>ANOTHER</strong></h4>
                        <p class="text-justify padding-bottom-50">

                            Ukończyłem Wyższą
                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!--!second section about skills-->


    <!--third section about experience-->

    <div class="container-fluid min-height-300 black-runner">

    </div>


    <!--!third section about experience-->


    <!--fourth section about skills-->
    <div class="container-fluid background-color-white min-height-300 padding-top-50">
        <div class="row">
            <div class="col-md-12"><h1 class="text-center"><strong>MY ACHIVMENTS</strong></h1></div>

        </div>
        <div class="row padding-top-30">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center"><h4><strong>BACKEND</strong></h4>
                        <p class="text-justify padding-bottom-50">

                            Ukończyłem Wyższą
                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>

                </div>


            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center"><h4><strong>FRONTEND</strong></h4>
                        <p class="text-justify padding-bottom-50">Ukończyłem Wyższą

                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>
                    <div class="col-md-2"></div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8 text-center"><h4><strong>ANOTHER</strong></h4>
                        <p class="text-justify padding-bottom-50">

                            Ukończyłem Wyższą
                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!--!fourth section about skills-->


    <!--fifth section about gallery-->
<?php echo do_shortcode('[supsystic-gallery id=1]') ?>
    <!--!fifth section about gallery-->
<div id="contact"></div>
    <div class="container-fluid padding-top-50">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3 padding-top-10">
                <?php echo do_shortcode('[contact-form-7 id="112" title="Contact form 1"]'); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 font-color-white text-center">
                <h4><strong class="font-color-white">GET IN TOUCH</strong></h4>
                <div class="row">
                    <div class="col-md-6"><p class="text-justify">
                            Ukończyłem Wyższą
                            Szkołę
                            Zarządzania i Bankowości w Krakówie. Specjalizuję się w aplikacjach internetowych.
                            Na codzień pracuje w jednym z krakowskich Software Housów i tam zdobywam doświadczanie.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <img src="/wordpress/wp-content/themes/bootstrap-my/images/phone.jpg"
                                     class="img-responsive" alt="Phone">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

<?php get_footer(); ?>