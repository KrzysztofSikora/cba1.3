<?php


get_header(); ?>


    <!-- Main -->
    <div id="main">
        <?php if (have_posts()) : ?>

            <?php /* The loop */ ?>
            <?php while (have_posts()) : the_post(); ?>

                <!-- Post -->
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>

                        </div>
                        <div class="meta">
                            <time class="published" datetime="2015-11-01"><?php the_date() ?></time>
                        </div>
                    </header>

                    <?php
                    // Check if the post has a Post Thumbnail assigned to it.
                    if (has_post_thumbnail()) { ?>
                        <a href="<?php echo the_permalink(); ?> " class="image featured">
                            <?php the_post_thumbnail(); ?>
                        </a>

                    <?php } ?>


                    <p><?php the_content(); ?></p>

                </article>


            <?php endwhile; ?>
        <?php endif; ?>


    </div>




<?php get_footer(); ?>