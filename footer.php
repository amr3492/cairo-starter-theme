<?php
/**
 * Site footer.
 *
 * @package Cairo_Starter
 */
?>
</main><!-- #content -->

<footer class="site-footer">
	<div class="container">
		<div class="footer-widgets">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<?php if ( is_active_sidebar( "footer-{$i}" ) ) : ?>
					<div><?php dynamic_sidebar( "footer-{$i}" ); ?></div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
		<div class="site-info">
			<?php
			printf(
				/* translators: 1: year, 2: site name, 3: theme link. */
				esc_html__( '&copy; %1$s %2$s. Built with the %3$s theme.', 'cairo-starter' ),
				esc_html( gmdate( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) ),
				'<a href="https://github.com/amr3492/cairo-starter-theme">Cairo Starter</a>'
			);
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
