<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nsbigbox<?php echo $ns_style; ?>">
	<div class="titlensbigbox<?php echo $ns_style; ?>">
		<h4><?php echo strtoupper($ns_full_name); ?> <?php __('PREMIUM VERSION', 'ns-add-product-frontend'); ?></h4>
	</div>
	<div class="contentnsbigbox">
		<p>	<?php __('ALL FREE VERSION FEATURES and:', 'ns-add-product-frontend'); ?><br/><br/> <?php echo $ns_premium_feature_list; ?></p>
		<a href="<?php echo $link_sidebar; ?>" class="linkBigBoxNS" target="_blank">
			<div class="buttonNsbigbox<?php echo $ns_style; ?>">
				<?php _e('UPGRADE!', 'ns-add-product-frontend'); ?>
			</div>
		</a>
	</div>
</div>