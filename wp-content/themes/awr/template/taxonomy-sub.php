

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
                                <span class="input-group-addon" id="category-search">
                                    <i class="icon-sprite icon-search-dark"></i>
                                    <i class="icon-sprite icon-close-rounded"></i>
                                </span>
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
    		$taxonomy_name = get_query_var("taxonomy");
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
                        $child_term_img = z_taxonomy_image_url($termchildren,'thumbnail');
                    }
                    
                    if( $child_term_img == '' || empty($child_term_img)){
                        $child_term_img = get_template_directory_uri().'/images/no-image.jpg';
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