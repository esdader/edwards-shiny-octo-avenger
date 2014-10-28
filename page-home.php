<?php

/** 
 * Homepage
 */

get_header(); ?>
<?php if (have_rows('homepage_carousel') ) : ?>
	<div class="l-hero-con">
		<div class="l-hero">
			<?php while ( have_rows('homepage_carousel') ) : the_row(); ?>
				<?php $img = get_sub_field('homepage_carousel_image'); ?>
				<div class="edwards-slide">
					<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
					<div class="l-text-overlay">
						<h2>
							<?php the_sub_field('homepage_carousel_copy_line_one'); ?>
							 <span><?php the_sub_field('homepage_carousel_copy_line_two'); ?></span>
						</h2>
						<a class="cta-how-help-btn" href="http://ed.esd/contact/">How Can We Help?</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<div class="l-home-intro-con.l-outer">
	<div class="l-inner">
		<article class="home-intro">
			<h1 class="home-intro-heading"><?php the_field('home_intro_heading'); ?></h1>
			<div class="home-intro-copy">
				<?php the_field('home_intro_main_content'); ?>
				<?php if (get_field('home_intro_main_hidden_content')) : ?>
					<button class="show-more">more</button>
					<div class="accordian-content">
						<?php the_field('home_intro_main_hidden_content'); ?>
					</div>	
				<?php endif; ?>
			</div>
		</article>
	</div>
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
<div class="l-home-middle-section-con l-outer">
	<div class="l-home-middle-section l-inner home-middle-section clearfix">
		<div class="l-home-middle-section-col l-left">
			<h3><?php the_field('home_middle_section_heading'); ?></h3>
		</div>
		<div class="l-home-middle-section-col l-right">
			<?php 
				$content = get_field('home_middle_section_content'); 
				$link = get_field('home_middle_section_link');
				$link_text = get_field('home_middle_section_link_text');

				$content = $content . " <a href='{$link}''>{$link_text}</a>";
			?>
			<?php echo wpautop($content); ?>
		</div>
	</div>
</div>
<?php get_template_part('contact-cta' ); ?>

<?php get_footer(); ?>