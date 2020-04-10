<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package boiler
 */

get_header(); ?>

	<?php get_template_part('content','sub-hero'); ?>

	<section class="container default">
	
		<article class="content">
			<img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
			<?php the_content(); ?>
			<?php
				$attachment_id = get_field('pdf_download');
				$url = wp_get_attachment_url( $attachment_id );
				$title = get_the_title ( $attachment_id );
			?>
			<img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
			<?php if ( get_field('file_check_box') == TRUE ): ?>
				<p class="file_info"><?php the_field('file_info'); ?></p>
				<a class="pdf gradient" href="<?php echo $url; ?>" title="<?php echo $title; ?>">Download PDF</a>
			<?php endif; ?>
		</article>
		
		<?php get_sidebar(); ?>
		
	</section>

<?php get_footer(); ?>
