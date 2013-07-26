<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Blue_COP
 * @since Blue COP 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'bluecop_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bluecop' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bluecop' ); ?>" onclick="window.open(this.href);return false;" rel="generator"><?php printf( __( 'Proudly powered by %s', 'bluecop' ), 'WordPress' ); ?></a> | <a href="http://www.applicius.fr" title="Applicius - Créateur de solutions logicielles innovantes" onclick="window.open(this.href);return false;" rel="friend generator">Intégration Applicius</a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
