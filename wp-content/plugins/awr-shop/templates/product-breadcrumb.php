<div class="breadcrumbs">
    <ul>
        <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <?php            
            $terms = wp_get_post_terms( $post->ID, 'awr-product-category', $args );   
        if( count($terms ) > 0 ) :
            foreach ($terms as $term) {
                $tmpTerm = $term;
            }
            
            $tmpCrumbs = array();

            while( $tmpTerm->parent > 0 ){
                $tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
                $crumb = '<li><a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . ' <i class="icon-sprite icon-orange-arrow"></i></a></li>';
                array_push($tmpCrumbs, $crumb);
            }

            echo implode('', array_reverse($tmpCrumbs));
            echo '<li><a href="' . get_term_link($term, get_query_var('taxonomy')) . '">' . $term->name . '</a></li>';
        endif;
            echo '<li><span>'.get_the_title().'</span></li>';

        ?>
    </ul>
</div>