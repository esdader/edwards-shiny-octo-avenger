<?php

/**
 * Staff template -- pre-litigation staff
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;


get_header(); ?>

<div class="l-practice-area-landing l-single-col-content l-inner">
	<div class="hentry">

		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			
			<section class="l-practice-landing-main">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="featured-image">
						<?php the_post_thumbnail('full'); ?>	
					</div>
				<?php endif; ?>
				<?php the_content(); ?>
			</section>
			
		</article>
	</div>
	
	
	<div class="l-practice-list-con">
		<?php if (have_rows('staff_members')) : ?>
			<?php while (have_rows('staff_members')) : the_row();  ?>
				<div class="l-staff-member-entry staff-members">
					<?php
						$name = get_sub_field('staff_member_name');
						$email = get_sub_field('staff_member_email');
					?>
					<h3><?php echo $name; ?> | <a href="mailto:<?php echo $email; ?>">Contact</a></h3> 
					<?php the_sub_field('staff_member_bio'); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
</div>
<?php include(locate_template('contact-cta.php')); ?>
<?php get_footer(); ?>
