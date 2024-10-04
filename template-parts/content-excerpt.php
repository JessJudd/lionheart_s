<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lionheart_s
 */

?>


<div class="singlePost columns is-3">
  <div class="column is-two-fifths">
      <figure class="image is-4by5 is-hidden-mobile">
        <?php lionheart_s_post_thumbnail(); ?>
      </figure>
      <figure class="image is-16by9 is-hidden-tablet">
        <?php lionheart_s_post_thumbnail(); ?>
      </figure>
  </div>
  <div class="column">
    <div class="content">
      
      <?php
      $categories = get_the_category();
      if ( ! empty( $categories ) ) {
        echo '<div class="story-cat">' . esc_html( $categories[0]->name ) . '</div>';	
      }
      
			the_title( '<h2 class="entry-title mt-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>

      <div class="entry-excerpt">
        <?php
        // the_content(
        the_excerpt(
          sprintf(
            wp_kses(
              /* translators: %s: Name of current post. Only visible to screen readers */
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lionheart_s' ),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            wp_kses_post( get_the_title() )
          )
        );
        ?>
      </div><!-- .entry-excerpt -->
    </div>
  </div>
</div>