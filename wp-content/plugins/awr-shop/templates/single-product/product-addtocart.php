<div class="add-cart-wrap">   
    <div class="payment">
        <div class="row">
            <div class="col-xs-5">
                You Pay:
            </div>
            <div class="col-xs-7">
                <p class="total" id="awr-total">
                    
                    <?php
                        //$price = get_field('product_price');
                        $price = '';
                        if( strpos($price, '.') !== false ){
                            echo '$'.$price;
                        }
                        else{
                            echo '$'.$price.'.00';
                        }
                    ?>
                    
                </p>
                <p>
                    <?php
                        //$tax = get_field('tax');
                        $tax = '';
                        if($tax != "" || !empty($tax)){
                            echo 'w/ $'.$tax.' sales tax';
                        }
                        else{
                            echo '';
                        }
                    ?>
                </p>
            </div>
        </div>
    </div><!-- end payment -->
    
    <form method="post" name="add-to-cart" id="frm-addto-cart">
        <?php wp_nonce_field( 'addtocart_security_nonce', 'addtocart_security' );?>
        <input type="hidden" name="awr-currency" value="$" id="awr-currency">
        <input type="hidden" name="awr-total-hidden" value="" id="awr-total-hidden">
        <input type="hidden" name="awr-product-id" value="<?php _e( $post_id );?>" id="awr-product-id">
        <input type="hidden" name="awr-model-selected" value="" id="awr-model-selected">
        <?php if( $quantity > 0 ) :?>
            <label><?php _e( 'Quantity:' );?></label>
            <select name="model" class="form-control" id="awr-quantity">
                <?php for( $x=1; $x <= $quantity; $x++ ): ?>
                        <option value="<?php _e($x);?>"><?php _e($x);?></option>
                <?php endfor;?>
            </select>
            <!--<button class="btn btn-primary btn-custom">Add to Cart</button>-->
            <a href="<?php echo bloginfo('url').'/checkout'; ?>" class="btn btn-primary btn-custom" id="add-to-cart"> Add to Cart </a>
        <?php else:?>

        <?php 
            _e(' This Product is Out of Stock ','<p>');
            endif;?>        
    </form>
</div>
<div class="add-cart-wrap end">
    <div class="ecs">
        <div><img src="<?php echo get_template_directory_uri(); ?>/images/philip-w.jpg"></div>
        <span class="top">Expert Customer Serivce</span>
        <span class="mid">(800) 478-0707</span>
        <span class="bot">M-F 10am-6pm PST</span>
    </div>
</div>