<?php

include('include/breadcrumbs.php');

function awr_enqueue_scripts(){
    
    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), false, true);
    wp_register_script('elevatezoom_script', get_template_directory_uri() . '/js/jquery.elevatezoom.js', array(), false, true);
    wp_register_script('bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
    wp_register_script('nicescroll_script', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
    wp_register_script('main_script', get_template_directory_uri() . '/js/app.js', array(), false, true);
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), false, true);
    wp_register_script('skrollr', get_template_directory_uri() . '/js/skrollr.js', array(), false, true);
    wp_register_script('paraxify', get_template_directory_uri() . '/js/paraxify.min.js', array(), false, true);
    //wp_register_script('customParallax', get_template_directory_uri() . '/js/customParallax.js', array(), false, true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('bootstrap_script');
    wp_enqueue_script('elevatezoom_script');
    wp_enqueue_script('nicescroll_script');
    wp_enqueue_script('paraxify');
    wp_enqueue_script('main_script');

    if( !is_front_page() || !is_home() ){

      wp_enqueue_script('customParallax');

    }    

}
function awr_register_menus() {
  register_nav_menus(
    array(
      'mainr-menu' => 'Main Menu',
      'category-menu' => 'Category Menu'
    )
  );
}

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

function is_subcategory( $cat_id = NULL ) {

    if ( !$cat_id )
        $cat_id = get_query_var( 'cat' );

    if ( $cat_id ) {

        $cat = get_category( $cat_id );
        if ( $cat->category_parent > 0 )
            return true;
    }

    return false;
}

//function product_post_types() {
//    $labels = array(
//        'name'               => 'Products',
//        'singular_name'      => 'Product',
//        'menu_name'          => 'Product',
//        'name_admin_bar'     => 'Product',
//        'add_new'            => 'Add New',
//        'add_new_item'       => 'Add New Product',
//        'new_item'           => 'New Product',
//        'edit_item'          => 'Edit Product',
//        'view_item'          => 'View Product',
//        'all_items'          => 'All Product',
//        'search_items'       => 'Search Product',
//        'parent_item_colon'  => 'Parent Products:',
//        'not_found'          => 'No products found.',
//        'not_found_in_trash' => 'No products found in Trash.'
//    );
//
//    $args = array( 
//        'hierarchical'       => true,
//        'public'             => true, 
//        'labels'             => $labels,
//        //'rewrite'            => array( 'slug' => 'product' ),
//    	'menu_icon'          => 'dashicons-cart',    
//        'taxonomies'         => array( 'post_tag', 'industry-sectors' ),
//        'has_archive'        => true,
//        'description'        => ''
//    );
//        register_post_type( 'product', $args );
//}

function product_category(){
   $labels = array(
       'name'               => 'Product Categories',
       'singular_name'      => 'Product Category',
       'search_items'       => 'Search Product Categories',
       'all_items'          => 'All Product Categories',
       'parent_item'        => 'Parent Product Category',
       'parent_item_colon'  => 'Parent Product Category:',
       'edit_item'          => 'Edit Product Category', 
       'update_item'        => 'Update Product Category',
       'add_new_item'       => 'Add New Product Category',
       'new_item_name'      => 'New Product Category Name',
       'menu_name'          => 'Product Category',
   );
   
   $args = array(
       'hierarchical'       => true,
       'labels'             => $labels,
       'show_ui'            => true,
       'show_admin_column'  => true,
       'query_var'          => true,
       'rewrite'            => array( 'slug' => 'product-category' ),
   );
   
   register_taxonomy('product-category','post', $args);
   
}
function industry_sector(){
   $labels = array(
       'name'               => 'Industry Sectors',
       'singular_name'      => 'Industry Sector',
       'search_items'       => 'Search Industry Sectors',
       'all_items'          => 'All Industry Sectors',
       'parent_item'        => 'Parent Industry Sector',
       'parent_item_colon'  => 'Parent Industry Sector:',
       'edit_item'          => 'Edit Industry Sector', 
       'update_item'        => 'Update Industry Sector',
       'add_new_item'       => 'Add New Industry Sector',
       'new_item_name'      => 'New Industry Sector Name',
       'menu_name'          => 'Industry Sector',
   );
   
   $args = array(
       'hierarchical'       => true,
       'labels'             => $labels,
       'show_ui'            => true,
       'show_admin_column'  => true,
       'query_var'          => true,
       'rewrite'            => array( 'slug' => 'industry-sector' ),
   );
   
   register_taxonomy('industry-sector','post', $args);
   
}
function product_brand(){
   $labels = array(
       'name'               => 'Product Brand',
       'singular_name'      => 'Product Brand',
       'search_items'       => 'Search Product Brand',
       'all_items'          => 'All Product Brand',
       'parent_item'        => 'Parent Product Brand',
       'parent_item_colon'  => 'Parent Product Brand:',
       'edit_item'          => 'Edit Product Brand', 
       'update_item'        => 'Update Product Brand',
       'add_new_item'       => 'Add New Product Brand',
       'new_item_name'      => 'New Industry Brand Name',
       'menu_name'          => 'Product Brand',
   );
   
   $args = array(
       'hierarchical'       => true,
       'labels'             => $labels,
       'show_ui'            => true,
       'show_admin_column'  => true,
       'query_var'          => true,
       'rewrite'            => array( 'slug' => 'brand' ),
   );
   
   register_taxonomy('brand','post', $args);
   
}
function trim_excerpt($text) {
  return substr_replace($text ,"",-5);
}

