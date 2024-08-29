<?php
/**
 * Template Name: Services Layout
 *  * Template Post Type: service
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="services-page">

<div class="<?php echo the_field('hero_banner_background'); ?>">
	<div class="container">
		<div class="hero">
			<span>Found in: <u>Life Events</u></span>
			<h2 class=""><?php the_title(); ?></h2>
			<p class=""><?php echo the_field('hero_banner_text'); ?></p>
			
		</div>
	</div>
</div>



<div class="wrapper" id="page-wrapper">
	

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="<?php echo is_active_sidebar( 'right-sidebar' ) ? 'col-md-8' : 'col-md-12'; ?> content-area" id="primary">

				<main class="site-main" id="main" role="main">

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

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

</div>

<?php
get_footer();
