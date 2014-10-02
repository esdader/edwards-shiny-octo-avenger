<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Fredoka+One::latin' ] }
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
				'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})(); 
	</script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript">
  lang: en_US
</script>

<div class="l-outer l-main-header-outer">
	<header class="l-main-header l-inner" role="banner">
		<a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" onerror="this.src='<?php bloginfo('template_directory'); ?>/img/logo.png'" alt="The Edwards Law Firm"></a>
		<?php 
			$phone     = get_field('phone', 'option');
			$toll_free = get_field('toll_free_number', 'option');
		?>
		<div class="header-phone"><a href="tel:<?php echo strip_dashes_from_number($phone); ?>"><?php echo $phone; ?></a> / <a href="tel:<?php echo strip_dashes_from_number($toll_free); ?>"><?php echo $toll_free; ?></a></div>
		<a href="mailto:<?php the_field('email', 'option'); ?>" class="icon-header-contact ir">Contact</a>
		<div class="header-social-media-links">
			<ul class="l-horizontal-list header-social-media-list">
				<li>
					<a href="<?php the_field('facebook', 'option'); ?>" class="header-social-media-link header-facebook ir">Facebook</a>
				</li>
				<li>
					<a href="<?php the_field('twitter', 'option'); ?>" class="header-social-media-link header-twitter ir">Twitter</a>
				</li>
				<li>
					<a href="<?php the_field('google+', 'option'); ?>" class="header-social-media-link header-google-plus ir">Google+</a>
				</li>
			</ul>
		</div>
		<div class="l-language-toggle">
			<p class="language-toggle">
				<a href="<?php echo get_site_url(); ?>">English</a>
				<span class="divider"> | </span>
				<a href="<?php echo get_page_link(); ?>">Spanish</a>
		</div>
		<nav class="l-main-nav clearfix" role="navigation">
			<?php 
				$params = array(
				    'theme_location' => 'header-menu',
				    'container' => false,
				    'menu_class' => 'l-horizontal-list main-menu'
				);

				wp_nav_menu($params);
			?>
		</nav>
	</header>
</div>