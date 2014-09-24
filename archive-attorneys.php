<?php 

/**
 * Attorneys landing page
 */

get_header(); ?>

<div class="l-atty-con l-outer">
	<div class="l-atty l-inner">
		<div class="l-atty-header">
			<h1><?php the_field('attornyes_landing_page_main_heading', 8); ?></h1>
		</div>
		<ul class="atty-list l-horizontal-list clearfix">
			<?php
				$args = array(
						'post_type' => 'attorneys',
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'posts_per_page' => -1
					);

				$attys = new WP_Query($args);

			?>

			<?php if ( $attys->have_posts() ) : while ( $attys->have_posts() ) : $attys->the_post(); ?>
				<li>
					<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('atty_med'); ?></a>
					<?php endif; ?>
					<h4 class="attorney-name">
						<?php the_title(); ?>
					</h4>
					<p><a href="<?php the_permalink(); ?>">VIEW BIO</a></p>
					<p><a href="#add-link">Contact</a></p>
				</li>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</ul>
	</div>
</div>

<?php get_footer(); ?>