<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (is_home()) ? bloginfo('title') : wp_title('|', true, 'right') . bloginfo('title'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,700i" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body>
    
    <div id="wrapper">

        <div id="check-out-header">
            <div class="container">
                
                <div class="row">

                    <div class="col-sm-4">
                        <div id="logoTop">
                            <a href="<?php echo bloginfo('url'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-black-v2.svg" alt="ARCTIC wire, rope & supply">
                                <?php //theme_prefix_the_custom_logo(); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        
                        <div id="checkout">
                            
                            Checkout <span>(<span>2 items</span>)</span>
                            
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        
                        <div id="secure-checkout">
                            
                            secure checkout <i class="icon-sprite icon-lock"></i>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div><!-- end container -->
        </div><!-- end check-out-header -->