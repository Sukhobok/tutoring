jQuery( document ).ready( function($) {
	"use strict";		
	
	jQuery('.selectpicker').selectpicker();

	/* ---------------------------------------------------------------------- */
/*	Hide Dual Sidebar
/* ---------------------------------------------------------------------- */
	
	$('img[title="Left Dual Sidebar"]').hide();
	$('img[title="Right Dual Sidebar"]').hide();
	$('img[title="Dual Sidebar"]').hide();
	
/* ---------------------------------------------------------------------- */
/*	Show User Sidebars
/* ---------------------------------------------------------------------- */	
	
	$('img.sidebar-position').each(function () {
		
		if($(this).attr('title') == 'Fullwidth' && $(this).hasClass('option-tree-ui-radio-image-selected'))
		{
			$('#tt_sidebar_list').parents('.format-settings').hide('slow');	
			return false;
		}
		
	});
	
	$('img.sidebar-position').click(function(){
		
		if($(this).attr('title') == 'Fullwidth')
		{
			$('#tt_sidebar_list').parents('.format-settings').hide('slow');			
		}
		else
		{
			$('#tt_sidebar_list').parents('.format-settings').show('slow');			
		}
		
	});
	
/* ---------------------------------------------------------------------- */
/*	Enable/Disable Page Header
/* ---------------------------------------------------------------------- */	
	
	$('#tt_page_header_type_follow').change(function () {

		if($(this).val()=='true')
		{
			$('#tt_page_header_type-0').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').hide('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').hide('slow');
			$('#tt_page_header_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').hide('slow');
		}
		else
		{
			$('#tt_page_header_type-0').parents('.format-settings').show('slow');
			$('#tt_page_header_bg_color').parents('.format-settings').show('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').show('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').show('slow');
			$('#tt_page_header_color').parents('.format-settings').show('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').show('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').show('slow');
		}
		
	});
	
	$('#tt_page_header_type_follow').each(function () {
		
		if($(this).val()=='true')
		{
			$('#tt_page_header_type-0').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').hide('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').hide('slow');
			$('#tt_page_header_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').hide('slow');
		}
		else
		{
			$('#tt_page_header_type-0').parents('.format-settings').show('slow');
			$('#tt_page_header_bg_color').parents('.format-settings').show('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').show('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').show('slow');
			$('#tt_page_header_color').parents('.format-settings').show('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').show('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').show('slow');
		}
		
	});
	
	
	
	$('img.page-header-type').each(function () {
		
		if($(this).attr('title') == 'No Page Header' && $(this).hasClass('option-tree-ui-radio-image-selected'))
		{
			$('#tt_page_header_bg_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').hide('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').hide('slow');
			$('#tt_page_header_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').hide('slow');
			
			
			return false;
		}
		
	});
	
	$('img.page-header-type').click(function(){
		
		if($(this).attr('title') == 'No Page Header')
		{
			$('#tt_page_header_bg_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').hide('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').hide('slow');
			$('#tt_page_header_color').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_top').parents('.format-settings').hide('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').hide('slow');
		}
		else
		{
			$('#tt_page_header_bg_color').parents('.format-settings').show('slow');
			$('#tt_page_header_bg_image').parents('.format-settings').show('slow');
			$('#tt_page_header_border_bottom').parents('.format-settings').show('slow');
			$('#tt_page_header_color').parents('.format-settings').show('slow');	
			$('#tt_page_header_padding_top').parents('.format-settings').show('slow');
			$('#tt_page_header_padding_bottom').parents('.format-settings').show('slow');
		}
		
	});

	$('.switch_options').each(function() {
 
        //This object
        var obj = $(this);
 
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value
 
        /* Check selected */
        if( 'false' == input_val ){
            obj.removeClass('selected');
        }
        else if( 'true' == input_val ){
            obj.addClass('selected');
        }
 
        //Action on user's click(ON)
        $(this).on('click', function(){
         	if($(this).hasClass('selected'))
			{
				obj.removeClass('selected');
				$(input).val('false').change();
			}
			else
			{
				obj.addClass('selected');
				$(input).val('true').change();
			}

        });

    });
	
	$('.scheme_options span').on('click', function(){
 
        //This object
        var obj = $(this);
 		var parent = $(this).parent('.scheme_options');
        var input = parent.children('input'); //cache the element where we must set the value
        var input_val = parent.children('input').val(); //cache the element where we must set the value
		
		if(!obj.hasClass('selected'))
		{
			parent.children('span').removeClass('selected');
    		obj.addClass('selected');
			$(input).val(obj.attr('id')).change();
		}

    });
	
	$('.tt-select-icon-type').click(function(){						 
											 
		$(this).parent().find('.selected').removeClass('selected');		
		$(this).addClass('selected');
		$(this).parent().find('input').val($(this).children('span').text())
		
	});
	
	$('.tt-select-icon-type').each(function(){	
		
		if($(this).children('span').text() == $(this).parent().find('input').val())
		{
			$(this).addClass('selected');
		}
				
	});
	
	
									  
	/* window.VcSingleProductView = vc.shortcode_view.extend({
        changeShortcodeParams:function (model) {
            var params = model.get('params');
            window.VcSingleProductView.__super__.changeShortcodeParams.call(this, model);
            if (_.isObject(params) && _.isString(params.id)) {
                this.$el.find('> .wpb_element_wrapper').append('Product ID:' + params.id);
            }
        }
    });*/	
/* ---------------------------------------------------------------------- */
/*	Specify Metaboxes for according Post Format
/* ---------------------------------------------------------------------- */
	var	$linkSettings  = $('#post-format-link-settings').hide(),
		$quoteSettings = $('#post-format-quote-settings').hide(),
		$videoSettings = $('#post-format-video-settings').hide(),
		$audioSettings = $('#post-format-audio-settings').hide(),
		$gallerySettings = $('#post-format-gallery-settings').hide(),		
		$postFormat    = $('#post-formats-select input[name="post_format"]');
	
	$postFormat.each(function() {
		
		var $this = $(this);

		if( $this.is(':checked') )
			changePostFormat( $this.val() );

	});

	$postFormat.change(function() {

		changePostFormat( $(this).val() );

	});

	function changePostFormat( val ) {

		$linkSettings.hide();
		$quoteSettings.hide();
		$videoSettings.hide();
		$audioSettings.hide();
		$gallerySettings.hide();

		if( val === 'link' ) {

			$linkSettings.show();

		} else if( val === 'quote' ) {

			$quoteSettings.show();

		} else if( val === 'video' ) {

			$videoSettings.show();
			
		} else if( val === 'audio' ) {

			$audioSettings.show();
			
		} else if( val === 'gallery' ) {

			$gallerySettings.show();
			
		}

	}
 var formfield;
 var fileurl;
 var previewImage;

 
    /* user clicks button on custom field, runs below code that opens new window */
	jQuery(document).on("click", ".menu_upload_media", function() {	

        formfield = jQuery(this).parent().find('input'); //The input field that will hold the uploaded file url
		previewImage = jQuery(this).parent().find('img');
        tb_show('','media-upload.php?TB_iframe=true');
        return false;
 
    });
    /*
    Please keep these line to use this code snipet in your project
    Developed by oneTarek http://onetarek.com
    */
    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
			jQuery(previewImage).attr('src',fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };


});
