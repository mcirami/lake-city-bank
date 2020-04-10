<?php
/**
 * Template Name: Blog
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
				<div class="gray_bar"></div>
				
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 10
					);
					
					$post_query = new WP_Query($args);
				?>
				
				<?php if($post_query->have_posts()) : ?>
				
					<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

						<p class="date"><?php the_time('F j, Y');  ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<p>
							<?php echo get_the_excerpt(); ?>&hellip;
						</p>
						<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
						
						<div class="gray_bar"></div>
	
					<?php endwhile; // end of the loop. ?>
				
				<?php endif; wp_reset_postdata(); ?>

			</div> <!-- end of content-->

			<?php get_template_part('sidebar', 'blog'); ?>
			
		</div>
	</section>
	
<?php get_footer(); ?>