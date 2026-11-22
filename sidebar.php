<?php
/**
 * Blog sidebar.
 *
 * @package Cairo_Starter
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'cairo-starter' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
