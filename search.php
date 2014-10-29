<?php
/** 
 * Search results
 */

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
global $wp_query;
$np = $wp_query->max_num_pages;

get_header();

?>
<div class="l-single-col-content l-inner">
	<?php 

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="hentry">
				<article class="entry-content clearfix">
					<h2 class="search-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<section class="l-blog-single-main-content">
						<?php the_excerpt(); ?>
					</section>
				</article>
			</div>
		<?php endwhile; ?>	
		<?php else: ?>
		<!-- no posts found -->
		<?php endif; ?>
</div>
<?php get_footer(); ?>