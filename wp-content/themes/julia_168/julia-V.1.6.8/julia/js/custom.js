(function($) {
    $(function() {
        "use strict";
        //Window load
        // Onload Alert Message Start
        $('.no-content-wrapper').parents('body').addClass('no-page-content');
        $('.page-with-content').parents('body').addClass('page-with-content');
        if ($('.content_alert_dialog_box').length > 0) {
            if (($.cookie('julia_entire_site') == null) || ($.cookie('julia_entire_site') == undefined)) {
                var dialog = $('.content_alert_dialog_box');
                var exit = dialog.find('.dialog_box_exit_btn');
                var enter = dialog.find('.dialog_box_allow_btn');
                var overlay = $('.content_alert_dialog_overlay');
                $('.content_alert_dialog_box, .content_alert_dialog_overlay').show();
                $('body').on('click', '.dialog_box_allow_btn', function(evt) { // Cookie Create
                    evt.preventDefault();
                    var enter_url = enter.find('a').attr('href');
                    $.cookie('julia_entire_site', 'true', {
                        path: "/",
                        expires: 10
                    });
                    if ('#' === enter_url || '' === enter_url) {
                        dialog.fadeOut(450, function() {
                            overlay.fadeOut(500);
                        });
                    }
                });
            }
        }
        var header_height = $('.header_content_wrapper').delay(1500).outerHeight();
        var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
        //Menu
        /*$('#primary-menu .menu-item-has-children > a').on('touchstart', function(e) {
            var link = $(this);
            if (link.hasClass('menu_touch_hover')) {
                return true;
            } else {
                link.addClass("menu_touch_hover");
                $('#primary-menu .menu-item-has-children a').not(this).removeClass("menu_touch_hover");
                return false;
            }
        });*/
        $('#loader').delay(1000).fadeOut();
        //wpadminbar
        //alert($('.page_title_wrapper h2').height());
        var title_height = $('.page_title_wrapper h2').height();
        $('.sub_header_wrapper').css({
            'margin-top': title_height / 2,
            'margin-bottom': title_height
        });
        var wpadminbar = $('#wpadminbar').height();
        $('.header_logo_top_bar').css('top', wpadminbar);

        /*---------------------------------------------------	
        // Header Slider 2
        -----------------------------------------------------*/
        var slides_container = $('.slides-container');

        function julia_main_header_slider() {
            var slider_height = $('.main_header_slider_wrapper').data('windowheight');
            var autoplay = $('.main_header_slider_wrapper').data('autoplay');
            var columns = $('.main_header_slider_wrapper').data('columns');
            if ($(window).width() > 1006) {
                var header_height = $('.header_content_wrapper').delay(1500).outerHeight();
            }else{
                 var header_height = 0;
            }
             $('.main_header_slider_wrapper').css({
                    'top': header_height,
                    'position': 'relative'
                });
            if ($.browser.msie) {
                var autowidth = false;
            } else {
                var autowidth = $('.main_header_slider_wrapper').data('autowidth');
                if (autowidth == true) {
                    $('.main_header_slider_wrapper .main_slider_item img').css('height', ($(window).height() - (header_height)));
                    $('.main_header_slider_wrapper').css({
                        'height': ($(window).height() - (header_height))
                    });
                }
            }
            //$('.main_header_slider_wrapper').each(function(){
            slides_container.owlCarousel({
                autoWidth: autowidth,
                margin: 10,
                items: columns,
                autoplay: autoplay,
                smartSpeed: 1300,
                loop: true,
                nav: true,
                onChanged: julia_kaya_hover_title,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    1024: {
                        items: 3,
                    },
                    1200: {

                    },
                },
                onInitialized: function() {
                    $('#loading_image').hide();
                    if ((autowidth == true) || (slider_height != '1')) {
                        slides_container.css('height', ($(window).height() - (header_height)));
                    }
                }
            });
        }
        var autowidth = $('.main_header_slider_wrapper').data('autowidth');
        var slider_height = $('.main_header_slider_wrapper').data('windowheight');
        //if( ( autowidth == true ) || ( slider_height !='1' ) ){
        if (slides_container.length) {
            julia_main_header_slider();
            $(window).on("resize.destroyhorizontal", function() {
                setTimeout(julia_main_header_slider, 150);
            });
        }
        //}
        function julia_kaya_hover_title() {
            // Main Slider Image Hover
            var hover_title_disable = $('.main_header_slider_wrapper').data('title-hover-disable');
            if (hover_title_disable != '1') {
                $('.main_slider_item').each(function() {
                    $(this).hover(function() {
                        $(this).find('.slides_description_wrapper').stop(true, true).animate({
                            'right': '0',
                            'opacity': 1
                        }, 150);
                    }, function() {
                        $(this).find('.slides_description_wrapper').stop(true, true).animate({
                            'right': '-100%',
                            'opacity': 0
                        }, 150);
                    });
                });
            }
            //End
        }
        julia_kaya_hover_title();
        // End	
        /* Portfolio Image Sorting */
        if (jQuery().isotope) {
            $(window).load(function() {
                $(function() {
                    if ($.browser.safari) {
                        var isotopeContainer = $('.masonry_blog_gallery');
                    } else {
                        var isotopeContainer = $('.masonry_blog_gallery');
                    }
                    isotopeContainer.isotope({
                        masonry: {
                            columnWidth: 0.3,
                            isAnimated: true,
                            easing: '',
                        },
                    })
                });
            });
        }
        if (jQuery().isotope) {
            $(window).load(function() {
                var $container = $('.isotope-container');
                //if (!$.browser.safari) {
                    $container.isotope({
                        filter: '*',
                        animationEngine: 'best-available',
                        animationOptions: {
                            duration: 10,
                            easing: 'linear',
                        }
                    });
                //}
                $('#filter a').click(function() {
                    $('#filter .active').removeClass('active');
                    $(this).addClass('active');
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 150,
                            easing: 'linear',
                        }
                    });
                    return false;
                });
            });
        }

        /* Portfolio IMage Hover Details */

        /**/
        function kta_image_hover_details() {
            $('.kta-talent-content-wrapper').each(function() {
                $(this).find('ul li').hover(function() {
                    $(this).find('h4').stop(true, true).stop(true, true).animate({
                        'left': '-100',
                        'opacity': 0
                    }, 50);
                }, function() {
                    $(this).find('h4').stop(true, true).stop(true, true).animate({
                        'left': '0',
                        'opacity': 1
                    }, 100);
                });
            });
        }
        /* Portfolio Single page Slider */

        //end		
        //Single Page Tabs
        function julia_kaya_pf_single_page_tabs() {
            $('.single_page_content_wrapper').each(function() {
                //julia_kaya_pf_single_page_gallery_slider();
                $(".pf_tab_content").hide(); //Hide all content
                $(".pf_tab_list > ul li:first").addClass("tab-active").show();
                $(".pf_tab_content:first").stop(true, true).fadeIn(0);
                $(".pf_tab_list > ul li").click(function() {
                    $(".pf_tab_list > ul li").removeClass("tab-active");
                    $(this).addClass("tab-active");
                    $(".pf_tab_content").stop(true, true).fadeOut(0);
                    var activeTab = $(this).find("a").attr("href");
                    $(activeTab).stop(true, true).fadeIn(800);
                    //julia_kaya_pf_single_page_gallery_slider();
                    return false;
                });
            });
        }
        /* Posts Related Slider */
        function julia_kaya_related_post_slider() {
            $('.related_post_slider').each(function() {
                $(this).owlCarousel({
                    nav: false,
                    autoPlay: true,
                    stopOnHover: true,
                    loop: true,
                    margin: 20,
                    onInitialized: function() {
                        $('.related_post_slider').show();
                    },
                    responsive: {
                        0: {
                            items: 1,
                        },
                        480: {
                            items: 1,
                        },
                        768: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        },
                    },
                });
            });
        }
        /* Footer Height */
        function julia_kaya_elements_resize() {
            if ($(window).width() > 1006) {
                var footer_height = $('.footer_widgets').height();
                $('.footer_widgets > div').css('height', footer_height);
                 var header_height = $('.header_top_bar_setion').delay(1500).outerHeight();
                 var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
            } else {
                var footer_height = $('.footer_widgets').height();
                $('.footer_widgets > div').css('height', 'inherit');
                var footer_height ='';
                 var header_height = '';
            }
            // Mid container settings
            var sticky_header = $('.header_top_bar_setion').data('sticky-header');
            var sticky_footer = $('.bottom_footer_bar_wrapper').data('footer-sticky');
           
            
            if (sticky_header == 'on') { // Header			
                $('.header_top_bar_setion').css('position', 'fixed');
                $('#mid_container_wrapper').css({
                    'padding-top': header_height
                });
                if ($('#mid_container_wrapper').length == 0) {
                    $('.page_content_footer').css({
                        //'padding-top': header_height
                    });
                }
            }
            if (sticky_footer == 'on') { //Footer
                $('.bottom_footer_bar_wrapper').css('position', 'fixed');
                $('#mid_container_wrapper').css({
                    'padding-bottom': footer_height
                });
            }
            // Portfolio Single Page Height
            //$('.portfolio_left_content_section').css('height',($(window).height() - ( header_height + footer_height + 60 )));
            // Menu Height
            var menu_height = $('#header_container_wrapper').delay('3000').height();
            $('.header_right_section').css({
                'margin-top': -(menu_height / 2)
            });
        }
        //Woocommerce Buttons Quantity
        $('.quantity').each(function() {
            $(this).find('.woo_qty_plus').click(function(e) {
                e.preventDefault();
                var currentVal = parseInt($(this).prev('.woo_items_quantity').val());
                if (!isNaN(currentVal)) {
                    $(this).prev('.woo_items_quantity').val(currentVal + 1);
                } else {
                    $(this).prev('.woo_items_quantity').val(0);
                }
            });
            // This button will decrement the value till 0
            $(this).find(".woo_qty_minus").click(function(e) {
                e.preventDefault();
                var currentVal = parseInt($(this).next('.woo_items_quantity').val());
                if (!isNaN(currentVal) && currentVal > 0) {
                    $(this).next('.woo_items_quantity').val(currentVal - 1);
                } else {
                    $(this).next('.woo_items_quantity').val(0);
                }
            });
        });
        // Cross Sales Products
        function julia_kaya_cross_sells_product_slider() {
            $('.cross-sell.products').each(function() {
                $(this).find(".cross-sells-product-slider").owlCarousel({
                    navigation: false,
                    autoplay: true,
                    stopOnHover: true,
                    pagination: false,
                    items: 4,
                    margin: 20,
                    smartSpeed: 1500,
                    onInitialized: function() {
                        $('.cross-sells-product-slider').show();
                    },
                    responsive: {
                        0: {
                            items: 1,
                        },
                        480: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        },
                        1366: {
                            items: 4,
                        },
                    }
                });
            });
        }
        //Related Products
        function julia_kaya_related_product_slider() {
            $('.related.products').each(function() {
                $(this).find(".related-product-slider").owlCarousel({
                    navigation: false,
                    autoplay: true,
                    stopOnHover: true,
                    pagination: false,
                    items: 4,
                    margin: 20,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        480: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        },
                        1366: {
                            items: 4,
                        },
                    }
                });
            });
        }
        // Upsales
        function julia_kaya_upsells_product_slider() {
            $('.upsells.products').each(function() {
                $(this).find(".upsells-product-slider").owlCarousel({
                    navigation: false,
                    autoplay: true,
                    stopOnHover: true,
                    pagination: false,
                    items: 4,
                    margin: 20,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        480: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        },
                        1366: {
                            items: 4,
                        },
                    }
                });
            });
        }
        $('.woocommerce-billing-fields').each(function() {
            $(this).find('h3').nextAll().wrapAll("<div class='woocommerce-billing-fields-wrapper'></div>");
        });
        $('.woocommerce-shipping-fields').each(function() {
            $(this).find('h3').nextAll().wrapAll("<div class='woocommerce-shipping-fields-wrapper'></div>");
        });
        // Video Player
        $('.video_background_wrapper').each(function() {
            var desc_height = $(this).find('.video_description').height();
            $(this).find('.video_description').css('margin-top', -(desc_height / 2));
            $(".player").mb_YTPlayer();
        });

        // Coming Soon Date
        $('.coming_soon_page_wraaper').each(function() {
            var countdown_date = $(this).find('#coming_soon_date').data('date');
            var date_color = $(this).find('#coming_soon_date').data('date-color');
            $(this).find('#coming_soon_date').css("color:" + date_color);

            $(this).find("#coming_soon_date").countdown(countdown_date, function(event) {
                var $this = $(this).html(event.strftime('' +
                    '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time" style="color:' + date_color + '">%w</span> Weeks </div></div>' +
                    '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:' + date_color + '">%d</span> Days </div></div>' +
                    '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:' + date_color + '">%H</span> Hours </div></div>' +
                    '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:' + date_color + '">%M</span> Min </div></div>' +
                    '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:' + date_color + '">%S</span> Sec </div></div>'));
            });
        });
        $('p').each(function() {
            var $this = $(this);
            if ($this.html().replace(/\s|&nbsp;/g, '').length == 0)
                $this.remove();
        });
        // Scroll Top
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll_top').fadeIn();
            } else {
                $('.scroll_top').fadeOut();
            }
        });
        $('.scroll_top').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        // Search 
        $('.toggle_search_icon').click(function() {
            if ($('.search_box_overlay').length > 0) {
                return false;
            }
            //$('body').append('<div class="search_box_overlay"></div>');
            $('.toggle_search_wrapper').css({
                'display': 'block'
            }).animate({
                'opacity': '1',
                'right': '0%'
            }, 400, 'swing', function() {});
        });
        $('.toggle_search_wrapper').each(function() {
            $(this).find('span.search_close').click(function() {
                $(this).parent().parent('.toggle_search_wrapper').css({
                    'display': 'block'
                }).animate({
                    'opacity': '0',
                    'right': '-100%'
                }, 600);
                $('.search_box_overlay').remove();
            });
        });
        // Footer Height
        function julia_kaya_footer_height() {
            if ($('body')[0].scrollHeight > $(window).height()) {
                $('.bottom_footer_bar_wrapper').removeClass("footer_scroll");
            } else {
                $('.bottom_footer_bar_wrapper').addClass("footer_scroll");
            }
        }
        // On hover footer socila icons
        $('.social_share_button').click(function() {
            $(this).prev('ul').toggle();
        });
        //
        $('ul.page-numbers').each(function() {
                $(this).find('.current').parent().addClass('current_page');
            })
            /* Shooping Cart */
        $('.widget_shopping_cart_content .buttons a').removeClass('wc-forward');
        $('.woocommerce .button, #review_form_wrapper .form-submit #submit').not('.wc-forward, .shop_product_slider_wrapper .button').addClass('primary-button');
        $('.checkout-button, #place_order, .cart-sussess-message a').addClass('seconadry-button');
        $('.related.products li, .upsells.products li, .cross-sells ul.products li').removeClass('first last');
        $('.add_to_wishlist').removeClass('single_add_to_wishlist button alt primary-button');
        $('i.icon-align-right').removeClass('icon-align-right').addClass('fa fa-heart');
        $('.widget_shopping_cart_content .buttons a').addClass('primary-button');
        $('.cart-sussess-message a').removeClass('seconadry-button');
        // Page title line height
        var title_line_height = $('.title_border_bottom_line').data('line-height');
        $('span.title_border_bottom_line').delay(800).animate({
            'height': title_line_height,
            'opacity': '1'
        }, 1000);
        // Resize Function
        julia_kaya_elements_resize();
        //julia_kaya_pf_left_section();
        julia_kaya_footer_height();
        $(window).load(function() {
            //Scroller
            kta_image_hover_details();
            $('.tab_content_wrapper_loader').hide();
            $('.pf_tabs_content_wrapper').show();
            //julia_kaya_pf_single_page_tabs();
            //julia_kaya_pf_single_page_gallery_slider();
            julia_kaya_related_post_slider();
            julia_kaya_cross_sells_product_slider();
            julia_kaya_related_product_slider();
            julia_kaya_upsells_product_slider();
            julia_kaya_footer_height();
        })
        $(window).resize(function() {
            var header_height = $('.header_content_wrapper').outerHeight();
            var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
            julia_kaya_footer_height();
            julia_kaya_elements_resize();
            //julia_kaya_pf_left_section();	 
            julia_main_header_slider();
        });
        // Detect IE Browser
        if ($.browser.msie) {
            $('.page_title_wrapper h2, .page_title_wrapper h2 span').css('opacity', '1').addClass('ie_opacity_title');
            $('input[type=text], textarea').placeholder();
        }
        //Email Sending Validator
        jQuery("#send_mail_to_post").click(function() {
            var user_post_link = jQuery("#user_post_link").val();
            var user_email = jQuery("#user_email").val();
            var user_name = jQuery("#user_name").val();
            var receiver_email = jQuery("#receiver_email").val();
            var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
            var hasError = false;
            if (user_email == '') {
                jQuery('#user_email').addClass('vaidate_error');
                hasError = true;
            } else {
                if (!pattern.test(user_email)) {
                    jQuery('#user_email').addClass('vaidate_error');
                    hasError = true;
                } else {
                    jQuery('#user_email').removeClass('vaidate_error');
                }
            }
            if (user_name == '') {
                jQuery('#user_name').addClass('vaidate_error')
            } else {
                jQuery('#user_name').removeClass('vaidate_error')
            }
            if (receiver_email == '') {
                jQuery('#receiver_email').addClass('vaidate_error');
            } else {
                if (!pattern.test(receiver_email)) {
                    jQuery('#receiver_email').addClass('vaidate_error');
                    hasError = true;
                } else {
                    jQuery('#receiver_email').removeClass('vaidate_error');
                }
            }
            if (hasError) {
                return;
            } else {
                jQuery('.mail_form_load_img').show();
                jQuery('#send_mail_to_post').attr('disabled', 'disable').addClass('button_disable');
                jQuery.ajax({
                    type: 'POST',
                    url: kaya_ajax_url.ajaxurl,
                    data: {
                        action: 'julia_kaya_share_post_email',
                        'user_email': user_email,
                        'user_name': user_name,
                        'receiver_email': receiver_email,
                        'user_post_link': user_post_link,
                    },
                    success: function(data) {
                        jQuery('#send_mail_to_post').removeAttr('disabled').removeClass('button_disable');
                        jQuery('.mail_form_load_img').hide();
                        jQuery('.booking_success_result').show();
                        jQuery('.booking_success_result').html(data.toString());
                        return false;
                    },
                    error: function(data) {
                        $('p.booking_success_result').html(data.toString())
                        return false;
                    }
                });
            }
        });
        $('.user_send_email_post').hide();
        $('.pf_social_share_icons').delegate(".user_email_form", "click", function() {
            $('.user_send_email_post').show();
            $(this).addClass('hide_user_form');
            $('.hide_user_form').removeClass('user_email_form');
            return false;
        });
        //Share ICons
        $('.user_send_email_post').hide();
        $('.pf_social_share_icons').delegate(".user_email_form", "click", function() {
            $('.user_send_email_post').show();
            $(this).addClass('hide_user_form');
            $('.hide_user_form').removeClass('user_email_form');
            return false;
        });
        //
        $('.pf_social_share_icons').delegate(".hide_user_form", "click", function() {
            $('.user_send_email_post').hide();
            $(this).addClass('show_user_form');
            $('.show_user_form').addClass('user_email_form');
            $('.user_email_form').removeClass('hide_user_form');
            return false;
        });
        // Advanced Search
        //Jquery Ajax Search

        /*---------------------------------
        Set Card Tool Tip
        ------------------------------------*/
        $('.pf_set_card_wrapper a').hover(function() {
            $(this).next('span').stop(true, true).animate({
                'top': -30,
                'opacity': 1
            }, 150);
        }, function() {
            $(this).next('span').stop(true, true).animate({
                'top': 0,
                'opacity': 0
            }, 100);
        });
        // Find Empty Divs
        $('.panel-grid-cell').each(function() {
            if ($(this).is(':empty') || ($(this).html() == '&nbsp;')) {
                $(this).addClass('panel-empty-columns');
            } else {
                $(this).removeClass('panel-empty-columns');
            }
        });
        // End

