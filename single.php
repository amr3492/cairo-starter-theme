<?php
/**
 * Single post.
 *
 * @package Cairo_Starter
 */

get_header();
?>
<div class="site-content">
	<div class="container content-with-sidebar">
		<div>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
					<?php endif; ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-meta">
						<?php
						printf(
							/* translators: 1: date, 2: author. */
							esc_html__( 'Published %1$s by %2$s', 'cairo-starter' ),
							esc_html( get_the_date() ),
							esc_html( get_the_author() )
						);
						?>
					</div>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="pagination">',
							'after'  => '</div>',
						)
					);
					?>
				</article>
				<?php
				the_post_navigation();
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
