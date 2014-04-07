<?php
/*
Plugin Name: WP Affiliates Tagger by 2Aces
Plugin URI: http://www.2aces.com.br/wordpress-plugins/aa-affiliates-tagger/
Description: Affiliates program tagger for several merchants with Brazil, United States and/or global coverage: Afiliados (BR, Amazon (US), Americanas.com (BR), Apple / PHG (BR, Europe, South America and US, Livraria Cultura (BR), Dreamhost (US), ManageWP (Global), Media Temple (Global), ShopTime (BR), Submarino (BR), Submarino Viagens (BR), WP Engine (Global). <strong>This version uses <a href="https://codex.wordpress.org/Shortcode">shortcodes</a> to print the tagged links, future version will allow the use Wordpress buttons (TinyMCE)</strong>
Author: Celso Bessa / 2ACES
Author URI: http://2aces.com.br
Version: 0.2
Changelog:
= 0.2 =
admin settings page
= 0.1.4 =
translation ready
= 0.1.3 =
added Dreamhost, Manage WP, Media Temple and WP Engine support
= 0.1.2 =
added Amazon Associates support and sign up links
= 0.1.1 =
added Americanas, Shoptime, Submarino Viagens and SouBarato support
= 0.1 =
Proof of concept using shortcodes to Livraria Cultura and Submarino merchants

Roadmap / TO DO:
 * 0.3 - TinyMCE insertion and Wordpress Plugins best pratices revision
 * 0.3.1 - automatic link detection and tagging
 * 0.3.2 - verification and handling for already tagged links
 * 0.4 - Performance and visual improvements
 * 0.5 - New feature: products widgets
 * 0.6 - Help and documentation improvements
 * 0.7 - Initial version
 * 0.8 - Tag/Category based suggested products widget
 * 0.9 - Automatic tagging for images and galleries
*/

$aa_prefix = 'aa_at_';
$aa_plugin_name = '2Ace\'s Affiliates Tagger';
//Defaults


// Plugin textdomain

