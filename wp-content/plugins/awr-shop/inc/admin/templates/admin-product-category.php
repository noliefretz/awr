<!-- image uploader for product category -->
<div class="form-field term-meta-text-wrap">
	<?php 
    	wp_enqueue_media();
    	wp_nonce_field( basename( __FILE__ ), 'category_image_nonce' );

        if( isset( $_REQUEST['taxonomy'] ) && !empty( $_REQUEST['taxonomy'] ) ):

            if( $_REQUEST['taxonomy'] == 'awr-product-category'):
                $industry_sector = get_terms( 'awr-industry-sector', array('hide_empty' => false ) );
                //print_r($industry_sector);
                ?>
                <label for="taxonomy-image"><?php _e( 'Image', 'text_domain' ); ?></label>
                <select name="category_industry_sector" id="category_industry_sector">
                    <option value="0"> <?php _e( 'Select Industry Sector');?></option>
                    <?php 
                        foreach ( $industry_sector as $sector ) :?>
                            <option value="<?php _e( $sector->term_id ) ?>" <?php _e( $prodcat_indsect == $sector->term_id ? "selected='selected'" : "''" );?> ><?php _e( $sector->name ); ?></option>
                    <?php
                        endforeach;?>
                </select>

            <?php 
            endif;?>
        <?php 
        endif;?>


    <label for="taxonomy-image"><?php _e( 'Image', 'text_domain' ); ?></label>
    <input type="text" name="category_image" id="prodcat-url" value="<?php _e( $prodcat_image );?>" class="term-meta-text-field"/>
    <button id="prodcat-image" class="button button-primary" type="button" style="margin: 10px 10px 10px 0px;"> <?php _e('Upload/Select Product Category Image');?></button>
    <div id="prodcat-image-preview">
    	<?php if( !is_null( $prodcat_image ) ):?>

    		<img src="<?php _e( $prodcat_image );?>">

    	<?php endif;?>
    </div>
</div>
<!-- .end image uploader for product category -->