<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package boiler
 */
?>
	<aside class="sidebar">

		<div class="<?php if(get_field('category_colors') ) : the_field('category_colors'); else : echo 'darkblue'; endif; ?>">
		<?php do_action( 'before_sidebar' ); ?>
			<?php if(is_tree(308)) : ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php elseif(is_tree(704)) : ?>	
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			<?php elseif(is_tree(706)) : ?>
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			<?php elseif(is_tree(709)) : ?>
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			<?php elseif(is_tree(753)) : ?>
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			<?php elseif(is_page_template('page-locations.php') || is_page_template('page-contact.php') || is_page_template('page-forms.php')) : ?>
				<?php dynamic_sidebar('sidebar-6'); ?>
			<?php endif; ?>
		</div>
	</aside>