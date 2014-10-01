<?php

function case_results_init() {
	register_post_type( 'case-results', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => false,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'case-results'),
		'labels'            => array(
			'name'                => __( 'Case results', 'edwardslawfirm' ),
			'singular_name'       => __( 'Case results', 'edwardslawfirm' ),
			'all_items'           => __( 'Case results', 'edwardslawfirm' ),
			'new_item'            => __( 'New case results', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New case results', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit case results', 'edwardslawfirm' ),
			'view_item'           => __( 'View case results', 'edwardslawfirm' ),
			'search_items'        => __( 'Search case results', 'edwardslawfirm' ),
			'not_found'           => __( 'No case results found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No case results found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent case results', 'edwardslawfirm' ),
			'menu_name'           => __( 'Case results', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'case_results_init' );

function case_results_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['case-results'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Case results updated. <a target="_blank" href="%s">View case results</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Case results updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Case results restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Case results published. <a href="%s">View case results</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Case results saved.', 'edwardslawfirm'),
		8 => sprintf( __('Case results submitted. <a target="_blank" href="%s">Preview case results</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Case results scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview case results</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Case results draft updated. <a target="_blank" href="%s">Preview case results</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'case_results_updated_messages' );
