<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">

	<hr/>

	<div class="row">
		<?php echo do_shortcode("[breadcrumb]"); ?>
	</div>

	<hr/>

	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>

	<hr/>

	<?php echo do_shortcode('[block id="all_slider"]'); ?>
</div><!-- #content .page-wrapper -->

<?php get_footer(); ?>
