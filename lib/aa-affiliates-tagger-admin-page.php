<?php
/*
2ACES Products Loader - Admin Page

*/

// BEGIN Page

?>
<div class="wrap"> 
	<?php screen_icon(); ?>
    <?php    echo "<h2>" . __( '2ACES Products Loader Display Options', 'aa-products-loader_text' ) . "</h2>"; ?>  
    <form name="aapl_form" method="post" action="options.php">
	    <?php settings_fields( 'aapl_settings' );
	    function get_aapl_settings() {
	    	echo '';
	    }
	    do_settings_sections( 'aa-products-loader-admin-page.php' );
	    do_settings_fields( 'aa-products-loader-admin-page.php', 'aapl-main-settings' );?>
	    <p><?php echo __( 'Type your affiliates codes', 'aa-products-loader_text' ) ?>:</p>
	    <p><label for="aapl_affiliate_submarino">Submarino</label>: <input type="text" value="<?php echo get_option('aapl_affiliate_submarino'); ?>" name="aapl_affiliate_submarino" ></p>
	    <p><label for="aapl_affiliate_cultura">Cultura</label>: <input type="text" value="<?php echo get_option('aapl_affiliate_cultura'); ?>" name="aapl_affiliate_cultura" ></p>
	    <p><label for="aapl_affiliate_cultura">Mercado Livre</label>: <input type="text" value="<?php echo get_option('aapl_affiliate_cultura'); ?>" name="aapl_affiliate_cultura" ></p>
	    <p><label for="aapl_affiliate_mercadolivre">Amazon US</label>: <input type="text" value="<?php echo get_option('aapl_affiliate_amazonus'); ?>" name="aapl_affiliate_amazonus" ></p>
	    <?php submit_button(); ?>
	</form>
</div>  