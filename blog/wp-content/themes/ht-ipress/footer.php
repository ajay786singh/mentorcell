<?php if( ot_get_option('footer_status') == 'on' ) { ?>	
	<footer id="footer">
		<?php if( ot_get_option('footer-cols') != '0' ) { ?>
		<div class="row clearfix">
			<?php if( ot_get_option('footer-cols') == '2' ) { ?>
				<div class="grid_6">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /grid3 -->			
				<div class="grid_6">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- /grid3 -->
			<?php } elseif( ot_get_option('footer-cols') == '3' ) { ?>
				<div class="grid_4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /grid3 -->			
				<div class="grid_4">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- /grid3 -->
				<div class="grid_4">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- /grid3 -->
			<?php } elseif( ot_get_option('footer-cols') == '4' ) { ?>
				<div class="grid_3">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /grid3 -->			
				<div class="grid_3">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- /grid3 -->
				<div class="grid_3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- /grid3 -->
				<div class="grid_3">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- /grid3 -->
			<?php } else { ?>
				<div class="grid_12">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /grid3 -->
			<?php } ?>
		</div><!-- /row -->
		<?php } ?>

		<?php if( ot_get_option('sub_footer_status') == 'on' ) { ?>
		<div class="row clearfix">
			<div class="footer_last">
				<div class="copyright"><?php echo ot_get_option('footer_text');?></div>
				<?php if( ot_get_option('Back_to_top') == 'on' ) { ?>
					<div id="toTop" class="toptip" title="<?php _e("Back to Top", "highthemes");?>"><i class="icon-arrow-thin-up"></i></div>
				<?php } ?>
			</div><!-- /last footer -->
		</div><!-- /row -->
		<?php } ?>
	</footer><!-- /footer -->
<?php } ?>
</div><!-- /layout -->
<?php if( ot_get_option('tracking_code') != '' ) echo stripslashes( ot_get_option('tracking_code') ); ?>
<?php if( ot_get_option('custom-codes-footer') != '' ) echo ot_get_option('custom-codes-footer'); ?>
<?php
$retian_out = '';

if( ot_get_option('retina_logo_url') != '' || ot_get_option('retina_dark_logo_url') != '' ) {
	$retian_out .='
	<script>
	jQuery(document).ready(function () {
		var retina = (window.devicePixelRatio > 1 || (window.matchMedia && window.matchMedia("(-webkit-min-device-pixel-ratio: 1.5),(-moz-min-device-pixel-ratio: 1.5),(min-device-pixel-ratio: 1.5)").matches) );
		if(retina) {
			var defaultWidth = jQuery(".logo img").width();
	';
	
	if( ot_get_option('retina_logo_url') != '' ) {
		$retian_out .='jQuery(".logo img").attr("src", "'.esc_url(ot_get_option('retina_logo_url')).'").css("width", defaultWidth + "px");';
	}

	if( ot_get_option('retina_dark_logo_url') != '' && ot_get_option('dark') == 'on' ) {
		$retian_out .='jQuery(".logo img").attr("src", "'.esc_url(ot_get_option('retina_dark_logo_url')).'").css("width", defaultWidth + "px");';
	}	

	$retian_out .='	
		}
	});
	</script>
	';
	echo $retian_out;
}
?>
<?php wp_footer(); ?>
</body>
</html>