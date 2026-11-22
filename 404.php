<?php
/**
 * 404 not found.
 *
 * @package Cairo_Starter
 */

get_header();
?>
<div class="site-content">
	<div class="container" style="text-align:center;padding:80px 20px">
		<h1 class="entry-title"><?php esc_html_e( 'That page does not exist', 'cairo-starter' ); ?></h1>
		<p><?php esc_html_e( 'The link may be old or the page may have moved. Try a search:', 'cairo-starter' ); ?></p>
		<div style="max-width:420px;margin:24px auto"><?php get_search_form(); ?></div>
		<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the homepage', 'cairo-starter' ); ?></a>
	</div>
</div>
<?php
get_footer();
