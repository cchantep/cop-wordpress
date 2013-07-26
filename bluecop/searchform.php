<?php
/**
 * The template for displaying search forms in Blue COP
 *
 * @package WordPress
 * @subpackage Blue_COP
 * @since Blue COP 0.1
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'bluecop' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'bluecop' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'bluecop' ); ?>" />
	</form>
