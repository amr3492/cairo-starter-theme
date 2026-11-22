<?php
/**
 * Archive (category, tag, date, author).
 *
 * @package Cairo_Starter
 */

get_header();
?>
<div class="site-content">
	<div class="container content-with-sidebar">
		<div>
			<header class="section-heading" style="text-align:left">
				<h2><?php the_archive_title(); ?></h2>
				<?php the_archive_description( '<p>', '</p>' ); ?>
			</header>
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				the_posts_pagination();
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
