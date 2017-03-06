<?php            
    /*$images = get_field('photos');
    
    if( $images ){
        $thumbPrev = '<img id="zoomImage" src="'. $images[0]['image']['sizes']['large'] .'" data-zoom-image="'. $images[0]['image']['sizes']['large'] .'">';
        $thumbPage = '';
        $count = 1;
        foreach ($images as $image) {
            if( $count == 1 ){
                $thumbPage .= '

                    <a href="#" data-preview="'.$image['image']['sizes']['large'].'" class="active" data-image="'.$image['image']['sizes']['large'].'" data-zoom-image="'.$image['image']['sizes']['large'].'">
                        <img src="'.$image['image']['sizes']['thumbnail'].'" >
                    </a>
~
                ';
            }
            else{
                $thumbPage .= '

                    <a href="#" data-preview="'.$image['image']['sizes']['large'].'" data-image="'.$image['image']['sizes']['large'].'" data-zoom-image="'.$image['image']['sizes']['large'].'">
                        <img src="'.$image['image']['sizes']['thumbnail'].'" >
                    </a>

                ';
            }
            $count++;
        }
    }
    else{
        $thumbPrev = '<img src="'. get_template_directory_uri() .'/images/no-image.jpg">';
        $thumbPage = '

            <a href="#" class="active">
                <img src="'. get_template_directory_uri() .'/images/no-image.jpg">
            </a>

            <a href="#">
                <img src="'. get_template_directory_uri() .'/images/no-image.jpg" >
            </a>

        ';

    }*/

?>

<div class="preview-thumb">
    <?php //print_r($product_data['product_thumb']);?>
    <?php if( $product_data['product_thumb'] != null ):?>
        <img src="<?php _e( $product_data['product_thumb']['medium'] );?>" id="zoomImage" data-zoom-image="<?php _e( $product_data['product_thumb']['large'] );?>">
    <?php endif;?>
    <?php //echo $thumbPrev;?>
</div>
<div class="thumb" id="single-product-thumb">
    <?php echo $thumbPage; ?>
</div>