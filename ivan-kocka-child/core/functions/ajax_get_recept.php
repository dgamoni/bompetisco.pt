<?php



add_action( 'wp_ajax_get_recept', 'get_recept_ajax' );
add_action( 'wp_ajax_nopriv_get_recept', 'get_recept_ajax' );

function get_recept_ajax() {

	ob_start(); 

	$termid = $_POST['termid'];
	$termname = $_POST['termname'];
	$tax_cat = $_POST['tax_cat'];
	$tax_tag = $_POST['tax_tag'];

	if ( $tax_cat ) {
		$tax_cat =  explode(',', $tax_cat);
		$tax_cat = array_unique($tax_cat);
		$terms_cat = get_terms( array(
			'taxonomy'      => 'ivan_vc_projects_cats',
			'hide_empty' => false,
			'include'	=> $tax_cat,
			'fields'    => 'id=>name'
		) );
		$res['terms_cat'] = $terms_cat;

	}
	if ( $tax_tag ) {
		$tax_tag =  explode(',', $tax_tag);
		$tax_tag = array_unique($tax_tag);
		$terms_tag = get_terms( array(
			'taxonomy'      => 'receitas_tags',
			'hide_empty' => false,
			'include'	=> $tax_tag,
			'fields'    => 'id=>name'
		) );
		$res['terms_tag'] = $terms_tag;				
	}



	$res['termid'] = $termid;
	$res['termname'] = $termname;
	$res['tax_cat'] = $tax_cat;
	$res['tax_tag'] = $tax_tag;
	//$res['tax_cat1'] = $tax_cat1;
	//$res['tax_tag1'] = $tax_tag1;

		$args = array(
			'post_type'   => 'ivan_vc_projects',
			'post_status' => 'publish',
			'order'               => 'DESC',
			'orderby'             => 'date',

			// 'tax_query' => array(
			// 	'relation' => 'OR',
			// 	array(
			// 		'taxonomy'         => 'ivan_vc_projects_cats',
			// 		'field'            => 'id',
			// 		'terms'            => array( $termid )
			// 	)
			// )
		);

		if ( $tax_cat && $tax_tag ) {
			$args['tax_query']['relation'] = 'AND';
		}

		if ( $tax_cat ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'ivan_vc_projects_cats',
				'filed'    => 'id',
				'terms'    => $tax_cat
			);
		}

		if ( $tax_tag ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'receitas_tags',
				'filed'    => 'id',
				'terms'    => $tax_tag
			);
		}

		$the_query = new WP_Query( $args );

		while ( $the_query->have_posts() ) : $the_query->the_post();
			setup_postdata( $post );

				get_template_part( 'includes/loop', 'recipes' ); 

		endwhile;
		wp_reset_postdata();
		wp_reset_query();						



	$content = ob_get_contents();
	ob_end_clean();

	// if ( $content == '' ) {
	// 	$content == '<div class="content_none">'. __( 'Nada encontrado !', 'bompetisco' ).'</div>';
	// }

	$res['content'] = $content;

	echo json_encode( $res );
	exit;

}