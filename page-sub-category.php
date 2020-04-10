<?php
/**
 * Template Name: Sub-Category Template
 *
 * @package boiler
 */
 
get_header(); ?>

	<div class="sub_category">
		
		<?php get_template_part('content','sub-hero'); ?>
		
		<div class="container">
			
			<div class="content">
				
				<?php get_template_part('content', 'sub-category'); ?>
			
			</div> <!-- content -->
			
			<?php get_sidebar(); ?>
			
		</div> <!-- container -->
		
	</div> <!-- sub-category -->

<?php get_footer(); ?>
