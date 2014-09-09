<?php

function areas_de_practica_init() {
	register_post_type( 'areas-de-practica', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( '&Aacute;reas de Pr&aacute;cticas', 'edwardslawfirm' ),
			'singular_name'       => __( '&Aacute;reas de Pr&aacute;ctica', 'edwardslawfirm' ),
			'all_items'           => __( '&Aacute;reas de Pr&aacute;cticas', 'edwardslawfirm' ),
			'new_item'            => __( 'New &aacute;reas de Pr&aacute;cticas', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New &Aacute;reas de Pr&aacute;ctica', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit &Aacute;reas de Pr&aacute;ctica', 'edwardslawfirm' ),
			'view_item'           => __( 'View &Aacute;reas de Pr&aacute;ctica', 'edwardslawfirm' ),
			'search_items'        => __( 'Search &Aacute;reas de Pr&aacute;cticas', 'edwardslawfirm' ),
			'not_found'           => __( 'No &Aacute;reas de Pr&aacute;cticas found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No &Aacute;reas de Pr&aacute;cticas found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent &Aacute;reas de Pr&aacute;ctica', 'edwardslawfirm' ),
			'menu_name'           => __( '&Aacute;reas de Pr&aacute;cticas', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'areas_de_practica_init' );

function Areas_de_Practica_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Areas-de-practica'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('&Aacute;reas de Pr&aacute;ctica updated. <a target="_blank" href="%s">View &Aacute;reas de Pr&aacute;ctica</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('&Aacute;reas de Pr&aacute;ctica updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('&Aacute;reas de Pr&aacute;ctica restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('&Aacute;reas de Pr&aacute;ctica published. <a href="%s">View &Aacute;reas de Pr&aacute;ctica</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('&Aacute;reas de Pr&aacute;ctica  saved.', 'edwardslawfirm'),
		8 => sprintf( __('&Aacute;reas de pr&aacute;ctica submitted. <a target="_blank" href="%s">Preview &Aacute;reas de Pr&aacute;ctica</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('&Aacute;reas de Pr&aacute;ctica scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview &aacute;reas de Pr&aacute;ctica</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('&Aacute;reas de Pr&aacute;ctica draft updated. <a target="_blank" href="%s">Preview &Aacute;reas de Pr&aacute;ctica</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'Areas_de_Practica_updated_messages' );
