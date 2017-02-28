<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (is_home()) ? bloginfo('title') : wp_title('|', true, 'right') . bloginfo('title'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,700i" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head();?>
</head>

<body>
    
    <div id="wrapper">
        <div id="offcanvasCon">
            <div id="header">

                <div id="headerTop">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-6 col-xs-6 custom-mobile-hide">

                                <ul id="topleft">
                                    <li><i class="icon-sprite icon-map"></i> 6407 Arctic Spur Rd. Anchorage, AK 99518</li>
                                    <li><i class="icon-sprite icon-truck"></i> Speedy <span>worldwide</span> shipping.</li>
                                </ul>

                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-6 custom-mobile-full">

                                <ul id="topright">
                                    <li id="loginDiv">
                                        <!--<input type="checkbox" id="dropLogin" />-->
                                        <a href="#" class="no-touch"><i class="icon-sprite icon-user"></i> Login</a>
                                        <div class="dropLoginWrap">
                                            <div class="container">
                                                <h2>Member Login</h2>
                                                <p>Please sign in below: </p>
                                                <form method="post" class="form-inline">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Log in</button>
                                                </form>
                                                <a href="#">forgot password?</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="searchDiv">
                                        <!--<input type="checkbox" id="dropSearch" />-->
                                        <a href="#" no-touch><i class="icon-sprite icon-search-light"></i> Search</a>
                                        <form method="post">

                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="search..." aria-describedby="search">
                                                <span class="input-group-addon" id="search">
                                                    <i class="icon-sprite icon-search-light"></i>
                                                    <i class="icon-sprite icon-close-rounded"></i>
                                                </span>
                                            </div>

                                        </form>
                                    </li>
                                    <li id="contactDiv">
                                        <!--<input type="checkbox" id="dropContact" />-->
                                        <a href="#" no-touch><i class="icon-sprite icon-phone-inverted-small"></i> Contact</a>
                                        <div class="dropContactInfo">
                                            <ul>
                                                <li><i class="icon-sprite icon-phone-inverted"></i> <strong>(800) 478-0707</strong></li>
                                                <li>(907) 562-0707</li>
                                                <!--<li><strong>Open M-F 10am-6pm PST</strong></li>-->
                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div><!-- end container -->
                </div><!-- end headerTop -->
                <div id="headerBot">
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
                            <div class="col-sm-8">
                                <div id="infoTop" class="hide-on-mobile">
                                    <ul>
                                        <li><i class="icon-sprite icon-phone"></i><strong>(800) 478-0707</strong></li>
                                        <li>(907) 562-0707</li>
                                        <li><strong>Open M-F 10am-6pm PST</strong></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div><!-- end container -->
                </div><!-- end headerBot -->

            </div><!-- end header -->

            <div class="navbar navbar-default navbar-orange" id="nav">
                <div class="container">
                    <div id="bs-example-navbar-collapse-1">
                        <input type="checkbox" id="topDrop" />
                        <label for="topDrop" type="button" class="navbar-toggle hamburger">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </label>

                        <ul class="hide-on-desktop">
                           <li id="cart"><a href="#"><i class="icon-sprite icon-cart"></i> <i id="cartCount">0</i></a></li> 
                        </ul>

                        <ul class="navbar-nav-custom">
                            <?php wp_nav_menu( array( 'theme_location' => 'mainr-menu','container' => false,'items_wrap' => '%3$s' ) ); ?>
                            <li id="more-term"><a href="#">More +</a></li>
                            <li id="cart"><a href="#"><i class="icon-sprite icon-cart"></i> <i id="cartCount">0</i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>