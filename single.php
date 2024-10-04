<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lionheart_s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			?>


			<section class="container px-4 pagination">
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle pagination-previous has-background-link">' . esc_html__( 'Previous Story:', 'lionheart_s' ) . '&nbsp;<span class="nav-title">%title</span></span> ',
					'next_text' => '<span class="nav-subtitle pagination-next has-background-link">' . esc_html__( 'Next Story:', 'lionheart_s' ) . '&nbsp;<span class="nav-title">%title</span></span>',
				)
			);
			?>
			</section>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
