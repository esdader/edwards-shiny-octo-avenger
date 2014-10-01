<?php

/**
 * case results landing page
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
	<?php if( have_rows('case_results_page_category_section') ): ?>
		<?php while( have_rows('case_results_page_category_section') ): the_row(); ?>
			<div class="l-case-result-listing-entry">
				<div class="case-results-header">
					<h3 class="case-results-heading"><button class="result-entry-btn">View</button> <?php the_sub_field('case_results_page_category'); ?></h3>	
				</div>
				<?php if (have_rows('case_results_page_case')) : ?>
					<div class="l-case-result-listing-cases">
						<div class="l-case-btn-con">
							<button class="result-entry-close-btn">Hide</button>
						</div>
						<?php while (have_rows('case_results_page_case')) : the_row(); ?>
							<div class="l-case-result-listing-case">
								<h4 class="case-result-listing-heading">
									<?php the_sub_field('case_results_page_litigant_one'); ?>
									vs.
									<?php the_sub_field('case_results_pagelitigant_two'); ?>

									<span class="listing-award-ammount"><?php the_sub_field('case_results_page_awarded_ammount'); ?></span>
								</h4>
								
								<?php the_sub_field('case_results_pagesummary'); ?>
								<?php the_sub_field('case_results_page_read_more'); ?>
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


