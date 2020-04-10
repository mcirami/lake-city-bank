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
 * @package boiler
 */

get_header(); ?>

<?php
	$args = array (
		'post_type' => 'post',
		'posts_per_page' => 2
	);
	
	$news = new WP_Query($args);
?>
	<section class="home_page wrapper">
        <div class="top_content">
		    <?php if ( have_rows('hero_slider') ) : ?>
			    <div class="flexslider">
				    <ul class="slides">
					    <?php while ( have_rows('hero_slider')) : the_row();  ?>
						    <li>
							    <?php $text = get_sub_field('image_text'); ?>
							    <?php if(!empty($text)) : ?>
								    <div class="hero_text">
									    <h1><?php echo $text; ?></h1>
								    </div>
							    <?php endif; ?>
							    <?php $image = get_sub_field('slider_image'); ?>
							    <?php if (!empty($image)) : ?>
								    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							    <?php endif; ?>
						    </li>
					    <?php endwhile; ?>
				    </ul>
			    </div>
		    <?php endif; ?>

			<div class="access_account_section">
				<div class="account_content">
					<h2>Choose your account</h2>

					<!-- repeater for dropdown menu -->
					<?php if ( have_rows('header_account_dropdown', 'options')) : ?>

						<select name="choose_account" id="access_account">
							<option value="">Access Account</option>
							<?php while ( have_rows('header_account_dropdown', 'options')) : the_row(); ?>
								<?php if(get_sub_field('alert', 'options')) : ?>
									<option class="alert" data-description="<?php the_sub_field('link', 'options'); ?>" value="#alert"><?php the_sub_field('link_text', 'options'); ?></option>
								<?php else: ?>
									<option value="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text', 'options'); ?></option>
								<?php endif; ?>
							<?php endwhile; ?>
						</select>

					<?php endif; ?>


					<a class="apply_account" href="#">Apply for New Account</a>
				</div>
			</div>
		</div><!-- end of top_content -->
		
		<div class="container">			
			<div class="content">
				<div class="three_column_section">
					<div class="column column_copy">
						<div class="column_header">
							<h4 class="news_header active">Latest News</h4>
							<h4 class="twitter_header">Twitter Feed</h4>
						</div>
						<div class="column_wrap news">
							<div class="column_content news_content">
								<?php while( $news->have_posts() ) : $news->the_post(); ?>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<p>
										<?php echo substr(get_the_excerpt(), 0,100); ?>
									</p>
									<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
								<?php endwhile; wp_reset_postdata(); ?>
							</div>
							<div class="gray_bar"></div>
							<a class="gray_link" href="/about-us/latest-news">See all</a>
						</div>
						<div class="column_wrap twitter">
							<div class="column_content twitter_content">
								<?php echo do_shortcode('[twitter-feed username="username" id="570313192417415168" mode="feed"]'); ?>
							</div>
							<div class="gray_bar"></div>
						</div>
					</div>
						
		<?php if( have_rows('columns') ): ?>
								
			<?php while ( have_rows('columns') ) : the_row(); ?>
			
		  		<?php if( get_row_layout() == 'full_height_content' ): ?>
		  		
					<div class="column">
						<?php $image = get_sub_field('image'); ?>
						<?php if (!empty($image)) : ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
					</div>
					
				<?php elseif( get_row_layout() == 'two_row_content' ): ?>
				
					<div class="column">
						<div class="image_block">
							<?php $image = get_sub_field('top_row'); ?>
							<?php if (!empty($image)) : ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
						</div>
						<div class="image_block">
							<?php the_sub_field('bottom_row'); ?>
						</div>
					</div>
					
				<?php endif; ?>

			<?php endwhile; ?>
			
		<?php endif; ?>
		
				</div> <!-- end of three column section -->
				
		<?php if ( have_rows('full_width_content') ) : ?>
			
			<?php while ( have_rows('full_width_content')) : the_row();  ?>
				
				<?php if( get_row_layout() == 'full_width_text' ): ?>

					<div class="gray_line"></div>
					<div class="full_width_section">
						<?php the_sub_field('text'); ?>
					</div>
					<div class="gray_line"></div>
					
				<?php elseif( get_row_layout() == 'full_width_image' ): ?>
				
					<div class="full_width_section image">
						<?php $image = get_sub_field('image'); ?>
						<?php if (!empty($image)) : ?>
							<a class="video_popup fancybox.iframe" href="<?php the_sub_field('link'); ?>?rel=0&amp;controls=0&amp;showinfo=0;">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						<?php endif; ?>
					</div>
						
				<?php endif; ?>
						
			<?php endwhile; ?>
						
		<?php endif; ?>
		
			</div><!-- end of content -->
		</div><!-- end of container -->
	</section>

<?php get_footer(); ?>

