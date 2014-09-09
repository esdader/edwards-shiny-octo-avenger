<?php

function opiniones_init() {
	register_post_type( 'opiniones', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Opiniones', 'edwardslawfirm' ),
			'singular_name'       => __( 'Opiniones', 'edwardslawfirm' ),
			'all_items'           => __( 'Opiniones', 'edwardslawfirm' ),
			'new_item'            => __( 'New opiniones', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New opiniones', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit opiniones', 'edwardslawfirm' ),
			'view_item'           => __( 'View opiniones', 'edwardslawfirm' ),
			'search_items'        => __( 'Search opiniones', 'edwardslawfirm' ),
			'not_found'           => __( 'No opiniones found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No opiniones found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent opiniones', 'edwardslawfirm' ),
			'menu_name'           => __( 'Opiniones', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'opiniones_init' );

function opiniones_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['opiniones'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Opiniones updated. <a target="_blank" href="%s">View opiniones</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Opiniones updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Opiniones restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Opiniones published. <a href="%s">View opiniones</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Opiniones saved.', 'edwardslawfirm'),
		8 => sprintf( __('Opiniones submitted. <a target="_blank" href="%s">Preview opiniones</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Opiniones scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview opiniones</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Opiniones draft updated. <a target="_blank" href="%s">Preview opiniones</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'opiniones_updated_messages' );
