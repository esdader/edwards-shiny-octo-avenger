<?php 

 /**
  * Firm page
  */

get_header(); ?>
<div class="l-general-content-con l-outer">
	<div class="l-general-content l-inner">
		<div class="hentry">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="entry-content">
					<?php 
						if ( has_post_thumbnail() ) { 
							$attr = array(
								'class' => "featured-image"
							);
							the_post_thumbnail( 'full', $attr );
						}
					?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<?php else: ?>

			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>