<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Blue_COP
 * @since Blue COP 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bluecop' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<div class="entry-social">
			<div class="gplus"><g:plusone size="normal"></g:plusone></div>
		</div>

		<?php edit_post_link( __( 'Edit', 'bluecop' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->