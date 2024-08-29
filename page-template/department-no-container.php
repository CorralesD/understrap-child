<?php
/**
 * Template Name: Department Landing Page
 * Template Post Type: department
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

<div id="department-page">

<div id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<div class="landing-page" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

				<nav class="department-menu navbar navbar-expand-lg bg-body-tertiary">
					<div class="container">
					<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo get_field('department_link_1') ?>"><?php echo get_field('department_link_1_text') ?></a>
						</li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo get_field('department_link_2') ?>"><?php echo get_field('department_link_2_text') ?></a>
						</li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo get_field('department_link_3') ?>"><?php echo get_field('department_link_3_text') ?></a>
						</li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo get_field('department_link_4') ?>"><?php echo get_field('department_link_4_text') ?></a>
						</li>
					</ul>
					</div>
				</nav>

				<div id="department-page-hero" class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile">
					<div class="wp-block-media-text__content">
						<h2 class="wp-block-heading title"><?php the_title(); ?></h2>
						<p class="lead text"><?php echo get_field('hero_text'); ?></p>
					</div>
					<figure>
						<img class="img-fluid shadow" src="<?php echo get_field('hero_image') ?>">
					</figure>
				</div>
				<section id="department-page-services">
				<div class="container">
				<h2 class="heading">Services</h2>
				<div class="container services-container">
				<div class="row row-cols-1 row-cols-md-3 g-4">
						<?php
						$args = array( 'post_type' => 'service', 'posts_per_page' => 10 );
						$the_query = new WP_Query( $args );
						?>
						<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col">
							<a href="<?php echo get_the_permalink(); ?>">
							<div class="card h-100">
								<div class="card-body">
								<i class="<?php echo the_field('service_icon'); ?>"></i>
									<h5 class="card-title"><?php the_title(); ?></h5>
									<p class="card-text"><?php echo get_field('hero_banner_text') ?></p>
								</div>
							</div>
							</a>
						</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
						<?php else: ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				</div>
				</section>
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

</div>



<?php
get_footer();
