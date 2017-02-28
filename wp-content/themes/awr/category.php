<?php get_header(); ?>

<?php

$term = get_term_by( "slug", get_query_var("term"), get_query_var("taxonomy") );
print_r($term);
if( $term->parent > 0 ){
    //get_template_part('template/category','products');
}
else{
    get_template_part('template/category','sub');
}


?>

<?php get_footer(); ?>