<?php
/**
 * Fallback template: blog index and anything without a more specific template.
 *
 * @package Cairo_Starter
 */

get_header();
?>
<div class="site-content">
	<div class="container content-with-sidebar">
		<div>
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				the_posts_pagination(
					array(
						'prev_text' => __( 'Newer posts', 'cairo-starter' ),
						'next_text' => __( 'Older posts', 'cairo-starter' ),
					)
				);
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
