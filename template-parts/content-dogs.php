<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lionheart_s
 */

$fields = get_fields();

$blog_id = get_option('page_for_posts');

$blog_url = get_the_permalink($blog_id);
$blog_title = get_the_title($blog_id);

$featured_img = get_the_post_thumbnail();
$images = get_field('additional_images');
$postHasImg = $images || $featured_img ? true : false;

$showSidebar = get_field('image_sidebar');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- <pre><?php //var_dump($showSidebar) ?></pre> -->

	<section class="hero is-small is-info blog-header">
		<div class="hero-body">
			<div class="container px-5 columns is-vcentered">
				<div class="column is-three-fifths px-0">
					<?php 

					if($fields && $fields['custom_title']):

						echo '<h1 class="entry-title title is-2">' . $fields['custom_title'] . '</h1>';
						
						if($fields['custom_subtitle']):
							echo '<h2 class="subtitle is-4">'. $fields['custom_subtitle'] .'</h2>';
						endif;

					else: 

						the_title( '<h1 class="entry-title title is-2">', '</h1>' );

					endif;

					?>
				</div>
				<div class="column is-two-fifths px-0">
					<nav class="breadcrumb" aria-label="breadcrumbs">
						<ul class="breadcrumb-links">
							<li><a href="/">Home</a></li>
							<li><a href="/dogs">Meet the Dogs</a></li>
							<li class="is-active"><a href="#" aria-current="page"><?php the_title(); ?></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>

	<section class="page pageBlog my-5">
    <div class="container py-3 columns is-6">
		<?php if($postHasImg) : ?>
			<div class="column images isSticky">
				<?php //lionheart_s_post_thumbnail(); ?>
				<figure class="image is-4by3">
					<?php echo $featured_img; ?>
				</figure>
				<?php 
				$images = get_field('additional_images');
				if( $images ): ?>
							<?php foreach( $images as $image ): ?>
								<figure class="image my-3">
									<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</figure>
							<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- .column -->
			<?php endif; ?>
      <div class="column">
				<div class="content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lionheart_s' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div><!-- .column -->
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
