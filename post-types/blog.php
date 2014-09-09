<?php

function blog_init() {
	register_post_type( 'blog', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
        'rewrite'           => array(
            'slug'                => 'es/blog'
        ),
		'labels'            => array(
			'name'                => __( 'Español blog posts', 'edwardslawfirm' ),
			'singular_name'       => __( 'Español Blog post', 'edwardslawfirm' ),
			'all_items'           => __( 'Español Blog posts', 'edwardslawfirm' ),
			'new_item'            => __( 'New post', 'edwardslawfirm' ),
			'add_new'             => __( 'Add New', 'edwardslawfirm' ),
			'add_new_item'        => __( 'Add New post', 'edwardslawfirm' ),
			'edit_item'           => __( 'Edit blog post', 'edwardslawfirm' ),
			'view_item'           => __( 'View blog post', 'edwardslawfirm' ),
			'search_items'        => __( 'Search posts', 'edwardslawfirm' ),
			'not_found'           => __( 'No posts found', 'edwardslawfirm' ),
			'not_found_in_trash'  => __( 'No posts found in trash', 'edwardslawfirm' ),
			'parent_item_colon'   => __( 'Parent blog', 'edwardslawfirm' ),
			'menu_name'           => __( 'Español Blog', 'edwardslawfirm' ),
		),
	) );

}
add_action( 'init', 'blog_init' );

function blog_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['blog'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Blog updated. <a target="_blank" href="%s">View blog</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'edwardslawfirm'),
		3 => __('Custom field deleted.', 'edwardslawfirm'),
		4 => __('Blog updated.', 'edwardslawfirm'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Blog restored to revision from %s', 'edwardslawfirm'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Blog published. <a href="%s">View blog</a>', 'edwardslawfirm'), esc_url( $permalink ) ),
		7 => __('Blog saved.', 'edwardslawfirm'),
		8 => sprintf( __('Blog submitted. <a target="_blank" href="%s">Preview blog</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Blog scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview blog</a>', 'edwardslawfirm'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Blog draft updated. <a target="_blank" href="%s">Preview blog</a>', 'edwardslawfirm'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'blog_updated_messages' );
