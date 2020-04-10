<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package boiler
 */

get_header(); ?>

<?php

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);

?>

	<section class="search">
		<div class="sub_hero_container">
			<div class="default_sub_hero">
				<div class="container">
					<h1>Search Results</h1>
					<img src="<?php echo bloginfo('template_url'); ?>/images/subhead-img.png" />
				</div>
			</div>
		</div>
	
		<div class="container search_pg">

			<div class="content">

				<div class="search_form">
					<img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
						<div>
							<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'boiler' ); ?>" />
								<i class="fa fa-search"></i>
							</form>
							<?php
							$LCBSearch =& new WP_Query("s=$s & showposts=-1 & post_per_page=1");
							$NumResults = $LCBSearch->post_count;
							?>
							<p class="search_results_number"><?php echo $NumResults; ?> <?php printf( __( 'results for %s', 'boiler' ), '<span>' . get_search_query() . '</span>' ); ?></p>
						</div>
					<img class="page_border" src="<?php bloginfo('template_url'); ?>/images/pg_border.png" alt=""/>
				</div>

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'search' ); ?>

					<?php endwhile; ?>

					<?php boiler_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'search' ); ?>

				<?php endif; ?>
			</div><!-- end of content -->

			<div class="sidebar">
				<div class="sidebar_header">
					<h3>Our Corporate Office</h3>
				</div>
				<div class="sidebar_content">
					<span>Corporate Office Mailing Address</span>
					<p>Lake City Bank<br>P.O. Box 1387<br>Warsaw, IN 46581</p>

					<span>Corporate Office LOCATION</span>
					<p>Lake City Bank<br>202 E. Center St.<br>Warsaw, IN 46580</p>

					<span>Lake City Bank One Call Center</span>
					<p>1-888-522-2265</p>
					<div class="location">
						<a href="<?php bloginfo('site_url'); ?>/about/branch-locations" title="Locate a Branch" alt="Locate a Branch">Locate a Branch</a>
					</div>
				</div><!-- end of sidebar content -->
				<img src="<?php bloginfo('template_url'); ?>/images/lakecity.png" alt=""/>
			</div> <!-- sidebar -->

		</div><!-- end of container -->
		
	</section>

<?php get_footer(); ?>