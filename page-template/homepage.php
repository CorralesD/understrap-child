<?php
/**
 * Template Name: homepage
 **/
defined( 'ABSPATH' ) || exit;

 get_header();
 $container = get_theme_mod( 'understrap_container_type' );
 
 if ( is_front_page() ) {
     get_template_part( 'global-templates/hero' );
 }
 
 ?>
 
<?php 
$type = get_field('banner_type');

if( get_field('toggle') ): ?>
	<div class='global-alert-banner' style='padding:8px 4em; background:<?php echo get_field('banner_background_color'); ?>'>
		<div class='container'>
			<?php $type ?>
			<div class='message' style='color:<?php echo get_field('banner_color') ?>'>
			<span style='padding-right: 5px;'><?php echo get_field('banner_icon'); ?></span>
			<span style='text-decoration: underline;'><?php echo get_field('banner_message'); ?></span>
			</div>
		</div>
	</div>
<?php endif ?>

<div class="section_services">
	
</div>

<div>

	<div class="<?php $container ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

				<div class="wp-block-group section_services">
						<div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">
							<div class="wp-bootstrap-blocks-container container mb-0 home-cosd-services">
								<h2 class="wp-block-heading">Services</h2>
								<div class="wp-bootstrap-blocks-container container mb-2">
									<nav class="wp-block-navigation is-layout-flex wp-block-navigation-is-layout-flex" aria-label="Services">
										<ul class="wp-block-navigation__container  wp-block-navigation">
										<?php
														$args = array(
															'post_type' => 'service',
															'posts_per_page' => 10,
															'orderby' => 'meta_value_num',
															'meta_key' => 'order_by'
														);
														$the_query = new WP_Query( $args );
														?>
														<?php if ( $the_query->have_posts() ) : ?>
														<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
											<li class=" wp-block-navigation-item wp-block-navigation-link">
												<a class="wp-block-navigation-item__content" href="<?php echo get_the_permalink(); ?>">
												<span class="<?php echo the_field('service_icon'); ?>"></span>
													<span class="wp-block-navigation-item__label"><?php the_title(); ?></span>
												</a>
											</li>
										<?php endwhile;
										wp_reset_postdata(); ?>
										<?php else: ?>
										<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
										<?php endif; ?>
										</ul>
									</nav>
								</div>
								<div style="height:23px" aria-hidden="true" class="wp-block-spacer"></div>
								<div class="wp-bootstrap-blocks-container container mb-2">
									<div class="wp-bootstrap-blocks-button">
										<a href="" class="btn btn-primary">See all services</a>
									</div>
								</div>
								<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
							</div>
						</div>
					</div>

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

<?php
get_footer();
