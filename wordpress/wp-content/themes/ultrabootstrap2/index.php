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
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<?php endif;?>
<!-- Header Image -->


<div class="spacer">
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>
<div class="container">
  <div class="row post-list">
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'template-parts/content', get_post_format() );
        ?>

      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>
</div>
</div>
    </main><!-- #main -->
  </div><!-- #primary -->



</div>



<?php echo do_shortcode('[gs_logo title="yes" posts="15" order="ASC" logo_cat="food" mode="vertical" speed="1000" inf_loop="0" ticker="1" logo_color="gray_to_def" ]
'); ?>



<?php get_footer(); ?>