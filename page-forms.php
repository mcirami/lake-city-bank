<?php
/**
 *
 * Template Name: Forms Template
 *
 * @package boiler
 */

get_header(); ?>

<?php get_template_part('content','sub-hero'); ?>

    <section class="container default">

        <article class="content">
            <img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
            <?php the_content(); ?>
            <img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
        </article>

        <?php get_sidebar(); ?>

    </section>

<?php get_footer(); ?>