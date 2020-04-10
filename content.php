<?php
/**
 * @package boiler
 */
?>
		<div class="search_summary">
			<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php boiler_posted_on(); ?>
			</div>
		<?php endif; ?>


			<?php if ( is_search() ) : // Only display Excerpts for Search ?>

					<?php the_excerpt(); ?>

			<?php else : ?>
			<div>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boiler' ) ); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'boiler' ),
						'after'  => '</div>',
					) );
				?>
			</div>
			<?php endif; ?>
		</div>
  	<img class="page_border" src="<?php bloginfo('template_url'); ?>/images/skinny_border.jpg" alt=""/>
