<?php
/**
 * 2Ace's Affiliates Tagger Admin Options
 *
 * Checks if WooCommerce is enabled
 */

// BEGIN

if ( ! defined( 'ABSPATH' ) || ! is_admin() ) {
	return;
}
{
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	};
    ?>
	<div class="wrap">
		<h2><?php _e('Options for 2Ace\'s Affiliates Tagger by ', 'aa-affiliates-tagger'); echo '2Aces'; ?></h2>
		<p><?php _e('This version of the plugin uses Wordpress <strong><a href="https://codex.wordpress.org/Shortcode">shortcodes</a></strong> to print the tagged links. Basically, it means you have to enclose the text you want to tag and link inside pseudo-tags using square brackets <code>[]</code>, like this example: <code>[product merchant="wpengine"]WP Engine avoids headaches![/product]</code>', 'aa-affiliates-tagger');?></p>
		<p><?php _e('Note that inside the opening tag, there is an parameter indicating which merchant you are linking. Some merchants also demands that you use a product link parameter (example below).', 'aa-affiliates-tagger');?></p>
		<h3><?php _e('Instructions:', 'aa-affiliates-tagger');?></h3>
		<ol>
			<li>
			<?php _e('Copy each of your IDs on the merchants/services affiliates programs and paste in the fields below', 'aa-affiliates-tagger'); ?>
			</li>
			<li>
			<?php _e('If you haven\'t signed up for the affiliates program, you can click in each name below to visit their affiliates websites and sign up', 'aa-affiliates-tagger'); ?>
			</li>
			<li>
			<?php _e('When creating a link to a merchant, use a shortcode like this:', 'aa-affiliates-tagger'); ?><br/><code>[product merchant="merchantname" productlink="productlink"]link text[/product]</code>
			<br/><br/>
			</li>
			<li>
			<?php _e('You must use smallcaps and no spaces or special characters on <code>merchant</code> parameter:', 'aa-affiliates-tagger'); ?><br/>(e.g. <code>[product merchant="amazon" productlink="http://www.amazon.com/Web-Marketing-All---One-Dummies/dp/1118243773/"]Web Marketing[/product]</code> )
			<br/><br/>
			</li>
			<li>
			<?php _e('For shops (Amazon, Americanas, Apple, Cultura, Shoptime, SouBarato, Submarino and Submarino Viagens), you must use a product page link on <code>productlink</code> parameter:', 'aa-affiliates-tagger'); ?><br/>(e.g. <code>[product merchant="amazon" productlink="http://www.amazon.com/Web-Marketing-All---One-Dummies/dp/1118243773/"]Web Marketing[/product]</code> )
			<br/><br/>
			</li>
			<li>
			<?php _e('If you are linking to hosting/managing services like Dreamhost, Media Temple, Manage WP and WP Engine, you don\'t need to use a product link at all and <code>productlink</code> parameter will be ignored. (e.g. <code>[product merchant="wpengine"]WP Engine avoids headaches![/product]</code> )', 'aa-affiliates-tagger'); ?>
			</li>
		</ol>
		<hr>
		<h3>
			<?php _e('Insert your affiliates IDs', 'aa-affiliates-tagger'); ?>
		</h3>
		<p>
			<small>
				<?php _e('If you don\'t fill in the fields below, the links will be tagged using 2Aces default values (i.e. our own affiliates IDs)', 'aa-affiliates-tagger'); ?>
			</small>
		</p>
		<form method="post" action="options.php">
			
			<?php settings_fields( 'aa_at_options' );
			$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
			$aa_at_affiliatecode_amazon = get_option('aa_at_affiliatecode_amazon');
			$aa_at_affiliatecode_americanas = get_option('aa_at_affiliatecode_americanas');
			$aa_at_affiliatecode_apple = get_option('aa_at_affiliatecode_apple');
			$aa_at_affiliatecode_cultura = get_option('aa_at_affiliatecode_cultura');
			$aa_at_affiliatecode_dreamhost= get_option('aa_at_affiliatecode_dreamhost');
			$aa_at_affiliatecode_mediatemple = get_option('aa_at_affiliatecode_mediatemple');
			$aa_at_affiliatecode_managewp = get_option('aa_at_affiliatecode_managewp');
			$aa_at_affiliatecode_shoptime = get_option('aa_at_affiliatecode_shoptime');
			$aa_at_affiliatecode_soubarato = get_option('aa_at_affiliatecode_soubarato');
			$aa_at_affiliatecode_submarino = get_option('aa_at_affiliatecode_submarino');
			$aa_at_affiliatecode_wpengine = get_option('aa_at_affiliatecode_wpengine'); ?>
			<table width="100%" style="width:">
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_afiliados">Afiliados.Com.Br</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_afiliados" type="text" id="aa_at_affiliatecode_afiliados" value="<?php echo $aa_at_affiliatecode_afiliados; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_amazon">Amazon's Associates</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_amazon" type="text" id="aa_at_affiliatecode_amazon" value="<?php echo $aa_at_affiliatecode_amazon; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATamazon" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_americanas">Americanas</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_americanas" type="text" id="aa_at_affiliatecode_americanas" value="<?php echo $aa_at_affiliatecode_americanas; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_apple">Apple (PHG Network)</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_apple" type="text" id="aa_at_affiliatecode_apple" value="<?php echo $aa_at_affiliatecode_apple; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATapple" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_cultura">Cultura -  Espalhe Cultura</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_cultura" type="text" id="aa_at_affiliatecode_cultura" value="<?php echo $aa_at_affiliatecode_cultura; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATcultura" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_dreamhost">Dreamhost</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_dreamhost" type="text" id="aa_at_affiliatecode_dreamhost" value="<?php echo $aa_at_affiliatecode_dreamhost; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATdreamhost" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_mediatemple">Media Temple</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_mediatemple" type="text" id="aa_at_affiliatecode_mediatemple" value="<?php echo $aa_at_affiliatecode_mediatemple; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATmediatemple" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_managewp">ManageWP</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_managewp" type="text" id="aa_at_affiliatecode_managewp" value="<?php echo $aa_at_affiliatecode_managewp; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/GerencieWPFacil" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_shoptime">Shoptime</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_shoptime" type="text" id="aa_at_affiliatecode_shoptime" value="<?php echo $aa_at_affiliatecode_shoptime; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_soubarato">SouBarato</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_soubarato" type="text" id="aa_at_affiliatecode_soubarato" value="<?php echo $aa_at_affiliatecode_soubarato; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_submarino">Submarino</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_submarino" type="text" id="aa_at_affiliatecode_submarino" value="<?php echo $aa_at_affiliatecode_submarino; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_submarinoviagens">Submarino Viagens</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_submarinoviagens" type="text" id="aa_at_affiliatecode_submarinoviagens" value="<?php echo $aa_at_affiliatecode_submarinoviagens; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATafiliados" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="text-align:left;width:250px;">
						<label for="aa_at_affiliatecode_wpengine">WP Engine</label>
					</th>
					<td>
						<input name="aa_at_affiliatecode_wpengine" type="text" id="aa_at_affiliatecode_wpengine" value="<?php echo $aa_at_affiliatecode_wpengine; ?>" />
					</td>
					<td>
						<p><a href="http://j.mp/2AATwpengine" title="<?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?>" rel="nofollow"><?php _e('click here to create your affiliate account', 'aa-affiliates-tagger'); ?></a></p>
					</td>
				</tr>
				</tr>
			</table>
			
			<p>
			<?php submit_button(); ?>
			</p>
		
		</form>
		<p><?php _e('If this plugin helped you, you may consider consider giving @2AcesConteudo a tweet, ranking it good on Wordpress Plugin Repository or linking us on your blog: <a href="http://www.2aces.com.br" title="2Aces Conteúdo e Estratégia">www.2aces.com.br</a>', 'aa-affiliates-tagger');?></p>
		<p><?php _e('If we may give you a suggestion, you should try <a href="http://j.mp/GerencieWPFacil" rel="nofollow">ManageWP</a> to make your blog life easier.<br/>(full disclosure: if you sign up for a paid plan, we get a small commission.)', 'aa-affiliates-tagger');?></p>
	</div>
<?php }
?>
