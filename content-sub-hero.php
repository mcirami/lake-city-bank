<div class="sub_hero_container">
	<?php if (is_page_template( 'page-details.php' )) : ?>
		<div class="sub_hero <?php the_field('category_colors'); ?>">
			<div class="container">
				<?php $page_icon = get_field('page_icon'); ?>
				<?php if($page_icon) : ?>
					<img class="page_icon" src="<?php the_field('page_icon'); ?>" alt="" />
					<h1><?php the_title();?></h1>
				<?php endif; ?>
				
				<?php if(!$page_icon) : ?>
					<h1><?php echo get_the_title($post->post_parent);?></h1>
					<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
				<?php endif; ?>
			</div> 
		</div>
	<?php elseif (is_single() || is_page_template('page-blog.php')) : ?>
		<div class="sub_hero purple_scheme">
			<div class="container">
				<img class="page_icon" src="<?php echo bloginfo('template_url'); ?>/images/single-news-icon.png" alt="" />
				<h3>Latest News</h3>
			</div> 
		</div>
	<?php elseif (is_page_template('page-sub-category.php') && $post->post_parent) : ?>
		<div class="sub_hero <?php the_field('category_colors'); ?>">
			<div class="container">
				<?php $page_icon = get_field('page_icon'); ?>
				<?php if($page_icon) : ?>
					<img class="page_icon" src="<?php the_field('page_icon'); ?>" alt="" />
				<?php endif; ?>
				<h1><?php the_title();?></h1>
				<?php if(!$page_icon) : ?>
					<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
				<?php endif; ?>
			</div> 
		</div>
	<?php elseif (is_page() && !is_page_template() || is_page('324') || is_page_template('page-locations.php') || is_page_template('page-forms.php')) : ?>
		<div class="default_sub_hero">
			<div class="container">
				<h1><?php the_title();?></h1>
				<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
			</div> 
		</div>
	<?php elseif (is_page_template( 'page-calculators.php' )) : ?>
		<div class="default_sub_hero">
			<div class="container">
				<h1><?php echo get_the_title($post->post_parent);?></h1>
				<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
			</div> 
		</div>	
	<?php else : ?>
		<div class="default_sub_hero">
			<div class="container">
				<h1><?php echo the_title(); ?></h1>
				<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
			</div> 
		</div>
	<?php endif; ?>
</div>