function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;
     $data = array(
        'pagination' => '',
        'page_of' => ''
     );
     $adjacents = 1;
     $limit = 1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;

     $lastpage = ceil($pages/$limit); 
     $lpm1 = $lastpage - 1; 
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {         
         $data['pagination'] .= '<ul class="pagination">';
         $data['page_of'] .= '<li>page '.$paged.' of '.$pages.'</li>';
         
         if($paged > 2 && $paged > $range+1 && $showitems < $pages){
            $data['pagination'] .= "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";   
         }
         if($paged > 1 && $showitems < $pages){
            $data['pagination'] .= "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";   
         }
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 if($paged == $i){
                     $data['pagination'] .= "<li class='active'><span class=\"current\">".$i."</span></li>";
                 }
                 else{
                     $data['pagination'] .= "<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
                 }
             }
         }
         
         $data['pagination'] .= "</ul>\n";
     }
     else{
         $data['page_of'] .= '<li>page '.$paged.' of '.$pages.'</li>';
     }

    // $pagination = "";
    // if($lastpage > 1)
    // { 
    //   $pagination .= '<ul class="pagination">';
    //   //previous button
    //   // if ($page > 1) 
    //   //   $pagination.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
    //   // else
    //   //   $pagination.= "<span class=\"disabled\">� previous</span>"; 

    //   if ($lastpage < 1 + ($adjacents * 2)) 
    //   { 
    //     for ($counter = 1; $counter <= $lastpage; $counter++)
    //     {
    //       if ($counter == $paged)
    //         $pagination.= '<li class="active"><span class="current">'.$counter.'</span></li>';
    //       else
    //         $pagination.= '<li><a href="'.get_pagenum_link($counter).'">'.$counter.'</a></li>';         
    //     }
    //   }
    //   elseif($lastpage > 2 + ($adjacents * 2)) 
    //   {

    //     if($paged < 1 + ($adjacents * 2))    
    //     {
    //       for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    //       {
    //         if ($counter == $paged)
    //           $pagination.= '<li class="active"><span class="current">'.$counter.'</span></li>';
    //         else
    //           $pagination.= '<li><a href="'.get_pagenum_link($counter).'">'.$counter.'</a></li>';         
    //       }
    //       $pagination.= '<li class="dotted"><span>...</span></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link($lpm1).'">'.$lpm1.'</a></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link($lastpage).'">'.$lastpage.'</a></li>';   
    //     }

    //     elseif($lastpage - ($adjacents * 2) > $paged && $paged > ($adjacents * 2))
    //     {
    //       $pagination.= '<li><a href="'.get_pagenum_link(1).'">1</a></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link(2).'">2</a></li>';
    //       $pagination.= '<li><span>...</span></li>';
    //       for ($counter = $paged - $adjacents; $counter <= $paged + $adjacents; $counter++)
    //       {
    //         if ($counter == $paged)
    //           $pagination.= '<li class="active"><span class="current">'.$counter.'</span></li>';
    //         else
    //           $pagination.= '<li><a href="'.get_pagenum_link($counter).'">'.$counter.'</a></li>';         
    //       }
    //       $pagination.= '<li class="dotted"><span>...</span></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link($lpm1).'">'.$lpm1.'</a></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link($lastpage).'">'.$lastpage.'</a></li>';   
    //     }

    //     else
    //     {
    //       $pagination.= '<li><a href="'.get_pagenum_link(1).'">1</a></li>';
    //       $pagination.= '<li><a href="'.get_pagenum_link(2).'">2</a></li>';
    //       $pagination.= '<li class="dotted"><span>...</span></li>';
    //       for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    //       {
    //         if ($counter == $paged)
    //           $pagination.= '<li class="active"><span class="current">'.$counter.'</span></li>';
    //         else
    //           $pagination.= '<li><a href="'.get_pagenum_link($counter).'">'.$counter.'</a></li>';         
    //       }
    //     }
    //   }
    // }
    // $pagination.= '</ul>';    

    // $data['pagination'] = $pagination;  
      
    return $data;
    
}

//enable paging in custom taxonomy page
function modify_taxonomy_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_tax() ) {
            $query->set( 'posts_per_page', 2);
        } 
    } 
}

//enable paging in custom category page
function wpse_modify_category_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_category() ) {
            $query->set( 'posts_per_page', 2);
        } 
    } 
}

add_action( 'pre_get_posts', 'modify_taxonomy_query' );
add_action( 'pre_get_posts', 'wpse_modify_category_query' );

add_filter('get_the_excerpt', 'trim_excerpt');
add_action( 'init', 'industry_sector', 0 );
add_action( 'init', 'product_category', 0 );
add_action( 'init', 'product_brand', 0 );
//add_action( 'init', 'product_post_types' );
add_action( 'init', 'awr_register_menus' );
add_action( 'wp_enqueue_scripts', 'awr_enqueue_scripts' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

?>