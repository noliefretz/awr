<?php
/*	add to cart ajax function 	*/
$awrcart = new AWRCart;
add_action( 'wp_ajax_addToCart', array( $awrcart, 'addToCart') );
add_action( 'wp_ajax_nopriv_addToCart', array( $awrcart, 'addToCart') );

/*	end .add to cart ajax function 	*/