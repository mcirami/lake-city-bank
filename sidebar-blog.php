<aside class="sidebar blog_sidebar">
	<div class="purple_scheme">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
</aside>
<aside class="sidebar sidebar_search">
	<div class="purple_scheme">
		<h3 class="widget-title">Search</h3>
		<div class="sidebar_search_container">
			<div class="search_dropdown">
			<form>
				<label>Browse by Year</label>
				<select id="year_select">
					<?php $date = date('Y'); ?>
					<?php for($i = 0; $i < 10; $i++) : ?>
						<option><?php echo $date - $i; ?></option>
					<?php endfor; ?>
				</select>
			</form>
			</div>
			<div class="blog_search_form">
				<form method="get" id="blog_search" action="<?php bloginfo('url'); ?>">
					<label>Within press releases</label>
					<input type="hidden" name="post_type" value="post">
					<input class="post_year" type="hidden" name="year" value="">
					<input class="blog_search" type="text" value=""  name="s" id="s" placeholder="Search" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}">
				</form>
			</div>
		</div>
	</div>
</aside>