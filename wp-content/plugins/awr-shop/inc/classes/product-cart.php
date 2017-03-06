<?php
class AWRCart {

	function __construct(){

	}


	function ajaxAddToCart(){

		check_ajax_referer( 'addtocart_security_nonce', 'addtocart_security' );
		global $wpdb;
		require_once( PLUGIN_DIR_PATH.'inc/classes/product-cart.php' );	
		require_once( PLUGIN_DIR_PATH.'inc/classes/utils-class.php' );
		$cart_data = array();

		$utils 			= new AWRUtilities();
		$cart 			= new AWRCart();
		$flag_good 		= false;
		$return_data	= array();

		// getting all inputs
		if( isset( $_REQUEST['product_id'] ) && !empty( $_REQUEST['product_id'] ) && 
			isset( $_REQUEST['product_model'] ) && !empty( $_REQUEST['product_model'] ) && 
			isset( $_REQUEST['product_quantity'] ) && isset( $_REQUEST['product_quantity'] ) &&
			isset( $_REQUEST['total_amount'] ) && isset( $_REQUEST['total_amount'] ) ){

			$cart_data['product_id'] 		= sanitize_text_field( $_REQUEST['product_id'] );
			$verify_product = $cart->getProduct( $cart_data['product_id'] );

			if( $verify_product['data']['error'] == 0){

				$cart_token 	= $utils->generateRandomString('cart');
				$cart_data['product_model'] 	= sanitize_text_field( $_REQUEST['product_model'] );
				$cart_data['product_quantity'] 	= sanitize_text_field( $_REQUEST['product_quantity'] );
				$cart_data['total_amount']		= sanitize_text_field( $_REQUEST['total_amount'] );
				$cart_data['cart_token']		= sanitize_text_field( $cart_token );

				$process_cart = $cart->addToCart( $cart_data );
				// adding orders to order table				
				if( $process_cart['data']['error'] == 0 ){

					$return_data['data'] = array('error' => 0, 'message' => 'Added to Cart', 'cart_id' => $process_cart['data']['cart_data']['cart_id'] );

				}else{

					$return_data['data'] = array('error' => 1, 'message' => 'Error on adding item to cart', 'cart_id' => 0);
				}

			}else{

				$flag_good = false;
				$return_data['data'] = array('error' => 1, 'message' => 'Error on adding item to cart.', 'cart_id' => 0);
			}
		}else{

			$flag_good = false;
			$return_data['data'] = array('error' => 1, 'message' => 'Error on adding item to cart.', 'cart_id' => 0);
		}

		_e( json_encode( $return_data ) );

		wp_die();

	}
	

	function addToCart( $request_data = null ){
		global $wpdb;
		$ret_data = array();
		$table = $wpdb->prefix.'awr_cart_order';		

		if( !is_null( $request_data )){		

			// preparing data for creating new cart order
			if( isset( $request_data['customer_id'] ) && !empty( $request_data['customer_id'] ) ){
				$customer_id = $request_data['customer_id'];
			}else{
				$customer_id = null;
			}

			$cart_data 	= array( 'date_time_created' => date("Y-m-d h:i:s"), 'cart_token' => $request_data['cart_token'], 'customer_id' => $customer_id, 'cart_order_status' => 'pending' );
			$new_cart  	= $wpdb->insert( $table, $cart_data);
			$cart_id	= $wpdb->insert_id;
			$cart_item 	= self::fillCartItem( $cart_id, $request_data );

			$ret_cart_data = array( 'cart_id' => $cart_id, 'cart_token' => $request_data['cart_token'] );			
			$ret_data['data'] = array('error' => 0, 'message' => 'Error in adding cart item order', 'cart_data' => $ret_cart_data );

		}else{
			
			$ret_data['data'] = array('error' => 1, 'message' => 'Error in adding item to your cart');
		}		

		return $ret_data;
	}

	function fillCartItem( $cart_id = null,  $request_data = null ){

		if( !is_null( $cart_id ) && !is_null(  $request_data ) ){

			global $wpdb;
			$ret_data = array();
			$table = $wpdb->prefix.'awr_cart_order_item';

			$cart_item_data	= array( 'date_time_created' => date("Y-m-d h:i:s"), 'product_id' => $request_data['product_id'], 'product_quantity' => $request_data['product_quantity'], 'cart_id' => $cart_id );
			$new_cart_item	= $wpdb->insert( $table, $cart_item_data);
			$cart_item_id	= $wpdb->insert_id;

			$ret_data['data'] = array('error' => 0, 'message' => '', 'cart_item_id' => $cart_item_id );

		}else{

			$ret_data['data'] = array('error' => 1, 'message' => 'Error in adding cart item order');
		}

		return $ret_data;
		
	}

	function getProduct( $product_id = 0 ){
		$ret_data = array();

		if( absint( $product_id ) > 0 ){

			$product = get_post( $product_id );		

			if( count( (array) $product ) > 0 ){

				$ret_data['data'] = array('error' => 0, 'message' => 'Products Exists');

			}else{	

				$ret_data['data'] = array('error' => 1, 'message' => 'Error. Product does not exists.');
			}

		}else{

			$ret_data['data'] = array('error' => 1, 'message' => 'Error. Product does\nt exists.');

		}

		return $ret_data;

	}
}