<?php
class AWRUtilities {

	function __construct(){

	}

	function loadAssets(){		

		function loadAdminCss(){
			wp_enqueue_style( 'awr-admin', PLUGIN_DIR_URL.'assets/css/awr-admin-style.css', array(), false, true );
		}
		add_action('admin_enqueue_scripts', 'loadAdminCss');

		function loadAdminJs(){

			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('admin-js', PLUGIN_DIR_URL.'assets/js/awr-shop-admin.js', array(), false, true);
		}
		add_action('admin_footer', 'loadAdminJs');
		
	}

	function addBodyClass(){

		function addBodyclass($classes){
			global $post;
			$classes[] = get_post_type();

			return $classes;
		}

		add_filter('body_class', 'addBodyclass');
	}

	function loadShopAssets(){

		function shopJs(){
			//
			wp_enqueue_script('shop-js', PLUGIN_DIR_URL.'/assets/js/awr-shop.js', array(), false, true);
			wp_localize_script( 'shop-js', 'ajax_object', 
							array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );
			wp_localize_script( 'shop-js', 'awr_constants', 
							array( 'awr_currency' => 'USD', 'awr_currency_symbol' => '$' ) );
		}
		add_action('wp_footer', 'shopJs');
	}
	
	function getProductImage( $size = 'all' ){

		
	}

	function generateRandomString( $token_for = null ){

		switch ( $token_for ) {
			case 'cart':
				$str_token = 'cartawr_'.md5( time() . rand() );
				break;
			case 'cookie':
				$str_token = 'ckawr'.base64_encode( rand().time() );
				break;			
			default:
				$str_token = md5( time() . rand() );
				break;
		}

		return $str_token;
	}
}