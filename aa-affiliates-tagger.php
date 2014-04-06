<?php
/*
Plugin Name: 2ACES Affiliates Tagger
Plugin URI: http://2aces.com.br/plugins/aa-affiliates-tagger/
Description: Affiliates tagger for Submarino (BR), Livraria Cultura (BR) and Amazon (US)
Author: Celso Bessa / 2ACES
Author URI: http://2aces.com.br
Version: 0.1
Changelog:
 * 0.1 - Prova de conceito usando shortcodes para Livraria Cultura e Submarino
TODO
 * 0.1.1 - Americanas, Shoptime e QueBarato
 * 0.1.2 - Amazon  e links para inscrição
 * 0.1.3 - Dreamhost, Media Temple e Manage WP
 * 0.1.4 - translation ready
 * 0.2 - página de admin
 * 0.2.1 - ícone css indicando site externo
 * 0.3 - Inserção via TinyMCE e revisão melhores práticas Wordpress Plugins
 * 0.3.1 - detectar automaticamente links para as lojas
 * 0.3.2 - verificar se código já foi adicionado e ignorado
 * 0.4 - melhorar performance (se possível, caching)
 * 0.5 - Adicionar funcionalidades do product loader e rebatizar
 * 0.6 - Documentação melhor e Página de Ajuda (incluir logo da 2Aces com afiliados Dreamhost, Media Temple e Manage WP)
 * 0.7 - Versão inicial e localização (idioma original inglês, localização pt_BR, pt_PT, es)
 * 0.8 - Adicionar caixa de sugestões automáticas baseada em tags
 * 0.9 - Adicionar opção de link automática em imagens e galerias.

*/

// BEGIN Plugin

$aa_prefix = 'aa_at_';
$aa_plugin_name = '2ACES Affiliates Tagger';

//Defaults
$affiliateCodeSubmarino = 'AFL-03-77114';
$affiliateCodeCultura = '11606';
//$affiliateCodeAmazon = 'celsobessa-20';

// Product Link shortcode function - it's what is shown on front end
// BEGIN printProductsLink
function printProductLink ($productlink,$shop,$content) {
$affiliateCodeSubmarino = 'AFL-03-33604';
$affiliateCodeCultura = '11606';
    if($shop == 'submarino') {
        if ($content == ''){
            $content = '[veja no Submarino]';
        }
        echo '<a href="' . $productlink . '?franq=' . $affiliateCodeSubmarino . '" title="Veja mais" rel="nofollow productlink external">' . $content . '</a>';
    }
    elseif ($shop == 'cultura') {
        if ($content == ''){
            $content = '[veja na Livraria Cultura]';
        }
        $productlink = str_replace('http://www.livrariacultura.com.br','',$productlink);
        echo '<a href="http://www.livrariacultura.com.br/scripts/cultura/externo/index.asp?id_link=' . $affiliateCodeCultura . '&amp;destino=' . $productlink. '&" title="Veja mais" rel="nofollow productlink external">' . $content . '</a>';
    };
};// END printProductsLink

function product_tagger($atts, $content = null) {

    extract( shortcode_atts( array(
                    'shop' => 'submarino',
                    'productlink' => ''
            ), $atts ) );
    ob_start();
    printProductLink($productlink,$shop,$content);
    $output_string = ob_get_contents();
    ob_end_clean();

    return $output_string;
	
};
add_shortcode('product', 'product_tagger');
?>