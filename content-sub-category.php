<?php
/** 
 *	The template used for displaying page content in sub-category.php
 * @package boiler
 */
?>

<?php if( have_rows('sub_category_fields') ): ?>
  
  <?php while ( have_rows('sub_category_fields') ) : the_row(); ?>
  		
    	<?php if( get_row_layout() == 'top_content_with_image' ): ?>
    	
    		<div class="top_section">
				<div class="gray_bar"></div>
				<div class="top_content with_image">
					<h2><?php the_sub_field('heading'); ?></h2>
					<p><?php the_sub_field('text'); ?></p>
					<?php $image = get_sub_field('image'); ?>
					<?php if (!empty($image)) : ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
				<div class="gray_bar"></div>
			</div>
			
		<?php elseif( get_row_layout() == 'top_content_without_image' ): ?>
			
			<div class="top_section">
				<div class="gray_bar"></div>
				<div class="top_content no_image">
					<h2><?php the_sub_field('heading'); ?></h2>
					<p><?php the_sub_field('text'); ?></p>
				</div>
				<div class="gray_bar"></div>
			</div>
			
		<?php elseif( get_row_layout() == 'full_width_image' ): ?>

			<div class="full_width_section">
				<?php $image = get_sub_field('image'); ?>
				<?php if (!empty($image)) : ?>
					<a href="<?php the_sub_field('link'); ?>">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>
				<?php endif; ?>
			</div>
			
		<?php elseif( get_row_layout() == 'detail_page_links' ): ?>
			
			<?php if( have_rows('page_links') ): ?>
				<div class="middle_section detail_page_links">
					<ul>
						<?php while ( have_rows('page_links') ) : the_row(); ?>
							<li>
								<a class="gradient" href="<?php the_sub_field('page_link'); ?>">
									<?php the_sub_field('link_text'); ?>
									<img src="<?php echo bloginfo('template_url'); ?>/images/white-right-arrow.png" />
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="gray_bar"></div>
			<?php endif; ?>
			
		<?php elseif( get_row_layout() == 'faqs' ): ?>
		
			<?php if( have_rows('faqs') ): ?>
				<div class="middle_section faqs">
					<ul>
						<?php while ( have_rows('faqs') ) : the_row(); ?>
							<li>
								<p>Q: <?php the_sub_field('question'); ?></p>
								<p>A: <?php the_sub_field('answer'); ?></p>
							</li>
						<?php endwhile; ?>						
					</ul>
				</div>
			<?php endif; ?>
			
		<?php elseif( get_row_layout() == 'image_right' ): ?>
		
			<div class="bottom_section">
				<div class="bottom_content">
					<h2><?php the_sub_field('heading'); ?></h2>
					<div class="gray_bar"></div>
						<?php the_sub_field('bullet_points'); ?>
					<div class="gray_bar"></div>
				</div>
				<div class="image_wrap">
					<?php $image = get_sub_field('image'); ?>
					<?php if (!empty($image)) : ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
					<?php endif; ?>
				</div>
			</div>
			
		<?php elseif( get_row_layout() == 'image_left' ): ?>
		
			<div class="bottom_section">
				<div class="image_wrap">
					<?php $image = get_sub_field('image'); ?>
					<?php if (!empty($image)) : ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
					<?php endif; ?>
				</div>
				<div class="bottom_content image_left">
					<h2><?php the_sub_field('heading') ?></h2>
					<div class="gray_bar"></div>
						<?php the_sub_field('bullet_points'); ?>
					<div class="gray_bar"></div>
				</div>
			</div>

       <?php endif; ?>

    <?php endwhile; ?>
    
<?php endif; ?>