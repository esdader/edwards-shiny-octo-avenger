<?php

/**
 * blog -- single view
 */

// make sure contact cta gets right ID
$template_part_id = $post->ID;	

get_header(); ?>

<div class="l-blog-single-view l-single-col-content l-inner">
	<div class="hentry">
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content clearfix">
			<h1 class="blog-title"><?php the_title(); ?></h1>
			<?php 
			if ( has_post_thumbnail() ) : ?>
				<div class="post-main-img"><?php the_post_thumbnail('full'); ?></div>
			<?php endif; ?>
			<p class="single-view-meta">
				<?php the_author (); ?> | <?php the_date(); ?>
			</p>
			<section class="l-blog-single-main-content">
				<?php the_content(); ?>
				<div class="l-post-social-media-likes-con">
					<ul class="l-horizontal-list social-media-likes clearfix">
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></li>
						<li>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a>
						</li>
						<li>
							<div class="g-plusone" data-href="<?php the_title(); ?>"></div>
						</li>
						<li>
							<script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
						</li>

					</ul>
				</div>
			</section>

			<?php endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			<?php endif; ?>
		</article>
	</div>
</div>
<?php include(locate_template('blog-contact-cta.php')); ?>
<?php get_footer(); ?>