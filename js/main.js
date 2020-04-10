jQuery(document).ready(function($){

	var localDev = true;

	if(localDev == true) {
		loadReload();
	}
	
	$("#slide_nav").mmenu({
		slidingSubmenus: true,
		offCanvas: {
           position  : "right",
           zposition : "next"
        },
	});
	
	$('#menu_btn').click(function(){
		$('#slide_nav').trigger('open.mm');
	});
	
	function showMenu(menu, dropdown){
		$('#global_header nav ul li').removeClass('hovered');
		$('.dropdown').css('display', 'none');
		dropdown.css('display', 'block');
		menu.addClass('hovered');
	}
	
	$('.green_menu').hover(function(){
		showMenu($(this), $('.green_dropdown'));
	});
	
	$('.blue_menu').hover(function(){
		showMenu($(this), $('.blue_dropdown'));
	});
	
	$('.orange_menu').hover(function(){
		showMenu($(this), $('.orange_dropdown'));
	});
	
	$('.purple_menu').hover(function(){
		showMenu($(this), $('.purple_dropdown'));	
	});
	
	$('#global_header').mouseleave(function(){
		$('#global_header nav ul li').removeClass('hovered');
		$('.dropdown').css('display', 'none');
	})
	
	$('#logo, .state').mouseenter(function(){
		$('#global_header nav ul li').removeClass('hovered');
		$('.dropdown').css('display', 'none');
	})
	
	function speedBump(linkLocation) {
		$('#continue').attr('href', linkLocation);
	}
	
	var linkLocation;
	
	$('.alert').live('click' ,function(e){
		e.preventDefault();
		linkLocation = $(this).attr('data-link');
	});
	
	
	$(".alert").fancybox({
		arrows: false,
		wrapCSS: 'alert',
		autoSize: false,
		width: '550',
		height: '250',
		closeBtn: false,
		afterLoad: function(){
			speedBump(linkLocation);
		}
	});
			
	$('.alert_buttons a').click(function() {
		var alertClass = $(this).attr('id');
		if(alertClass === 'continue') {
			$.fancybox.close();
			window.open($(this).attr('href'));
		} else {
			$.fancybox.close();
		}
	});
	
	$(".video_popup").fancybox ({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
	
	$('.video_popup').click(function(e){
		e.preventDefault();
	});

	function dropdownValue (data) {
		var dropdownLink = data.selectedData.value;
		var dataLink = data.selectedData.description;
		if (dropdownLink != "") {
			if (dropdownLink === "#alert") {
				$.fancybox.open({
					href: dropdownLink,
					arrows: false,
					wrapCSS: 'alert',
					autoSize: false,
					width: '550',
					height: '250',
					closeBtn: false,
					afterLoad: function(){
						speedBump(dataLink);
					}
				});

			} else {
				window.open(dropdownLink);
			}
		}
	}

	$('#access_account').ddslick({
		onSelected: function(data) {
			dropdownValue(data);
		}
	});

	$('#access_account_header').ddslick({
		onSelected: function(data) {
			dropdownValue(data);
		}
	});

	$('#access_account_footer').ddslick({
		onSelected: function(data) {
			dropdownValue(data);
		}
	});

	$('.expand_click').live('click', function(e) {
		gparents = $(this).parentsUntil('.results_wrapper');
		var n = (gparents).length;
		gparent = gparents[n-1].id;
		$("#" + gparent + " " + '.expanded').toggle();
		$("#" + gparent + " " + '.original').toggle();
	});
	
	$('.slp_ui_button').addClass('gradient');

	var windowWidth;

	$(window).resize(function(){
		windowWidth = $(window).width();
	});

	$(".widget_nav_menu li.menu-item-has-children").click(function(e) {
		$(window).trigger('resize');

		if (windowWidth > 600) {

			if (!$(e.target).is("a")) {
				$(this).find(".sub-menu").toggle();
				$(this).toggleClass('open');
			}
		}
	});

	$('.gfield select').each(function(e) {
		var selectID = $(this).attr('id');
		var selectName = $(this).attr('name');
		$('#'+selectID).ddslick({
			width: '100%',
			background: '#ffffff',
			onSelected: function(data){
				$('#'+selectID+' .dd-selected-value').attr('name', selectName);
			}
		});
	});

	$('#year_select').ddslick({
	});

	$('#year_select').on('click', function() {
		var year = $('#year_select .dd-selected-value').val();
		$('.post_year').attr('value', year);
		console.log(year);
	});

	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide"
		});
	});

	$('#access_account.dd-container, #access_account_header.dd-container, #access_account_footer.dd-container ').addClass('access_account');
	$('#access_account .dd-select, #access_account_footer .dd-select, #access_account_header .dd-select').addClass('gradient');

	$('.news_header').click(function() {
		$('.home_page .column_copy h4').removeClass('active');
		$(this).addClass('active');
		$('.column_wrap.news').css('display', 'block');
		$('.column_wrap.twitter').css('display', 'none');
	});

	$('.twitter_header').click(function() {
		$('.home_page .column_copy h4').removeClass('active');
		$(this).addClass('active');
		$('.column_wrap.twitter').css('display', 'block');
		$('.column_wrap.news').css('display', 'none');
	});

	var accountContent = $('#menu-item-1547').html();
	$('#menu-item-1547').html('<a href="#mm-7" class="mm-subopen"></a>' + accountContent);
});