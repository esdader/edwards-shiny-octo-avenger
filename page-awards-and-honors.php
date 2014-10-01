<?php

/**
 * Awards and honors page
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;

get_header(); ?>

<div class="l-awards-and-honors-con l-single-col-content l-inner">
	<div class="hentry">
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<section class="l-awards-and-honors-main">
				<?php the_content(); ?>
			</section>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</article>
	</div>
	<?php if ( have_rows('awards_award_or_honor') ) : ?>
		<?php while ( have_rows('awards_award_or_honor') ) : the_row(); ?>
			<div class="l-awards-row clearfix">
				<div class="l-awards-image-col">
					<?php if (get_sub_field('awards_image') ) : ?>
						<?php 
							$img = get_sub_field('awards_image'); 
						?>
						<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				</div>
				<div class="l-awards-content-col">
					<h3 class="awards-honor-title"><?php the_sub_field('awards_name'); ?></h3>
					<?php the_sub_field('awards_description'); ?>
				</div>
			</div>
		<?php endwhile; ?>

	<?php endif; ?>
</div>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>