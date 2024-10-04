<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lionheart_s
 */

 $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="hero is-large" style="background-image:url('<?php echo $image[0]; ?>');">
    <div class="hero-body">
      <div class="container px-5">
        <p class="title is-2 has-text-white is-spaced">Ranch &amp; Rescue</p>
        <p class="subtitle is-4 has-text-white">Established 2007 in Apple Valley, California</p>
      </div>
    </div>
  </section>

	<section class="page pageInternal my-2">
    <div class="container content p-5 is-max-desktop">
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lionheart_s' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'lionheart_s' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
		</div><!-- .container -->
	</section><!-- .page -->
</article><!-- #post-<?php the_ID(); ?> -->
