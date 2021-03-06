<?php
/**
 * @package boiler
 */
?>

	<div class="gray_bar"></div>
	<div class="date">
		<?php the_time('F j, Y');  ?>
	</div>
	<h1><?php the_title(); ?></h1>

	<div class="blog_single_content">
		<?php the_content(); ?>
		<?php
			//wp_link_pages( array(
			//	'before' => '<div class="page-links">' . __( 'Pages:', 'boiler' ),
			//	'after'  => '</div>',
			// ) );
		?>
	</div>

	<footer class="blog_footer">
		<p>For more information visit <a href="http://www.lakecitybank.com">www.lakecitybank.com</a></p>
		<div class="gray_bar"></div>
		<a class="return_to_articles gradient" href="/about-us/latest-news">Return to Articles</a>
		
		<?php
			/* translators: used between list items, there is a space after the comma */
//			$category_list = get_the_category_list( __( ', ', 'boiler' ) );

			/* translators: used between list items, there is a space after the comma */
//			$tag_list = get_the_tag_list( '', __( ', ', 'boiler' ) );

//			if ( ! boiler_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
//				if ( '' != $tag_list ) {
//					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				} else {
//					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				}

//			} else {
				// But this blog has loads of categories so we should probably display them here
//				if ( '' != $tag_list ) {
//					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				} else {
//					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				}

//			} // end check for categories on this blog

//			printf(
//				$meta_text,
//				$category_list,
//				$tag_list,
//				get_permalink(),
//				the_title_attribute( 'echo=0' )
//			);
		?>

		<?php //edit_post_link( __( 'Edit', 'boiler' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>