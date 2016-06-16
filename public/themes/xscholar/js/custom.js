jQuery(document).ready(function() {
	"use strict";	
			
			
	//Dropdown
	jQuery(document).on("click", ".select_trigger", function(e) {
		if(!jQuery(this).parents('.select_wrapper').hasClass('pinned'))
		{
			if(e.target.className !== 'select_trigger'){
				hideSelect();
			}
		}
	});

	jQuery(document).on("click", "body", function(e) {
		 hideSelect();
	});

	jQuery(document).on("click", ".select_trigger", function(e) {
		   e.stopPropagation();
	});
	jQuery(document).on("click", ".select_wrapper.pinned .select_dropdown", function(e) {
		   e.stopPropagation();
	});

		
	jQuery('.select_wrapper li').click(function(e){
		
		jQuery(this).parents('.select_wrapper').find('.select_trigger').html(jQuery(this).text());
		jQuery(this).parents('.select_wrapper').parent().find('#cat').val(jQuery(this).attr('data-value'));
	});

	jQuery('.select_trigger').click(function(e){
		jQuery(this).parent().find('.select_dropdown').toggleClass('show');
	});


	function hideSelect(){
		jQuery('.select_wrapper .select_dropdown').removeClass('show');
	}
	
	jQuery('#course-filter li:first-child').addClass('active');
	jQuery('#course-filter li').click(function(){
		jQuery(this).parent().find('.active').removeClass('active');
		jQuery(this).addClass('active');
	});
	
	//Mega Bar
	jQuery(document).click(function(e) {
		if(e.target.className !== 'shopby-trigger'){
			hideVerticalMenu();
		}
	});
	jQuery('.shopby-trigger').click(function(e){
		jQuery(this).parent().parent().find('ul').toggleClass('show');
		jQuery(this).parent().toggleClass('show');
	});

	function hideVerticalMenu(){
		jQuery('#vertical_menu > ul').removeClass('show');
	}
	
	//Sharing Product 
	jQuery(document).on('click','.md-trigger span', function(){
		
			var product_id = jQuery(this).parent().attr('data-product-id');
			var sharing_link  = encodeURIComponent(jQuery(this).parent().attr('data-link'));

			var sharing_template = '<ul class="sharing-social"><li class="sharing-facebook"><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='+sharing_link+'"> <i class="fa fa-facebook"></i> <span>Share on Facebook</span></a></li><li class="sharing-twitter"><a target="_blank" href="http://twitter.com/share?url='+sharing_link+'&text=Simple Share Buttons"> <i class="fa fa-twitter"></i><span>Twitter</span></a></li><li class="sharing-googleplus"><a target="_blank" href="https://plus.google.com/share?url='+sharing_link+'"> <i class="fa fa-google-plus"></i><span>G Plus</span></a></li><li class="sharing-linkedin"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='+sharing_link+'"> <i class="fa fa-linkedin"></i><span>Linkedin</span></a> </li><li class="sharing-pinterest"><a target="_blank" href="javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'http://assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());"> <i class="fa fa-pinterest"></i><span>Pinterest</span></a></li><li class="sharing-tumblr"><a target="_blank" href="http://www.tumblr.com/share/link?url='+sharing_link+'&name='+sharing_link+'"> <i class="fa fa-tumblr"></i><span>Tumblr</span></a> </li></ul>';
			
			if(product_id !='')
			{
				jQuery(this).parents('body').find('.md-append').html('');
				jQuery(this).parents('body').find('.md-append').append(sharing_template);
				jQuery(this).parents('body').find('.md-modal').addClass('md-show');
			}
			else
			{
				return false;
			}
		});
			
	jQuery(document).on('click','.md-close', function(){	
		removeModal();
	});
	function removeModal()
	{
		jQuery('body').find('.md-modal').removeClass('md-show');
	}
	
	//Tabs
	jQuery('.nav-tabs a').click(function (e) {
		e.preventDefault();
		jQuery(this).tab('show');
	})     
	jQuery('.tabs-wrapper .nav-tabs a:first').tab('show');
	jQuery('.tabs-wrapper.vertical-tabs a:first').tab('show');	
	
	jQuery('.tab-pane').each(function(){
		
		if(jQuery(this).attr('data-icon'))
		{
			var icon = jQuery(this).attr('data-icon');
			var id = jQuery(this).attr('id');
			
			jQuery('a[href=#'+id+']').prepend('<i class="fa '+icon+'"></i>');
		}
		
	});
	
	//Move To Top
	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() != 0) {
			jQuery('#move-to-top').fadeIn();	
		} else {
			jQuery('#move-to-top').fadeOut();
		}
	});
	jQuery('#move-to-top').click(function() {
		jQuery('body,html').animate({scrollTop:0},'fast');
	});	
	
	//Header Mini Cart
	jQuery('.cart-contents').parent().parent().hover(
		function () {
			 jQuery(this).addClass('active');
	
		},
		function () {
			 jQuery(this).removeClass('active');
		}
	  );
	  
	//Superfish Menu
	jQuery('.main-menu ul.sf-menu').superfish({ 
		cssArrows: false,  
		speed: 100, 
		delay:  500,  
		onBeforeShow: function(){
			jQuery(this).css('margin-top','20px');
			jQuery(this).css('opacity','0');
			
			if(jQuery(this).hasClass('.sf-mega'))
			{
				var parent_offset = jQuery(this).parents('.container').offset().left;
				var current_offset = jQuery(this).parent().offset().left;
				var relative_offset = current_offset - parent_offset;
				
				var mega_width = jQuery(this).parents('.sf-mega').outerWidth();
				var container_width = jQuery(this).parents('.container').outerWidth();
				
				if(container_width > 980)
				{
					var parent_width = jQuery(this).parent().outerWidth();
					
					if(relative_offset + 240 > container_width)
					{
						jQuery(this).css('right','0');
						var arrow_pos = container_width - relative_offset - parent_width;
						jQuery(this).find('span').css({'right': arrow_pos + 'px', 'left':'auto'});
					}
				}
			
			}
		
		},
		onShow: function(){jQuery(this).css('margin-top','-1px');jQuery(this).css('opacity','1');},
		
		onBeforeHide: function(){jQuery(this).css('margin-top','20px');jQuery(this).css('opacity','0')},
		onHide: function(){jQuery(this).css('opacity','0')},	
	});
	jQuery('.topnav ul.sf-menu').superfish({ 
		cssArrows: true,  
		speed: 100, 
		delay:  500,  
		onBeforeShow: function(){jQuery(this).css('margin-top','20px');jQuery(this).css('opacity','0')},
		onShow: function(){jQuery(this).css('margin-top','0');jQuery(this).css('opacity','1')},
		
		onBeforeHide: function(){jQuery(this).css('margin-top','20px');jQuery(this).css('opacity','0')},
		onHide: function(){jQuery(this).css('opacity','0')},	
	});
	
	jQuery('#vertical_menu ul.sf-menu').superfish({ 
		cssArrows: true,  
		speed: 100, 
		delay:  500,  
		onBeforeShow: function(){
			jQuery(this).css('margin-left','20px');
			jQuery(this).css('opacity','0');
			
			jQuery('#vertical_menu .sf-mega > ul').each(function(index, element) {
				
				if(jQuery(this).find('.sf-column').length > 0)
				{
					var count_mega_li = jQuery(this).children('li').length;
					
					if(count_mega_li==2)
					{
						jQuery(this).parent().css({'width':425});
					}
					if(count_mega_li>=3)
					{
						jQuery(this).parent().css({'width':640});
					}
				}
        	   	else
			   	{
					jQuery(this).parent().css({'width':180});
				}
        	});
		},
		onShow: function(){
			jQuery(this).css('margin-left','0px');
			jQuery(this).css('opacity','1');
		
		},
		
		onBeforeHide: function(){jQuery(this).css('margin-left','20px');jQuery(this).css('opacity','0')},
		onHide: function(){jQuery(this).css('opacity','0')},	
	});
	
	
	//Sticky Header
	var nav = jQuery('#sticky-nav');
	var nav_height = jQuery('#main-header').outerHeight();
	
			
	jQuery(window).scroll(function() {
		if( jQuery(window).scrollTop() > nav_height) {
			nav.addClass('visible');
			if(jQuery('#main-header').hasClass('transparent'))
			{
				jQuery('#main-header').find('.header-inside').hide();
			}
		} else {
			jQuery('#main-header').find('.header-inside').show();
			nav.removeClass('visible');  
		}  
	});

	
	
	//Blog Gallery Slider
	jQuery('.entry-gallery').flexslider({
		animation: "fade",            
		easing: "swing",               
		controlNav:false,
		directionNav:true,
		smoothHeight: true,
		prevText: "<i class='fa fa-angle-left'></i>",
		nextText: "<i class='fa fa-angle-right'></i>", 
		before: function(slider) {
		},
		after: function(slider) {
		}
	});
	
	//Dropdown
	jQuery(".select_wrapper li").click( function() {
		  
		   var cat_id = jQuery(this).attr("data-value");
		   var number = jQuery(this).parents('#course-filter').attr("data-number");
		
		   var replace_content = jQuery(this).parents('.select_wrapper').parent().find('ul.products');
		   jQuery.ajax({
				type: 'POST',
				dataType : "json",
				url: spacex_ajaxurl,
				data: {
					action: 'product_filter_shortcode',
					cat_id : cat_id,
					perpage : number
				},
				beforeSend: function() {
					replace_content.append('<div class="loader"></div>').animate();
				},
				success: function( response ) {
					replace_content.find('.loader').hide('slow');
					replace_content.html(response);
				}
		
			});
	
	})
	//Dropdown Menu
	// Create the dropdown base
	
	// Populate dropdown with menu items
	jQuery(".main-menu li").each(function() {
		var el = jQuery(this).find('a:first');
		var level = el.text();
		
		if(jQuery(this).hasClass('menu-depth-1'))
		{
			level = '- ' + el.text();
		}else if(jQuery(this).hasClass('menu-depth-2'))
		{
			level = '-- ' + el.text();	
		}else if(jQuery(this).hasClass('menu-depth-3'))
		{
			level = '--- ' + el.text();	
		}

		jQuery("<a />", {
		 "href"   : el.attr("href"),
		 "text"    : level
		}).appendTo(".select-nav .select_dropdown");
		
	});   
	
	jQuery(".menu-select select").change(function() {
	  window.location = jQuery(this).find("option:selected").val();
	});
	
	jQuery(".wpb_accordion_wrapper").each(function(index, element) {
        var active_tab = jQuery(this).parent().attr('data-active-tab');
		 jQuery(this).children('div:nth-child('+active_tab+')').find('.togglex-toggler').removeClass('collapsed');
		 jQuery(this).children('div:nth-child('+active_tab+')').find('.vc_clearfix').removeClass('collapse').addClass('in');
		
    });;
	
});
