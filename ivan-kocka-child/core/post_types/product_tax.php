<?php
// Register Custom Taxonomy
function ivan_vc_projects_tax() {

	$labels = array(
		'name'                       => _x( 'Products', '', 'bompetisco' ),
		'singular_name'              => _x( 'Products', '', 'bompetisco' ),
		'menu_name'                  => __( 'Products', 'bompetisco' ),
		'all_items'                  => __( 'All Items', 'bompetisco' ),
		'parent_item'                => __( 'Parent Item', 'bompetisco' ),
		'parent_item_colon'          => __( 'Parent Item:', 'bompetisco' ),
		'new_item_name'              => __( 'New Item Name', 'bompetisco' ),
		'add_new_item'               => __( 'Add New Item', 'bompetisco' ),
		'edit_item'                  => __( 'Edit Item', 'bompetisco' ),
		'update_item'                => __( 'Update Item', 'bompetisco' ),
		'view_item'                  => __( 'View Item', 'bompetisco' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bompetisco' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bompetisco' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bompetisco' ),
		'popular_items'              => __( 'Popular Items', 'bompetisco' ),
		'search_items'               => __( 'Search Items', 'bompetisco' ),
		'not_found'                  => __( 'Not Found', 'bompetisco' ),
		'no_terms'                   => __( 'No items', 'bompetisco' ),
		'items_list'                 => __( 'Items list', 'bompetisco' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bompetisco' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'products', array( 'ivan_vc_projects' ), $args );

}
add_action( 'init', 'ivan_vc_projects_tax', 0 ); 


function ivan_vc_projects_tax_receitas_tags() {

	$labels = array(
		'name'                       => _x( 'Tags', '', 'bompetisco' ),
		'singular_name'              => _x( 'Tags', '', 'bompetisco' ),
		'menu_name'                  => __( 'Tags', 'bompetisco' ),
		'all_items'                  => __( 'All Items', 'bompetisco' ),
		'parent_item'                => __( 'Parent Item', 'bompetisco' ),
		'parent_item_colon'          => __( 'Parent Item:', 'bompetisco' ),
		'new_item_name'              => __( 'New Item Name', 'bompetisco' ),
		'add_new_item'               => __( 'Add New Item', 'bompetisco' ),
		'edit_item'                  => __( 'Edit Item', 'bompetisco' ),
		'update_item'                => __( 'Update Item', 'bompetisco' ),
		'view_item'                  => __( 'View Item', 'bompetisco' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bompetisco' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bompetisco' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bompetisco' ),
		'popular_items'              => __( 'Popular Items', 'bompetisco' ),
		'search_items'               => __( 'Search Items', 'bompetisco' ),
		'not_found'                  => __( 'Not Found', 'bompetisco' ),
		'no_terms'                   => __( 'No items', 'bompetisco' ),
		'items_list'                 => __( 'Items list', 'bompetisco' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bompetisco' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'receitas_tags', array( 'ivan_vc_projects' ), $args );

}
add_action( 'init', 'ivan_vc_projects_tax_receitas_tags', 0 ); 