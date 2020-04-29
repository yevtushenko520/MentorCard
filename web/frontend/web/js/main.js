/* global jQuery, window, Modernizr, Waypoint */

// Setting mobile html class
var isMobile = { 
		Android    : function() { return navigator.userAgent.match(/Android/i); }, 
		BlackBerry : function() { return navigator.userAgent.match(/BlackBerry/i); }, 
		iOS        : function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
		webOS      : function() { return navigator.userAgent.match(/webOS/i); },  
		Opera      : function() { return navigator.userAgent.match(/Opera Mini/i); }, 
		Windows    : function() { return navigator.userAgent.match(/IEMobile/i); }, 
		any        : function() { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.webOS() || isMobile.Opera() || isMobile.Windows()); } },
	qodx_mobile = false;

if ( isMobile.any() ) { 
	qodx_mobile = true;
	document.documentElement.className += " qodx_mobile"; 
} else {
	document.documentElement.className += " qodx_desktop"; 
}

// Setting breadcrumbs links inline color with javascript
var breadcrumbs_id = document.getElementById("qodx_breadcrumbs_wrapp");
if (breadcrumbs_id != null) {
	var breadcrumbs_color  = breadcrumbs_id.dataset.color;
	
	var a = breadcrumbs_id.getElementsByTagName('a');
	for (var i = 0; i < a.length; i++) {
		var elem = a[i];
		elem.style.color = breadcrumbs_color;
	}
}

