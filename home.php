<?php 
/**
 * blog landing page
 */

get_header(); ?>

<div class="l-blog-landing l-inner">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
</div>

<?php get_footer(); ?>