<?php
/**
 * Template Name: Locations
 *
 *
 * @package boiler
 */
 
 get_header(); ?>
 
	<section class="locations wrapper">
		
		<?php get_template_part('content','sub-hero'); ?>
		
		<article class="container">
			<div class="content">
				<div class="gray_bar"></div>
				
				<?php the_content(); ?>
				
				<?php echo do_shortcode('[SLPLUS]'); ?>
			</div>
			
			<?php get_sidebar(); ?>
			
		</article>
	</section>
	 
<?php get_footer(); ?>