jQuery(document).ready(function($) {
	
	
	var isMobile = (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ? true : false;
	var currentWidth = window.innerWidth || document.documentElement.clientWidth;
	
	if(!isMobile && currentWidth > 767){
		$('.topic-menu').sticky({ topSpacing: 0 });
		var offset_value = 100;
	} else {
		var offset_value = 680;
	}
	
	$('.topic-menu').visualNav({
		externalLinks	:	'dt-menu-expand',
		complete		: 	function(){ 
										$('.menu-item-simple-parent').removeClass('dt-current-menu');
										$('ul.sub-menu .selected').parents('li.menu-item-simple-parent').addClass('dt-current-menu');
										if(isMobile || currentWidth <= 767) { $("#visual-nav").hide(); }
									},
		changed			: 	function(){ 
										$('.menu-item-simple-parent').removeClass('dt-current-menu');
										$('ul.sub-menu .selected').parents('li.menu-item-simple-parent').addClass('dt-current-menu');
									},
		useHash			:	false,
		offsetTop		:	offset_value
	});
	
	// Mobile Menu
	$("#dt-menu-toggle").on("click", function( event ){
		event.preventDefault();
		var $menu = $("nav.main-menu").find("ul.menu.topic-menu:first");
		$menu.slideToggle(function(){
			$menu.css('overflow' , 'visible');
			$menu.toggleClass('menu-toggle-open');
		});
	});

	$(".dt-menu-expand").on("click", function(event){
		if( $(this).hasClass("dt-mean-clicked") ){
			$(this).text("+");
			if( $(this).prev('ul').length ) {
				$(this).prev('ul').slideUp(300);
			} else {
				$(this).prev('.megamenu-child-container').find('ul:first').slideUp(300);
			}
		} else {
			$(this).text("-");
			if( $(this).prev('ul').length ) {
				$(this).prev('ul').slideDown(300);
			} else{
				$(this).prev('.megamenu-child-container').find('ul:first').slideDown(300);
			}
		}
		
		$(this).toggleClass("dt-mean-clicked");
		return false;
	});
	
	// Goto Top
	$().UItoTop({ easingType: 'easeOutQuart' });	
	
	// PrettyPhoto
	if( $(window).width() >= 768 ){
		$('a[rel^="prettyphoto"], .prettyphoto').prettyPhoto({
			show_title		: false,
			deeplinking		: false,
			social_tools	: false
		});
	}
	
});