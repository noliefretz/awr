<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div id="single-product">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                                <?php

                                    $terms = get_categories();

                                    foreach ($terms as $term) {
                                        $tmpTerm = $term;
                                    }
                                    
                                    $tmpCrumbs = array();

                                    while( $tmpTerm->parent > 0 ){
                                        $tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
                                        $crumb = '<li><a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . ' <i class="icon-sprite icon-orange-arrow"></i></a></li>';
                                        array_push($tmpCrumbs, $crumb);
                                    }

                                    echo implode('', array_reverse($tmpCrumbs));
                                    echo '<li><a href="' . get_term_link($term, get_query_var('taxonomy')) . '">' . $term->name . '</a></li>';
                                    echo '<li><span>'.get_the_title().'</span></li>';

                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="post" class="bread-search">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="find products..." aria-describedby="category-search">
                                <span class="input-group-addon" id="category-search"><i class="icon-sprite icon-search-dark"></i></span>
                            </div> 
                        </form>
                    </div>
                </div>
                
                <div id="single-product-view">
                    
                    <div class="product-name"><h2><?php the_title(); ?> <span>AWR # <?php the_field('product_code_awr'); ?> &#8226; MFR # <?php the_field('product_code_mfr'); ?></span></h2></div>
                    
                    <div class="row">
                        <div class="col-sm-4 col-xs-6 photos">

                        	<?php
                        		$images = get_field('photos');
                                
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
                                    $thumbPage .= '

                                        <a href="#" class="active">
                                            <img src="'. get_template_directory_uri() .'/images/no-image.jpg">
                                        </a>

                                        <a href="#">
                                            <img src="'. get_template_directory_uri() .'/images/no-image.jpg" >
                                        </a>

                                    ';

                                }
                            
                        	?>
                            
                            <div class="preview-thumb">
                                <?php echo $thumbPrev; ?>
                            </div>
                            <div class="thumb" id="single-product-thumb">
                            	<?php echo $thumbPage; ?>
                            </div>
                            
                        </div><!-- end photos -->
                        <div class="col-sm-4 col-xs-12 desc">
                            
                            <div class="head">
                                <strong>IN STOCK</strong>
                                <p>Order in the next 3h 23m to <span>ship by 12/15</span></p>
                            </div>
                            <div class="data">
                                <strong>PRODUCT HIGHLIGHTS</strong>
                                <ul>
                                    <?php

                                        $rows = get_field('product_highlights');
                                        if( $rows ){
                                            
                                            foreach($rows as $row){
                                                echo '<li>'.$row['value'].'</li>';
                                            }
                                            
                                        }

                                    ?>
                                </ul>
                            </div><!-- end data -->
                            <div class="data last">
                                <strong>MODEL</strong>
                                <form>
                                    <select name="model" class="form-control">
                                        <?php
                                            
                                            $rows = get_field('product_model');
                                            foreach($rows as $row){
                                                echo '<option value="'.$row['model'].'">'.$row['model'].'</option>';
                                            }

                                        ?>
                                    </select>
                                </form>
                            </div><!-- end data -->
                            
                        </div><!-- end desc -->
                        <div class="col-sm-4 col-xs-6 add-cart">
                            <div class="add-cart-wrap">
                               
                                <div class="payment">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            You Pay:
                                        </div>
                                        <div class="col-xs-7">
                                            <p class="total">
                                                
                                                <?php
                                                    $price = get_field('product_price');
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
                                                    $tax = get_field('tax');
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
                                
                                <form method="post">
                                    <label>Quantity:</label>
                                    <select name="model" class="form-control">
                                        <?php
                                        
                                            $stock = get_field('stock');
                                            for($x=1;$x<=$stock;$x++){
                                                echo '<option value="'.$x.'">'.$x.'</option>';
                                            }
                                        
                                        ?>
                                    </select>
                                    <!--<button class="btn btn-primary btn-custom">Add to Cart</button>-->
                                    <a href="<?php echo bloginfo('url').'/checkout'; ?>" class="btn btn-primary btn-custom">Add to Cart</a>
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
                        </div><!-- end add-cart -->
                    </div>
                    
                </div><!-- end single-product-view -->
                
            </div>
            
        </div><!-- end single product -->
        
        <div id="content">

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

                                    <?php the_content(); ?>

                                </div>
                                <div class="col-md-4 col-sm-5">
                                   
                                    <ul class="media-holder">
                                        <li>
                                            <a href="#">
                                                <div class="file-type"><i class="icon-sprite icon-pdf"></i></div>
                                                <div class="file-desc">
                                                    <div>
                                                        <strong>Product Info Sheet</strong>
                                                        <p>PDF 1.2MB</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="file-type"><i class="icon-sprite icon-pdf"></i></div>
                                                <div class="file-desc">
                                                    <div>
                                                        <strong>Spec Sheet from the Manufacturer</strong>
                                                        <p>PDF 466KB</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            
                        </div><!-- end tab-pannel -->
                        
                        <div role="tabpanel" class="tab-pane fade" id="specs">
                            
                            <div class="row">
                                <div class="col-sm-8">

                                    <?php the_field('specs'); ?>

                                </div>
                                <div class="col-sm-4">



                                </div>
                            </div>
                            
                        </div><!-- end tab-pannel -->
                        
                        <div role="tabpanel" class="tab-pane fade" id="accessories">
                            
                            <div class="row">
                                <div class="col-sm-8">

                                    <?php the_field('accessories'); ?>

                                </div>
                                <div class="col-sm-4">


                                </div>
                            </div>
                            
                        </div><!-- end tab-pannel -->
                        
                    </div>

                </div>
            </div><!-- end product-story -->            
            
        </div><!-- end content -->
        
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?> 

<?php get_footer(); ?>       
