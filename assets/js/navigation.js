/**
 * Mobile menu toggle for the Cairo Starter theme.
 */
( function () {
	'use strict';

	const toggle = document.querySelector( '.menu-toggle' );
	const nav = document.querySelector( '.main-navigation' );

	if ( ! toggle || ! nav ) {
		return;
	}

	toggle.addEventListener( 'click', function () {
		const open = nav.classList.toggle( 'toggled' );
		toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
	} );
}() );
