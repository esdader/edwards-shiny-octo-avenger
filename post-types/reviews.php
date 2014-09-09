<?php

function reviews_init() {
	register_post_type( 'reviews', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Reviews', 'edwardslawfirm' ),
			'singular_name'       => __( 'Review', 'edwardslawfirm' ),
			'all_items'           => __( 'Reviews', 'edwardslawfirm' ),
			'new_item'            => __( 'New reviews', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New review', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit review', 'edwardslawfirm' ),
			'view_item'           => __( 'View review', 'edwardslawfirm' ),
			'search_items'        => __( 'Search reviews', 'edwardslawfirm' ),
			'not_found'           => __( 'No reviews found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No reviews found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent reviews', 'edwardslawfirm' ),
			'menu_name'           => __( 'Reviews', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'reviews_init' );

function reviews_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['reviews'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Review updated. <a target="_blank" href="%s">View review</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Review updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Review restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Review published. <a href="%s">View reviews</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Review saved.', 'edwardslawfirm'),
		8 => sprintf( __('Review submitted. <a target="_blank" href="%s">Preview review</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Review scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview reviews</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Review draft updated. <a target="_blank" href="%s">Preview review</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'reviews_updated_messages' );
