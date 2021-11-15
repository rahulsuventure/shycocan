<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>

	</main><!-- #main -->

	<?php do_action( 'ocean_after_main' ); ?>

	<?php do_action( 'ocean_before_footer' ); ?>

	<?php
	// Elementor `footer` location.
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		?>

		<?php do_action( 'ocean_footer' ); ?>

	<?php } ?>

	<?php do_action( 'ocean_after_footer' ); ?>

</div><!-- #wrap -->

<?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer.
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
	get_template_part( 'partials/scroll-top' );
}
?>

<?php
// Search overlay style.
if ( 'overlay' === oceanwp_menu_search_style() ) {
	get_template_part( 'partials/header/search-overlay' );
}
?>

<?php
// If sidebar mobile menu style.
if ( 'sidebar' === oceanwp_mobile_menu_style() ) {

	// Mobile panel close button.
	if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
		get_template_part( 'partials/mobile/mobile-sidr-close' );
	}
	?>

	<?php
	// Mobile Menu (if defined).
	get_template_part( 'partials/mobile/mobile-nav' );
	?>

	<?php
	// Mobile search form.
	if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
		get_template_part( 'partials/mobile/mobile-search' );
	}
}
?>

<?php
// If full screen mobile menu style.
if ( 'fullscreen' === oceanwp_mobile_menu_style() ) {
	get_template_part( 'partials/mobile/mobile-fullscreen' );
}
?>

<?php wp_footer(); ?>
<!-- Start of HubSpot Embed Code -->
<!-- <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8776462.js"></script> -->
<!-- End of HubSpot Embed Code -->

<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "c9b334c611f8215538aafa316499841daee2d4a3877db18c1a76fac4cf3cd352543b5bb12e3589a2b73c2b29aa5e5d5b", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>
</body>
</html>
