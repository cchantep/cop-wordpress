<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Blue_COP
 * @since Blue COP 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>
  xmlns:g="http://www.google.com/+1/button/">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>
  xmlns:g="http://www.google.com/+1/button/">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>
  xmlns:g="http://www.google.com/+1/button/">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> 
  xmlns:g="http://www.google.com/+1/button/">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bluecop' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="http://www.google.com/buzz/api/button.js" type="text/javascript"></script>
<script src="https://apis.google.com/js/plusone.js" type="text/javascript">{lang: 'fr'}</script>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.vticker.1.4.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.text-overflow.min.js"></script>
<script type="text/javascript">
(function($){
  $(document).ready(function() {
        var newsItems = $(".newsScroller li");

        if (newsItems.size() > 1) {
		$(".newsScroller").vTicker({
			height: "3.333em",
			pause: 5000,
			speed: 2000,
			animation: "fade"
		});
	}

	newsItems.textOverflow();

	var h=$("#menu-menu-general li:first a:first").first();
	h.empty();
	h.append("<img alt=\"Accueil\" src=\"/wp-content/themes/bluecop/images/home-24.png\" style=\"vertical-align:middle\" />");

        if ($(window).height() > 640) {
          $(".gt640").css("display", "block");
          $(".lt640").css("display", "none");
        } else {
          $(".gt640").css("display", "none");
          $(".lt640").css("display", "block");
        }
  });
})(jQuery);</script>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<hgroup class="gt640">
				<div class="bloginfo">
					<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>

				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div id="top-area" class="widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				<?php endif; ?>
			</hgroup>

			<?php // Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="homeLink gt640">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
					<img class="banner" src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<?php // Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="gt640 only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
				<?php get_search_form(); ?>
				</div>
			<?php
				else :
			?>
				<div class="gt640"><?php get_search_form(); ?></div>
			<?php endif; ?>

			<div id="hotContents">
				<nav id="access" role="navigation">
					<h3 class="assistive-text"><?php _e( 'Main menu', 'bluecop' ); ?></h3>
					<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
					<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'bluecop' ); ?>"><?php _e( 'Skip to primary content', 'bluecop' ); ?></a></div>
					<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'bluecop' ); ?>"><?php _e( 'Skip to secondary content', 'bluecop' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #access -->
				<div class="lastNews">
					<strong onclick="self.location='/actualites/prochaines-dates'"><?php echo __( 'Flash info' ); ?></strong>
                                        <?php

                                        // Display our recent posts, showing full content for the very latest, ignoring Aside posts.
					$flash_categories = get_post_meta($post->ID, 'flash_cat');
					$flash_cat = (isset($flash_categories) && count($flash_categories) >= 1)
						? implode(',', $flash_categories) : NULL;

                                        $flash_args = array(
                                                'order' => 'DESC',
                                                'post__not_in' => get_option( 'sticky_posts' ),
                                                'tax_query' => array(
                                                        array(
                                                                'taxonomy' => 'post_format',
                                                                'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-quote', 'post-format-status' ),
                                                                'field' => 'slug',
                                                                'operator' => 'NOT IN',
                                                        ),
                                                ),
                                                'no_found_rows' => true,
                                                'category_name' => $flash_cat,
						'posts_per_page' => 3,
                                        );

                                        // Our new query for the Recent Posts section.
                                        $flash = new WP_Query( $flash_args );

					if ( $flash->have_posts() ) { ?>
						<div class="newsScroller">
							<ul>
							<?php foreach ($flash->posts as $post) { ?>
								<li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
							<? } /* end foreach */ ?>
							</ul>
						</div>
					<?php } /* endif */ ?>
				</div>
			</div>
	</header><!-- #branding -->


	<div id="main">
