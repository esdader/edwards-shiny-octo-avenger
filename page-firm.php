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
<div class="l-firm-awards-con l-outer">
	<div class="l-firm-awards l-inner firm-awards clearfix">
		<div class="l-wrapper-center">
			<h2 class="firm-awards-heading"><?php the_field('firm_awards_section_title'); ?></h2>
		</div>
		<div class="l-firm-awards-col l-left">
			
			<?php
				$img = get_field('firm_award_image1');
				$img2 = get_field('firm_award_image2');
			?>
			<p>
				<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				<img src="<?php echo $img2['url']; ?>" alt="<?php echo $img2['alt']; ?>">
		</div>
		<div class="l-firm-awards-col l-right">
			<?php the_field('firm_award_main_content'); ?>
		</div>
	</div>
</div>
<?php get_template_part('contact-cta' ); ?>
<?php get_footer(); ?>