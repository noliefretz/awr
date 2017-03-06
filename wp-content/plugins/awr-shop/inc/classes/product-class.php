<?php
class AWRProducts {

	function __construct(){

	}
	// registering awr-product post type
	function registerProductPostType(){

		function registerPostType(){
			//
			$labels	= array('name' 			=> __('Products'),
							'singular_name'	=> __('Product'),
							'add_new'		=> __('Add New Product'),
							'add_new_item'	=> __('Add New Product'),
							'edit_item'		=> __('Edit Product'),
							'new_item'		=> __('New Product'),
							'view_item'		=> __('View Product'),
							'view_items'	=> __('View Products'),
							'search_items'	=> __('Search Product'));			
			$args = array( 
				'hierarchical'  => true,
				'public'        => true, 
				'labels'        => $labels,
				'menu_icon'     => 'dashicons-cart',				
				'has_archive'   => true,
				'description'   => '',
				'supports'		=> array('editor', 'title', 'thumbnail', 'revisions'),
			);

			register_post_type( 'awr-product', $args );			
		}

		add_action( 'init', 'registerPostType' );

	}

	/* registering produdct taxonomy/category */
	function registerProductCategory(){
		
		function registerTaxonomy(){			

			// register product industry sector
			$labels = array(
			    'name'              => __('Industry Sector'),
			    'singular_name'     => __('Industry Sector'),
			    'search_items'      => __('Search Industry'),
			    'all_items'         => __('All Industry Sectors'),
			    'parent_item'       => __('Parent Industry Sector'),
			    'parent_item_colon' => __('Parent Industry Sector:'),
			    'edit_item'         => __('Edit Industry Sector'), 
			    'update_item'       => __('Update Industry Sector'),
			    'add_new_item'      => __('Add New Industry Sector'),
			    'new_item_name'     => __('New Industry Sector'),
			    'menu_name'			=> __('Industry Sector'),
			    'not_found'			=> __('Empty Industry Sectors List'),
			);
			
			$args = array(
			    'hierarchical'      => true,
			    'labels'            => $labels,
			    'show_ui'           => true,
			    'show_admin_column' => true,
			    'query_var'         => true,
			    'rewrite'           => array( 'slug' => 'awr-industry-sector' ),
			    'sort' 				=> true,
			    'show_in_nav_menus'	=> true,
			);
			register_taxonomy('awr-industry-sector','awr-product', $args);
			// * register product industry sector

			// register product category
			$labels = array(
			    'name'              => __('Product Categories'),
			    'singular_name'     => __('Product Category'),
			    'search_items'      => __('Search Product Categories'),
			    'all_items'         => __('All Product Categories'),
			    'parent_item'       => __('Parent Product Category'),
			    'parent_item_colon' => __('Parent Product Category:'),
			    'edit_item'         => __('Edit Product Category'), 
			    'update_item'       => __('Update Product Category'),
			    'add_new_item'      => __('Add New Product Category'),
			    'new_item_name'     => __('New Product Category Name'),
			    'menu_name'			=> __('Product Category'),
			);
			
			$args = array(
			    'hierarchical'      => true,
			    'labels'            => $labels,
			    'show_ui'           => true,
			    'show_admin_column' => true,
			    'query_var'         => true,
			    'rewrite'           => array( 'slug' => 'awr-product-category' ),
			    'sort' 				=> true,
			    'show_in_nav_menus'	=> true,
			);

			register_taxonomy('awr-product-category','awr-product', $args);
			// * end register product category	


			// register product Manufacturer
			$labels = array(
			    'name'              => __('Manufacturer'),
			    'singular_name'     => __('Manufacturer'),
			    'search_items'      => __('Search Manufacturer'),
			    'all_items'         => __('All Manufacturers'),
			    'parent_item'       => __('Parent Manufacturer'),
			    'parent_item_colon' => __('Parent Manufacturer:'),
			    'edit_item'         => __('Edit Manufacturer'), 
			    'update_item'       => __('Update Manufacturer'),
			    'add_new_item'      => __('Add New Manufacturer'),
			    'new_item_name'     => __('New Manufacturer'),
			    'menu_name'			=> __('Manufacturer'),
			    'not_found'			=> __('Empty Manufacturer'),
			);
			
			$args = array(
			    'hierarchical'      => true,
			    'labels'            => $labels,
			    'show_ui'           => true,
			    'show_admin_column' => true,
			    'query_var'         => true,
			    'rewrite'           => array( 'slug' => 'awr-product-manufacturer' ),
			    'sort' 				=> true,
			    'show_in_nav_menus'	=> true,
			);
			register_taxonomy('awr-product-manufacturer','awr-product', $args);
			// * register product Manufacturer		
		}

		add_action('init', 'registerTaxonomy');
		// end registering produdct taxonomy/category

		// registering taxonomy/category meta
		function registerProductCategoryMeta(){
			 register_meta( 'awr-product-category', '_taxonomy_image', 'sanitizeCategoryImage' );
			 register_meta( 'awr-product-category', '_category_industry_sector', 'sanitizeCategoryImage' );
		}

		function sanitizeCategoryImage( $value ) {
		    return sanitize_text_field ($value);
		}

		function addProductCategoryImage( $term ) {
			
			if( is_object( $term ) && isset( $term->term_id ) && !is_null( $term->term_id )){
				$prodcat_image 		= get_term_meta( $term->term_id, '_taxonomy_image', true );
				$prodcat_indsect	= get_term_meta( $term->term_id, '_category_industry_sector', true );
			}else{
				$prodcat_image 		= null;
				$prodcat_indsect	= null;
			}
		    require_once(PLUGIN_DIR_PATH.'/inc/admin/templates/admin-product-category.php');
		}

		// adding taxonomy image 

			/*@ product category */
			add_action( 'awr-product-category_add_form_fields', 'addProductCategoryImage' );		
			add_action( 'awr-product-category_edit_form_fields', 'addProductCategoryImage', 10, 2 );

			/*@ industry sector */
			add_action( 'awr-industry-sector_add_form_fields', 'addProductCategoryImage' );		
			add_action( 'awr-industry-sector_edit_form_fields', 'addProductCategoryImage', 10, 2 );

			/*@ manufacturer/brand */
			add_action( 'awr-product-manufacturer_add_form_fields', 'addProductCategoryImage' );		
			add_action( 'awr-product-manufacturer_edit_form_fields', 'addProductCategoryImage', 10, 2 );


		add_action( 'init', 'registerProductCategoryMeta');
		// end registering taxonomy/category meta

		// saving product category image
			/*@ product category */
			add_action( 'edit_awr-product-category',   'saveProductCategoryMeta' );
			add_action( 'create_awr-product-category', 'saveProductCategoryImage' );

			/*@ industry sector */
			add_action( 'edit_awr-industry-sector',   'saveProductCategoryMeta' );
			add_action( 'create_awr-industry-sector', 'saveProductCategoryMeta' );

			/*@ manufacturer/brand */
			add_action( 'edit_awr-product-manufacturer',   'saveProductCategoryMeta' );
			add_action( 'create_awr-product-manufacturer', 'saveProductCategoryMeta' );

		function saveProductCategoryMeta( $term_id ){

			if( isset( $_POST['category_image'] ) && !is_null( $_POST['category_image'] )){
				
				$prodcat_imgurl = sanitize_text_field( $_POST['category_image'] );
				update_term_meta( $term_id, '_taxonomy_image', $prodcat_imgurl );

			}else{

				delete_term_meta( $term_id, '_taxonomy_image' );
			}

			if( isset( $_POST['category_industry_sector'] ) && !is_null( $_POST['category_industry_sector'] )){
				
				$prodcat_indsect = sanitize_text_field( $_POST['category_industry_sector'] );
				update_term_meta( $term_id, '_category_industry_sector', $prodcat_indsect );

			}else{

				delete_term_meta( $term_id, '_category_industry_sector' );
			}
		}

		add_filter('manage_edit-awr-product-category_columns', 'metaToColumn' );		// @column title for product category image
		add_filter('manage_edit-awr-industry-sector_columns', 'metaToColumn' ); 		// @column title for industry sector image
		add_filter('manage_edit-awr-product-manufacturer_columns', 'metaToColumn' );	// @column title for product manufacturer image

		function metaToColumn( $columns  ){			
			$columns['_taxonomy_image'] = __( 'Image', 'awr-shop' );
			if( isset( $_REQUEST['taxonomy'] ) && $_REQUEST['taxonomy'] != 'awr-industry-sector' ){
				$columns['_category_industry_sector'] = __( 'Indudstry Sector ', 'awr-shop' );	
			}
			
			//print_r($columns);
    		return $columns;
		}		

		add_filter('manage_awr-product-category_custom_column', 'showMetaToColumn', 10, 3 ); 		// @column for product category image
		add_filter('manage_awr-industry-sector_custom_column', 'showMetaToColumn', 10, 3 );		// @column for industry sector image
		add_filter('manage_awr-product-manufacturer_custom_column', 'showMetaToColumn', 10, 3 ); 	// @column for industry manufacturer image

		function showMetaToColumn( $content, $column_name, $term_id ){
			$term_id 		= absint( $term_id );			
			switch ( $column_name ) {

				case '_taxonomy_image':
						$taxonomy_image = get_term_meta( $term_id, '_taxonomy_image', true );
						if( !is_null( $taxonomy_image ) && !empty( $taxonomy_image ) ){
							$taxonomy_image = $taxonomy_image;
						}else{
							$taxonomy_image = PLUGIN_DIR_URL.'assets/images/placeholder.jpg';
						}

						$ret_meta = '<img src="'.$taxonomy_image.'" width="70">';

					break;

				case '_category_industry_sector':						

						$indsector = get_term_meta( $term_id, '_category_industry_sector', true );

						if( !is_null( $indsector ) ){
							$indsect_term 	= get_term( $indsector );
							$ret_meta 		= $indsect_term->name;
						}else{

							$ret_meta 		= '';
						}
						
						
					break;
				
				default:
					# code...
					break;
			}

			return $ret_meta;
			
			
		}

		

		// end saving product category image
	}
	/* *end registering produdct taxonomy/category */



