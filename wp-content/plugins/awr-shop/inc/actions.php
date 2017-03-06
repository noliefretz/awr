<?php

function loadBreadcrumbs(){

	load_template(PLUGIN_DIR_PATH.'/templates/product-breadcrumb.php');

}
add_action('load-breadcrumbs', 'loadBreadcrumbs');

function beforeProductDetail(){
	global $post;
	$before_product_html ='';
	$before_product_html .= '<div class="product-name">';
	$before_product_html .= '<h2>'. $post->post_title ;
	$before_product_html .= '<span>AWR # '.esc_html( get_post_meta( $post->ID, '_product_code', true) );
	$before_product_html .= ' &#8226; MFR # '.esc_html( get_post_meta( $post->ID, '_manufacturing_code', true) ).'</span>';
	$before_product_html .= '</h2>';
	$before_product_html .= '</div>';
                    
    _e( $before_product_html);

}
add_action('before_product_detail', 'beforeProductDetail');

function productDetail() {
	global $post;
	$product_raw_data = get_post_meta( $post->ID );	
	foreach ($product_raw_data as $key => $value) {	

		if( $key == '_product_models' || $key == '_product_attachments' || $key == '_product_highlights' ){ 			
			$product_data[$key] = unserialize( get_post_meta( $post->ID, $key, true ) );	
		}else{
			$product_data[$key] = $value[0];
		}		
	}
	$product_data['product_thumb']  = get_the_post_thumbnail_url( $post->ID, 'full' );
	require_once( PLUGIN_DIR_PATH.'/templates/single-product/product-detail.php' );
}
add_action('product_detail', 'productDetail');


function productAddToCartForm( $product_quantity = 0, $post_id = null ){
	if($product_quantity > 0){
		$quantity = $product_quantity;
	}elseif( !is_null( $post_id ) && !empty( $post_id ) ){
		$quantity = absint( get_post_meta( $post_id, '_product_quantity', true) );
	}
	else{
		$quantity = 0;
	}
	require_once(PLUGIN_DIR_PATH.'/templates/single-product/product-addtocart.php');	
}

add_action('load_product_addtocart', 'productAddToCartForm', 10, 2);

function getProductImage( $size = null, $post_id = null){	
	
	if( !is_null( $size ) ){
		if( $size == 'all'){
			$product_data['product_thumb']['full'] 		= get_the_post_thumbnail_url( $post_id, 'full' );
			$product_data['product_thumb']['thumb'] 	= get_the_post_thumbnail_url( $post_id, 'thumb' );
			$product_data['product_thumb']['medium'] 	= get_the_post_thumbnail_url( $post_id, 'medium' );
			$product_data['product_thumb']['large'] 	= get_the_post_thumbnail_url( $post_id, 'large' );
			//$product_data['product_thumb']['prod_thumb']= get_the_post_thumbnail_url( $post_id, array('height' => 500, 'width' => 500 ) );
		}else{

			$product_data['product_thumb'][$size]		= get_the_post_thumbnail_url( $post_id, $size );
		}
	}else{
		$product_data['product_thumb'] = null;
	}
	require_once( PLUGIN_DIR_PATH.'/templates/single-product/product-thumbnail.php' );
}
add_action( 'load_product_thumbnail', 'getProductImage', 10, 2 );

function productTabs( $product = null ){

	if( !is_null( $product )){
		// getting all the attachments and overview
		$product_data['product_overview'] 	= esc_html( $product->post_content );		
		$product_data['product_attachments']= @unserialize( get_post_meta( $product->ID, '_product_attachments', true ) );
		require_once( PLUGIN_DIR_PATH.'/templates/single-product/product-tabs.php' );
	}else{
		_e('No Details for this Product');
	}
	
}

add_action( 'load_product_tabs', 'productTabs', 10, 2 );

function afterProductDetail(){


}
add_action('after_product_detail', 'afterProductDetail');