//smartmenu code
function checkWidth() {
    if ($(window).width() <= 1006) {
      $('#myslidemenu, #jqueryslidemenu').removeClass('menu');
      $('#myslidemenu, #left_header_section .left_menu, #right_header_section .right_menu').addClass('mobile_menu');
      $('.header_right_section').removeClass('toggle_menu');
      $('.header_right_section').addClass('mobile_menu_nav');
      $('.mobile_menu').removeClass('menu');
      $('.header_right_section').removeClass('main_menu_section');
    }else {
         $('.header_right_section').addClass('main_menu_section');
      $('.mobile_menu').addClass('menu');
      $('#myslidemenu').removeClass('mobile_menu');
      $('#myslidemenu, #jqueryslidemenu').addClass('menu');
      $('.header_right_section').addClass('toggle_menu');
    }
}
checkWidth();
$(window).resize(checkWidth);
/*toggle menu*/
//$('.header_right_section').addClass('mobile_menu_nav');
function mobile_menu(){
  if ($(window).width() <= 1006) { 
      //$('.header_right_section').removeClass('main_menu_section');
      $('.mobile_menu').removeClass('menu');
  }else{
      //$('.header_right_section').addClass('main_menu_section');
      $('.mobile_menu').addClass('menu');
      $('#myslidemenu').removeClass('mobile_menu');
  }
}
$('.main-menu-btn').click(function(e){
      $('.mobile_menu_nav').slideToggle('slow');
    });
