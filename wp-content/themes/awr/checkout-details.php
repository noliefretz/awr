<?php /* Template Name: Checkout-details */ ?>

<?php get_header('checkout'); ?>


        <div id="check-out">
            <div class="container">
                
                <div id="check-out-info">

                    <div class="row">
                       
                        <div class="col-sm-8 col-xs-7 check-out-details">       
                        
                            <div class="row">
                                
                                <form method="post">
                                   
                                    <div class="form-group">
                                        <label for="" class="col-md-4 col-sm-5 control-label">
                                            <span>1</span> Shipping address
                                        </label>
                                        <div class="col-md-8 col-sm-7">
                                            <input type="text" class="form-control" id="address1" placeholder="address 1">
                                            <input type="text" class="form-control" id="address2" placeholder="address 2">
                                            
                                            <div class="clearfix">
                                                <input type="text" class="form-control" id="zipCode" placeholder="zip code">
                                                <input type="text" class="form-control" id="city" placeholder="city">
                                                <select name="state" id="state" class="form-control">
                                                    <option value="sate">state</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" class="col-md-4 col-sm-5 control-label">
                                            <span>2</span> Payment method
                                        </label>
                                        <div class="col-md-8 col-sm-7">
                                           
                                            <input type="text" class="form-control" id="card-name" placeholder="name on card">
                                            
                                            <div class="clearfix">
                                                <input type="text" class="form-control" id="cardnumber" placeholder="card number">
                                                <input type="text" class="form-control" id="digitCode" placeholder="3 digit code" maxlength="3">
                                            </div>
                                            
                                            <div class="custom-checkbox address-match">
                                                <input type="checkbox" id="address-match" value="address-match">
                                                <label for="address-match">Card billing address matches shipping address</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group no-border">
                                       
                                        <label for="" class="col-xs-6 control-label">
                                            <span>3</span> Review Order &amp; Shipping
                                        </label>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <div id="review-order">
                                            <div class="head">
                                                <strong>Estimated delivery: Jan. 5, 2017</strong>
                                                <span>Items shipped from arcticwirerope.com</span>
                                            </div>
                                            <div class="body">
                                                 <div class="row">
                                                     
                                                     <div class="col-md-7 col-sm-12 col-sm-12 left">
                                                         
                                                         <div id="previewing-item">
                                                             
                                                             <div class="item">
                                                                 <div class="row">
                                                                     <div class="col-xs-6">
                                                                         <div class="thumb">
                                                                             <img src="<?php echo get_template_directory_uri(); ?>/images/checkou-01.png">
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-xs-6">
                                                                         
                                                                         <div class="details">
                                                                             <h2>Lewmar Claw Anchor (Galvanized)</h2>
                                                                             <div class="price">$107.02</div>
                                                                             <div class="code">AWR # LEW57910</div>
                                                                             <div class="quantity">Quantity: 1</div>
                                                                             <div class="model">Model: 10kg/22lb</div>
                                                                         </div><!-- end details -->
                                                                         
                                                                     </div>
                                                                 </div>
                                                             </div><!-- end item -->
                                                             
                                                             <div class="item">
                                                                 <div class="row">
                                                                     <div class="col-xs-6">
                                                                         <div class="thumb">
                                                                             <img src="<?php echo get_template_directory_uri(); ?>/images/checkou-02.png">
                                                                         </div>
                                                                     </div>
                                                                     <div class="col-xs-6">
                                                                         
                                                                         <div class="details">
                                                                             <h2>Mondo Norfloat Buoy</h2>
                                                                             <div class="price">$38.12</div>
                                                                             <div class="code">AWR # MONA101</div>
                                                                             <div class="quantity">Quantity: 1</div>
                                                                             <div class="model">Model: A-1</div>
                                                                         </div><!-- end details -->
                                                                         
                                                                     </div>
                                                                 </div>
                                                             </div><!-- end item -->
                                                             
                                                         </div>
                                                         
                                                     </div>
                                                     <div class="col-md-5 col-sm-12 col-xs-12 right">
                                                         
                                                         <div id="shipping-options">
                                                             
                                                            <div class="title">Select Your Shipping Option:</div>
                                                             
                                                            <form method="post">

                                                            <ul>
                                                                <li>
                                                                    <input type="radio" value="option1" name="shippingOption" id="shippingOption01" checked="checked">
                                                                    <label for="shippingOption01">
                                                                        <strong>5-7 business days</strong>
                                                                        $45.58 - Standard Shipping  
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="radio" value="option1" name="shippingOption" id="shippingOption02">
                                                                    <label for="shippingOption02">
                                                                        <strong>2-3 business days</strong>
                                                                        $88.02 - Two-Day Shipping
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="radio" value="option1" name="shippingOption" id="shippingOption03">
                                                                    <label for="shippingOption03">
                                                                        <strong>Next day</strong>
                                                                        $125.67 - One-Day Shipping
                                                                    </label>
                                                                </li>
                                                            </ul>

                                                            </form>
                                                             
                                                         </div>
                                                         
                                                     </div>
                                                     
                                                 </div> 
                                            </div>
                                        </div><!-- end review-group -->
                                        
                                    </div>
                                    
                                </form>
                                
                            </div>       
                            
                        </div><!-- end check-out-details -->

                        <div class="col-sm-4 col-xs-5 add-cart">
                            <div class="add-cart-wrap">
                                
                                <form method="post">
                                    <button class="btn btn-primary btn-custom btn-disabled" disabled>Place Order</button>
                                </form>
                                
                                <div id="order-summury">
                                    <strong>Order Summury</strong>
                                    <table>
                                        <tr>
                                            <td>items (2):</td>
                                            <td>$183.26</td>
                                        </tr>
                                        <tr>
                                            <td>shipping &amp; handling:</td>
                                            <td>$45.58</td>
                                        </tr>
                                        <tr>
                                            <td>sales tax:</td>
                                            <td>$0.00</td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div id="order-total">
                                    <table>
                                        <tr>
                                            <td><strong>Order total:</strong></td>
                                             <td><strong>$228.84</strong></td>
                                        </tr>
                                    </table>
                                </div>

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