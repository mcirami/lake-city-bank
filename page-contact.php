<?php
/**
 * Template Name: Contact Us Template
 *
 * @package boiler
 */

get_header(); ?>

<div class="category">
	
    <?php get_template_part('content','sub-hero'); ?>

    <div class="container contact_pg">

        <article class="content">
            <img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
                <div class="content_wrapper">
                    <?php the_content(); ?>
                    <img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
                    <div class="bottom_content">
                        <h3>One Call Center</h3>
                        <p class="call_center_number"><?php the_field('call_center_number'); ?></p>
                        <div class="call_content">
                            <?php the_field('call_center_content'); ?>
                            <?php the_field('call_center_hours'); ?>
                        </div>
                    </div>
                    <img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
                </div><!-- end content wrapper -->

        </article> <!-- content -->

        <?php get_sidebar(); ?>

    </div> <!-- container -->

</div> <!-- category -->

<?php get_footer(); ?>
