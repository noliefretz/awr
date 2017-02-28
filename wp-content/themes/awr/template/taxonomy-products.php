<?php get_header(); ?>

<div id="productGrid">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                        <?php
                            $term = get_term_by( "slug", get_query_var("term"), get_query_var("taxonomy") );

                            $tmpTerm = $term;
                            $tmpCrumbs = array();

                            while( $tmpTerm->parent > 0 ){
                                $tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
                                $crumb = '<li><a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . '</a></li>';
                                array_push($tmpCrumbs, $crumb);
                            }

                            echo implode('', array_reverse($tmpCrumbs));
                            echo '<li><span>' . $term->name . '</span>  <i class="icon-sprite icon-orange-arrow"></i></li>';

                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <form method="post" class="bread-search">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="find products..." aria-describedby="category-search">
                        <span class="input-group-addon" id="category-search">
                            <i class="icon-sprite icon-search-dark"></i>
                            <i class="icon-sprite icon-close-rounded"></i>
                        </span>
                    </div> 
                </form>
            </div>
        </div>
        
        
        <div id="productGridCon">        
            <div class="row">
                <div class="col-sm-4 col-md-3" id="offcanvas">
                    
                    <div id="sidebar">
                       
                        <button class="btn btn-primary" id="closeOffCanvas"><i class="glyphicon glyphicon-remove"></i> Close</button>
                        <div class="head">Narrow Results</div>
                        
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default panel-custom">
                                <div class="panel-heading" role="tab" id="brands">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-target="#collapseOne" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Brands</strong> <i class="icon-sprite icon-drop-arrow-darker"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseOne">
                                    <div class="panel-body">
                                       <form>
                                           
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="search brands..." aria-describedby="brand-search">
                                                <span class="input-group-addon" id="brand-search"><i class="icon-sprite icon-search-dark"></i></span>
                                            </div>
                                            
                                            <div id="checkbox-group" class="scrollable">
                                                <ul>
                                                    <?php
                                                    
                                                        $brands = get_terms(array(
                                                            'taxonomy' => 'brand',
                                                            'hide_empty' => false
                                                        ));
                                                    
                                                        foreach($brands as $brand){
                                                            echo '
                                                                <li>
                                                                    <input type="checkbox" name="" id="'.$brand->name.'">
                                                                    <label for="'.$brand->name.'">'.$brand->name.' ('.$brand->count.')</label>
                                                                </li>
                                                            ';
                                                        }    
                                                    
                                                    ?>

                                                </ul>
                                            </div>
                                           
                                       </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-custom">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <strong>Price</strong> <i class="icon-sprite icon-drop-arrow-darker"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        
                                        <form method="post">
                                            <label>Enter a price range:</label>
                                            <div class="input-group reverse range-from">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="input-group reverse range-to">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control">
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                            
                                            <button type="submit" class="btn btn-primary btn-custom-filter btn-disabled" disabled>Filter</button>
                                            <button type="submit" class="btn btn-primary btn-custom-reset btn-disabled" disabled>Reset</button>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-custom">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseThree" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>Holding Power</strong> <i class="icon-sprite icon-drop-arrow-darker"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        
                                        <form method="post">
                                            <label>Enter a holding power range:</label>
                                            <div class="input-group range-from">
                                                <input type="text" class="form-control" placeholder="0">
                                                <span class="input-group-addon">lbs</span>
                                            </div>
                                            <div class="input-group range-to">
                                                <input type="text" class="form-control" placeholder="500,000">
                                                <span class="input-group-addon">lbs</span>
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                            
                                            <button type="submit" class="btn btn-primary btn-custom-filter btn-disabled" disabled>Filter</button>
                                            <button type="submit" class="btn btn-primary btn-custom-reset btn-disabled" disabled>Reset</button>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-custom">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseFour" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <strong>Weight</strong> <i class="icon-sprite icon-drop-arrow-darker"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseFour">
                                    <div class="panel-body">
                                        
                                        <form method="post">
                                            <label>Enter a weight range:</label>
                                            <div class="input-group range-from">
                                                <input type="text" class="form-control" placeholder="0">
                                                <span class="input-group-addon">lbs</span>
                                            </div>
                                            <div class="input-group range-to">
                                                <input type="text" class="form-control" placeholder="10,000">
                                                <span class="input-group-addon">lbs</span>
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                            
                                            <button type="submit" class="btn btn-primary btn-custom-filter btn-disabled" disabled>Filter</button>
                                            <button type="submit" class="btn btn-primary btn-custom-reset btn-disabled" disabled>Reset</button>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-custom">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseFive" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <strong>Material</strong> <i class="icon-sprite icon-drop-arrow-darker"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapseFive">
                                    <div class="panel-body">
                                        
                                        <form method="post">
                                            
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="search materials..." aria-describedby="brand-search">
                                                <span class="input-group-addon" id="brand-search"><i class="icon-sprite icon-search-dark"></i></span>
                                            </div>
                                            
                                            <div id="checkbox-group">
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" name="" id="material-checkbox01">
                                                        <label for="material-checkbox01">Galvanized</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="" id="material-checkbox02">
                                                        <label for="material-checkbox02">Cast</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="" id="material-checkbox03">
                                                        <label for="material-checkbox03">Stainless</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="col-sm-8 col-md-9">
                    
                    <div id="itemGrid">
                      
                        <button type="button" class="btn btn-primary narrow-results no-touch"><i class="glyphicon glyphicon-list-alt"></i> Narrow Results</button>
                       
                        <div class="head">
                            <ul>
                                <li><strong><?php echo $term->name; ?></strong> 1-6 of 6</li>
                                <li>
                                    <form method="post" class="form-inline">
                                        <div class="form-group">
                                            <label for="perpage">Display </label>
                                            <select name="perpage" id="perpage" class="form-control">
                                                <option>24 per page</option>
                                            </select>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <?php

                            $advertisement = '                                            
                                <div class="items-add">
                                    <div class="row">
                                        <div class="col-xs-3 left">
                                            <span>
                                                Expert
                                                Customer
                                                Service
                                            </span>
                                        </div>
                                        <div class="col-xs-9 right">

                                            <div class="cs-info">
                                                <div id="cs-user">
                                                    <div><img src="'.get_template_directory_uri().'/images/philip-w.jpg" alt=""></div>
                                                    <strong>Philip W.</strong>
                                                    <p>Product Specalist</p>
                                                    <a href="#">Our Team <i class="icon-sprite icon-arrow-cirle-right-blue"></i></a>
                                                </div>
                                                <div id="cs-contact">
                                                    <span class="strong">GET ADVICE:</span>
                                                    <span><i class="icon-sprite icon-phone"></i> <strong>(800) 478-0707</strong></span>
                                                    <span class="sched">M-F 10am-6pm PST</span>
                                                </div>
                                                <div id="cs-contact-us">
                                                    <div>
                                                        <a href="#"> Contact Us</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- end items-add -->
                            ';

                            $beforeWrap = '<div class="items">';
                            $beforeWrapBreak = '<div class="items break">';
                            $beforeWrapBreakNoBorder = '<div class="items break no-border">';
                            $afterWrap = '</div>';

                            $displayArray = array();                        
                            $this_category_id = $term->term_id;
                            
                            if ( get_query_var('paged') ) {
                                $paged = get_query_var('paged');
                            } elseif ( get_query_var('page') ) { 
                                $paged = get_query_var('page');
                            } else {
                                $paged = 1;
                            }

                        	$args = array(
                                'post_type' => 'post',
                        		'post_status' => 'publish',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'ignore_sticky_posts' => true,
                        		'tax_query' => array(
                        			array(
                        				'taxonomy' => get_query_var("taxonomy"),
                        				'field' => 'id',
                        				'terms' => $this_category_id
                        			)
                        		)
                        	);

                        	$display = '';
                        	$counter = 0;

                        	$the_query = new WP_Query( $args );

                            modify_taxonomy_query($the_query);

                        	if( $the_query->have_posts() ){
                        		while( $the_query->have_posts() ){
                        			$the_query->the_post();
                                    
                                    // get brand
                                    $term_list = wp_get_post_terms(get_the_ID(), 'brand', array("fields" => "all"));
                                    $term_list = $term_list[0];
                                    
                                    // get model from custom field
                        			$models = get_field('product_model');
                                    if( $models ){
                                        foreach($models as $model){
                                            $modelText .= '<option value="'.$model['model'].'">'.$model['model'].'</option>';
                                        }
                                    }
                                    
                                    // get price from custom field
                                    $price = get_field('product_price');
                                    if( strpos($price, '.') !== false ){
                                        $priceText = explode('.',$price);
                                        $priceText = '<sup class="currency">$</sup><strong>'.$priceText[0].'</strong><sup class="ext">.'.$priceText[1].'</sup>';
                                    }
                                    else{
                                        $priceText = '<sup class="currency">$</sup><strong>'.$price.'</strong><sup class="ext">.00</sup>';
                                    }
                                    
                                    // check if best seller
                                    $best_seller = get_field('best_seller');
                                    if( $best_seller ){
                                        $best_seller_text = '<i class="icon-sprite icon-best-seller"></i>';
                                    }
                                    else{
                                        $best_seller_text = '';
                                    }

                                    // get image value
                                    $images = get_field('photos' ); // get all the rows
                                    if( $images ){
                                        $first_row = $images[0]; // get the first row
                                        $first_row_image = $first_row['image' ]; // get first row image value
                                        $thumbname = $first_row_image['name']; // get first row image name value

                                        $image = wp_get_attachment_image_src( $first_row_image['id'], 'thumbnail' );
                                        $thumb = $image[0];
                                        
                                    }
                                    else{
                                        $thumb = get_template_directory_uri().'/images/no-image.jpg';
                                        $thumbname = 'No Image';
                                    }
                                    
                                    
                                    if( $best_seller_text == '' || empty($best_seller_text) ){

                                        $display = '
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="thumb">
                                                        <a href="'.get_the_permalink().'">
                                                            <img src="'.$thumb.'" alt="'.$thumbname.'">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">

                                                    <div class="desc">

                                                        <div class="head">
                                                            <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a> '. $best_seller_text .'</h3>
                                                            <h4>AWR # '.get_field('product_code_awr').'  |  MFR # '.get_field('product_code_mfr').'</h4>
                                                            <p>by '.$term_list->name.'</p>
                                                        </div>

                                                        <p>'.trim_excerpt(get_the_excerpt()).'... <a href="'.get_the_permalink().'">[read more]</a></p>

                                                    </div>

                                                </div>
                                                <div class="col-xs-3">

                                                    <div class="other-info">
                                                        <div class="price">
                                                            '.$priceText.'
                                                            <div class="shipping-info">'.get_field('shipping_availability').'</div>
                                                        </div>  

                                                        <form method="post">

                                                            <label for="model">Model</label>
                                                            <select name="model" class="form-control">
                                                                '.$modelText.'
                                                            </select>

                                                            <div class="custom-btn-group">
                                                                <div class="count">
                                                                    <input type="text" value="1" maxlength="2"/>
                                                                </div>
                                                                <button>Add To Cart</button>
                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>
                                            </div>

                                        ';

                                        array_push($displayArray, $display);

                                    }
                                    else{

                                        $display = '
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="thumb">
                                                        <a href="'.get_the_permalink().'">
                                                            <img src="'.$thumb.'" alt="'.$thumbname.'">
                                                        </a>
                                                    </div>    
                                                </div>
                                                <div class="col-xs-6">

                                                    <div class="desc">

                                                        <div class="head">
                                                            <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a> '. $best_seller_text .'</h3>
                                                            <h4>AWR # '.get_field('product_code_awr').'  |  MFR # '.get_field('product_code_mfr').'</h4>
                                                            <p>by '.$term_list->name.'</p>
                                                        </div>

                                                        <p>'.trim_excerpt(get_the_excerpt()).'... <a href="'.get_the_permalink().'">[read more]</a></p>

                                                    </div>

                                                </div>
                                                <div class="col-xs-3">

                                                    <div class="other-info">
                                                        <div class="price">
                                                            '.$priceText.'
                                                            <div class="shipping-info">'.get_field('shipping_availability').'</div>
                                                        </div> 

                                                        <form method="post">

                                                            <label for="model">Model</label>
                                                            <select name="model" class="form-control">
                                                                '.$modelText.'
                                                            </select>

                                                            <div class="custom-btn-group">
                                                                <div class="count">
                                                                    <input type="text" value="1" maxlength="2"/>
                                                                </div>
                                                                <button>Add To Cart</button>
                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>
                                            </div>

                                        ';

                                        array_unshift($displayArray, $display);

                                    } 

                        		}
                        	}
                            else{
                                echo '<div class="no-product">No Product available</div>';
                            }

                        	//echo $display;

                            foreach ($displayArray as $output) {
                                $counter++;
                                if( $counter == 3 ){
                                    echo '
                                        '.$beforeWrapBreakNoBorder.'
                                        '.$output.'
                                        '.$afterWrap.'
                                        '.$advertisement.'
                                    ';
                                }
                                elseif( $counter == 6 ){
                                    echo '
                                        '.$beforeWrapBreak.'
                                        '.$output.'
                                        '.$afterWrap.'
                                    ';
                                    $counter = 0;
                                }
                                else{
                                    echo '
                                        '.$beforeWrap.'
                                        '.$output.'
                                        '.$afterWrap.'
                                    ';
                                }
                            }

                        ?>
                        
                        <div class="foot">
                            
                            <div class="row">
                                <div class="col-sm-5">

                                    <?php 
                                        if (function_exists("pagination")) {
                                            $pagination = pagination($the_query->max_num_pages);
                                        }
                                        
                                        echo $pagination['pagination'];

                                    ?>
                                    
                                    <!-- <ul class="pagination">
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="dotted"><span>...</span></li>
                                        <li><a href="#">10</a></li>
                                        <li><a href="#">11</a></li>
                                        <li><a href="#">12</a></li>
                                    </ul> -->
                                    
                                </div>
                                <div class="col-sm-7">

                                    <ul class="pagination2">
                                        <?php echo $pagination['page_of']; ?>
                                        <li><a href="<?php echo bloginfo('url') .'/'. $term->slug; ?>">back to top</a></li>
                                        <li>
                                            <label>go to page</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="" maxlength="3">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-disabled" type="button" disabled>Go</button>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div><!-- end itemGrid -->
                    
                </div>
            </div>
        </div><!-- end productGridCon -->
        
        
    </div><!-- end container -->
</div><!-- end productGrid -->

<div id="customerService" class="marine-anchors">
    <div id="cs-con">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-8 col-xs-7">
                    
                    <h2>Marine Anchors</h2>

                    <h3>Arctic Wire Rope &amp; Supply is the leading distributor of recreational &amp; commercial marine anchors and stud link anchor chain in the Pacific Northwest, Alaska and Hawaii markets.</h3>

                    <p>We carry a wide assortment of styles, sizes and brands of marine anchors, including bruce styles claw anchors, Danforth style anchors and stockless anchors rangings from 5lbs to 3000lbs.</p>
                    
                </div>
                <div class="col-sm-4 col-xs-5">
                    
                    <div id="anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/anchor-illustration.svg" alt=""></div>
                    
                </div>
            </div>
            
        </div><!-- end contianer -->
    </div><!-- end cs-con -->
</div><!-- end costumerService -->   

<?php get_footer(); ?>