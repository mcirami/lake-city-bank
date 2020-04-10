<?php
/**
 * The Template for displaying all single posts.
 *
 * @package boiler
 */

get_header(); ?>

	
	<section class="blog wrapper">
		
		<div class="sub_hero_container">
			<div class="sub_hero purple_scheme">
				<div class="container">
					<img class="page_icon" src="<?php echo bloginfo('template_url'); ?>/images/single-news-icon.png" alt="" />
					<h3>Latest News</h3>
				</div> 
			</div>
		</div>
		
		<div class="container">
			
			<div class="content">

				<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'content', 'single' ); ?>
		
				<?php endwhile; // end of the loop. ?>
				
				<?php endif; ?>
			
			</div>

			<?php get_template_part('sidebar', 'blog'); ?>
			
		</div>

	</section>

<?php get_footer(); ?>