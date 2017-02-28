<?php get_header(); ?>

<?php

$term = get_term_by( "slug", get_query_var("term"), get_query_var("taxonomy") );
$termChildren = get_term_children($term->term_id, $term->taxonomy);

if( $term->parent > 0 && count($termChildren) == 0){
    get_template_part('template/taxonomy','products');
}
elseif( $term->parent == 0 && count($termChildren) == 0 ){
    get_template_part('template/taxonomy','products');
}
else{
    get_template_part('template/taxonomy','sub');
}

?>

<?php get_footer(); ?>