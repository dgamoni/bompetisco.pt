<?php 
//[ RECIPES ROW WITH 3 RANDOM SUGGESTION PRODUCT RELATED ]
add_shortcode( 'recipes_to_products', 'recipes_to_products_func' );
function recipes_to_products_func( $atts ) {

	$html = '';
	ob_start();

	$args = array(
		'post_type'   => 'ivan_vc_projects',
		'post_status' => 'publish',
		//'order'               => 'DESC',
		'orderby'             => 'rand',
		'posts_per_page'	=> 3
	);

	if ( $atts['products_id'] ) {
		$args['tax_query'] = array(
			'relation' => 'OR',
				array(
					'taxonomy'         => 'products',
					'field'            => 'id',
					'terms'            => $atts['products_id']
				)			
		);
	}
 	
 	echo '<div class="recipes_to_products ivan-projects ivan-projects-recipes ivan-projects-grid vc_row iso-initialized cat_flex_wrap" style="">';
	 	$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

			get_template_part( 'includes/loop', 'recipes' );

		endwhile;
	echo '</div>';

	wp_reset_query();

	$html .= ob_get_contents();
	ob_end_clean();
	return $html;

}