function aa_at_action_init(){
// Localization
    load_plugin_textdomain( 'aa-affiliates-tagger', false, plugin_dir_path( __FILE__ ) . '/languages/' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_afiliados', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_amazon', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_americanas', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_apple', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_cultura', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_dreamhost', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_managewp', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_mediatemple', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_shareasale', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_shoptime', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_soubarato', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_submarino', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_submarinoviagens', 'sanitize_text_field' );
	register_setting( 'aa_at_options', 'aa_at_affiliatecode_wpengine', 'sanitize_text_field' );
}

// Add actions
add_action('admin_init', 'aa_at_action_init');

add_action( 'admin_menu', 'aa_at_menu' );

function aa_at_menu() {
	add_options_page( 'WP Affiliates Tagger by 2Aces Options', 'WP Affiliates Tagger by 2aces', 'manage_options', 'aa-at.php', 'aa_at_options' );
}

function aa_at_options() {
	include('lib/aa-affiliates-tagger-admin-page.php');
};


// Product Link shortcode function - it's what is shown on front end
// BEGIN printProductsLink
function printProductLink ($productlink,$merchant,$content) {

    if ($merchant == 'amazon') {
    	$aa_at_affiliatecode_amazon = get_option('aa_at_affiliatecode_amazon');
    	if ( $aa_at_affiliatecode_amazon == ''){
			$aa_at_affiliatecode_amazon = '2aces-20';
    	};
        if ($content == ''){
            $content = '[veja na Amazon]';
        };
        $test = strpos($url, '?');
        if ($test > 0) {
        	echo '<a href="' . $productlink . '&tag=' . $aa_at_affiliatecode_amazon . '" title="Veja na Amazon - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
        }
        else {
        	echo '<a href="' . $productlink . '/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B00HAQAQME&linkCode=as2&tag=' . $aa_at_affiliatecode_amazon . '" title="Veja na Amazon - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
        };
    }
    if ($merchant == 'apple') {
    	$aa_at_affiliatecode_apple = get_option('aa_at_affiliatecode_apple');
    	if ( $aa_at_affiliatecode_apple == ''){
    		$aa_at_affiliatecode_apple = '1l3v9ic';
    	};
        if ($content == ''){
            $content = '[veja na Apple Stores / iTunes]';
        };
        $test = strpos($url, '?');
        if ($test > 0) {
        	echo '<a href="' . $productlink . '&at=' . $aa_at_affiliatecode_apple . '" title="Veja na Apple Stores / iTunes - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external" target="itunes_store">' . $content . '</a>';
        }
        else {
        	echo '<a href="' . $productlink . '?at=' . $aa_at_affiliatecode_apple . '" title="Veja na Apple Stores / iTunes - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external" target="itunes_store">' . $content . '</a>';
        };
    }
    if ($merchant == 'americanas') {
    	$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
    	if ( $aa_at_affiliatecode_afiliados == '') {
    		$aa_at_affiliatecode_americanas = get_option('aa_at_affiliatecode_americanas');
    		if ( $aa_at_affiliatecode_americanas == '') {
				$aa_at_affiliatecode_americanas = 'AFL-03-77114';
    		};
    	}
    	else {
	    	$aa_at_affiliatecode_americanas = $aa_at_affiliatecode_afiliados;
    	};
        if ($content == ''){
            $content = '[veja no Americanas.com]';
        }
        echo '<a href="' . $productlink . '?franq=' . $aa_at_affiliatecode_americanas . '" title="Veja no Americanas.com - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'cultura') {
    	$aa_at_affiliatecode_cultura = get_option('aa_at_affiliatecode_cultura');
		if ( $aa_at_affiliatecode_cultura == '') {
			$aa_at_affiliatecode_cultura = '11606';
		};
        if ($content == ''){
            $content = '[veja na Livraria Cultura]';
        };
        $productlink = str_replace('http://www.livrariacultura.com.br','',$productlink);
        echo '<a href="http://www.livrariacultura.com.br/scripts/cultura/externo/index.asp?id_link=' . $aa_at_affiliatecode_cultura . '&amp;destino=' . $productlink. '&" title="Veja na Cultura - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'dreamhost') {
    	$aa_at_affiliatecode_dreamhost= get_option('aa_at_affiliatecode_dreamhost');
		if ( $aa_at_affiliatecode_dreamhost == '') {
			$aa_at_affiliatecode_dreamhost = '1426888';
		};
        if ($content == ''){
            $content = '[assine a Dreamhost]';
        }
        echo '<a href="http://www.dreamhost.com/r.cgi?' . $aa_at_affiliatecode_dreamhost . '" title="Assine a Dreamhost - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }

    if ($merchant == 'mediatemple') {
    	$aa_at_affiliatecode_mediatemple = get_option('aa_at_affiliatecode_mediatemple');
		if ( $aa_at_affiliatecode_mediatemple == '') {
			$aa_at_affiliatecode_mediatemple = '503517d2be15e';
		};
        if ($content == ''){
            $content = '[assine a Media Temple]';
        }
        echo '<a href="http://www.mediatemple.net#a_aid=' . $aa_at_affiliatecode_mediatemple . '" title="Assine a Media Temple - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'managewp') {
    	$aa_at_affiliatecode_managewp = get_option('aa_at_affiliatecode_managewp');
		if ( $aa_at_affiliatecode_managewp == '') {
			$aa_at_affiliatecode_managewp = '1942';
		};
        if ($content == ''){
            $content = '[assine a Manage WP]';
        }
        echo '<a href="https://managewp.com/?utm_source=A&utm_medium=Link&utm_campaign=A&utm_mrl=' . $aa_at_affiliatecode_managewp . '" title="Assine a Media Temple - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'shoptime') {
    	$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
    	if ( $aa_at_affiliatecode_afiliados == '') {
    		$aa_at_affiliatecode_shoptime = get_option('aa_at_affiliatecode_shoptime');
    		if ( $aa_at_affiliatecode_shoptime == '') {
				$aa_at_affiliatecode_shoptime = 'AFL-03-77114';
    		};
    	}
    	else {
	    	$aa_at_affiliatecode_shoptime = $aa_at_affiliatecode_afiliados;
    	};
        if ($content == ''){
            $content = '[veja no Shoptime]';
        };
        echo '<a href="' . $productlink . '?franq=' . $aa_at_affiliatecode_shoptime . '" title="Veja no Shoptime - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'soubarato') {
    	$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
    	if ( $aa_at_affiliatecode_afiliados == '') {
    		$aa_at_affiliatecode_soubarato = get_option('aa_at_affiliatecode_soubarato');
    		if ( $aa_at_affiliatecode_soubarato == '') {
				$aa_at_affiliatecode_soubarato = 'AFL-03-77114';
    		};
    	}
    	else {
	    	$aa_at_affiliatecode_soubarato = $aa_at_affiliatecode_afiliados;
    	};
        if ($content == ''){
            $content = '[veja no SouBarato.com]';
        }
        echo '<a href="' . $productlink . '?franq=' . $aa_at_affiliatecode_soubarato . '" title="Veja no SouBarato - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'submarino') {
    	$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
    	if ( $aa_at_affiliatecode_afiliados == '') {
    		$aa_at_affiliatecode_submarino = get_option('aa_at_affiliatecode_submarino');
    		if ( $aa_at_affiliatecode_submarino == '') {
				$aa_at_affiliatecode_submarino = 'AFL-03-77114';
    		};
    	}
    	else {
	    	$aa_at_affiliatecode_submarino = $aa_at_affiliatecode_afiliados;
    	};
        if ($content == ''){
            $content = '[veja no Submarino]';
        };
        echo '<a href="' . $productlink . '?franq=' . $aa_at_affiliatecode_submarino . '" title="Veja no Submarino - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    if ($merchant == 'submarinoviagens') {
    	$aa_at_affiliatecode_afiliados = get_option('aa_at_affiliatecode_afiliados');
    	if ( $aa_at_affiliatecode_afiliados == '') {
    		$aa_at_affiliatecode_submarinoviagens = get_option('aa_at_affiliatecode_submarinoviagens');
    		if ( $aa_at_affiliatecode_submarinoviagens == '') {
				$aa_at_affiliatecode_submarinoviagens = 'AFL-03-77114';
    		};
    	}
    	else {
	    	$aa_at_affiliatecode_submarinoviagens = $aa_at_affiliatecode_afiliados;
    	};
        if ($content == ''){
            $content = '[veja no Submarino Viagens]';
        }
        echo '<a href="' . $productlink . '?franq=' . $aa_at_affiliatecode_submarinoviagens . '" title="Veja no Submarino - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    elseif ($merchant == 'wpengine') {
    	$aa_at_affiliatecode_wpengine = get_option('aa_at_affiliatecode_wpengine');
		if ( $aa_at_affiliatecode_wpengine == '') {
			$aa_at_affiliatecode_wpengine = '914533';
		};
        if ($content == ''){
            $content = '[assine a WP Engine]';
        }
        echo '<a href="http://www.shareasale.com/r.cfm?B=394686&U=' . $aa_at_affiliatecode_wpengine . '&M=41388&urllink=" title="Assine a WP Engine - Link criado por 2Aces\'S Affiliates Tagger" rel="nofollow productlink external">' . $content . '</a>';
    }
    
};// END printProductsLink

function product_tagger($atts, $content = null) {

    extract( shortcode_atts( array(
                    'merchant' => 'submarino',
                    'productlink' => ''
            ), $atts ) );
    ob_start();
    printProductLink($productlink,$merchant,$content);
    $output_string = ob_get_contents();
    ob_end_clean();

    return $output_string;
	
};
add_shortcode('product', 'product_tagger');

/* Runs on plugin deactivation*/
register_activation_hook( __FILE__, 'aa_at_activate' );
function aa_at_activate() {
	/* Deletes the database fields */
	if ( version_compare( get_bloginfo( 'version' ), '3.5', '<' ) ) {
	   {
	      wp_die("You must update WordPress to use this plugin!");
	   };
   };
   if ( get_option( 'aa_at_version' ) === false ){
	      add_option( 'aa_at_version', '0.2' );
	   }
   if ( get_option( 'aa_at_publisher_id' ) === false ){
      add_option('aa_at_affiliatecode_afiliados');
      add_option('aa_at_affiliatecode_amazon');
      add_option('aa_at_affiliatecode_americanas');
      add_option('aa_at_affiliatecode_apple');
      add_option('aa_at_affiliatecode_cultura');
      add_option('aa_at_affiliatecode_dreamhost');
      add_option('aa_at_affiliatecode_mediatemple');
      add_option('aa_at_affiliatecode_managewp');
      add_option('aa_at_affiliatecode_shoptime');
      add_option('aa_at_affiliatecode_soubarato');
      add_option('aa_at_affiliatecode_submarino');
      add_option('aa_at_affiliatecode_wpengine');
   };
   wp_redirect(admin_url('options-general.php?page=aa-at.php'));
};


/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'aa_at_deactivate' );
function aa_at_deactivate() {
	/* Deletes the database fields */
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_afiliados', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_amazon', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_americanas', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_apple', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_cultura', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_dreamhost', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_managewp', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_mediatemple', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_shareasale', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_shoptime', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_soubarato', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_submarino', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_submarinoviagens', 'sanitize_text_field' );
	unregister_setting( 'aa_at_options', 'aa_at_affiliatecode_wpengine', 'sanitize_text_field' );
};

// Sanitize input.
function aa_at_publisher_id_validate() {
	$aa_at_publisher_id =  wp_filter_nohtml_kses($aa_at_publisher_id);
};
function aa_at_publisher_filename_validate() {
	$aa_at_publisher_filename =  wp_filter_nohtml_kses($aa_at_publisher_filename);
};

// Add settings link on plugin page
function aa_at_link($links) { 
  $settings_link = '<a href="options-general.php?page=aa-at.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'aa_at_link' );

?>