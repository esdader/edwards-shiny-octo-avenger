<?php 

/**
 * Attorney single page
 */

get_header(); ?>
<div class="l-attorney-page l-inner">
	<div class="hentry">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			<section class="l-attorney-page-col l-attorney-main">
				<?php the_content(); ?>
			</section>
			<section class="l-attorney-page-col l-attorney-secondary">
				<?php 
					if ( has_post_thumbnail() ) { 
						the_post_thumbnail( 'atty-lrg' );
					}
				?>
				<a class="attorney-contact-btn" href="#add-link">Contact</a>

				<?php if (have_rows('attorney_awards')) : ?>
					<?php while( have_rows('attorney_awards') ): the_row('attorney_award_image'); 

						$img = get_sub_field('attorney_award_image');
					?>	
						<img class="attorney-award" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</article>
	</div>
	
</div>
<?php get_footer(); ?>