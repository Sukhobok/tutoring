

<style type="text/css" scoped>
<?php
$preload = ot_get_option('tt_preload_background');
$preload_icon = ot_get_option('tt_preload_icon');

if(!empty($preload))
{
	echo '.loader{background-color:'.$preload.'}';
}
if(!empty($preload_icon))
{
	echo '.loader{background-image:url('.$preload_icon.'); background-repeat:no-repeat; background-position:center center}';
}
$theme_width = ot_get_option('tt_theme_width');
if(empty($theme_width))
{
	$theme_width = '1200px';
}
?>
@media (min-width: 1200px) {
  .container {
    max-width: <?php echo $theme_width;?>;
	background-repeat:no-repeat;
	padding:0 15px;
  }
}

/* =============================================================== */
/* Typography
/* =============================================================== */
	<?php
		$background = ot_get_option("tt_background");

		$content_font = ot_get_option("tt_content_font");
		$heading_font = ot_get_option("tt_heading_font");
		$heading_font = str_replace('google_','',$heading_font);
		$content_font = str_replace('google_','',$content_font);


		$heading1 = ot_get_option("tt_heading_1");
		$heading2 = ot_get_option("tt_heading_2");
		$heading3 = ot_get_option("tt_heading_3");
		$heading4 = ot_get_option("tt_heading_4");
		$heading5 = ot_get_option("tt_heading_5");
		$heading6 = ot_get_option("tt_heading_6");
	?>
	body
	{
		<?php
		if(isset($background['background-color']) && !empty($background['background-color']))
		{
			echo 'background-color:'.$background['background-color'].';';
		}
		if(isset($background['background-attachment']) && !empty($background['background-attachment']))
		{
			echo 'background-attachment:'.$background['background-attachment'].';';
		}
		if(isset($background['background-image']) && !empty($background['background-image']))
		{
			echo 'background-image:url('.$background['background-image'].');';
		}
		if(isset($background['background-position']) && !empty($background['background-position']))
		{
			echo 'background-position:'.$background['background-position'].';';
		}
		if(isset($background['background-repeat']) && !empty($background['background-repeat']))
		{
			echo 'background-repeat:'.$background['background-repeat'].';';
		}

		if(isset($content_font['font-color']) && !empty($content_font['font-color']))
		{
			echo 'color:'.$content_font['font-color'].';';
		}
		if(isset($content_font['font-family']) && !empty($content_font['font-family']))
		{
			echo 'font-family:'.$content_font['font-family'].';';
		}
		if(isset($content_font['font-size']) && !empty($content_font['font-size']))
		{
			echo 'font-size:'.$content_font['font-size'].';';
		}
		if(isset($content_font['font-style']) && !empty($content_font['font-style']))
		{
			echo 'font-style:'.$content_font['font-style'].';';
		}
		if(isset($content_font['font-variant']) && !empty($content_font['font-variant']))
		{
			echo 'font-variant:'.$content_font['font-variant'].';';
		}
		if(isset($content_font['font-weight']) && !empty($content_font['font-weight']))
		{
			echo 'font-weight:'.$content_font['font-weight'].';';
		}
		if(isset($content_font['letter-spacing']) && !empty($content_font['letter-spacing']))
		{
			echo 'letter-spacing:'.$content_font['letter-spacing'].';';
		}
		if(isset($content_font['line-height']) && !empty($content_font['line-height']))
		{
			echo 'line-height:'.$content_font['line-height'].';';
		}
		if(isset($content_font['text-decoration']) && !empty($content_font['text-decoration']))
		{
			echo 'text-decoration:'.$content_font['text-decoration'].';';
		}
		if(isset($content_font['text-transform']) && !empty($content_font['text-transform']))
		{
			echo 'text-transform:'.$content_font['text-transform'].';';
		}
		?>

	}

	h1, h2, h3, h4, h5, h6
	{
		<?php
		if(isset($heading_font['font-color']) && !empty($heading_font['font-color']))
		{
			echo 'color:'.$heading_font['font-color'].';';
		}
		if(isset($heading_font['font-family']) && !empty($heading_font['font-family']))
		{
			echo 'font-family:'.$heading_font['font-family'].';';
		}
		if(isset($heading_font['font-style']) && !empty($heading_font['font-style']))
		{
			echo 'font-style:'.$heading_font['font-style'].';';
		}
		if(isset($heading_font['font-variant']) && !empty($heading_font['font-variant']))
		{
			echo 'font-variant:'.$heading_font['font-variant'].';';
		}
		if(isset($heading_font['font-weight']) && !empty($heading_font['font-weight']))
		{
			echo 'font-weight:'.$heading_font['font-weight'].';';
		}
		if(isset($heading_font['letter-spacing']) && !empty($heading_font['letter-spacing']))
		{
			echo 'letter-spacing:'.$heading_font['letter-spacing'].';';
		}
		if(isset($heading_font['text-decoration']) && !empty($heading_font['text-decoration']))
		{
			echo 'text-decoration:'.$heading_font['text-decoration'].';';
		}
		if(isset($heading_font['text-transform']) && !empty($heading_font['text-transform']))
		{
			echo 'text-transform:'.$heading_font['text-transform'].';';
		}
		?>
	}

	h1, h2.blog-title{
		<?php

		if(isset($heading1['font-weight']) && !empty($heading1['font-weight']))
		{
			echo 'font-weight:'.$heading1['font-weight'].';';
		}
		if(isset($heading1['font-size']) && !empty($heading1['font-size']))
		{
			echo 'font-size:'.$heading1['font-size'].';';
		}
		if(isset($heading1['line-height']) && !empty($heading1['line-height']))
		{
			echo 'line-height:'.$heading1['line-height'].';';
		}
		?>
	}
	h2,
	.wpb_tabs_nav.ui-tabs-nav li a
	{
		<?php

		if(isset($heading2['font-weight']) && !empty($heading2['font-weight']))
		{
			echo 'font-weight:'.$heading2['font-weight'].';';
		}
		if(isset($heading2['font-size']) && !empty($heading2['font-size']))
		{
			echo 'font-size:'.$heading2['font-size'].';';
		}
		if(isset($heading2['line-height']) && !empty($heading2['line-height']))
		{
			echo 'line-height:'.$heading2['line-height'].';';
		}
		?>
	}

	h3{
		<?php

		if(isset($heading3['font-weight']) && !empty($heading3['font-weight']))
		{
			echo 'font-weight:'.$heading3['font-weight'].';';
		}
		if(isset($heading3['font-size']) && !empty($heading3['font-size']))
		{
			echo 'font-size:'.$heading3['font-size'].';';
		}
		if(isset($heading3['line-height']) && !empty($heading3['line-height']))
		{
			echo 'line-height:'.$heading3['line-height'].';';
		}
		?>
	}
	.wpb_tabs_nav.ui-tabs-nav li a,
	.togglex-toggler,
	#sidebar .widget-list-post li a
	 {<?php 		if(isset($heading3['font-size']) && !empty($heading3['font-size']))
		{
			echo 'font-size:'.$heading3['font-size'].';';
		}?>}
	h4{
		<?php

		if(isset($heading4['font-weight']) && !empty($heading4['font-weight']))
		{
			echo 'font-weight:'.$heading4['font-weight'].';';
		}
		if(isset($heading4['font-size']) && !empty($heading4['font-size']))
		{
			echo 'font-size:'.$heading4['font-size'].';';
		}
		if(isset($heading4['line-height']) && !empty($heading4['line-height']))
		{
			echo 'line-height:'.$heading4['line-height'].';';
		}
		?>
	}
	h5{
		<?php

		if(isset($heading5['font-weight']) && !empty($heading5['font-weight']))
		{
			echo 'font-weight:'.$heading5['font-weight'].';';
		}
		if(isset($heading5['font-size']) && !empty($heading5['font-size']))
		{
			echo 'font-size:'.$heading5['font-size'].';';
		}
		if(isset($heading5['line-height']) && !empty($heading5['line-height']))
		{
			echo 'line-height:'.$heading5['line-height'].';';
		}
		?>
	}
	h6{
		<?php

		if(isset($heading6['font-weight']) && !empty($heading6['font-weight']))
		{
			echo 'font-weight:'.$heading6['font-weight'].';';
		}
		if(isset($heading6['font-size']) && !empty($heading6['font-size']))
		{
			echo 'font-size:'.$heading6['font-size'].';';
		}
		if(isset($heading6['line-height']) && !empty($heading6['line-height']))
		{
			echo 'line-height:'.$heading6['line-height'].';';
		}
		?>
	}
	<?php
	if(isset($heading_font['font-family']))
	{
	?>
	.single-course .price,
	.main-menu a,
	.nav-tabs > li > a,
	.user-dashboard .user-name,
	.header-text-widget,
	.post-categories a,
	.entry-meta > span,
	.comment-by .fn,
	.comment-des span.reply a,
	.logged-in-as .author-name,
	.mashsb-count,
	.mashsb-sharetext,
	blockquote,
	.product_list_widget li > a,
	.course-list li > a,
	.instructor-name b,
	.speaker-name b,
	.course-loop-student span,
	.course-loop-price .amount,
	.event-date-time,
	.event-meta,
	.event-meta a,
	.post_categories,
	.pagination a,
	.togglex-toggler,
	.sep-boxed-pricing ul li.title-row .table-title,
	.sep-boxed-pricing ul li.title-row .table-price,
	.list-event.list-style .event .event-title,
	.list-course.list-style .course .course-title,
	.course-loop-instructor a,
	.event-loop-speaker a,
	#sidebar .widget-list-post li a,
	#sidebar .widget_recent_comments li,
	.woocommerce table.cart th,
	.cart_totals  table th,
	.event-loop-student,
	.course-loop-student,
	.event-loop-price,
	.course-loop-price,
	.woocommerce .single_add_to_cart_button.button.alt,
	#bbpress-forums .bbp-forum-title,
	#bbpress-forums .bbp-topic-permalink
	{
		font-family:<?php echo $heading_font['font-family'];?>;
		<?php
		if(isset($heading_font['letter-spacing']) && !empty($heading_font['letter-spacing']))
		{
			echo 'letter-spacing:'.$heading_font['letter-spacing'].';';
		}
		?>
	}
	<?php }?>


