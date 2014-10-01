<?php

/**
 * generic page
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;

get_header(); ?>

<div class="l-single-col-content l-inner">
	<div class="hentry">
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<h1 class="blog-title"><?php the_title(); ?></h1>
			<section class="l-blog-single-main-content">
				<?php the_content(); ?>
			</section>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</article>
	</div>
</div>
<?php include(locate_template('contact-cta.php')); ?>

<?php get_footer(); ?>