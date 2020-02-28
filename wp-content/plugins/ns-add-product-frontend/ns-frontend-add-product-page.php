<?php
/*
Plugin Name: NS Frontend Add Product
Plugin URI: https://www.nsthemes.com/
Description: Add product without user frontend access!
Version: 1.5.3
Author: NsThemes
Author URI: http://www.nsthemes.com
Text Domain: ns-frontend-add-product
Domain Path: /i18n
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-add-product-frontend',
    'main_file_name'            => 'ns-frontend-add-product-page.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-add-product-frontend%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '205',
    'plugin_token'              => 'NWNmZTNjMjk1ZmVlNGU1YmFhYmJiNTRiY2VhNTk5NzkzZWRlNmY3MTQ4NTEwNzIwMzE4NjI3NGVhZjhlZGY5ZDU1ZTRmNGNjNTgxZjM=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj205 = new pluginEye($plugineye);
$plugineyeobj205->pluginEyeStart();      
        

/* *** plugin review trigger *** */
require_once( plugin_dir_path( __FILE__ ) .'/class/class-plugin-theme-review-request.php');


if ( ! defined( 'ADDPROD_NS_PLUGIN_DIR' ) )
    define( 'ADDPROD_NS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'ADDPROD_NS_PLUGIN_DIR_URL' ) )
    define( 'ADDPROD_NS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );



/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'apf_add_action_links' );

function apf_add_action_links ( $links ) {
 $mylinks = array(
 '<a id="nsapflinkpremium" href="http://www.nsthemes.com/product/frontend-add-product/?ref-ns=2&campaign=APF-linkpremium" target="_blank">Premium Version</a>',
 );
return array_merge( $links, $mylinks );
}


/* *** plugin style and script *** */
function ns_apf_style_scripts() {
		wp_enqueue_style( 'ns-apf-option-css-a-page', ADDPROD_NS_PLUGIN_DIR_URL . 'assets/css/ns-apf-css-front-page.css');
		wp_enqueue_style( 'all-min', plugin_dir_url( __FILE__ ). 'assets/css/all.min.css', array(), '1.0.0' ); 
    wp_enqueue_script( 'ns-apf-option-js-page', ADDPROD_NS_PLUGIN_DIR_URL . 'assets/js/ns-apf-js-front-page.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'ns_apf_style_scripts' );


/* *** plugin options *** */
require_once( ADDPROD_NS_PLUGIN_DIR.'/ns-frontend-add-product-options.php');


require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');

/*Only logged users can use the plugin*/
function ns_is_user_logged_in() {
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-add-attributes.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-add-gallery-images.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-add-image.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-save-post.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-save-bubble.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-save-tags.php');
	require_once( plugin_dir_path( __FILE__ ).'inc/ns-frontend-add-product-save-categories.php');

    $user = wp_get_current_user();
 
    return $user->exists();
}



/*this create a shortcode that allow to insert the add image module linked to a new product*/
add_shortcode("ns-add-product", "ns_add_prod");

function ns_add_prod( $atts ) { 
$args = array(
    'textarea_rows' => 15,
    'teeny' => true,
    'quicktags' => false
);

if(!ns_is_user_logged_in())
		{
			_e('You need to login to see this page', 'ns-frontend-add-product');
			return;
		}

ob_start(); ?>
<div id="ns-container-add-product-frontend">
	<form name="form1" action="" method="post" class="" enctype="multipart/form-data">
		<div id="ns-product-data-container" class="ns-big-box">
			<div class="ns-center">
				<h2><span><?php _e('Product Data', 'ns-frontend-add-product'); ?></span></h2> <button id='ns-post-prod-data-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
			</div>
			<div id="ns-product-data-inner-container" class="ns-border-margin">
				<div class="ns-left-list-data-container">
					<ul>
						<li id="ns-general" class="ns-active"><a href="#ns-prod-data" class="ns-link"> <?php _e('General', 'ns-frontend-add-product'); ?></a></li>
						<li id="ns-inventory"><a href="#ns-prod-data" class="ns-link"> <?php _e('Inventory', 'ns-frontend-add-product'); ?></a></li>
						<li id="ns-shipping"><a href="#ns-prod-data" class="ns-link"> <?php _e('Shipping', 'ns-frontend-add-product'); ?></a></li>
						
						<li id="ns-attributes"><a href="#ns-prod-data" class="ns-link"> <?php _e('Attributes', 'ns-frontend-add-product'); ?></a></li>
						<li id="ns-advanced"><a href="#ns-prod-data" class="ns-link"> <?php _e('Advanced', 'ns-frontend-add-product'); ?></a></li>
						<li id="ns-extra"><a href="#ns-prod-extra" class="ns-link"> <?php _e('Extra', 'ns-frontend-add-product'); ?></a></li>
					</ul>
				</div>
				<div class="ns-prod-data-tab ns-general">
					<div>
						<div><label><?php _e('Product Name', 'ns-frontend-add-product'); ?></label> <br><input class="ns-input-width" name="ns-product-name" id="ns-product-name" value="" placeholder="Product name" type="text" required="true"></div>
						<div><label><?php _e('Regular price', 'ns-frontend-add-product'); ?> (<?php echo  get_woocommerce_currency_symbol();?>)</label> <br><input class="ns-input-width" name="ns-regular-price" id="ns-regular-price" value="" placeholder="4.20" type="text" pattern="[0-9]+([\.][0-9]+)?" title="<?php _e('This should be a number with up to 2 decimal places.', 'ns-frontend-add-product'); ?>"></div>
						<div><label><?php _e('Sale price', 'ns-frontend-add-product'); ?> (<?php echo  get_woocommerce_currency_symbol();?>)</label> <br><input class="ns-input-width" name="ns-sale-price" id="ns-sale-price" value="" placeholder="3.00" type="text" pattern="[0-9]+([\.][0-9]+)?" title="<?php _e('This should be a number with up to 2 decimal places.', 'ns-frontend-add-product'); ?>"></div>
					</div>
				</div>
				<div class="ns-prod-data-tab ns-inventory ns-hidden">
					<div>
						<div>
							<label><?php _e('SKU', 'ns-frontend-add-product'); ?></label><br> <input class="ns-input-width" name="ns-sku" id="ns-sku" value="" placeholder="" type="text">
						</div>
						<div>
							<label><?php _e('Manage Stock?', 'ns-frontend-add-product'); ?></label> <input name="ns-manage-stock" id="ns-manage-stock" value="no" type="checkbox"><br> <span class="ns-frontend-add-product-span-text"><?php _e('Enable stock management at product level', 'ns-frontend-add-product'); ?></span>
						</div>
						<div id="ns-manage-stock-div" style="display: none;">
							<div>
								<label><?php _e('Stock quantity', 'ns-frontend-add-product'); ?></label><br><input class="" name="ns-stock" id="ns-stock" step="any" type="number"> 
							</div>
							<div class="">
							<label><?php _e('Allow backorders?', 'ns-frontend-add-product'); ?></label>
								<select id="ns-backorders" name="ns-backorders" class="">
									<option value="no"><?php _e('Do not allow', 'ns-frontend-add-product'); ?></option>
									<option value="notify"><?php _e('Allow, but notify customer', 'ns-frontend-add-product'); ?></option>
									<option value="yes" selected="selected"><?php _e('Allow', 'ns-frontend-add-product'); ?></option>
								</select> 
							</div>
						</div>
						<div>
							<label><?php _e('Stock Status', 'ns-frontend-add-product'); ?></label><br>
							<select id="ns-stock-status" name="ns-stock-status" class="ns-input-width" >
								<option value="instock"><?php _e('In stock', 'ns-frontend-add-product'); ?></option>
								<option value="outofstock"><?php _e('Out of stock', 'ns-frontend-add-product'); ?></option>
							</select>
						</div>
						<div>
							<div style="margin-left: 0px;"><label> <?php _e('Sold individually', 'ns-frontend-add-product'); ?></label><input class="checkbox" name="ns-sold-individually" id="ns-sold-individually" value="yes" type="checkbox"><br><span class="ns-frontend-add-product-span-text"><?php _e('Enable this to only allow one of this item to be bought in a single order', 'ns-frontend-add-product'); ?></span></div>
						</div>
					</div>				
				</div>
				<div class="ns-prod-data-tab ns-shipping ns-hidden">
					<div class="">
						<div><label><?php _e('Weight (kg)', 'ns-frontend-add-product'); ?></label><br><input class="ns-input-width" name="ns-weight" id="ns-weight" placeholder="0" type="text"></div>								
						<div><label><?php _e('Dimensions (cm)', 'ns-frontend-add-product'); ?></label><div style="margin-left: 0px;"><input class="ns-input-width" id="ns-product-length" placeholder="<?php _e('Length', 'ns-frontend-add-product'); ?>" size="6" name="ns-product-length"  type="text"><br><input class="ns-input-width" placeholder="<?php _e('Width', 'ns-frontend-add-product'); ?>" size="6" id="ns-width" name="ns-width"  type="text"><br><input class="ns-input-width" placeholder="<?php _e('Height', 'ns-frontend-add-product'); ?>" size="6" id="ns-height" name="ns-height"  type="text"></div>		</div>					
					</div>
					
				</div>

				<div class="ns-prod-data-tab ns-attributes ns-hidden">
					<div id="ns-inner-attributes">
						<select id="ns-attribute-taxonomy" name="ns-attribute-taxonomy" class="ns-attribute-taxonomy ns-input-width">
							<option value="ns-cus-prod-att"><?php _e('Custom product attribute', 'ns-frontend-add-product'); ?></option>
							<option id="ns-color-id" value="ns-color-att"><?php _e('color', 'ns-frontend-add-product'); ?></option>
						</select><br>
						<button id="ns-add-attribute-btn" type="button" class="button"><?php _e('Add', 'ns-frontend-add-product'); ?></button>
						<input id="ns-attribute-list" name="ns-attribute-list" type="hidden" />
					</div>
					
				</div>
				<div class="ns-prod-data-tab ns-advanced ns-hidden">
					<div>
						<label><?php _e('Purchase note', 'ns-frontend-add-product'); ?></label><textarea name="ns-purchase-note" id="ns-purchase-note" ></textarea>			
					</div>
					<div>
						<label><?php _e('Menu order', 'ns-frontend-add-product'); ?></label><br><input class="ns-input-width" name="ns-menu-order" id="ns-menu-order" placeholder="" step="1" type="number">
					</div>
					<div>
						<label><?php _e('Enable reviews', 'ns-frontend-add-product'); ?></label><input class="checkbox" name="ns-comment-status" id="ns-comment-status" checked="checked" type="checkbox">				
					</div>
				</div>
				<div class="ns-prod-data-tab ns-extra ns-hidden">
					<div id="ns-wc-productdata-options-tab">
						<!--<div>
							<label>Custom Bubble</label>
							<select id="ns-bubble" name="ns-bubble" class="ns-input-width">
								<option value="" selected="selected">Disabled</option>
								<option value="&quot;yes&quot;">Enabled</option>
							</select>
						</div> -->
						<div><label><?php _e('Custom Bubble Title', 'ns-frontend-add-product'); ?></label><br><input class="ns-input-width" name="ns-bubble-text" id="ns-bubble-text" value="" placeholder="<?php _e('NEW', 'ns-frontend-add-product'); ?>" type="text"></div>
						<div><label><?php _e('Custom Tab Title', 'ns-frontend-add-product'); ?></label><br><input class="ns-input-width" value="" name="ns-custom-tab" id="ns-custom-tab" placeholder="" type="text"></div>
						<div><label><?php _e('Custom Tab Content', 'ns-frontend-add-product'); ?></label><textarea  id="ns-cus-tab-content" name="ns-cus-tab-content" class="short" placeholder="<?php _e('Enter content for custom product tab here. Shortcodes are allowed', 'ns-frontend-add-product'); ?>"></textarea></div>
						<div><div style="margin-left: 0px;"><label>Product Video</label><br><input id="ns-video" name="ns-video" class="short ns-input-width" placeholder="https://www.youtube.com/watch?v=Ra_iiSIn4OI" type="text"><br><span class="ns-frontend-add-product-span-text"><?php _e('Enter a Youtube or Vimeo Url of the product video here. We recommend uploading your video to Youtube.', 'ns-frontend-add-product'); ?></span></div></div>
						<div><label><?php _e('Product Video Size', 'ns-frontend-add-product'); ?></label><br><input id="ns-video-size" name="ns-video-size" class="ns-input-width" placeholder="900x900" type="text"></div>
						<div><label><?php _e('Top Content', 'ns-frontend-add-product'); ?></label><textarea id="ns-top-content" name="ns-top-content" placeholder="<?php _e('Enter content that will show after the header and before the product. Shortcodes are allowed', 'ns-frontend-add-product'); ?>"></textarea></div>
						<div><label><?php _e('Bottom Content', 'ns-frontend-add-product'); ?></label><textarea id="ns-bottom-content" name="ns-bottom-content" placeholder="<?php _e('Enter content that will show after the product info. Shortcodes are allowed', 'ns-frontend-add-product'); ?>"></textarea></div>
					</div>
				</div>
			</div>
		</div>
		<div id="ns-post-content" class="ns-big-box">
			<div>
				<h2><?php _e('Post Content', 'ns-frontend-add-product'); ?></h2><button id='ns-post-content-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
			</div>
			<div id="ns-wp-post-content-div" class="ns-border-margin ns-padding-container">
				<p class="ns-frontend-add-product-span-text"><?php _e('Here you can add the complete description of your product', 'ns-frontend-add-product'); ?></p>
				<textarea id="ns-post-content-text" name="ns-post-content-text" class="ns-display-block"></textarea>
			</div>
		</div>
		<div id="ns-short-desc-container" class="ns-big-box">
			<div>
				<h2><?php _e('Product Short Description', 'ns-frontend-add-product'); ?></h2><button id='ns-short-desc-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
			</div>
			<div id="ns-wp-editor-div" class="ns-border-margin ns-padding-container">
				<p class="ns-frontend-add-product-span-text"><?php _e('Here you can add a short description to your product', 'ns-frontend-add-product'); ?></p>
				<textarea id="ns-short-desc-text" name="ns-short-desc-text" class="ns-display-block"></textarea>
			</div>
		</div>
		
		<div class="ns-left ns-little-container">
			<div id="ns-product-tags" class="ns-little-box ns-margin-right">
				<div>
					<h2><?php _e('Product Tags', 'ns-frontend-add-product'); ?></h2><button id='ns-prod-tags-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
				</div>
				<div id="ns-prod-tags-div" class="ns-padding-container ns-border-margin">
					<div><input id="ns-new-tag-product" name="ns-new-tag-product"  size="16" value="" type="text"></div>
					<div>
						<p class="ns-frontend-add-product-span-text"><?php _e('Separate Product Tags with commas', 'ns-frontend-add-product'); ?></p>
					</div>
				</div>
			</div>
			<div id="ns-image-container" class="ns-little-box">
				<div>
					<h2><?php _e('Product Image', 'ns-frontend-add-product'); ?></h2><button id='ns-prod-image-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
				</div>
				<div id = "ns-image-container-0"class="ns-border-margin ns-padding-container">
					<div id="ns-image-container1">
						<img id="ns-img-thumbnail" src="<?php echo(wc_placeholder_img_src()); ?>" />
					</div>
					<div class="ns-margin-top"><p><input type="file" name="ns-thumbnail" id="ns-thumbnail" /></p></div>
				</div>
			</div>
		</div>
		<div class="ns-left ns-little-container">
			<div id="ns-product-categories" class="ns-little-box ns-margin-right">
				<div>
					<h2><?php _e('Product Categories', 'ns-frontend-add-product'); ?></h2><button id='ns-prod-categories-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
				</div>
				<div id="ns-prod-cat-inner" class="ns-border-margin ns-padding-container">
					<div>
					<?php 
						$all_existent_cat = get_terms( array(
							'taxonomy' => 'product_cat',
							'hide_empty' => false,
						));			
					?>
						<table>
						<?php
							foreach($all_existent_cat as $cat_obj){							
								echo '<tr>';
									echo '<td>';
										echo '<input type="checkbox" name="'.$cat_obj->name.'" class="ns-frontend-add-product-ca-checkbox" value="'. $cat_obj->name .'"/>'.$cat_obj->name;
									echo '</td>';
								echo '</tr>';
	
								}
						?>
							
						</table>
					</div>
				</div>
			</div>
			<div id="ns-product-gallery" class="ns-little-box">
				<div>
					<h2><?php _e('Product Gallery', 'ns-frontend-add-product'); ?></h2><button id='ns-prod-gallery-hide-show' class="dashicons dashicons-arrow-down ns-pointer"></button>
				</div>
				<div id="ns-prod-gallery-inner" class="ns-border-margin ns-padding-container">
					<div>
						<p class="ns-frontend-add-product-span-text"><?php _e('Add product gallery images', 'ns-frontend-add-product'); ?></p>
						 <!-- Trigger/Open The Gallery Modal -->
						<button id="ns-myBtn" class="button ns-left" type="button"><?php _e('Open Gallery', 'ns-frontend-add-product'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<div style="text-align:center;">
			<button type="submit" class="button" name="submit" style="margin:0;"><?php _e('Save', 'ns-frontend-add-product'); ?></button>	
		</div>			
</div>
<input id="ns-image-from-list" name="ns-image-from-list" type="hidden" value="" />
<input id="ns-attr-from-list" name="ns-attr-from-list" type="hidden" value="" />

</form>	
				<?php //get all the images from wordpress
					$query_images_args = array(
						'post_type'      => 'attachment',
						'post_mime_type' => 'image',
						'post_status'    => 'inherit',
						'posts_per_page' => - 1,
					);

					$query_images = new WP_Query( $query_images_args );

					/*All the images are stored in $images, so then i can foreach on them and echo in <img> source*/
					$images = array();
				?>
				<!-- The Gallery Modal -->
				<div id="ns-myModal" class="ns-modal">
				  <!-- Gallery Modal content -->
				  <div class="ns-modal-content">
						<span class="ns-close">x</span>
						<div class="ns-image-container">
						<?php foreach($query_images->posts as $image){ ?>
							<div class="ns-inline-flex"><img src="<?php echo(wp_get_attachment_url( $image->ID ));?>" id="<?php echo($image->ID);?>" /></div>
						<?php } ?>
						</div>
				  </div>
				</div>
				

<input id="ns-color-att-list"  type="hidden" value="<?php foreach(ns_get_all_color_terms() as $val){echo ($val.',');} ?>" />
<?php 
$ns_html_to_return = ob_get_clean();

	if(isset($_POST['submit']))
	{
		if(!ns_save_product()){			//error found, return empty html;
			echo '
				<div class="ns-add-prod-result">
					<span class="ns-add-prod-response" ><i class="fas fa-check-circle fa-2x ns-green ns-margin-right" ></i>Your <a href="'.get_permalink($edit_id).'">&nbsp;product&nbsp;</a> has been updated.</span>
				</div>';
			return '';
		}
		else{
			echo '
						<div class="ns-add-prod-result">
							<span class="ns-add-prod-response" ><i class="fas fa-check-circle fa-2x ns-green ns-margin-right" ></i>Your product has been added.</span>
						</div>';
		}
	}
	return  $ns_html_to_return;
}  


function ns_save_product(){
/*Create a new post*/
$post_id = ns_save_post();
if(is_wp_error( $post_id )){
	return false;
}

/*Product data*/
$regular_price = null;
 if(isset($_POST["ns-regular-price"])){
	if(is_numeric( $_POST["ns-regular-price"] ) || $_POST["ns-regular-price"] == ''){
			$regular_price = sanitize_text_field($_POST["ns-regular-price"]);
		}
	else{
		wp_delete_post( $post_id, true );
		return false;
	}
}
$sale_price = null;
 if(isset($_POST["ns-sale-price"])){
	if(is_numeric( $_POST["ns-sale-price"] ) || $_POST["ns-sale-price"] == ''){
			$sale_price = sanitize_text_field($_POST["ns-sale-price"]);
		}
	else{
		wp_delete_post( $post_id, true );
		return false;
	}
 }
$sku = null;
 if(isset($_POST["ns-sku"])){
	 $sku = sanitize_text_field($_POST["ns-sku"]);
 }
 
$manage_stock = null;
$stock_quantity = null;
$stock_back_orders = "no";
 if(isset($_POST["ns-manage-stock"])){
	 $manage_stock = sanitize_text_field($_POST["ns-manage-stock"]);
	 $stock_quantity = sanitize_text_field($_POST["ns-stock"]);
	 $stock_back_orders = sanitize_text_field($_POST["ns-backorders"]);
 }

 $stock_status = null;
 if(isset($_POST["ns-stock-status"])){
	 $stock_status = $_POST["ns-stock-status"];
 }
	
$sold_individually = null; 
if(isset($_POST["ns-sold-individually"])){
	$sold_individually = $_POST["ns-sold-individually"];
}

$weight = null;
 if(isset($_POST["ns-weight"])){
	 $weight = sanitize_text_field($_POST["ns-weight"]);
 }
 
$length = null;
 if(isset($_POST["ns-product-length"])){
	 $length = sanitize_text_field($_POST["ns-product-length"]);
 }
 
$width = null;
 if(isset($_POST["ns-width"])){
	$width = sanitize_text_field($_POST["ns-width"]);
}

$height = null;
 if(isset($_POST["ns-height"])){
	 $height = sanitize_text_field($_POST["ns-height"]);
 }
  
 /* $shipping_class = null; 
  if(isset($_POST["ns-product-shipping-class"])){
	$shipping_class = $_POST["ns-product-shipping-class"];
  }*/
  
$purchase_note = null; 
 if(isset($_POST["ns-purchase-note"])){
	$purchase_note = sanitize_text_field($_POST["ns-purchase-note"]);
 }

if($stock_status)
	update_post_meta( $post_id, '_stock_status', $stock_status);
if($regular_price)
	update_post_meta( $post_id, '_regular_price',  $regular_price);
if($sale_price)
	update_post_meta( $post_id, '_sale_price', $sale_price );
if($purchase_note)
	update_post_meta( $post_id, '_purchase_note', $purchase_note  );

update_post_meta( $post_id, '_featured', "no" );
if($weight)
	update_post_meta( $post_id, '_weight', $weight );
if($length)
	update_post_meta( $post_id, '_length', $length );
if($width)
	update_post_meta( $post_id, '_width', $width );
if($height)
	update_post_meta( $post_id, '_height', $height );
if($sku)
	update_post_meta( $post_id, '_sku', $sku);

update_post_meta( $post_id, '_sale_price_dates_from', "" );
update_post_meta( $post_id, '_sale_price_dates_to', "" );

if($sale_price)
	update_post_meta( $post_id, '_price', $sale_price );
if($sold_individually)
	update_post_meta( $post_id, '_sold_individually', $sold_individually );

if($manage_stock == "yes"){
	update_post_meta( $post_id, '_manage_stock', $manage_stock );
	update_post_meta( $post_id, '_stock', $stock_quantity );
	update_post_meta( $post_id, '_backorders', $stock_back_orders );
}

update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, 'total_sales', '0');

 
/*
wp_set_object_terms( $post_id, 'Races', 'product_cat' );
wp_set_object_terms($post_id, 'simple', 'product_type');
update_post_meta( $post_id, '_downloadable', 'yes');
update_post_meta( $post_id, '_virtual', 'yes');
*/

/*Bubbles*/
ns_save_bubble($post_id);

/*Categories*/
ns_save_categories($post_id);

/*Tags*/
ns_save_tags($post_id);

/*Images*/
$ns_attachment_id = ns_add_image($post_id);

//if($ns_attachment_id)
	update_post_meta( $post_id, '_thumbnail_id', $ns_attachment_id );

/*Attributes*/
ns_add_attributes($post_id);

/*Gallery*/
ns_add_gallery_images($post_id);

return true;
}

/*Used to get all the colors already inserted by user*/
function ns_get_all_color_terms(){
	$term_array = Array();
	$term_list = get_terms( 'pa_color');
	foreach($term_list as $classTerm){
		array_push($term_array, $classTerm->name);
	}
	return $term_array;
}


//Enqueue the Dashicons script
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}

/*********************************************************
			INCLUSIONE text domain
*********************************************************/
function ns_apf_translate(){
	load_plugin_textdomain('ns-frontend-add-product',false, basename( dirname( __FILE__ ) ) .'/i18n');
}
add_action('plugins_loaded','ns_apf_translate');


