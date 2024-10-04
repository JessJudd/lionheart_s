<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lionheart_s
 */

?>


<div class="singleDog dogPost cell">
  <figure class="image is-3by2">
    <?php lionheart_s_post_thumbnail(); ?>
  </figure>
  <?php the_title( '<h3 class="dogExcerpt title is-3 py-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
</div>