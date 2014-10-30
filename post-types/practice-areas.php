<?php

function practice_areas_init() {
	register_post_type( 'practice-areas', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => false,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Practice areas', 'edwardslawfirm' ),
			'singular_name'       => __( 'Practice area', 'edwardslawfirm' ),
			'all_items'           => __( 'Practice areas', 'edwardslawfirm' ),
			'new_item'            => __( 'New practice area', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New practice area', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit practice area', 'edwardslawfirm' ),
			'view_item'           => __( 'View practice area', 'edwardslawfirm' ),
			'search_items'        => __( 'Search practice areas', 'edwardslawfirm' ),
			'not_found'           => __( 'No practice areas found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No practice areas found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent practice areas', 'edwardslawfirm' ),
			'menu_name'           => __( 'Practice areas', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'practice_areas_init' );

function practice_areas_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['practice-areas'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Practice areas updated. <a target="_blank" href="%s">View practice areas</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Practice areas updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Practice areas restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Practice areas published. <a href="%s">View practice areas</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Practice areas saved.', 'edwardslawfirm'),
		8 => sprintf( __('Practice areas submitted. <a target="_blank" href="%s">Preview practice areas</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Practice areas scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview practice areas</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Practice areas draft updated. <a target="_blank" href="%s">Preview practice areas</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'practice_areas_updated_messages' );
