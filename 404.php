<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package boiler
 */

get_header(); ?>

	<section class="container">
		<div class="content full_pg">

			<article id="post-0" class="post not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'boiler' ); ?></h1>
				</header>

				<div class="entry-content not_found_content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'boiler' ); ?></p>

					<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
						<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'boiler' ); ?>" />
						<i class="fa fa-search"></i>
					</form>


<!--					--><?php //if ( boiler_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
<!--					<div class="widget widget_categories">-->
<!--						<h2 class="widgettitle">--><?php //_e( 'Most Used Categories', 'boiler' ); ?><!--</h2>-->
<!--						<ul>-->
<!--						--><?php
//							wp_list_categories( array(
//								'orderby'    => 'count',
//								'order'      => 'DESC',
//								'show_count' => 1,
//								'title_li'   => '',
//								'number'     => 10,
//							) );
//						?>
<!--						</ul>-->
<!--					</div>-->
<!--					--><?php //endif; ?>
<!---->
<!--					--><?php
//					/* translators: %1$s: smiley */
//					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'boiler' ), convert_smilies( ':)' ) ) . '</p>';
//					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
//					?>


				</div>
			</article>

		</div>
	</section>

<?php get_footer(); ?>