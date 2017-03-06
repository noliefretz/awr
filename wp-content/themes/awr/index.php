<?php get_header(); ?>

        <div id="intro" class="homepage">
            <div class="overlay">
                <div class="container">

                    <h2>Your #1 Supplier of</h2>
                    <h3>Wire, Rope, Rigging &amp; Marine Products.</h3>
                    <p>Shop <strong class="stroke-one">100s</strong> of products online. Speedy shipping <strong class="stroke-two">worldwide</strong>.</p>
                    <i class="icon-sprite icon-drop-big"></i>

                </div><!-- end container -->    
            </div><!-- end overlay -->
        </div><!-- end banner -->

        <div id="category">
            <div class="container">

                <ul>
                    <li class="active"><a href="<?php echo bloginfo('url'); ?>">All Industries</a></li>
                    <?php wp_nav_menu( array( 'theme_location' => 'category-menu', 'container' => false,'items_wrap' => '%3$s' ) ); ?>
                    <li id="more-cat" class="visible-when-break"><a href="#">More +</a></li>
                </ul>

            </div><!-- end container -->
        </div><!-- end category -->

        <div id="categorySearch">
            <div id="categorySearchWrap" class="active">
                <div>
                    <div class="container">
                        <form method="post">
                            <div class="row">

                                <div class="col-sm-6 col-xs-12">
                                    <div class="productCount">
                                        127 <span>Products</span>
                                    </div>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="find products..." aria-describedby="category-search">
                                        <span class="input-group-addon" id="category-search">
                                            <i class="icon-sprite icon-search-dark"></i>
                                            <i class="icon-sprite icon-close-rounded"></i>
                                        </span>
                                        
                                    </div>
                                    <div class="clearfix"></div>
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
<!--
                <div class="container">
                    <button id="slide-search-btn"><i class="glyphicon glyphicon-arrow-up"></i></button>
                </div>
-->
            </div>
        </div><!-- end categorySearch -->

        <div id="categoryItem">
            <div class="container">
                
                <div class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane active fade in">

                        <div class="row">

                            <?php
                                $display = '';
                                $d_ctr = 0;
                                $args = array(
                                    'order' => 'ASC',
                                    'taxonomy' => 'awr-product-category',
                                    'hide_empty' => false,
                                );
                                $categories = get_terms($args);
                                foreach( $categories as $cat ){
                                    if( $d_ctr >= 10 ){
                                        break;
                                    }
                                    $cat_name = $cat->name;
                                    $cat_id = $cat->term_id;
                                    $cat_link = get_term_link($cat_id);

                                    /*if (function_exists('z_taxonomy_image_url')){
                                        $cat_img_url = z_taxonomy_image_url($cat_id,'thumbnail');
                                    }
                                    else{
                                        $cat_img_url = get_template_directory_uri.'/images/no-image.jpg';
                                    }*/
                                    $product_cat_img = get_term_meta( $cat_id, '_taxonomy_image', true );
                                    if( !empty( $product_cat_img) ){
                                        $cat_img_url = $product_cat_img;
                                    }else{
                                        $cat_img_url = get_template_directory_uri().'/images/no-image.jpg';
                                    }

                                    $display .= '
                                        
                                        <div class="col-md-5ths col-sm-3 col-xs-4 categoryItem">
                                            <a href="'.$cat_link.'">
                                                <img src="'.$cat_img_url.'" alt="">
                                                <p>'.$cat_name.'</p>
                                            </a>
                                        </div>

                                    ';
                                    $d_ctr ++;


                                }

                                echo $display;

                            ?>


                        </div>                    
                        
                    </div><!-- end tab-panel -->
                    
                </div>

            </div><!-- end container -->
        </div><!-- end categoryItem -->

        <div class="banner paraxify" id="banner-one">
            <div class="overlay">
                <div class="container">

                    <h2>We craft custom rigging for <br/>any job, big or small.</h2>
                    <p>We build custom slings, chokers and bridles made of wire rope, cable, nylon web, polyester round and grade 10 chain.</p>

                    <ul class="selections">
                        <li><a href="#">Learn More</a></li>
                        <li><a href="#">Request Quote</a></li>
                    </ul>

                </div><!-- end container -->
            </div><!-- end overlay -->
        </div><!-- end banner -->

        <div id="aboutTeam">
            <div>
                <div class="container">

                    <div class="row">

                        <div class="col-sm-3">

                            <div id="illustration">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/EricMcCallum.jpeg" alt="">    
                                <strong>Eric McCallum</strong>
                                <span>Founder &amp; CEO</span>
                            </div>

                        </div>
                        <div class="col-sm-9">
                            <div id="aboutTeamText">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="blockqoute">
                                            Since 1983 Arctic Wire Rope &amp; Supply has been leading the Pacific Northwest in innovative rigging products and solutions. 
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="stamp">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/leaf.svg" alt="">
                                        </div>
                                    </div>
                                </div>

                                <p>Our expert team is committed to delivering only the highest quality products and customer support. Give us a call or place your order online today, we think you'll be impressed!</p>

                                <ul class="selection">
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="#">About AWR</a></li>
                                </ul>    
                            </div>
                        </div>

                    </div>

                </div><!-- end container -->    
            </div>
        </div><!-- end aboutTeam -->

        <div class="banner paraxify" id="banner-two">
            <div class="overlay">
                <div class="container">

                    <h2>In-house proof testing <br/>&amp; certification.</h2>
                    <p>
                        We proof test and certify up to 2' 1/4" wire rope slings of any length up to 200,000lb on our calibrated
                        test machine. We can also test Nylon web slings and polyester round slings up to 60' long. Are your
                        current slings still good? We inspect and re-certify used slings too.
                    </p>

                    <ul class="selections">
                        <li><a href="#">Learn More</a></li>
                        <li><a href="#">Request Quote</a></li>
                    </ul>

                </div><!-- end container -->
            </div>
        </div><!-- end banner -->



<?php get_footer(); ?>