
jQuery(document).ready(function() {

	
	jQuery(".course-images a").click(function(){
		
			var big_img_src = "";
			
			if(jQuery(this).attr("href")){
				
				big_img_src = jQuery(this).attr("href");
				jQuery('.entry-thumbnail img').attr('src',big_img_src);
			}

			return false;	
		
	});
	
	jQuery(".entry-thumbnail img").bind("click",function(){

	var fancyImage = [];
	
	
	if(jQuery(".yith_magnifier_zoom").attr("href")){
		fancyImage.unshift({
			href:  jQuery(".yith_magnifier_zoom").attr("href"),
			title: jQuery(".yith_magnifier_zoom").attr("title")
		});	
	}

	
	jQuery(".course-images a").each(function(){
		
			var img_src = "";
			
			if(jQuery(this).attr("href")){
				
				img_src = jQuery(this).attr("href");
				
				fancyImage.push({
					href: img_src,
					title: jQuery(this).attr("title")
				});
			}
		
	});
	
	
	jQuery.fancybox(fancyImage); 				
	return false;			
	
	});

 });