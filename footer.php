<div class="l-outer l-main-footer-con">
	<footer class="l-main-footer l-inner main-footer clearfix">
		<div class="l-footer-col l-footer-addy footer-addy">
			<h4><?php bloginfo('name'); ?></h4>
			<p>
				<?php 
					$phone     = get_field('phone', 'option');
					$toll_free = get_field('toll_free_number', 'option');
				?>
				<?php the_field('addy_1', 'option'); ?>, <?php the_field('addy_2', 'option'); ?> 
				<br><?php the_field('city', 'option'); ?>, <?php the_field('state', 'option'); ?> <?php the_field('zip', 'option');?>
				<br>Phone: <?php the_field('phone', 'option'); ?>
				<br>Toll Free: <?php the_field('toll_free_number', 'option'); ?>
				<br>Fax: <?php the_field('fax', 'option'); ?>
				<br><a href="<?php echo get_page_link(18); ?>">Office Map</a>
			</p>
		</div>
		<div class="l-footer-col l-copyright copyright">
			<p>
				&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
				<br>All rights reserved
			</p>
			<div class="footer-social-media-links">
				<ul class="l-horizontal-list footer-social-media-list">
					<li>
						<a href="<?php the_field('facebook', 'option'); ?>" class="footer-social-media-link footer-facebook ir">Facebook</a>
					</li>
					<li>
						<a href="<?php the_field('twitter', 'option'); ?>" class="footer-social-media-link footer-twitter ir">Twitter</a>
					</li>
					<li>
						<a href="<?php the_field('google+', 'option'); ?>" class="footer-social-media-link footer-google-plus ir">Google+</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="l-footer-col l-footer-links">
			<?php 
				$params = array(
				    'theme_location' => 'left-footer-menu',
				    'container' => false,
				    'menu_class' => 'footer-links'
				);

				wp_nav_menu($params);
			?>
		</div>
		<div class="l-footer-col l-footer-links">
			<?php 
				$params = array(
				    'theme_location' => 'right-footer-menu',
				    'container' => false,
				    'menu_class' => 'footer-links'
				);

				wp_nav_menu($params);
			?>
			<ul class="footer-links l-trust-link">
				<li><a href="#add-link">The Edwards Trust</a></li>
			</ul>
		</div>
	</footer>
</div>

    <?php wp_footer(); ?>
    
    <script>
        // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        // g.src='//www.google-analytics.com/ga.js';
        // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>