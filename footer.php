<?php
/**
 * The template for displaying the footer.
 *
 * @package boiler
 */
?>
	<div id="alert">
		<div class="alert_content">
			<img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" />
			<p>You are about to leave our site.</p>
			<p>By following this link you are leaving Lake City Bank's website. Lake City Bank is not responsible for the content, links, privacy or security of the website you are going to.</p>
			<div class="alert_buttons">
				<a class="cancel" href="#">Cancel</a>
				<a id="continue" class="gradient" href="#">Continue</a>
			</div>
		</div>
	</div>

	<footer id="global_footer" class="site_footer">
		<div class="container">
			<div class="footer_nav">
				<ul>
					<?php if( have_rows('column_one', 'options') ): ?>
						<?php while ( have_rows('column_one', 'options') ) : the_row(); ?>
							<li class="footer_sub_nav">
								<a class="nav_headers" href="<?php the_sub_field('header_link', 'options'); ?>"><?php the_sub_field('header_text', 'options'); ?></a>
								<?php if( have_rows('page_links', 'options') ): ?>
									<ul>
										<?php while ( have_rows('page_links', 'options') ) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text'); ?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('column_two', 'options') ): ?>
						<?php while ( have_rows('column_two', 'options') ) : the_row(); ?>
							<li class="footer_sub_nav">
								<a class="nav_headers" href="<?php the_sub_field('header_link', 'options'); ?>"><?php the_sub_field('header_text', 'options'); ?></a>
								<?php if( have_rows('page_links', 'options') ): ?>
									<ul>
										<?php while ( have_rows('page_links', 'options') ) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text'); ?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('column_three', 'options') ): ?>
						<?php while ( have_rows('column_three', 'options') ) : the_row(); ?>
							<li class="footer_sub_nav">
								<a class="nav_headers" href="<?php the_sub_field('header_link', 'options'); ?>"><?php the_sub_field('header_text', 'options'); ?></a>
								<?php if( have_rows('page_links', 'options') ): ?>
									<ul>
										<?php while ( have_rows('page_links', 'options') ) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text'); ?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('column_four', 'options') ): ?>
						<?php while ( have_rows('column_four', 'options') ) : the_row(); ?>
							<li class="footer_sub_nav">
								<a class="nav_headers" href="<?php the_sub_field('header_link', 'options'); ?>"><?php the_sub_field('header_text', 'options'); ?></a>
								<?php if( have_rows('page_links', 'options') ): ?>
									<ul>
										<?php while ( have_rows('page_links', 'options') ) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text'); ?></a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('last_column', 'options') ): ?>
						<li class="footer_sub_nav last_column">
							<ul>
								<?php while ( have_rows('last_column', 'options') ) : the_row(); ?>
									<li>
										<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text'); ?></a>
									</li>
								<?php endwhile; ?>
							</ul>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="footer_bottom">
				<?php if ( have_rows('header_account_dropdown', 'options')) : ?>

					<div class="gray_line"></div>
					<select class="gradient access_account" name="choose_account" id="access_account_footer">
						<option value="">Access Account</option>
						<?php while ( have_rows('header_account_dropdown', 'options')) : the_row(); ?>
							<?php if(get_sub_field('alert', 'options')) : ?>
								<option class="alert" data-description="<?php the_sub_field('link', 'options'); ?>" value="#alert"><?php the_sub_field('link_text', 'options'); ?></option>
							<?php else: ?>
								<option value="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text', 'options'); ?></option>
							<?php endif; ?>
						<?php endwhile; ?>
					</select>
					<div class="gray_line"></div>

				<?php endif; ?>
				<div class="footer_logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php if(get_field('no_fdic')) : ?>
							<img src="<?php echo bloginfo('template_url'); ?>/images/white-logo-wo-fdic.png" alt="<?php bloginfo( 'name' ); ?>"/>
						<?php else : ?>
							<img src="<?php echo bloginfo('template_url'); ?>/images/white-logo.png" alt="<?php bloginfo( 'name' ); ?>"/>
						<?php endif; ?>
					</a>
				</div>

				<?php if( have_rows('single_line_nav', 'options') ): ?>

					<div class="footer_secondary_nav">
						<ul>
							<?php while ( have_rows('single_line_nav', 'options') ) : the_row(); ?>
								<li>
									<?php if(get_sub_field('alert', 'options')) : ?>
										<a class="alert" data-link="<?php the_sub_field('link', 'options'); ?>" href="#alert"><?php the_sub_field('link_text', 'options'); ?></a>
									<?php else: ?>
										<a href="<?php the_sub_field('link','options'); ?>"><?php the_sub_field('link_text', 'options'); ?></a>
									<?php endif; ?>
								</li>
						    <?php endwhile; ?>
						</ul>
					</div>

				<?php endif; ?>

				<div class="footer_copy">
					<p>
						&copy;<?php echo " " . date("Y") . " "; ?><?php the_field('footer_copy', 'options', false); ?>
					</p>
				</div>
				<?php if( have_rows('footer_social_media', 'options') ): ?>
					<div class="social_media">
					<?php while ( have_rows('footer_social_media', 'options') ) : the_row(); ?>
						<?php $image = get_sub_field('social_icon', 'options'); ?>
							<?php if( !empty($image) ): ?>
								<a class="alert" data-link="<?php the_sub_field('social_link', 'options'); ?>" href="#alert">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
								</a>
							<?php endif; ?>
				    <?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>


		</div><!-- end site_wrap -->
	</body>
</html>