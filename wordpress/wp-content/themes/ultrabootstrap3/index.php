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

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h4>My name - Krzysztof Sikora</h4>
            <div id="myName">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <p class="justifyClass">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="col-md-1"></div>


    </div>
<!--    <div class="container" id="skew1"></div>-->
    <h2 id="from"><br/>FROM MY BLOG</h2>
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
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="col-md-4"><h4>BACKEND</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass"><br/>
                    <br/>
                    <br/></p>
            </div>
            <div class="col-md-4"><h4>FRONTEND</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass">Into my project I prefer to use backbone.js/marionette.js. It is scalable and
                    fast
                    framework.</p>
            </div>
            <div class="col-md-4"><h4>OTHER</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass">I can professional use databases like mongoDB and MySql.</p>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
        <div class="col-md-1"></div>

    </div>
    <!--    <div class="container" id="progressContainer">-->
    <!---->
    <!--        <h2>SKILLS:</h2>-->
    <!--        <h3>Knowledge and experience</h3>-->
    <!--        <div class="col-md-12">-->
    <!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elementum quis tortor in placerat.-->
    <!--            Mauris vitae maximus ante, eu condimentum turpis. Sed facilisis ante sed purus suscipit ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id purus id metus maximus fermentum. In scelerisque vel leo vitae viverra. Curabitur faucibus, turpis in mattis dignissim, nisi enim porta erat, sed condimentum quam lorem sed nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.-->
    <!--            Pellentesque rutrum sagittis erat. In tincidunt metus sit amet risus semper, non ornare ipsum efficitur.-->
    <!---->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            dsdsdsdsdsdsdsdsdsd-->
    <!--            dsdsdsdsdsdsdsdsdsd-->
    <!--            dsdsdsdsdsdsdsdsdsd-->
    <!--            dsdsdsdsdsdsdsdsdsd-->
    <!---->
    <!---->
    <!--        </div>-->
    <!--        <div class="col-md-8" id="progress">-->
    <!--            <div class="progress">Node.js L-->
    <!--                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"-->
    <!--                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
    <!--                    <span class="sr-only">80% Complete (danger)</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="progress">-->
    <!--                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"-->
    <!--                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
    <!--                    <span class="sr-only">80% Complete (danger)</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="progress">-->
    <!--                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"-->
    <!--                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
    <!--                    <span class="sr-only">80% Complete (danger)</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="progress">-->
    <!--                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"-->
    <!--                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
    <!--                    <span class="sr-only">80% Complete (danger)</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!---->
    <!--    </div>-->
    <!-- gallery-->
    <div class="container" id="galleryContainer">
        <div class="col-md-12"><p id="gallery"></p></div>

    </div>
    <!--last section probably for gallery-->
    <div class="container" id="achivmentsContainer">
        <div class="col-md-12"><p id="achivments">MY ACHIVMENTS</p></div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="col-md-4"><h4>DESIGN</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ipsum enim.</p>
            </div>
            <div class="col-md-4"><h4>SPORT</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass">Until now have run: <br/>
                    &nbsp 2014 Cracovia Maraton<br/>
                    &nbsp 2014 Poznań <br/>
                    &nbsp 2015 Warszawa <br/>
                    &nbsp 2016 Dębno<br/>
                    &nbsp 2016 Cracovia Maraton<br/>
                    &nbsp 2016 Wrocław <br/>
                     2014-2016 I won the crown of Poland's marathons.</p>
            </div>
            <div class="col-md-4"><h4>OTHER</h4>
                <p><i class="fa fa-facebook"></i></p>
                <p class="justifyClass">In 2013 I have gone to Gdynia from Cracov by bicycle. I do it in 44" 44'. </p>
                <br/>
                <br/>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

<?php get_footer(); ?>