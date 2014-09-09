<?php

function Abogados_init() {
	register_post_type( 'abogados', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Abogados', 'edwardslawfirm' ),
			'singular_name'       => __( 'Abogados', 'edwardslawfirm' ),
			'all_items'           => __( 'Abogados', 'edwardslawfirm' ),
			'new_item'            => __( 'New abogados', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New abogados', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit abogados', 'edwardslawfirm' ),
			'view_item'           => __( 'View abogados', 'edwardslawfirm' ),
			'search_items'        => __( 'Search abogados', 'edwardslawfirm' ),
			'not_found'           => __( 'No abogados found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No abogados found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent abogados', 'edwardslawfirm' ),
			'menu_name'           => __( 'Abogados', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'Abogados_init' );

function Abogados_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Abogados'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Abogados updated. <a target="_blank" href="%s">View abogados</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Abogados updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Abogados restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Abogados published. <a href="%s">View abogados</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Abogados saved.', 'edwardslawfirm'),
		8 => sprintf( __('Abogados submitted. <a target="_blank" href="%s">Preview abogados</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Abogados scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview abogados</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Abogados draft updated. <a target="_blank" href="%s">Preview abogados</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'Abogados_updated_messages' );
