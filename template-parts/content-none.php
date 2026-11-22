<?php
/**
 * Shown when a loop has no posts.
 *
 * @package Cairo_Starter
 */
?>
<section class="service-card">
	<h2 class="entry-title" style="font-size:1.4rem"><?php esc_html_e( 'Nothing here yet', 'cairo-starter' ); ?></h2>
	<p><?php esc_html_e( 'No posts matched. Try searching for something else.', 'cairo-starter' ); ?></p>
	<?php get_search_form(); ?>
</section>
