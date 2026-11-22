<?php
/**
 * Template Name: Service
 *
 * Marks a page as a service; services appear in the front-page
 * "What we do" grid automatically.
 *
 * @package Cairo_Starter
 */

get_header();
?>
<div class="site-content">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php endif; ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
			<section class="section" style="padding:32px 0;text-align:center">
				<a class="btn" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">
					<?php esc_html_e( 'Ask about this service', 'cairo-starter' ); ?>
				</a>
			</section>
			<?php
		endwhile;
		?>
	</div>
</div>
<?php
get_footer();
