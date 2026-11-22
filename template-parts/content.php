<?php
/**
 * Post card used in index/archive/search loops.
 *
 * @package Cairo_Starter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'service-card' ); ?> style="margin-bottom:24px">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
		</div>
	<?php endif; ?>
	<h2 class="entry-title" style="font-size:1.5rem">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="entry-meta"><?php echo esc_html( get_the_date() ); ?></div>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
	<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'cairo-starter' ); ?> &rarr;</a>
</article>