mobile_menu();
$(window).resize(function(){
  mobile_menu();
});
$('#main-menu').smartmenus();

// Portfiolio Image Hover

$('.mata_data_info_wrapper').each(function(){
    var $opt_length = $(this).find('span').length;
    if( $opt_length <= 0 ){
        $(this).remove();
    }else{
       // $(this).removeClass('no-model-options-data');
    }
});

    });
})(jQuery);
// Model Short list Data added to ajax call back
var shortlist = (function($) {
    // define object literal container for parameters and methods
    var method = {};
    method.itemActions = function(button) {
        $(button).on('click', function(e) {
            alert('clicked');
            var target = $(this),
                item = target.closest('.item'),
                itemID = item.attr('id'),
                itemAction = target.data('action');
            $.ajax({
                type: 'POST',
                url: kaya_ajax_url.ajaxurl,
                data: {
                    action: 'julia_kaya_items_remove_add',
                    item_action: itemAction,
                    item_id: itemID
                },
                success: function(data) {
                    method.getItemTotal();
                    log(itemAction + ' item ' + itemID);
                    return false;
                },
                error: function(data) {
                    alert(data);
                    log('error with itemActions function', 'check that "themeDirName" has been correctly set in shortlist.js');
                }
            });
            if (itemAction === 'remove') {
                item.removeClass('item_selected');
            } else {
                item.addClass('item_selected');
            }
            e.preventDefault();
        });

    }; // end fn
    /* make methods accessible
    -------------------------- */
    return method;

}(jQuery)); // end of shortlist constructor

(function($) {
    // select items, excluding those on shortlist page
    var action = $('.portfolio_content_wrapper ul li .action:not(.page-template-shortlist .item .action), .portfolio_main_content_wrapper a.action, .portfolio_img_grid_columns ul li.item .action, portfolio_content_wrapper.advance_search_wrapper ul li.item a.action');
    shortlist.getItemTotal();
    shortlist.itemActions(action);
});