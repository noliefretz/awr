<div id="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!--  showing breadcrumbs on product page hookable -->
                <?php do_action('load-breadcrumbs');?>
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
            <?php
                /* before_product_detail hookable */
                do_action('before_product_detail');
                /* product_detail hookable */
                do_action('product_detail');
            ?>                
        </div><!-- end single-product-view -->        
    </div>        
</div><!-- end single product -->    
<div id="content">
    <?php 
        /* product tabs hookable */                    
        do_action('load_product_tabs', $post );
    ?>
</div><!-- end content -->