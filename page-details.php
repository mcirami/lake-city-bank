<?php
/**
 * Template Name: Details Template
 *
 * @package boiler
 */

get_header(); ?>

<div class="category">

    <?php get_template_part('content','sub-hero'); ?>

    <div class="container">

        <div class="content">

            <div class="details">


                <?php if( have_rows('details_flexable_content') ) : // details flexible content ?>
                    <?php while( have_rows('details_flexable_content') ) : the_row(); ?>
                        <?php if( get_row_layout() == 'title' ) : ?>
                            <div class="section_header">
                                <img class="page_border" src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
                                    <h2><?php the_sub_field('section_title'); ?></h2>
                                <img class="page_border" src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
                            </div>
                        <?php elseif( get_row_layout() == 'single_column') : ?>
                            <div class="acf_wysiwyg">
                                <?php the_sub_field('single_content'); ?>
                            </div>
                        <?php elseif(get_row_layout() == 'three_column' ) : ?>
                            <div class="three_col_layout">
                                <div class="left">
                                    <?php the_sub_field('left_wysiwyg'); ?>
                                </div>
                                <div class="middle">
                                    <?php the_sub_field('middle_wysiwyg'); ?>
                                </div>
                                <div class="right">
                                    <?php the_sub_field('right_wysiwyg'); ?>
                                </div>
                            </div>
                        <?php elseif(get_row_layout() == 'list') : ?>
                            <div class="box_list">
                                <img class ="small_border" src="<?php echo bloginfo('template_url'); ?>/images/small-page-border.png" />
                                <?php if(have_rows('list_title_and_items') ) : ?>
                                    <?php while(have_rows('list_title_and_items') ) : the_row(); ?>
                                        <p><?php the_sub_field('list_title'); ?></p>
                                        <p><?php the_sub_field('list_item'); ?></p>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <img class ="small_border" src="<?php echo bloginfo('template_url'); ?>/images/small-page-border.png" />
                            </div>
                        <?php elseif(get_row_layout() == 'bio') : ?>
                            <div class="bios">
                                <?php if(have_rows('bio_content') ) : ?>
                                    <?php while (have_rows('bio_content') ) : the_row(); ?>
                                        <?php
                                            $bioImg = get_sub_field('bio_image');
                                        ?>
                                        <div>
                                            <div class="bio_img">
                                                <img src="<?php echo $bioImg['url']; ?>" alt="<?php echo $bioImg['alt']; ?>" />
                                            </div>
                                            <div class="bio_content">
                                                <h3><?php the_sub_field('bio_name'); ?></h3>
                                                <span class="title"><?php the_sub_field('bio_title'); ?></span><br>
                                                <span class="number"><a href="tel:<?php the_sub_field('bio_number'); ?>"><?php the_sub_field('bio_number'); ?></a></span>
                                                <?php the_sub_field('bio_content'); ?>
                                            </div>
                                        </div>
                                        <img class="page_border" src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php elseif(get_row_layout() == 'content_w/_button') : ?>
                            <div class="content_button">
                                <div class="acf_wyswiyg">
                                    <?php the_sub_field('content_before_btton'); ?>
                                </div>
                                <a class="gradient" href="<?php the_sub_field('content_button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
                            </div>
                        <?php elseif(get_row_layout() == 'table') : ?>
                        	<div class="details_table">
	                        	<img class="page_border" src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
	                        	
	                        	<?php if (have_rows('table_rows')) : ?>
	                        	<ul class="table_rows">
	                        		<?php while (have_rows('table_rows')) : the_row(); ?>
	                        			<li class="table_row">
											<div class="left_column">
												<?php the_sub_field('first_column_text'); ?>
											</div>
											<div class="right_column">
												<?php the_sub_field('second_column_text'); ?>
											</div>
	                        			</li>
	                        		<?php endwhile; ?>
	                        	</ul>
	                        	<?php endif; ?> 	
	                         	
								<div class="table_footer">
		                        	<?php the_sub_field('table_footer'); ?>
	                        	</div>	
								<img class="page_border" src="<?php echo bloginfo('template_url'); ?>/images/gray-bar.png" />
                        	</div> <!-- details table -->
						<?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php the_content(); ?>

        </div> <!-- content -->

        <?php get_sidebar(); ?>

    </div> <!-- container -->

</div> <!-- category -->

<?php get_footer(); ?>
