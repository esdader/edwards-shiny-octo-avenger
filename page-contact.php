<?php

/**
 * Contact page
 */


get_header(); ?>

<div class="l-general-content-con l-outer">
	<div class="l-general-content l-inner">
		<div class="hentry">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="entry-content">
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<?php else: ?>

			<?php endif; ?>
		</div>
	</div>
</div>
<div class="l-contact-details-con l-inner l-general-content l-interior-section clearfix">
	<div class="l-contact-details-col address-block">
		<h3><?php bloginfo('name'); ?></h3>
		<p>
			<?php 
				$phone     = get_field('phone', 'option');
				$toll_free = get_field('toll_free_number', 'option');
			?>
			<?php the_field('addy_1', 'option'); ?>, <?php the_field('addy_2', 'option'); ?> 
			<br><?php the_field('city', 'option'); ?>, <?php the_field('state', 'option'); ?> <?php the_field('zip_code', 'option');?>
			<br>Phone: <?php the_field('phone', 'option'); ?>
			<br>Toll Free: <?php the_field('toll_free_number', 'option'); ?>
			<br>Fax: <?php the_field('fax', 'option'); ?>
		</p>
	</div>
	<div class="l-contact-map-col">
		<iframe class="map-module" src="http://maps.google.com/?q=http://kml.findlaw.com/1242722_1.kml&amp;z=14&amp;iwloc=A&amp;output=embed"> </iframe>
	</div>
</div>
<div class="l-general-content l-inner l-interior-section clearfix">
	<div class="l-contact-page-form-con">
		<?php echo do_shortcode('[contact-form-7 id="365" title="Contact an attorney"]'); ?>
	</div>
</div>

<?php get_footer(); ?>