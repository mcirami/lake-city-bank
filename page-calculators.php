<?php
/**
 * Template Name: Calculator Template
 *
 * @package boiler
 */

get_header(); ?>

	<?php wp_enqueue_script( 'pad' ); ?>

	<div class="calculators">
		
		<?php get_template_part('content','sub-hero'); ?>
		
		<div class="container">
			
			<div class="content">
				
				<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
					<h2><?php the_title(); ?></h2>
				<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
				
				<div class="calc_wrapper">
				
					<?php if(is_page(769)) : ?>
						<?php wp_enqueue_script( 'standard-loan' ); ?>
						<?php get_template_part('calcs/content', 'standard-loan'); ?>
						
					<?php elseif(is_page(759)) : ?>
						<?php wp_enqueue_script( 'car-loan' ); ?>
						<?php get_template_part('calcs/content', 'car-loan'); ?>
						
					<?php elseif(is_page(761)) : ?>
						<?php wp_enqueue_script( 'compound-interest' ); ?>
						<?php get_template_part('calcs/content', 'compound-interest'); ?>
						
					<?php elseif(is_page(763)) : ?>
						<?php wp_enqueue_script( 'loan-qualifier' ); ?>
						<?php get_template_part('calcs/content', 'loan-qualifier'); ?>
						
					<?php elseif(is_page(765)) : ?>
						<?php wp_enqueue_script( 'retirement' ); ?>
						<?php get_template_part('calcs/content', 'retirement'); ?>
						
					<?php elseif(is_page(767)) : ?>
						<?php wp_enqueue_script( 'savings' ); ?>
						<?php get_template_part('calcs/content', 'savings'); ?>
						
					<?php endif; ?>
					
					<p>
						<?php the_field('calc_instructions'); ?>
						<span><?php the_field('calc_disclaimer'); ?></span>
					</p>
				
				</div>
				
				<?php the_content(); ?>
				
			</div> <!-- content -->
			
			<?php get_sidebar(); ?>
			
		</div> <!-- container -->
		
	</div> <!-- calculators -->

<?php get_footer(); ?>
