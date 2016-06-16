<?php get_header(); ?>


<?php 
if(!is_event())
{
	do_action('spacex_before_main_content');
}
?>
<section id="main-content" class="main-content">

	<?php xevent_content();?>
          
</section>

<?php get_footer(); ?>