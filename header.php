<?php
/**
 * The Header for our theme.
 *
 * @package boiler
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if lte IE 9]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie9.css" media="screen" type="text/css" />
<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">

<link href='http://fonts.googleapis.com/css?family=Gudea:400,700,400italic|Sanchez:400italic,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcj7KjtWqqcZB1t3nGoSwN6rHwCJ4qOMk"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="site_wrap">

	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
    <!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
			   filter: none;
			}
		</style>
	<![endif]-->
	
	<div id="slide_nav">
		<form method="get" id="slide_search" action="<?php bloginfo('url'); ?>">
            <input type="hidden" name="submit" value="Search">
            <input class="search" type="text" value=""  name="s" id="s" placeholder="Search" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}">
            <i class="fa fa-search"></i>
        </form>
		<?php wp_nav_menu( array( 'theme_location' => 'slide_nav', 'container' => false, 'menu_class' => 'slide_nav' ) ); ?>
			<ul class="sub-menu mm-list mm-panel mm-hidden" id="mm-7">
				<li class="mm-subtitle">
					<a class="mm-subclose" href="#menu-slide-nav">Access Account</a>
				</li>
				<?php if ( have_rows('header_account_dropdown', 'options')) : ?>
					<?php while ( have_rows('header_account_dropdown', 'options')) : the_row(); ?>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<?php if(get_sub_field('alert', 'options')) : ?>
								<a class="alert" data-link="<?php the_sub_field('link', 'options'); ?>" href="#alert"><?php the_sub_field('link_text', 'options'); ?></a>
							<?php else: ?>
								<a href="<?php the_sub_field('link','options'); ?>"><?php the_sub_field('link_text', 'options'); ?></a>
							<?php endif; ?>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		<a href="#" class="linkedin_link">
			<img src="<?php echo bloginfo('template_url'); ?>/images/linkedin_btn_white.png" />
		</a>
		<a href="#" class="fb_link">
			<img src="<?php echo bloginfo('template_url'); ?>/images/facebook_btn_white.png" />
		</a>
	</div>
	
	<div class="top_header">
		<div class="container">
			<?php if (have_rows('top_header_links', 'options')) : ?>
				<ul class="top_header_links">
					<?php while (have_rows('top_header_links', 'options')) : the_row(); ?>
						<li>
							<a href=<?php the_sub_field('link', 'options'); ?>><?php the_sub_field('link_text', 'options'); ?></a>
						</li>
					<?php endwhile; ?>
				</ul> <!-- top header links -->
			<?php endif; ?>
			
			<?php if(have_rows('mobile_top_header_links', 'options')) : ?>
				<ul class="mobile_header_links">
					<?php while(have_rows('mobile_top_header_links', 'options')) : the_row(); ?>
						<li>
							<a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text', 'options'); ?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			
			<form method="get" id="search" action="<?php bloginfo('url'); ?>">
                <input type="hidden" name="submit" value="Search">
                <input class="search" type="text" value=""  name="s" id="s" placeholder="Search" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}">
				<input type="submit" class="search_icon" value/>
            </form>

			<?php if ( have_rows('header_account_dropdown', 'options')) : ?>
				<div class="account_dropdown">
					<select class="gradient access_account" name="choose_account" id="access_account_header">
						<option value="">Access Account</option>
						<?php while ( have_rows('header_account_dropdown', 'options')) : the_row(); ?>
							<?php if(get_sub_field('alert', 'options')) : ?>
								<option class="alert" data-description="<?php the_sub_field('link', 'options'); ?>" value="#alert"><?php the_sub_field('link_text', 'options'); ?></option>
							<?php else: ?>
								<option value="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_text', 'options'); ?></option>
							<?php endif; ?>
						<?php endwhile; ?>
					</select>
				</div>
			<?php endif; ?>
			
		</div> <!-- container -->
	</div> <!-- top header -->

	<header id="global_header">
		<div class="container">
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if(get_field('no_fdic')) : ?>
						<img src="<?php echo bloginfo('template_url'); ?>/images/logo-wo-fdic.png" alt="<?php bloginfo( 'name' ); ?>"/>
					<?php else : ?>
						<img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/>
					<?php endif; ?>
				</a>
			</div> <!-- logo -->
			<div id="menu_btn" class="mobile_menu_btn"></div>
			
			<nav role="navigation">
				<ul>
					<li class="green_menu <?php if(is_tree(308)) : ?>active_hover<?php endif; ?>"><a href="<?php the_field('green_hdr_link', 'options'); ?>"><?php the_field('green_hdr', 'options'); ?></a>
						<img src="<?php echo bloginfo('template_url'); ?>/images/green-menu-icon.png" />
					</li>
					<li class="blue_menu <?php if(is_tree(704)) : ?>active_hover<?php endif; ?>"><a href="<?php the_field('blue_hdr_link', 'options'); ?>"><?php the_field('blue_hdr', 'options'); ?></a>
						<img src="<?php echo bloginfo('template_url'); ?>/images/blue-menu-icon.png" />
					</li>
					<li class="orange_menu <?php if(is_tree(706)) : ?>active_hover<?php endif; ?>"><a href="<?php the_field('orange_hdr_link', 'options'); ?>"><?php the_field('orange_hdr', 'options'); ?></a>
						<img src="<?php echo bloginfo('template_url'); ?>/images/orange-menu-icon.png" />
					</li>
					<li class="purple_menu <?php if(is_tree(709)) : ?>active_hover<?php endif; ?>"><a href="<?php the_field('purple_hdr_link', 'options'); ?>"><?php the_field('purple_hdr', 'options'); ?></a>
						<img src="<?php echo bloginfo('template_url'); ?>/images/purple-menu-icon.png" />
					</li>
				</ul>
			</nav> <!-- navigation -->
			
		</div> <!-- container -->
		
		<?php get_template_part('content','dropdown'); ?>
		
	</header> <!-- global header -->
			