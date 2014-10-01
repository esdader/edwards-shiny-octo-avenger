<?php

/**
 * Reviews
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;


get_header(); ?>

<div class="l-case-results-landing l-single-col-content l-inner">
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
</div>
<div class="l-case-resuslts-listing l-inner">
	<?php if( have_rows('reviews_case_category') ): ?>
		<?php while( have_rows('reviews_case_category') ): the_row(); ?>
			<div class="l-case-result-listing-entry">
				<div class="case-results-header">
					<h3 class="case-results-heading"><button class="result-entry-btn">View</button> <?php the_sub_field('reviews_category_name'); ?></h3>	
				</div>
				<?php if (have_rows('reviews_review')) : ?>
					<div class="l-case-result-listing-cases">
						<div class="l-case-btn-con">
							<button class="result-entry-close-btn">Hide</button>
						</div>
						<?php while (have_rows('reviews_review')) : the_row(); ?>
							<div class="l-case-result-listing-case review-quote">
								<?php the_sub_field('reviews_review_quote'); ?>
								<p class="quote-meta">
									<?php the_sub_field('reviews_name'); ?> | <?php the_sub_field('reviews_review_type'); ?>
								</p>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>


