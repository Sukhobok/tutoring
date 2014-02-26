jQuery(document).ready(function($) {




	//Slider Call
	$('.slider-container').flexslider({
			directionNav: false,
			controlsContainer: ".slider-container"
	});//Flexslider

	//Image Gallery Call
	$container = $('#pictures-container');
	$container.imagesLoaded( function(){	
		$container.isotope({
	  		// options
	  		animationEngine: 'best-available',
	  		itemSelector : '.item',
	  		resizable: false, // disable normal resizing
	  		// set columnWidth to a percentage of container width
	  		masonry: { columnWidth: $container.width() / 20 }
		});//Isotope

			// update columnWidth on window resize
		$(window).smartresize(function(){
		  $container.isotope({
		    // update columnWidth to a percentage of container width
		    masonry: { columnWidth: $container.width() / 20 }
		  });
		});//smartresize
	});//imagesLoaded
	
	//Function for lightbox
	var item = $('a.lightbox');
	item.magnificPopup({ 
  		type: 'image'
		// other options
	});

	//Twitter widget
	var twitterSlider = null;
	var currentIndex = 0;
	function twitterWidget() {
		
			twitterSlider = setInterval(function() {
				var $twitter = $('#twitter');
				if($twitter.length > 0 ) {
					var allTweets = $('#twitter ul li');					
					allTweets.fadeOut(3000);
					allTweets.eq(currentIndex).fadeIn(3000);
					currentIndex +=1;
					if(currentIndex == allTweets.length) {
						currentIndex = 0;						
					} 
				};

			}, 5000);
		
	};	
	twitterWidget();

	//Video Resize Function
	if($('iframe').length > 0) {
		function videoAdjustment(){
			var parentDiv = $('iframe').parent().width();
			var heigth = 9/16;
			$('iframe').width(parentDiv).height(parentDiv * heigth);
		};
		videoAdjustment();
		$(window).resize(function() {
			videoAdjustment();
		});
	};
	

	//Charts Function
	if($('ul.data-charts').length>0) {

		$('.percentage-right').easyPieChart({
			barColor: '#161616',
        	trackColor: '#b66d00',
            scaleColor: false,
            lineCap: 'square',
            lineWidth: 15,
            animate: 1000
    	});
    	$('.percentage-left').easyPieChart({
			barColor: '#ff9900',
        	trackColor: '#be7200',
            scaleColor: false,
            lineCap: 'square',
            lineWidth: 15,
            animate: 1000
    	});

    	$('.percentage-right, .percentage-left').css("margin","0 auto");

    }

    	//To close navigation bar in mobile after click

    	if($('a.btn.btn-navbar').is(':visible')){
    		$('ul.nav li a').click(function(){
  				$('.btn-navbar').click();

			});

		};
	
});//ready