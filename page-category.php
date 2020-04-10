<?php
/**
 * Template Name: Category Template
 *
 * @package boiler
 */

get_header(); ?>

	<div class="category">
		
		<div class="hero">
			
			<?php $heroImg = get_field('hero_img');	?>
			<?php if ($heroImg) : ?>
				<img src="<?php echo $heroImg['url']; ?>" alt="<?php echo $heroImg['alt']; ?>"/>
			<?php endif; ?>
			
			<div class="hero_text">
				<h1><?php the_field('hero_text'); ?></h1>
			</div>
			
		</div> <!-- hero -->
		
		<div class="container">
			
			<div class="content">
				
				<div class="description">
					<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
					<?php the_field('category_description'); ?>
					<img src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
				</div> <!-- description -->
				
				<?php if (have_rows('sub_pages')) : ?>
					<ul class="sub_pages">
						<?php while (have_rows('sub_pages')) : the_row(); ?>
							<li class="sub_page">
								<a href="<?php the_sub_field('sub_page_link'); ?>">
									<img class="icon" src="<?php the_sub_field('sub_page_icon'); ?>" />
									<div class="tab_text">
										<h2 class="<?php the_field('category_colors'); ?>"><?php the_sub_field('sub_page_hdr'); ?></h2>
										<p><?php the_sub_field('sub_page_p'); ?></p>
									</div>
									<img class="learn_more" src="<?php echo bloginfo('template_url'); ?>/images/learn-more-btn.png" alt="Learn More"/>
								</a>
							</li>
						<?php endwhile; ?>
					</ul> <!-- sub pages -->
				<?php endif; ?>
				
				<div class="category_content">
					<?php the_content(); ?>
				</div>
				
			</div> <!-- content -->
			
			<?php get_sidebar(); ?>
			
		</div> <!-- container -->
		
	</div> <!-- category -->

<?php get_footer(); ?>
