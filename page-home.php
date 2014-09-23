<?php

/** 
 * Homepage
 */

get_header(); ?>
<div class="l-hero-con">
	<div class="l-hero">
		<img src="<?php bloginfo('template_directory');?>/img/temp-hero-1.jpg" alt="">
	</div>
</div>
<div class="l-home-intro-con.l-outer">
	<article class="home-intro l-inner">
		<h2><?php the_field('home_intro_heading'); ?></h2>
		<?php the_field('home_intro_main_content'); ?>
		<?php if (get_field('home_intro_main_hidden_content')) : ?>
			<?php the_field('home_intro_main_hidden_content'); ?>
		<?php endif; ?>
	</article>
</div>
<div class="l-cta-icons-con l-outer">
	<section class="l-inner cta-icons clearfix">
		<h3 class="cta-icons-main-heading"><?php the_field('home_practice_areas_heading'); ?></h3>
		<div class="l-cta-icons-wrapper clearfix">
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = get_field('home_practice_area_col1_svg');
					$img = get_field('home_practice_area_col1_default_image');
					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('home_practice_area_col1_heading');
					}
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('home_practice_area_col1_heading'); ?></h4>
				<?php the_field('home_practice_area_col1_content'); ?>
				<p class="cta-icon-link"><a href="<?php the_field('home_practice_area_col1_link'); ?>"><?php the_field('home_practice_area_col1_link_text'); ?></a></p>

			</section>
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = get_field('home_practice_area_col2_svg');
					$img = get_field('home_practice_area_col2_default_image');
					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('home_practice_area_col2_heading');
					}
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('home_practice_area_col2_heading'); ?></h4>
				<?php the_field('home_practice_area_col2_content'); ?>
				<p  class="cta-icon-link"><a href="<?php the_field('home_practice_area_col2_link'); ?>"><?php the_field('home_practice_area_col2_link_text'); ?></a></p>

			</section>
			<section class="l-cta-icon-col cta-icon">
				<?php
					$svg = get_field('home_practice_area_col3_svg');
					$img = get_field('home_practice_area_col3_default_image');
					if ($img['alt']) {
						$alt = $img['alt'];
					} else {
						$alt = get_field('home_practice_area_col1]3_heading');
					}
				?>
				<div class="img-holder">
					<?php if ($svg) : ?>
						<img src="<?php echo $svg['url'] ?>" onerror="this.src='<?php echo $img['url'] ?>'" alt="<?php echo $alt ?>">
					<?php else : ?>
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $alt; ?>">
					<?php endif; ?>
				</div>
				<h4><?php the_field('home_practice_area_col3_heading'); ?></h4>
				<?php the_field('home_practice_area_col3_content'); ?>
				<p class="cta-icon-link"><a href="<?php the_field('home_practice_area_col3_link'); ?>"><?php the_field('home_practice_area_col3_link_text'); ?></a></p>

			</section>
		</div>
	</section>
</div>
<div class="l-contact-form-cta-con l-outer">
	<div class="l-contact-form-cta l-inner clearfix">
		<div class="l-contact-cta-col l-left contact-cta-quote">
			<?php the_field('quote_content'); ?>
			<div class="contact-cta-quote-name">
				<?php the_field('quote_name'); ?>
			</div>
		</div>
		<div class="l-contact-cta-col l-right contact-cta-form">
			<?php echo do_shortcode('[contact-form-7 id="260" title="Contact an attorney"]'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>