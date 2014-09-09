<?php

function resultados_de_casos_init() {
	register_post_type( 'resultados-de-casos', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Resultados de casos', 'edwardslawfirm' ),
			'singular_name'       => __( 'Resultados de casos', 'edwardslawfirm' ),
			'all_items'           => __( 'Resultados de casos', 'edwardslawfirm' ),
			'new_item'            => __( 'New resultados de casos', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New resultados de casos', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit resultados de casos', 'edwardslawfirm' ),
			'view_item'           => __( 'View resultados de casos', 'edwardslawfirm' ),
			'search_items'        => __( 'Search resultados de casos', 'edwardslawfirm' ),
			'not_found'           => __( 'No resultados de casos found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No resultados de casos found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent resultados de casos', 'edwardslawfirm' ),
			'menu_name'           => __( 'Resultados de casos', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'resultados_de_casos_init' );

function resultados_de_casos_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['resultados-de-casos'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Resultados de casos updated. <a target="_blank" href="%s">View resultados de casos</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Resultados de casos updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Resultados de casos restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Resultados de casos published. <a href="%s">View resultados de casos</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Resultados de casos saved.', 'edwardslawfirm'),
		8 => sprintf( __('Resultados de casos submitted. <a target="_blank" href="%s">Preview resultados de casos</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Resultados de casos scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview resultados de casos</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Resultados de casos draft updated. <a target="_blank" href="%s">Preview resultados de casos</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'resultados_de_casos_updated_messages' );
