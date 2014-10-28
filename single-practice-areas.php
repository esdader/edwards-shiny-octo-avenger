<?php 

/**
 * Single practice areas
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;

get_header(); ?>
<div class="l-practice-area-single l-single-col-content l-inner">
	<div class="hentry">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<section class="l-practice-sigle-main">
				<div class="l-image-cta-box">
					<div class="l-image-box">
						<?php 
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail( 'full' );
							}
						?>
					</div>
					<a class="cta-how-help-btn" href="<?php echo get_page_link(18); ?>">How Can We Help?</a>
				</div>
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
<?php if ( get_field('show_practice_areas') ) : ?>
<div class="l-cta-icons-con l-outer">
	<section class="l-inner cta-icons clearfix">
		<h3 class="cta-icons-main-heading"><?php the_field('practice_areas_section_title'); ?></h3>
		<div class="l-cta-icons-wrapper clearfix">
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = get_field('practice_area_svg_col1');
					$img = get_field('practice_area_image_col1');
					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('practice_area_litigants_col1');
					}	
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('practice_area_litigants_col1'); ?></h4>
				<?php the_field('practice_area_content_col1'); ?>
				<p class="cta-icon-link"><a href="<?php the_field('practice_area_link_col1'); ?>">READ MORE</a></p>

			</section>
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = null;
					$img = null;
					$alt = null;

					$svg = get_field('practice_area_svg_col2');
					$img = get_field('practice_area_image_col2');
					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('practice_area_litigants_col2');
					}
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('practice_area_litigants_col2'); ?></h4>
				<?php the_field('practice_area_content_col2'); ?>
				<p class="cta-icon-link"><a href="<?php the_field('practice_area_link_col2'); ?>">READ MORE</a></p>

			</section>
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = null;
					$img = null;
					$alt = null;

					$svg = get_field('practice_area_svg_col3');
					$img = get_field('practice_area_image_col3');

					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('practice_area_litigants_col3');
					}
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('practice_area_litigants_col3'); ?></h4>
				<?php the_field('practice_area_content_col3'); ?>
				<p class="cta-icon-link"><a href="<?php the_field('practice_area_link_col3'); ?>">READ MORE</a></p>

			</section>
		</div>
	</section>
</div>
<?php endif; ?>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>
