<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package flatsome-child
 */
?>
<div id="secondary" class="widget-area <?php flatsome_sidebar_classes(); ?>" role="complementary">

	<?php dynamic_sidebar('works-sidebar'); ?>

	<?php //do_action('before_sidebar'); ?>

	<?php //if (!dynamic_sidebar('sidebar-main')) : ?>
	<?php //endif; // end sidebar widget area ?>
</div><!-- #secondary -->
