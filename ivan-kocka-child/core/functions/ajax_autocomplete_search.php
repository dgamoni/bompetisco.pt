<?php

/**
 * Live autocomplete search feature.
 *
 * @since 1.0.0
 */

// add_action( 'wp_ajax_search_site',        'ja_ajax_search' );
// add_action( 'wp_ajax_nopriv_search_site', 'ja_ajax_search' ); 
function ja_ajax_search() {

	$results = new WP_Query( array(
		'post_type'     => array( 'ivan_vc_projects' ),
		'post_status'   => 'publish',
		'nopaging'      => true,
		'posts_per_page'=> 100,
		's'             => stripslashes( $_POST['search'] ),
	) );

	$items = array();

	if ( !empty( $results->posts ) ) {
		foreach ( $results->posts as $result ) {
			//$size = array( 'width' => 50, 'height' => 50 );
			//$thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($result->ID) );
			//$image 			= '<img src="'. bfi_thumb( $thumb_url, $size  ) .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';			
			//$items[] = $result->post_title;
			$items[] = '<a href="'.get_permalink($result->ID).'">'.$result->post_title.'</a>';
		}
	}

	wp_send_json_success( $items );
}
