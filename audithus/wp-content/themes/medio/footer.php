<?php 
if (get_post_type()!='header' && get_post_type()!='page_title' && get_post_type()!='footer') :
    if (Themeton_VC::footer()) {
    	echo Themeton_VC::footer();
    }
	else {
	?>
	    <footer>
		    <hr>
		    <div class="uk-container">
			    <div class="uk-child-width-expand@s uk-grid-large" uk-grid>
			    	<?php 
			    	$isFooterWidgetsPrinted = false;
			    	for ($column=1; $column < 5; $column++) { 
			    		if ( is_active_sidebar( 'footer'.$column ) ) {
			    		?>
							<div class="footer-column pv4">
								<?php dynamic_sidebar( 'footer'.$column ); ?>
							</div><!-- end .footer-column -->
						<?php
							$isFooterWidgetsPrinted = true;
						} // endif;
					} // endfor;?>
			    </div>
			</div><!-- end .uk-container -->
		    <?php if($isFooterWidgetsPrinted) { echo '<hr>'; } ?>
		    <div class="uk-text-center pv2">
		        <?php
		        if (Themeton_Std::getopt('copyright')!=NULL) echo esc_html(Themeton_Std::getopt('copyright'));
	        	else esc_html_e('All Right Reserved 2019.', 'medio');
		        ?>
		    </div>
	    </footer>
	<?php
	}
endif;
?>
	</div><!-- end .wrapper -->
<?php
wp_footer();
?>
</body>
</html>