<?php
/*
Plugin Name: AWR Ecommcerce
Plugin URI: ''
Description: Custom Plugin for AWR Shop
Version: 1.0beta
Author: Western
Author URI: ''
License: GPLv2 or later
Text Domain: awr-shop
*/
define('PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define('PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ).'inc/db/init.php' );
require_once( plugin_dir_path( __FILE__ ).'inc/classes/product-class.php' );
require_once( plugin_dir_path( __FILE__ ).'inc/classes/utils-class.php' );
require_once( plugin_dir_path( __FILE__ ).'inc/classes/product-cart.php' );
require_once( plugin_dir_path( __FILE__ ).'inc/cart.php' );

$awr = new AWRProducts;
$utils = new AWRUtilities;

$utils->loadAssets();
$awr->registerProductPostType();
$awr->registerProductCategory();
$awr->registerProductCustomFields();

// saving product meta
function saveProductMeta(){
	$awr = new AWRProducts;
	global $post;	
	remove_action( 'save_post', 'saveProductMeta' );

		if( isset( $_REQUEST['awr_field'] ) && is_array( $_REQUEST['awr_field'] ) && count( $_REQUEST['awr_field'] ) > 0 ){
			$awr->saveProductMeta( $_REQUEST['awr_field'], $post->ID );	
		}

	add_action('save_post', 'saveProductMeta' );
}
add_action( 'save_post', 'saveProductMeta' );

// replace single.php content with product detail content
function showProductDetailTemplate( $content ){
	global $post;
	if( $post->post_type == 'awr-product'){
		require_once( plugin_dir_path( __FILE__ ).'inc/actions.php' );
		$awr 	= new AWRProducts;
		$utils 	= new AWRUtilities;
		$utils->loadShopAssets();
		$awr->productDetail( $post );

	}else{

		return $content;

	}	
}
add_filter('the_content', 'showProductDetailTemplate');