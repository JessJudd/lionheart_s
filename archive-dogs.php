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
		<section class="hero is-small is-info">
			<div class="hero-body">
				<div class="container px-5">
					<p class="title is-2">Dogs of the Ranch</p>
					<p class="subtitle is-4">Meet our Lionhearted Residents</p>
				</div>
			</div>
		</section>
		<section class="page pageInner is-large my-5">
    <div class="container columns is-8">
      <div class="column pageContentWrapper pt-0">
        <section class="pageContentHeader">
          <div class="container is-max-desktop has-text-centered">
            <h3 class="title is-3 is-spaced"></h3>
            <h4 class="subtitle is-5">
              Lionheart Ranch &amp; Rescue is happy to provide a loving, stable home for these dogs. Unless indicated specifically, most of these dogs are not available for adoption. The Ranch is their forever home for a variety of reasons unique to each animal. To support the ranch or your favorite dog, donations are always  appreciated. 
            </h4>
          </div>
        </section>

		<?php
		if ( have_posts() ) : ?>

				<section class="pageContent">
					<div class="container fixed-grid py-6">
						<div class="grid is-gap-4 dogGrid">




			<?php /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'dog-excerpt' );

			endwhile; ?>

			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div><!-- .grid .dogGrid -->
		</div><!-- .fixed-grid -->
		</section><!-- .pageContent -->
		</div><!-- .column -->
		</section><!-- .columns -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
