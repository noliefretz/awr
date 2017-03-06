<?php
if( get_option('_awr_shop_loaded') != 1 ){	
	function createAWRCartOrderTable() {		
		if( is_user_logged_in()  ){
			/* install tables */
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			global $wpdb;
			$table_cart 	 	= $wpdb->prefix.'awr_cart_order';
			$table_cart_item 	= $wpdb->prefix.'awr_cart_order_item';
			$table_cart_invoice = $wpdb->prefix.'awr_cart_order_invoice';
			$charset_collate = $wpdb->get_charset_collate();

			// building cart header table	
			$sql_str = "CREATE TABLE IF NOT EXISTS ".$table_cart."(
						id mediumint(9) NOT NULL AUTO_INCREMENT,
						date_time_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
						cart_token text NOT NULL,					
						customer_id mediumint(9) NULL,
						cart_order_status tinytext NOT NULL,
						PRIMARY KEY (id)
						) $charset_collate;";
			dbDelta( $sql_str );

			// end building cart header table			

			// building cart item table	
			$sql_str = "CREATE TABLE IF NOT EXISTS ".$table_cart_item."(
						id mediumint(9) NOT NULL AUTO_INCREMENT,
						date_time_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,						
						product_id mediumint(9) NOT NULL,
						product_quantity mediumint(9) NOT NULL,
						product_amount float NOT NULL,
						cart_id mediumint(9) NOT NULL,
						PRIMARY KEY (id)
						) $charset_collate;";
			dbDelta( $sql_str );
			// end building cart item table	

			// building cart orders / invoice table	
			$sql_str = "CREATE TABLE IF NOT EXISTS ".$table_cart_invoice."(
						id mediumint(9) NOT NULL AUTO_INCREMENT,
						date_time_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
						date_time_paid  datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
						customer_id mediumint(9) NOT NULL,
						cart_id mediumint(9) NOT NULL,
						invoice_number text NOT NULL,
						PRIMARY KEY (id)
						) $charset_collate;";
			dbDelta( $sql_str );		

		}		
		update_option('_awr_shop_loaded', 1, 'yes');
	}

	add_action('init', 'createAWRCartOrderTable');	
}
// generate uniques string for transients
function registerUniques(){

	$nonce = wp_create_nonce( 'my-nonce' );
	/*require_once( PLUGIN_DIR_PATH.'inc/classes/utils-class.php' );
	$utils = new AWRUtilities();
	$cookie_token	= $utils->generateRandomString('cookie');	
	setcookie( 'awr_cookie', $cookie_token, time()+3600, "/", get_bloginfo(), 1 );
	set_transient('_awrcart_order_'.$cookie_token, 'THIS IS LOADEDS', 1 * MINUTE_IN_SECONDS );*/

}
add_action('init', 'registerUniques');