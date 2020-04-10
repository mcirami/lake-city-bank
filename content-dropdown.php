<?php 
	$dropdownColors = array('green','blue','orange','purple');
	
	foreach ($dropdownColors as $dropdownColor) :
?>

<div class="<?php echo $dropdownColor ?>_dropdown dropdown">
		<div class="container">
			<div class="menu_container">
			<?php if( have_rows( $dropdownColor .'_cols', 'options') ): ?>
						
				<?php while ( have_rows($dropdownColor .'_cols', 'options') ) : the_row(); ?>
					
					<?php if( get_row_layout() == '3_columns'): ?>
					
						<?php $dropdownImg = get_sub_field('dropdown_img', 'options');	?>
						<?php if ($dropdownImg) : ?>
							<img src="<?php echo $dropdownImg['url']; ?>" alt="<?php echo $dropdownImg['alt']; ?>"/>
						<?php endif; ?>
						
						<?php if (have_rows('1_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('1_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						
						<?php if (have_rows('2_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('2_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						
						<?php if (have_rows('3_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('3_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					
					<?php elseif( get_row_layout() == '2_columns'): ?>
					
						<?php $dropdownImg = get_sub_field('dropdown_img', 'options');	?>
						<?php if ($dropdownImg) : ?>
							<img src="<?php echo $dropdownImg['url']; ?>" alt="<?php echo $dropdownImg['alt']; ?>"/>
						<?php endif; ?>
						
						<?php if (have_rows('1_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('1_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						
						<?php if (have_rows('2_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('2_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>	
						<?php endif; ?>
					
					<?php elseif( get_row_layout() == '1_columns'): ?>
					
						<?php $dropdownImg = get_sub_field('dropdown_img', 'options');	?>
						<?php if ($dropdownImg) : ?>
							<img src="<?php echo $dropdownImg['url']; ?>" alt="<?php echo $dropdownImg['alt']; ?>"/>
						<?php endif; ?>
						
						<?php if (have_rows('1_column_links', 'options')) : ?>
							<ul>
								<?php while (have_rows('1_column_links', 'options')) : the_row(); ?>
									<li <?php if(get_sub_field('parent_page', 'options')) : ?> class="parent" <?php endif; ?>>
										<a href="<?php the_sub_field('link', 'options'); ?>"<?php if(get_sub_field('link_type', 'options') == 'external') : ?> target="_blank" <?php endif; ?>><?php the_sub_field('link_text', 'options'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					
					<?php endif; ?>
				
				<?php endwhile; ?>
			
			<?php endif; ?>
			</div>

		</div> <!-- container -->
		
		<div class="<?php echo $dropdownColor ?>_dropdown_caption">
			<?php the_field($dropdownColor.'_caption', 'options'); ?>
		</div>
		
</div> <!-- dropdown -->

<?php endforeach; ?>