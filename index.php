<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lionheart_s
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="hero is-small is-link">
			<div class="hero-body">
				<div class="container px-5">
					<p class="title is-2">Stories from the Ranch</p>
					<p class="subtitle is-4">Browse all stories and information about big dog rescue</p>
				</div>
			</div>
		</section>

		<?php
		if ( have_posts() ) : ?>

		<section class="page pageBlog my-5">
			<div class="container p-5 fixed-grid has-1-cols-mobile">
				<div class="grid is-gap-4">

			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : ?>

			

			<?php the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );
				get_template_part( 'template-parts/content', 'excerpt' );

			?>


		<?php endwhile; ?>

		</div><!-- .grid -->
		</div><!-- .fixed-grid -->
		</section><!-- .pageBlog -->

			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
