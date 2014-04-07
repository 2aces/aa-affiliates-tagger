=== 2Ace's Affiliates Tagger by 2Aces ===
Contributors: celsobessa
Donate link: http://www.2aces.com.br/wordpress-plugins/aa-affiliates-tagger/
Tags: 2aces, Amazon, Submarino, Americanas.com, Dreamhost, affiliates, monetize
Requires at least: 3.5
Tested up to: 3.8
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Affiliates program tagger for several merchants with Brazil, United States and/or global coverage.

== Description ==

Affiliates program tagger for several merchants with Brazil, United States and/or global coverage: Afiliados (BR, Amazon (US), Americanas.com (BR), Apple / PHG (BR, Europe, South America and US, Livraria Cultura (BR), Dreamhost (US), ManageWP (Global), Media Temple (Global), ShopTime (BR), Submarino (BR), Submarino Viagens (BR), WP Engine (Global). <strong>This version uses <a href="https://codex.wordpress.org/Shortcode">shortcodes</a> to print the tagged links, future version will allow the use Wordpress buttons (TinyMCE)</strong>

== Installation ==

1. Upload `/aa-affiliates-tagger/` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Copy each of your IDs on the merchants/services affiliates programs and paste in the fields below
4. If you haven't signed up for the affiliates program, you can click in each name in options page to visit their affiliates websites and sign up
5. When creating a link to a merchant, use a shortcode like this:
[product merchant="merchantname" productlink="productlink"]link text[/product] 
6. You must use smallcaps and no spaces or special characters on merchant parameter:
(e.g. [product merchant="amazon" productlink="http://www.amazon.com/Web-Marketing-All---One-Dummies/dp/1118243773/"]Web Marketing[/product] ) 
7. For shops (Amazon, Americanas, Apple, Cultura, Shoptime, SouBarato, Submarino and Submarino Viagens, you must use a product page link on productlink parameter:
(e.g. [product merchant="amazon" productlink="http://www.amazon.com/Web-Marketing-All---One-Dummies/dp/1118243773/"]Web Marketing[/product] ) 
8. If you are linking to hosting/managing services like Dreamhost, Media Temple, Manage WP and WP Engine, you don't need to use a product link at all and product link will be ignored. (e.g. [product merchant="wpengine"]WP Engine avoids headaches![/product] )


== Frequently Asked Questions ==

This version of the plugin uses Wordpress shortcodes to print the tagged links. Basically, it means you have to enclose the text you want to tag and link inside pseudo-tags using square brackets [], like this example:

[product merchant="wpengine"]WP Engine avoids headaches![/product]

note that inside the opening tag, there is an parameter indicating which merchant you are linking. Some merchants also demands that you use a product link parameter.

== Screenshots ==

== Changelog ==

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

== Roadmap == 
= 0.3 =
TinyMCE insertion and Wordpress Plugins best pratices revision
= 0.3.1 =
automatic link detection and tagging
= 0.3.2 =
verification and handling for already tagged links
= 0.4 =
Performance and visual improvements
= 0.5 =
New feature: products widgets
= 0.6 =
Help and documentation improvements
= 0.7 =
Initial version
= 0.8 =
Tag/Category based suggested products widget
= 0.9 =
Automatic tagging for images and galleries