<?php

/**
 * archive practice areas
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;


get_header(); ?>

<div class="l-practice-area-landing l-single-col-content l-inner">
	<div class="hentry">
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<section class="l-practice-landing-main">
				<?php the_content(); ?>
			</section>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</article>
	</div>
	
	
	<div class="l-practice-list-con">
		<?php
			$args = array(
						'post_type'     => 'practice-areas',
						'order_by'       => 'menu_order',
						'order'         => 'ASC',
						'post_per_page' => '1'
					);

			$practice_areas = new WP_Query($args);
		?>

		<?php if ( $practice_areas->have_posts() ) : while ( $practice_areas->have_posts() ) : $practice_areas->the_post(); ?>
			<div class="l-practice-entry clearfix">
				<div class="l-practice-entry-img-col">
					<?php 
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail( 'thmb_alt' );
						} else {
							echo '<img src="http://placehold.it/123x85">';
						}
					?>
				</div>
				<div class="l-practice-entry-content-col practice-entry-content">
					<h2><?php the_title(); ?></h2>
					<?php 
						$excerpt = get_the_excerpt();
						$excerpt .= '<a class="excerpt-more-link" href="' . get_permalink() . '">More</a>' 
					?>
					<?php echo  wpautop($excerpt); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>
