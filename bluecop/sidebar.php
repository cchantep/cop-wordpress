<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Blue_COP
 * @since Blue COP 0.1
 */

$options = bluecop_get_theme_options();

?>
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
<?php endif; // end sidebar widget area ?>
