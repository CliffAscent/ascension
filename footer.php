<?php
/**
 * Footer Template
 *
 * Footer content.
 */
?>

		<?php do_action( 'asc_before_content_close' ); ?>
	</div>
</div><!-- End #content -->

<?php do_action( 'asc_after_content' ); ?>

<?php get_template_part( 'templates/modules/widgets', 'bottom' ) ?>

<footer id="footer" class="wrapper" role="contentinfo">
	<div class="row no-outter-gutters">
		<?php do_action( 'asc_after_footer_open' ); ?>
		
		<?php get_template_part( 'templates/modules/widgets', 'footer' ) ?>
	</div>
</footer><!-- End #footer -->

<?php wp_footer(); ?>
</body>
</html>