(function($) {
    "use strict";	
	
	var headerScroll,
		headerTimer,
		currentPosition;

	$(window).load(function(){
		// Initialize after images are loaded
		var wrap              = $('body'),
			qodx_loader         = wrap.hasClass('qodx_loader');
		
		if (qodx_loader) {
			$("#qodx_loader").fadeOut("slow");
		}
		
		qodx_functions_call_on_load();		
		
	});
	
	$(document).ready(function() {
		var win          = $(window),
			container    = $('html'),
			main_wrapper = $('#main-wrapper');
						
		// Choose between ( fixed / autoHide / normal )
		if ( main_wrapper.hasClass('qodx-sticky-header') ) {
			headerScroll = 'fixed';
		} else if ( main_wrapper.hasClass('qodx-autohide-header') ) {
			headerScroll = 'autoHide';
		} else {
			headerScroll = 'normal';
		}
		
		if ( qodx_mobile ) {
			// Remove Transition From Links
			$('a').each(function () { $(this).addClass('no-transition'); });
		} else {
			// Transition Between Pages
			main_wrapper.css({ opacity: '1' });
		}
				
		qodx_functions_call();
				
		main_wrapper.fitVids();
				
		$('.no_link').click(function(){
			return false;		
		});
		
		$('.qodx_search_form').each(function(){
			this.reset();
		});
									
		if ($.fn.elastic) { $('#commentform textarea, .qodx_contact_form textarea').elastic(); }
				
		if ($.fn.mb_YTPlayer) {			
			if ( !qodx_mobile ) {
				/* show player and hide mobile bg on desktops */
				$(".qodx_youtube_player_home").mb_YTPlayer();
				$('.qodx_bg_video_mobile').hide();
			} else {
				/* hide player and video volume button on mobiles */
				$(".qodx_youtube_player_home").hide();
			}
		}
		
		// Current Page URL
		if ($('.page-link').length) {
			$('.page-link').each(function () {
				$(this).val(window.location.href);
			});
			$('.page-link').on('click', function () {
				$(this).select();
			});
		}
						
		qodx_scroll_top();	
		
	});	
	
	/* ----- Scrolling Effect ----- */
	$(window).scroll(function(container) {
		if(typeof container === 'undefined') { container = 'body'; }
		var wrapp = $(container);
		
			
		if($.fn.qodx_scroll_effect)
		wrapp.qodx_scroll_effect();
		var b = $(window).scrollTop();
		
		if( b > 40 ){		
			$(".header-menu.navbar-fixed-top").addClass("scroll-fixed-navbar");	
		} else {
			$(".header-menu.navbar-fixed-top").removeClass("scroll-fixed-navbar");
		}
		
		// parallax effect
		if($.fn.qodx_parallax)
		$(".qodx_img_parallax").qodx_parallax();
		
	});
		
	function qodx_functions_call_on_load(container) {	
		if(typeof container == 'undefined'){ container = 'body'; }
		var wrapp = $(container);
								
		// admin bar sticky header
		if($.fn.qodx_wp_admin_bar)	
		wrapp.qodx_wp_admin_bar();
		
		// parallax effect
		if($.fn.qodx_parallax)
		$(".qodx_img_parallax").qodx_parallax();
		
	}
	
	function qodx_functions_call(container){
		if(typeof container == 'undefined'){ container = 'body';}
		var wrapp = $(container);
						
		// adding mobile class on smaller screens
		if($.fn.is_smallerScreen)
		wrapp.is_smallerScreen();	
		
		// navigation
		if($.fn.qodx_navigation)
		wrapp.qodx_navigation(); // used for normal navigation
		
		if($.fn.qodx_one_page_nav)
		wrapp.qodx_one_page_nav(); // used for one page navigation			
		
		// responsive navigation
		if($.fn.qodx_responsive_nav)
		wrapp.qodx_responsive_nav();	
																
		// side navigation effect
		if($.fn.qodx_side_nav)	
		$(".qodx_side-nav li", container).qodx_side_nav();	
		
		// add markers and classes to parent lists
		if($.fn.qodx_menu_markers)	
		$("#qodx-navigation li:has(ul.sub-menu), .widget_subnav li:has(ul)", container).qodx_menu_markers();	
				
		// Hiding your email addresses from spam harvesters
		if($.fn.mailto)
		$('.nospam').mailto();	
	
		// fancybox lightbox
		if($().fancybox && $.fn.qodx_fancybox)
		$(".fancybox", container).qodx_fancybox();	
					
		// terms popup
		$(".qodx_term-popup").on("click", function() {
    		return $(".qodx_terms").addClass("terms-active"), $(".overlay-dark").addClass("active"), !1
		}); 
		$(".t-close").on("click", function() {
    		return $(".qodx_terms").removeClass("terms-active"), $(".overlay-dark").removeClass("active"), !1
		});
		
	}	
	
	/* ----- Check If Exists ----- */
	$.fn.exists = function () {
		return this.length !== 0;
	}; // Usage: $("#notAnElement").exists();
	
	/* Adding ( "is_smallScreen" ) Class
	   --------------------------------------------------------- */	
	   
	$.fn.is_smallerScreen = function() {
		var win               = $(window),
			container         = $('html'),
			isResponsiveMode  = container.hasClass('responsive'),
			check_screen      = function() {										
				if( win.width() < 1024 && isResponsiveMode ){
					container.addClass('is_smallScreen');
				} else {
					container.removeClass('is_smallScreen');
				}
			};
			win.on("smartresize", check_screen);
			check_screen();
	};
	
	
	/* Navigation
	   --------------------------------------------------------- */	
	   
	$.fn.qodx_navigation = function() {
			var menu        = $('#qodx-navigation > ul'),
				nav_side    = $('#nav.qodx_nav_side > ul');
				//first_level_items = menu.eq(0).find('>li a');
				
			menu.nav({
				child: {
					beforeFirstRender: function() {
					}
				},
				root: {
					effect: 'fade',
					beforeHoverIn: function() {
					},
					beforeHoverOut: function() {
					},					
					afterHoverIn: function() {
						$(this).trigger('qodx_menuopen');
					},					
					afterHoverOut: function() {
						$(this).trigger('qodx_menuclose');
					},
				}
			});
			
			// Side Navigation
			nav_side.append('<a href="#" class="nav-button"><span>Menu</span></a><div class="nav-overlay"></div>');
			$('.nav-button').on('touchstart click', function(e){
				e.stopPropagation();
				e.preventDefault();
				if ( nav_side.hasClass('open') ) {
					nav_side.removeClass('open');
				} else {
					nav_side.addClass('open');
					$('.nav-overlay').on('touchstart click', function(){
						nav_side.removeClass('open');
					});
				}
			});
			// End Slide Navigation Menu
						
		};
	
	/* One Page Navigation
	   --------------------------------------------------------- */	
	   
	$.fn.qodx_one_page_nav = function() {
		var stickyH = $("#main-wrapper").is('.qodx-sticky-header');
		/* --- One page navigation --- */
		$('#qodx-navigation ul a[href*="#"], .qodx_scroll').click(function() {
			if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
				var $target = $(this.hash); // Check the section area id
				$target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
				if ($target.length) {
					var targetOffset = $target.offset().top; // the top of the section area
					if (stickyH) {
						$('html,body').animate({
							scrollTop : targetOffset - $('.scroll-fixed-navbar').height() // adding sticky header height
						}, 1100, 'easeInOutExpo');
					} else {
						$('html,body').animate({
							scrollTop : targetOffset
						}, 1100, 'easeInOutExpo');
					}
					return false;
				}
			}
		});

		/* --- Highlight menu links when scrolling --- */
		$(document).scroll(function() {
			var pos          = $(this).scrollTop(),
				headerHeight = $('.qodx_nav_top #qodx_header').outerHeight(true);
			$(".qodx_section_area").each(function() {
				var id_slide          = $(this).attr("id"),
					element_menu      = $('#nav ul li a[href$="#' + id_slide + '"]:first'),						
					resp_element_menu = $('#qodx-responsive-nav li a[href$="#' + id_slide + '"]:first');

				if ($(this).offset().top <= pos + headerHeight && element_menu.length > 0) {
					$("#nav ul li").removeClass("current_page_item");
					element_menu.parent().addClass("current_page_item");

					$("#qodx-responsive-nav li").removeClass("current_page_item");
					resp_element_menu.parent().addClass("current_page_item");
				}
			});
		});
	};
		
	
	/* Responsive Navigation
	   --------------------------------------------------------- */	
	   
	$.fn.qodx_responsive_nav = function() {
		var win = $(window), header = $('.responsive .header-section');

		if(!header.length) {
			return;
		}

		var menu              = header.find('#nav ul:eq(0)'),
			first_level_items = menu.find('>li').length,
			switchWidth;

		if ( header.hasClass('qodx_resp_nav_under_991') ) { 
			switchWidth = 975;
		} else if ( header.hasClass('qodx_resp_nav_under_767') ) {
			switchWidth = 751;
		} else {
			switchWidth = 751;
		}

		if(first_level_items > 8) {
			switchWidth = 975;
		}
		// if there is no menu selected
		if(header.is('.drop_down_nav')) {
			menu.mobileMenu({
				switchWidth: switchWidth,
				topOptionText: $('#nav').data('select-name'), // first option text
				indentString: 'ontouchstart' in document.documentElement ? '- ' : "&nbsp;&nbsp;&nbsp;"  // string for indenting nested items
			});
		} else {
			var container           = $('#main-wrapper'),
				header_wrapper      = container.find('.header-section'),
				responsive_nav_wrap	= $('<div id="qodx_responsive_nav_wrap"><div class="container"><div class="row"></div></div></div>'),
				responsiveNavWrap	= responsive_nav_wrap.find('.row'),
				show_menu		    = $('<a id="responsive_nav_open" href="#" class=""><i class="entypo-menu"></i></a>'),
				show_menu_icon  	= show_menu.find('i'),

				stickyH             = container.is('.qodx-sticky-header'),
				no_stickyH_onSS     = container.is('.qodx_noSticky_on_ss'),
				nav_side            = container.is('.qodx_nav_side'),

				responsive_nav      = menu.clone().attr({id:"qodx-responsive-nav", "class":""}),
				menu_added          = false;

				responsive_nav.find('ul').removeAttr("style");
				responsive_nav.find('.notMobile').remove();

				if (stickyH && !no_stickyH_onSS) {
					header.append(responsive_nav_wrap);
				} else {
					responsive_nav_wrap.insertAfter(header_wrapper);
				}	

				// hiding all sub-menus		
				responsive_nav.find('li').each(function(){
					var el = $(this);
					if(el.find('> ul').length > 0) {
						 el.find('> a').append('<i class="qodx_has_child fa-angle-down"></i>');
					}
				});

				responsive_nav.find('li:has(">ul") > a > i.qodx_has_child').click(function(){
					var el        = $(this),     // the right angle icon
						el_link   = el.parent(), // the link <a> which wrap the icon
						el_parent = el_link.parent().find('> ul');						

					el_link.toggleClass('active');
					el_parent.stop(true,true).slideToggle();

					if ( el_link.hasClass('active') ) {
						el.removeClass('fa-angle-down').addClass('fa-angle-up');
					} else {
						el.removeClass('fa-angle-up').addClass('fa-angle-down');							
					}

					return false;
				});
				// end hiding all sub-menus						

				show_menu.click(function(){		
					if(container.is('.show_responsive_nav')) {
						container.removeClass('show_responsive_nav');
						show_menu_icon.removeClass('entypo-cancel-circled').addClass('entypo-menu');
					} else {
						container.addClass('show_responsive_nav');
						show_menu_icon.removeClass('entypo-menu').addClass('entypo-cancel-circled');
					}

					responsive_nav_wrap.stop(true,true).slideToggle(500);
					return false;
				});					

				// start responsive one page navigation	

				// $('[class^="whatever-"], [class*=" whatever-"]')
				var $resp_menu_items = responsive_nav.find('a[class^="level-"]'),
					respNav;

				if( $resp_menu_items.length ) {
					respNav = function initRespNav( respMenuItems ) {
						respMenuItems.each(function() {
							var $this         = $(this),
								isOnePageItem = $this.attr('href').match("^#") ? true : false;

							// if responsive navigation is opened and the link from menu is not external
							if (isOnePageItem) {
								$this.click(function() {	
									if (container.is('.show_responsive_nav')) {
										// Hiding the responsive navigation
										container.removeClass('show_responsive_nav');
										show_menu_icon.removeClass('entypo-cancel-circled').addClass('entypo-menu');
										responsive_nav_wrap.stop(true,true).slideToggle(500);
										// End hiding the responsive navigation

										if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
											var $target = $(this.hash); // Check the section area id
											$target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
											if ($target.length) {

												var targetOffset = $target.offset().top; // the top of the section area

												if (nav_side && stickyH && !no_stickyH_onSS) {
													$('html,body').animate({ // adding sticky header height
														scrollTop : targetOffset - $('.qodx_nav_side #qodx_header').outerHeight() + responsive_nav_wrap.height()
													}, 1100, 'easeInOutExpo');
												} else if (stickyH && !no_stickyH_onSS) {
													$('html,body').animate({ // adding sticky header height
														scrollTop : targetOffset - $('.qodx_nav_top #qodx_header').outerHeight() + responsive_nav_wrap.height()
													}, 1100, 'easeInOutExpo');
												} else {
													$('html,body').animate({ // adding responsive menu relative height
														scrollTop : targetOffset - responsive_nav_wrap.height()
													}, 1100, 'easeInOutExpo');
												}

												return false; // doesn't show the "#id_section_name" in the url
											}
										}		

									}
								});	
							}
						});
					};
					respNav( $resp_menu_items );				
				}
				// end responsive one page navigation	

				var set_visibility = function() {
					if(win.width() >= switchWidth) {
						responsive_nav_wrap.css("display","none");
						show_menu.css("display","none");
						show_menu_icon.removeClass('entypo-cancel-circled').addClass('entypo-menu');							
						header.removeClass('small_device_active');
						container.removeClass('show_responsive_nav');
						if (stickyH && no_stickyH_onSS) {
							container.removeClass('qodx_noSticky_on_ss');
						}
					} else {
						header.addClass('small_device_active');
						show_menu.css("display","block");
						if(!menu_added) {
							var before_menu = header.find('#nav');
							show_menu.insertBefore(before_menu);
							responsive_nav.prependTo(responsiveNavWrap);
							menu_added = true;							

						}							
						if (stickyH && no_stickyH_onSS) {
							container.addClass('qodx_noSticky_on_ss');
						}	
					}
				};

				win.on("smartresize", set_visibility);
				set_visibility();
		}	
	};

		
	/* Add 'firstItem' / 'lastItem' Classes To Menu Lists
	   --------------------------------------------------------- */	
	   
	
	$.fn.qodx_menu = function() {
		$(this).each(function(){
			$(this).find('li:first-child').addClass('firstItem');
			$(this).find('li:last-child').addClass('lastItem');
			//$(this).find('.firstItem a').attr({href:"#qodx_wrapper"})	
		});
		$(this).contents("a").removeAttr('title');	
	};
		
	/* Add Markers & Classes To Parent Lists
	   --------------------------------------------------------- */	
	   

	$.fn.qodx_menu_markers = function() {
		$(this).each(function(){
			var $isMegaMenu = $(this).parents('.qodx_megamenu:first'),
				$isSideNav  = $(this).parents('.qodx_side-nav:first');
			$(this).addClass("hasChild");
			if (!$isMegaMenu.length && !$isSideNav.length ) {
				$(this).find("> a").append('<span class="marker">+</span>');
			}
		});
		$(".widget_subnav li:has(ul)").find(">:eq(1)").prepend('<span class="marker">+</span>');
	};
		
		
	/* Side Navigation Effects For Menu Widget
	   --------------------------------------------------------- */	
	
	$.fn.qodx_side_nav = function() {
		$(this).each(function(){
			$(this).hoverIntent({
			//$('.qodx_side-nav li').hoverIntent({
				over: function() {
					if($(this).find('> .children').length >= 1) {
						$(this).find('> .children').stop(true, true).slideDown('slow');
					}
				},
				out: function() {
					if(!$(this).find('.current_page_item').length) {
						$(this).find('.children').stop(true, true).slideUp('slow');
					}
				},
				timeout: 500
			});
		});	
	};
	
	/* Admin bar sticky header
	================================================== */	
	
	$.fn.qodx_wp_admin_bar = function() {
		
		var win           = $(window),
			isSticky      = $('.qodx-sticky-header'),
			header        = isSticky.find('.header-menu-container'),		
			sticky_header = function() {
				if ($('#wpadminbar').length > 0 && win.width() >= 783) {
					header.css({'top' : 32 });
				}else if ($('#wpadminbar').length > 0 && win.width() < 783) {
					header.css({'top' : 46 });
					$('#wpadminbar').css({'position' : 'fixed' });
				}else {
					header.css({'top' : 0 });}
			};			
		
		if (isSticky.length) {
			isSticky.imagesLoaded(function() {			
				sticky_header();
				win.smartresize(function(){
					sticky_header();
				});
			});
			
		}
										
	};
	
	
	/* Parallax effect
	   --------------------------------------------------------- */	
	  
	$.fn.qodx_parallax = function() {
		var container = $('html');
		if ( !qodx_mobile ) {
			return this.each(function() {
				var win              = $(window),
					el               = $(this),
				  //elImage          = $('> img', el),
					elImage          = el.find("img"),
					elHeight         = el.outerHeight(true),
					scrollTop        = win.scrollTop(),
					elOffsetBottom   = el.offset().top + elHeight,
					windowHeight     = win.outerHeight(true),
					parallaxPixel    = (el.offset().top - scrollTop) * 0.30,
					differenceHeight = elImage.outerHeight(true) - elHeight;
	
				elImage.css({top: -differenceHeight / 2});
	
				if ((elOffsetBottom > scrollTop) && (el.offset().top < (scrollTop + windowHeight))) {
					elImage.css({transform: 'translate(-50%,' + -parallaxPixel + 'px)'});
				}					
			});
		} else { 
			return false;
		}
	};
			
	/* Hiding Your Email Addresses From Spam Harvesters
	   --------------------------------------------------------- */	
	   
	$.fn.mailto = function() {
		return this.each(function(){
			var email = $(this).html().replace(/\s*\(.+\)\s*/, "@");
		});
	};
	
	/* Fancybox Lightbox
	   --------------------------------------------------------- */	
	
	$.fn.qodx_fancybox = function() {
		var $this = $(this);			
		
		if(!$this.length) { return; }
		
		$this.fancybox({
			padding: 5, // no padding around image gallery
			nextEffect: 'none',
			prevEffect: 'none',
			openEffect: 'elastic',
			closeEffect: 'elastic',
			helpers: {					
				overlay: {
				  locked: false
				},
				title: {
					type: 'over'
				},
				media: {}
			},
			afterShow: function () {
				$('<a href="javascript:void(0)" title="View Full Size" class="expander"></a>').appendTo(this.inner).on('click', function () {
					$.fancybox.toggle();
				});
			}
		});
	};
		
		
	/* Scrolling To Top
	   --------------------------------------------------------- */	
	   
	function qodx_scroll_top(){
			
		if ($('body').is('.qodx-top')) {
			$('body').append('<a href="javascript:void(0)" id="qodx-top"><i class="fa fa-angle-up"></i></a>');
		}
		
		var win           = $(window),
        	scroll_top    = $('#qodx-top'),
			
        	set_status    = function() {
				var qodx_st = win.scrollTop();
				
				if(qodx_st < 300) {
					scroll_top.removeClass('qodx_top_btn');
				} else if (!scroll_top.is('.qodx_top_btn')) {
					scroll_top.addClass('qodx_top_btn');
				}
			};
			
		win.scroll(set_status);
		set_status();
		
		// scrolling to top
		$('#qodx-top, .qodx_top').click(function() {
			var $delay = win.scrollTop();
			$('body,html').animate({
				scrollTop: 0
			}, 1000 * Math.atan($delay / 3000), 'easeInOutExpo');
			return false;
		});
	}	
					
		
	/* Sliders & Carousels 
	   --------------------------------------------------------- */	
	
	/* ----- Tweets Cycle ----- */
			
	var $twitter = $('.cycle_tweets'),
		_initTwitter;

	if( $twitter.length ) {
		_initTwitter = function initTwitter( tweets ) {
			tweets.each(function() {
				var win = $(window);
				var container = $(this);
				var cycle_nav = container.find('.cycle_nav');
				var $this  = $(this).find('ul');									
				var $prev = cycle_nav.children(".cycle_prev");		
				var $next = cycle_nav.children(".cycle_next");
														
				function twitter() {									
					$this.cycle({
						slides        : '> li',
						autoHeight    : 'container',
						fx            : Modernizr.touch ? 'scrollHorz' : 'fade',
						timeout       : 5000,
						pauseOnHover  : true,
						prev          : $prev,
						next          : $next
					});
				}
				
				twitter();
				win.bind('smartresize', twitter);
			});
		};
		_initTwitter ( $twitter );		
	}
				
	/* ----- Owl Rotator ----- */
		
	if($().owlCarousel) {
	
		var $owl = $('.qodx_owl_rotator'),
			_initOwl;

		if( $owl.length ) {
			_initOwl = function initOwl( owls ) {
				owls.each(function() {
					var $this  = $(this);
					
					function owl() {									
						$this.owlCarousel({
							autoPlay          : $this.data('owl-autoplay'), 
							stopOnHover       : $this.data('owl-stoponhover'),
							navigation        : $this.data('owl-navigation'),
							pagination        : $this.data('owl-pagination'),
							slideSpeed        : $this.data('owl-slidespeed') ? $this.data('owl-slidespeed') : 800,
							paginationSpeed   : $this.data('owl-pagspeed') ? $this.data('owl-pagspeed') : 800,
							singleItem        : true,
							autoHeight        : $this.data('owl-autoheight'),
							goToFirstSpeed    : 2000,
							navigationText    : false,
							transitionStyle   :"fade"
						});
					}
					
					owl();
				});
			};
			_initOwl( $owl );		
		}
	}		
	
})(jQuery); // End