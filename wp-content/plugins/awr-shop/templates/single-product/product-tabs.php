<div id="category" class="single">
            <div class="container">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#overview" role="tab" data-toggle="tab">Overview</a></li>
                    <li><a href="#specs" role="tab" data-toggle="tab">Specs</a></li>
                    <li><a href="#accessories" role="tab" data-toggle="tab">Accessories</a></li>
                </ul>

            </div><!-- end container -->
        </div><!-- end category -->

        <div id="product-story">
            <div class="container">
                
                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane active fade in" id="overview">
                        
                        <div class="row">
                            <div class="col-md-8 col-sm-7">

                                <?php _e( ( $product_data['product_overview'] ) ); ?>

                            </div>
                            <div class="col-md-4 col-sm-5">
                                <?php if( is_array( $product_data['product_attachments'] ) && count($product_data['product_attachments']) > 0 ):
                                //print_r($product_data['product_attachments']);
                                ?>
                                    <ul class="media-holder">
                                        <?php foreach ($product_data['product_attachments'] as $attachment) :?>
                                        <li>
                                            <a href="<?php _e( $attachment['url'] );?>" target="_blank">
                                                <div class="file-type"><i class="icon-sprite icon-pdf"></i></div>
                                                <div class="file-desc">
                                                    <div>
                                                        <strong><?php _e( $attachment['name'] );?></strong>
                                                        <p>PDF 1.2MB</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>  
                                        <?php endforeach;?>                                      
                                    </ul>
                                <?php endif;?>
                            </div>
                        </div>
                        
                    </div><!-- end tab-pannel -->
                    
                    <div role="tabpanel" class="tab-pane fade" id="specs">
                        
                        <div class="row">
                            <div class="col-sm-8">

                                <?php //the_field('specs'); ?>

                            </div>
                            <div class="col-sm-4">



                            </div>
                        </div>
                        
                    </div><!-- end tab-pannel -->
                    
                    <div role="tabpanel" class="tab-pane fade" id="accessories">
                        
                        <div class="row">
                            <div class="col-sm-8">

                                <?php //the_field('accessories'); ?>

                            </div>
                            <div class="col-sm-4">


                            </div>
                        </div>
                        
                    </div><!-- end tab-pannel -->
                    
                </div>

            </div>
        </div><!-- end product-story -->  