<?php
/**
 * Front page: hero, services, portfolio loop, CTA.
 *
 * Services are three pages using the "Service" template; the portfolio
 * section lists the latest posts from the "portfolio" category if it
 * exists, otherwise the latest posts.
 *
 * @package Cairo_Starter
 */

get_header();
?>

<section class="hero">
	<div class="container">
		<h1><?php echo esc_html( cairo_starter_hero( 'heading' ) ); ?></h1>
		<p><?php echo esc_html( cairo_starter_hero( 'subheading' ) ); ?></p>
		<a class="btn" href="<?php echo esc_url( cairo_starter_hero( 'button_url' ) ); ?>">
			<?php echo esc_html( cairo_starter_hero( 'button' ) ); ?>
		</a>
	</div>
</section>

<?php
$services = new WP_Query(
	array(
		'post_type'      => 'page',
		'posts_per_page' => 3,
		'meta_key'       => '_wp_page_template',
		'meta_value'     => 'template-service.php',
	)
);
if ( $services->have_posts() ) :
	?>
	<section class="section">
		<div class="container">
			<div class="section-heading">
				<h2><?php esc_html_e( 'What we do', 'cairo-starter' ); ?></h2>
			</div>
			<div class="grid-3">
				<?php
				while ( $services->have_posts() ) :
					$services->the_post();
					?>
					<article class="service-card">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
endif;

$portfolio = new WP_Query(
	array(
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
	)
);
if ( $portfolio->have_posts() ) :
	?>
	<section class="section alt">
		<div class="container">
			<div class="section-heading">
				<h2><?php esc_html_e( 'Recent work', 'cairo-starter' ); ?></h2>
			</div>
			<div class="grid-3">
				<?php
				while ( $portfolio->have_posts() ) :
					$portfolio->the_post();
					?>
					<article class="portfolio-card">
						<a href="<?php the_permalink(); ?>">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'cairo-starter-portfolio' );
							}
							?>
						</a>
						<div class="card-body">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 14 ) ); ?></p>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
endif;
?>

<section class="section" id="contact">
	<div class="container" style="text-align:center">
		<div class="section-heading">
			<h2><?php esc_html_e( 'Ready when you are', 'cairo-starter' ); ?></h2>
			<p><?php esc_html_e( 'Tell us about your project and get a reply within one business day.', 'cairo-starter' ); ?></p>
		</div>
		<a class="btn" href="mailto:<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">
			<?php esc_html_e( 'Start the conversation', 'cairo-starter' ); ?>
		</a>
	</div>
</section>

<?php
get_footer();
