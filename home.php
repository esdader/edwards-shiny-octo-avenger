<?php 
/**
 * blog landing page
 */

// make sure contact cta gets right ID
$template_part_id = 16;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
global $wp_query;
$np = $wp_query->max_num_pages;

get_header(); ?>

<div class="l-blog-landing l-inner blog-landing">
	<h1 class="heading-main"><?php the_field('blog_landing_page_title', 16); ?></h1>
	<?php if  ( ! is_paged() ) : ?>
		<?php 
			$args = array(
						'posts_per_page' => 1
					);
		?>
		<?php $first_post = new WP_Query($args); ?>

		<?php if ( $first_post->have_posts() ) : while ( $first_post->have_posts() ) : $first_post->the_post(); ?>
			<div class="l-blog-landing-single-post clearfix">
				
				<div class="l-blog-landing-single-post-content-col">
					<div class="blog-landing-content">
						<h3 class="blog-heading"><?php the_title(); ?></h3>
						<p class="landing-view-meta"><?php the_author (); ?> | <?php the_date(); ?></p>
						<?php the_excerpt(); ?>
					</div>
				</div>

				<?php if ( has_post_thumbnail($post->ID) ) : ?>
					<div class="l-blog-landing-featured-image">
						<?php the_post_thumbnail('full', $post->ID); ?>
					</div>
				<?php endif; ?>
				
				
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
			</div>
			
		<?php endwhile; endif; ?>
	<?php endif; ?>
	
	<?php if ( have_posts() ) : $i = 0; ?>
		<div class="l-blog-landing-dual-post clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="l-blog-landing-dual-post-col <?php echo ($i == 0) ? 'l-left' : 'l-right'; ?>">
					<h3 class="blog-heading"><?php the_title(); ?></h3>
					<p class="landing-view-meta"><?php the_author (); ?> | <?php the_date(); ?></p>
					<div class="blog-landing-content">
						<?php the_excerpt(); ?>
					</div>
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
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
		<div class="l-pagination">
			<span class='pagi-intro'>Page <?php echo $paged; ?> of <?php echo $np; ?></span>
			<?php 
				$args = array(
							'prev_text'    => __('&lt;'),
							'next_text'    => __('&gt;'),
							'type'	       => 'list'
						);
				echo paginate_links($args); 
			?>	
		</div>
		
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
</div>
<?php include(locate_template('contact-cta.php')); ?>

<?php get_footer(); ?>