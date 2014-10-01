<?php 
/**
 * Video page
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;

get_header(); ?>

<div class="l-inner l-video-main-container video-main-container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php if ( have_rows('videos') ) : ?>
		<ul class="l-video-grid l-horizontal-list clearfix">
			<?php while ( have_rows('videos') ) : the_row(); ?>
				<li class="l-embed-con">
					<?php the_sub_field('video'); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php else: ?>
	<?php endif; ?>
</div>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>