	function registerProductCustomFields(){
		// start product code
		function registerCustomFields(){			
			add_meta_box( 'product_code', __('Product Code'), 'productCodeCallback', 'awr-product', 'top', 'high' );
		}

		function productCodeCallback(){
			global $post;
			_e('<div class="awr-meta-boxes">');
			_e('<label>Product Code</label><input type="text" name="awr_field[product_code]" id="product_code" placeholder="Product Code" value="'.esc_html( get_post_meta( $post->ID, '_product_code', true ) ).'">');
			_e('<label>Manufacturing Code</label><input type="text" name="awr_field[manufacturing_code]" id="manufacturing_code" placeholder="Manufacturing Code" value="'.esc_html( get_post_meta( $post->ID, '_manufacturing_code', true ) ).'">');
			_e('</div>');
		}
		add_action('add_meta_boxes', 'registerCustomFields');

		add_action('edit_form_after_title', function() {
		    global $post, $wp_meta_boxes;
		    do_meta_boxes(registerCustomFields(), 'top', $post);		   
		    unset($wp_meta_boxes[get_post_type($post)]['top']);
		});
		// .end product code

		/* start product details custom fields */
		function registerProductDetailsFields(){			
			add_meta_box( 'product-detail-fiels', __('Product Details'), 'productDetailsCallback', 'awr-product');
		}
		/* end product details custom fields */

		/* product details input (metabox) */
		function productDetailsCallback(){
			global $post;			
			load_template(PLUGIN_DIR_PATH.'/inc/admin/templates/admin-product-details.php');
		}
		add_action('add_meta_boxes', 'registerProductDetailsFields');
		//. end product details custom fields
	}
	/* end product details input (metabox) */

