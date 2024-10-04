<?php
/**
* Template Name: Custom Home Page
*
* @package WordPress
* @subpackage lionheart_s
* @since lionheart_s
*/

get_header();

?>

	<main id="primary" class="site-main">

  <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <section class="hero is-large pageIsHome" style="background-image:url('<?php echo $image[0]; ?>')">
      <div class="hero-body">
        <div class="container px-5">
          <p class="title is-1 is-spaced has-text-white">Life is good at the Ranch</p>
          <p class="subtitle is-3 has-text-white">Thanks for visiting our little slice of paradise</p>
        </div>
      </div>
    </section>
  <?php endif; ?>

		<?php
		while ( have_posts() ) : ?>
    <section class="page pageIsHome is-large mt-6 mb-4">
      <div class="container columns is-6">
			<?php the_post(); ?>
        <div class="column is-two-thirds pageContentWrapper pt-0">
          <?php get_template_part( 'template-parts/content', 'home' ); ?>
        </div>

      <?php endwhile; // End of the loop. ?>

      <div class="column pageSidebar">
        <div class="container p-5">
          <?php get_sidebar(); ?>
        </div>
      </div>

	</main><!-- #main -->

<?php
get_footer();
