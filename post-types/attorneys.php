<?php

function attorneys_init() {
	register_post_type( 'attorneys', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => false,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Attorneys', 'edwardslawfirm' ),
			'singular_name'       => __( 'Attorney', 'edwardslawfirm' ),
			'all_items'           => __( 'Attorneys', 'edwardslawfirm' ),
			'new_item'            => __( 'New Attorney', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New Attorney', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit Attorney', 'edwardslawfirm' ),
			'view_item'           => __( 'View Attorney', 'edwardslawfirm' ),
			'search_items'        => __( 'Search Attorneys', 'edwardslawfirm' ),
			'not_found'           => __( 'No Attorneys found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No Attorneys found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent Attorneys', 'edwardslawfirm' ),
			'menu_name'           => __( 'Attorneys', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'attorneys_init' );

function attorneys_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['attorneys'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Attorneys updated. <a target="_blank" href="%s">View attorneys</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Attorneys updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Attorneys restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Attorneys published. <a href="%s">View attorneys</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Attorneys saved.', 'edwardslawfirm'),
		8 => sprintf( __('Attorneys submitted. <a target="_blank" href="%s">Preview attorneys</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Attorneys scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview attorneys</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Attorneys draft updated. <a target="_blank" href="%s">Preview attorneys</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'attorneys_updated_messages' );
