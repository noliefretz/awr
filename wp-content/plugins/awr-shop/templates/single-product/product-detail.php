<?php if( isset( $product_data['_product_quantity'] )){$prod_quantity = $product_data['_product_quantity'];}else{$prod_quantity = 0;}?>
<div class="row">
    <div class="col-sm-4 col-xs-6 photos">    	
        <?php 
            /* load_product_thumbnail hookable */
            do_action('load_product_thumbnail', 'all', $post->ID );
        ?>
    </div><!-- end photos -->
    <div class="col-sm-4 col-xs-12 desc">
        
        <div class="head">
            <strong> <?php _e( $prod_quantity > 0 ? 'IN STOCK' : 'OUT OF STOCK');?> </strong>
            <p>  <?php _e( $prod_quantity > 0 ? 'Order in the next 3h 23m to <span>ship by 12/15</span>' : '');?> </p>
        </div>

        <?php if( count( $product_data['_product_highlights'] ) > 0 ):?>
        <div class="data">
            <strong><?php _e( 'PRODUCT HIGHLIGHTS' ); ?></strong>               
            <?php if( is_array( $product_data['_product_highlights'] ) && isset( $product_data['_product_highlights'] ) && count( $product_data['_product_highlights'] ) > 0 ):?>
                <ul>
                    <?php foreach( $product_data['_product_highlights'] as $highlight ):?>
                        <li><?php _e( $highlight );?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div><!-- end data -->
        <?php endif;?>
        <div class="data last">
            <strong><?php _e('MODEL');?></strong>
            <form>            
                <select name="model" class="form-control" id="awr-model">                        
                    <?php foreach( $product_data['_product_models'] as $model ):?>
                          <option value="<?php _e( $model['price'] );?>"><?php _e( $model['name'] );?></option>
                    <?php endforeach;?>
                </select>
            </form>
        </div><!-- end data -->
        
    </div><!-- end desc -->
    <div class="col-sm-4 col-xs-6 add-cart">
        <?php 
            /* load_product_thumbnail hookable */            
            do_action('load_product_addtocart', $prod_quantity, $post->ID );
        ?>
    </div><!-- end add-cart -->
</div>