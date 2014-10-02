<?php 

/**
 * Attorneys landing page
 */

// make sure contact cta gets right ID
$template_part_id = 8;

get_header(); ?>
<div class="l-single-col-content l-inner">
	<div class="hentry">
		<?php if (has_post_thumbnail(8)) : ?>
			<div class="atty-featured-image">
				<?php echo get_the_post_thumbnail( 8, 'full' ); ?>
			</div>
		<?php endif; ?>
		<article class="entry-content atty-intro clearfix">
			<h1 class="blog-title"><?php the_field('attornyes_landing_page_main_heading', 8); ?></h1>
			<section class="l-blog-single-main-content">
				<?php the_field('attorneys_landing_main_content', 8); ?>
			</section>
		</article>
	</div>
</div>
<div class="l-atty-con l-outer">
	<div class="l-atty l-inner">
		<div class="l-atty-header">
			<h2 class="atty-section-title"><?php the_field('attorneys_section_heading', 8); ?></h2>
		</div>
		<ul class="atty-list l-horizontal-list partner-list clearfix">
			<?php
				$args = array(
						'post_type' => 'attorneys',
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'posts_per_page' => -1,
						'titles'    => 'partner',
					);

				$attys = new WP_Query($args);

			?>

			<?php if ( $attys->have_posts() ) : while ( $attys->have_posts() ) : $attys->the_post(); ?>
				<li>
					<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
					<?php endif; ?>
					<h4 class="attorney-name">
						<?php the_title(); ?>
					</h4>
					<p><a href="<?php the_permalink(); ?>">VIEW BIO</a></p>
					<p><a href="#add-link">Contact</a></p>
				</li>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</ul>
		<div class="l-atty-header">
			<h2 class="atty-section-title"><?php the_field('attorneys_section_heading', 8); ?></h2>
			<!-- <h2 class="atty-section-title"><?php the_field('lawyers_section_heading', $id); ?></h2> -->
		</div>
		<ul class="atty-list l-horizontal-list associate-list clearfix">
			<?php
				$args = array(
						'post_type' => 'attorneys',
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'posts_per_page' => -1,
						'titles'    => 'associate',
					);

				$attys = new WP_Query($args);

			?>

			<?php if ( $attys->have_posts() ) : while ( $attys->have_posts() ) : $attys->the_post(); ?>
				<li>
					<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('atty_med'); ?></a>
					<?php endif; ?>
					<h4 class="attorney-name">
						<?php the_title(); ?>
					</h4>
					<p><a href="<?php the_permalink(); ?>">VIEW BIO</a></p>
					<p><a href="#add-link">Contact</a></p>
				</li>
			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</ul>
	</div>
</div>

<?php get_footer(); ?>