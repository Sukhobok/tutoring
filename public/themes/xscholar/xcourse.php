<?php get_header(); ?>


<?php 
if(!is_course())
{
	do_action('spacex_before_main_content');
}
?>
<section id="main-content" class="main-content">

	<?php xcourse_content();?>
          
</section>

<?php get_footer(); ?>