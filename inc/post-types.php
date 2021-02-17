<?php

/*
function register_my_cpts() {


	$labels = array(
		'name'                       => _x( 'Catégories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Catégorie', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
    'show_ui'                    => true,
    "rewrite" => [ 'slug' => 'events', 'hierarchical' => true, 'with_front' => false ],
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_category', array( 'event' ), $args );


	$labels = [
		"name" => __( "Events", "_s" ),
		"singular_name" => __( "Event", "_s" ),
	];

	$args = [
		"label" => __( "Events", "_s" ),
		"labels" => $labels,
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
    'has_archive'         => "events",
    "rewrite" => [ "slug" => "event", "with_front" => false ],
		'query_var'           => true,
		'can_export'          => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-hammer',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],

		'rewrite' => true
	];

  register_post_type( 'event', $args );

}

add_action( 'init', 'register_my_cpts' );
*/