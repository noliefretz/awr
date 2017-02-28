<?php /* Template Name: Checkout */ ?>

<?php get_header(); ?>


<div id="shopping-cart">
    <div class="container">
        
        <div id="shopping-cart-view">

            <div class="row">
                <div class="col-sm-8 item-on-cart">
                    
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2"><span>Shopping Cart</span></th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <tr class="item">
                                <td>
                                    <div class="thumb"><img src="<?php echo get_template_directory_uri(); ?>/images/single-product-01.png"></div>
                                </td>
                                <td>
                                    <div class="desc">
                                        <h2>Lewmar Claw Anchor (Galvanized)</h2>
                                        <div class="stock">In Stock</div>
                                        <div class="code first">AWR # LEW57910</div>
                                        <div class="code">MFR # 0057910</div>
                                        <div class="model">Model: 10kg/22lb</div>
                                        <a href="#">Delete</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="price">$107.02</div>
                                </td>
                                <td>
                                    <form method="post">
                                        <select name="model" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <div class="thumb"><img src="<?php echo get_template_directory_uri(); ?>/images/buoys.png"></div>
                                </td>
                                <td>
                                    <div class="desc">
                                        <h2>Mondo Norfloat Buoy</h2>
                                        <div class="stock">In Stock</div>
                                        <div class="code first">AWR # MONA101</div>
                                        <div class="code">MFR # A148A</div>
                                        <div class="model">Model: A-1</div>
                                        <a href="#">Delete</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="price">$38.12</div>
                                </td>
                                <td>
                                    <form method="post">
                                        <select name="model" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>    
                        </tbody>
                    </table>
                    
                    <div id="subTotal">
                        <strong>Subtotal (2 items): <span>$183.26</span></strong>
                    </div>                           
                    
                </div><!-- end photos -->

                <div class="col-sm-4 add-cart">
                    <div class="add-cart-wrap">
                      
                        <button id="closeCheckout"><i class="glyphicon glyphicon-remove"></i></button>
                       
                        <div class="payment">
                            <div class="row">
                                <div class="col-sm-5">
                                    Subtotal:
                                </div>
                                <div class="col-sm-7">
                                    <p class="total">$183.26</p>
                                    <p class="regular">w/ $0.00 sales tax</p>
                                </div>
                            </div>
                        </div><!-- end payment -->
                        
                        <form method="post">
                            <label>Shipping:</label>
                            <div class="input-group shipping">
                                <input type="text" class="form-control" placeholder="enter zip code">
                            </div>
                            <!--<button class="btn btn-primary btn-custom">Begin Checkout</button>-->
                            <a href="<?php echo bloginfo('url').'/checkout-details'; ?>" class="btn btn-primary btn-custom">Begin Checkout</a>
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


<?php get_footer('checkout'); ?>