/* =============================================================== */
/* Footer
/* =============================================================== */
footer .entry-sharing .simple-icon li a
{
<?php
		if(isset($footer_background['background-color']) && !empty($footer_background['background-color']))
		{
			echo 'background-color:'.$footer_background['background-color'].' !important;';
		}
?>
}

<?php

$hero_overlay = ot_get_option('tt_hero_overlay');
if(!empty($hero_overlay))
{
	echo '.hero-overlay{z-index:8; position:absolute; width:100%;height:100%; display:block;background:'.$hero_overlay.'}';
}
?>
<?php
	$color = ot_get_option('tt_custom_color_scheme');
	if(empty($color))
	{
		$color = ot_get_option('tt_color_scheme');
	}
?>
/* =============================================================== */
/* Custom CSS
/* =============================================================== */
<?php
	$custom_css = ot_get_option("tt_custom_css");
	echo $custom_css;
?>

</style>
<style type="text/css" title="skin" scoped>
/*=========================================
General
==========================================*/
::selection{color:#fff;background:<?php echo $color;?>;}
::-moz-selection{color:#fff;background:<?php echo $color;?>;}
a:hover, a:focus,
ul.instructors li a:hover,
.sc-entry-cat span.posted_in a:hover,
.sc-entry-cat span.tagged_as a:hover,
.mm-listview a:hover,
.main-menu .sf-menu a:hover,
#main-header.white .main-menu .sf-menu .sf-mega a:hover,
#main-header #user-trigger a.user_forgot:hover,
#page-side-wrapper .user_forgot:hover,
a.readmore:hover,
.post-categories a,
.tag-links a:hover,
.course-loop-price .amount,
.post-like .voted span.fa,
.post-like span.fa:hover,
.sc-testimonial .testimonial-item .author-name,
.single-course .course-meta li span a,
.course-list .amount,
.list-course.list-style .course .course-title,
.footer-link.list-style li a:hover,
footer a:hover,
.benefit-2 .vtcc-benefit-icon,
.sc-gallery h3 a:hover,
.nav-link a:hover,
#user-trigger.select_wrapper .nav-link a:hover,
#course-filter.select_wrapper .select_dropdown li:hover,
#course-filter.select_wrapper .select_dropdown li.active,
.list-style.blog li span.post_categories a,
.select_dropdown  li:hover,
ul.product_list_widget li a:hover,
.text-color,
#spacex-breadcrumb a:hover,
.nav-tabs > li.active > a i,
.header-white #topbar .textwidget a,
.header-dark #topbar .textwidget a,
#main-header.white .main-menu-wrapper .main-menu a:hover,
#main-header.white .main-menu-wrapper .main-menu li.current-menu-item > a,
.course-loop-price,
.event-loop-price,
.single-course span.posted_in a,
.single-event span.posted_in a,
.xslider .xslider-readmore:hover,
.xbutton > a:hover,
.table-col.col-price,
.togglex-toggler i
{color:<?php echo $color;?>;}
.mm-listview .mm-next:hover,
.tag-links a:hover,
.post-like span.fa:hover,
.post-like .voted span.fa,
#course-filter.select_wrapper .select_dropdown li.active,
#course-filter.select_wrapper .select_dropdown li:hover
{border-color:<?php echo $color;?> !important;}
.readmore:hover,
.single-course .course-meta li span a:hover,
.list-style.blog li span.post_categories a:hover
{border-color:#333 !important; color:#333 !important;}
.nav-tabs > li.active > a
{
	box-shadow: inset 0 2px 0 <?php echo $color;?>;
}
.vertical-tabs .nav-tabs > li.active > a
{
	box-shadow: inset 2px 0 0 <?php echo $color;?>;
}
/*=========================================
Site
==========================================*/
span.post_categories a,
.sc-wall .sc-categories,
.comment-number,
#user-trigger,
.flex-direction-nav .flex-next,
.flex-direction-nav .flex-prev,
#wp-calendar caption,
.single-event .entry-thumbnail .posted_in,
.event-date-time,
.xslider-control
{
	background:<?php echo $color;?>
}
.sf-menu .sf-mega,
#user-trigger.select_wrapper .select_dropdown,
#topbar .cart-list
 {border-top:3px solid <?php echo $color;?>}
/*=========================================
Woocommerce
==========================================*/
.woocommerce table.shop_table a,
.woocommerce table.shop_table td .product-name
.woocommerce table.shop_table td .product-name strong,
.checkout-msg a:hover,
#topbar a.cart-contents:hover,
#bbpress-forums div.bbp-reply-content a,
.bbp-topic-started-by .bbp-author-name,
.bbp-topic-freshness-author .bbp-author-name
{color:<?php echo $color;?>;}
.woocommerce .single_add_to_cart_button.button.alt
{
	background:<?php echo $color;?>
}
.bbp-topic-started-by .bbp-author-name:hover,
.bbp-topic-freshness-author .bbp-author-name:hover
{
	color:#777;
}

/*=========================================
XCourse
==========================================*/
.ts-tab .nav-tabs > li.active > a, .ts-tab .nav-tabs > li.active > a:hover, .ts-tab .nav-tabs > li.active > a:focus,
.ts-tab .nav-tabs > li > a:hover
{
  box-shadow: inset 0 -3px 0 0 <?php echo $color;?>;
}
.nav-link a:hover, .nav-link a:focus, .nav-link a.active {
  box-shadow: inset 3px 0px 0 0  <?php echo $color;?>;
}
.user-manager .user-avatar,
.xevent-pagination .page-numbers span.current, .xevent-pagination .page-numbers a:hover, .xevent-pagination .page-numbers a:focus,
.xcourse-pagination .page-numbers span.current, .xcourse-pagination .page-numbers a:hover, .xcourse-pagination .page-numbers a:focus
{
	background:<?php echo $color;?>
}
.dashboard-header .user-name
{
	color:<?php echo $color;?>;
}

</style>
