<?php
/**
 * Comments template.
 *
 * @package Cairo_Starter
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2>
			<?php
			printf(
				/* translators: %s: number of comments. */
				esc_html( _nx( '%s comment', '%s comments', get_comments_number(), 'comments title', 'cairo-starter' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol' ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="muted"><?php esc_html_e( 'Comments are closed.', 'cairo-starter' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
