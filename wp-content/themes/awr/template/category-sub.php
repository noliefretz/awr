<?php get_header(); ?>

<div id="intro" class="industryCat">
    <div class="overlay">
        <div class="container">

            <h2>Commercial Fishing &amp; Marine Products</h2>
            <h3>Shop our <strong class="stroke-three">commercial fishing</strong> products online. Speedy shipping <strong class="stroke-two">worldwide</strong>.</h3>

        </div><!-- end container -->    
    </div><!-- end overlay -->
</div><!-- end banner -->

<div id="categorySearch">
    <div id="categorySearchWrap" class="active">
        <div>
            <div class="container">
                <form method="post">
                    <div class="row">

                        <div class="col-sm-6 col-xs-12">
                            <div class="productCount">
                                74 <span>Products</span>
                            </div>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="find products..." aria-describedby="category-search">
                                <span class="input-group-addon" id="category-search"><i class="icon-sprite icon-search-dark"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <select class="form-control" name="brands">
                                    <option>All Brands</option>
                                    <?php
                                        $brands = get_terms(array(
                                            'taxonomy' => 'brand',
                                            'hide_empty' => false
                                        ));

                                        foreach( $brands as $brand ){
                                            echo '
                                                <option value="'.$brand->slug.'">'.$brand->name.'</option>
                                            ';
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <select class="form-control" name="prices">
                                    <option>All Prices</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>  
            </div><!-- end container -->          
        </div>
    </div>
</div><!-- end categorySearch -->

<div id="categoryItem" class="forCategory">
    <div class="container">
        
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

    	<?php
    		$term_id = $term->term_id;
    		$taxonomy_name = 'category';
    		$termchildrens = get_term_children( $term_id, $taxonomy_name );
    		$termchildrens = array_reverse($termchildrens);
    		$counter = 0;
    		$before_wrap = '<div class="row">';
    		$after_wrap = '</div>';
    		//$display .= $before_wrap;
            $display = '';
    		$item_per_row = 5;
            if( count($termchildrens) > 0 ){

                foreach ($termchildrens as $termchildren) {
                    $counter++;
                    $term = get_term_by('id', $termchildren, $taxonomy_name);
                    $term_link = get_term_link($termchildren, $taxonomy_name);
                    if (function_exists('z_taxonomy_image_url')){
                        $child_term_img = z_taxonomy_image_url($termchildren);
                    }

//                    if( $counter == ($item_per_row + 1) ){
//                        $counter = 0;
//                        $display .= '
//                            '.$after_wrap. $before_wrap.'
//                            <div class="col-md-5ths col-sm-3 col-xs-4">
//                                <a href="'.$term_link.'">
//                                    <img src="'.$child_term_img.'" alt="">
//                                    <p>'.$term->name.'</p>
//                                </a>
//                            </div>
//                        ';
//                    }
//                    else{
                        $display .= '
                            <div class="col-md-5ths col-sm-3 col-xs-4 categoryItem">
                                <a href="'.$term_link.'">
                                    <img src="'.$child_term_img.'" alt="">
                                    <p>'.$term->name.'</p>
                                </a>
                            </div>
                        ';
//                    }
                }

            }
            else{
                echo '<div class="no-data">No data found.</div>';
            }
    		
            echo $before_wrap;
    		echo $display;
            echo $after_wrap;

    	?>

    </div><!-- end container -->
</div><!-- end categoryItem -->

<div id="customerService">
    <div id="cs-head">
        <div class="container">

            <div class="row">
                <div class="col-xs-3 left">
                    <span>
                        Expert<br/>
                        Customer<br/>
                        Service
                    </span>
                </div>
                <div class="col-xs-9 right">

                    <div class="row cs-info">
                        <div class="col-xs-4" id="cs-user">
                            <div><img src="<?php echo get_template_directory_uri(); ?>/images/philip-w.jpg" alt=""></div>
                            <strong>Philip W.</strong>
                            <p>Product Specalist</p>
                            <a href="#">Our Team <i class="icon-sprite icon-arrow-cirle-right-blue"></i></a>
                        </div>
                        <div class="col-xs-4" id="cs-contact">
                            <span class="strong">GET ADVICE:</span>
                            <span><i class="icon-sprite icon-phone"></i> <strong>(800) 478-0707</strong></span>
                            <span class="sched">M-F 10am-6pm PST</span>
                        </div>
                        <div class="col-xs-4">
                            <div id="cs-contact-us">
                                <a href="#"><i class="icon-sprite icon-mail"></i> Contact Us</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- end container -->                
    </div><!-- end cs-head -->
    <div id="cs-con">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-8">
                    
                    <h2>Commercial Fishing &amp; Marine Supply</h2>

                    <h3>Arctic Wire Rope &amp; Supply is the leading distributor of commercial fishing and marine supplies in the Pacific Northwest, Alaska and Hawaii markets.</h3>

                    <p>For the past 34 years our expert team has been helping businesses source the best wire, rope and rigging hardware for the most challenging jobs. Few environments are as demanding on equipment as the ocean and that is why fishermen from Seattle, Washington to Anchorage, Alaska trust Arctic Wire, Rope and Supply for outfitting their marine vessels.</p>
                    
                </div>
                <div class="col-sm-4">
                    
                    <div id="ship"><img src="<?php echo get_template_directory_uri(); ?>/images/ship.svg" alt=""></div>
                    
                </div>
            </div>
            
        </div><!-- end contianer -->
    </div><!-- end cs-con -->
</div><!-- end costumerService -->   

<?php get_footer(); ?>