	/* saving product details */
	function saveProductMeta( $request_data = null, $product_id = null ){
		
		if( !is_null( $product_id ) && !is_null( $request_data ) && is_array( $request_data ) ){
			foreach ($request_data as $key => $value) {	

				if( $key == 'product_attachments' ){

					// @ every attachment url has corresponding attachment name base on array index
					$prod_attachemnts = array();
					$ctr = 0;
					// arranging input data and resetting $value for attachments					
					foreach ( $value['url'] as $url ) {						
						$prod_attachments[$ctr]['url'] = $url;

						if( isset( $value['name'][$ctr] ) && !empty( $value['name'][$ctr] ) ){
							$prod_attachments[$ctr]['name'] = $value['name'][$ctr];
						}else{
							$prod_attachments[$ctr]['name'] = NULL;	
						}
						
						$ctr++;
					}
					$value = $prod_attachments;
				}elseif( $key == 'product_models' ){
					// @ every models has corresponding price base on array index
					$models = array();
					$ctr = 0;
					// arranging input data and resetting $value for models
					foreach ($value['name'] as $model_name ) {
						$models[$ctr]['name'] = $model_name;

						if( isset( $value['price'][$ctr] ) && !empty( $value['price'][$ctr] ) ){
							$models[$ctr]['price'] = $value['price'][$ctr];
						}else{
							$models[$ctr]['price'] = 0;
						}
						$ctr++;
					}					
					$value = $models;
				}
				// serialize array values
				if( is_array( $value ) ){
					$value = serialize( $value );
				}			
				
				if( !empty( $value ) ) {
					update_post_meta($product_id, '_'.$key, sanitize_text_field( $value ) );
				}else{
					delete_post_meta( $product_id, '_'.$key );
				}	
			}				
		}	
	}
	/* end saving product details */

	/* loading product detail page */
	static function productDetail( $product_details = null ){
		if( !is_null( $product_details ) ){

			load_template(PLUGIN_DIR_PATH.'/templates/single-product.php');

		}else{

			_e('Product Not Found');

		}
	}
}