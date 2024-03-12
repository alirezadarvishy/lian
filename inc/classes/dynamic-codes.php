<?php
namespace Lian;
use Lian\Fonts;

if ( ! defined( 'ABSPATH' ) ) exit;

class DynamicCodes{

	public static function lian_dynamic_fonts(){

		$fonts = array();

		if(!empty(lian_options('lian_typography_main_font')))
			array_push($fonts, lian_options('lian_typography_main_font'));

		if(!empty(lian_options('lian_typography_h1_font')))
			array_push($fonts, lian_options('lian_typography_h1_font'));

		if(!empty(lian_options('lian_typography_h2_font')))
			array_push($fonts, lian_options('lian_typography_h2_font'));

		if(!empty(lian_options('lian_typography_h3_font')))
			array_push($fonts, lian_options('lian_typography_h3_font'));

		if(!empty(lian_options('lian_typography_h4_font')))
			array_push($fonts, lian_options('lian_typography_h4_font'));

		if(!empty(lian_options('lian_typography_h5_font')))
			array_push($fonts, lian_options('lian_typography_h5_font'));

		if(!empty(lian_options('lian_typography_h6_font')))
			array_push($fonts, lian_options('lian_typography_h6_font'));

		return $fonts;
	}
	/**
	* Return Dynamic CSS
	* @author Alireza Dr.
	*/
	public static function lian_dynamic_css(){

		$css ='
			:root{
				--main-color:'.lian_options('lian_style_primary_color').';
				--second-color:'.lian_options('lian_style_second_color').';
				--bg-color:'.lian_options('lian_style_bg_color').';
				--text-color:'.lian_options('lian_style_text_color').';
				--link-color:'.lian_options('lian_style_a_color').';
				--link-hover-color:'.lian_options('lian_style_a_color_hover').';
				--content-bg:'.lian_options('lian_content_bg').';
				--sidebar-bg:'.lian_options('lian_sidebar_bg').';
				--button-bg-color:'.lian_options('lian_style_button_bg').';
				--button-bg-color-hover:'.lian_options('lian_style_button_bg_hover').';
				--button-color:'.lian_options('lian_style_button_color').';
				--button-color-hover:'.lian_options('lian_style_button_color_hover').';
				--price-color:'.lian_options('lian_style_price_color').';
				--input-color:'.lian_options('lian_input_text_color').';
				--input-bg-color:'.lian_options('lian_input_bg_color').';
				--input-border-color:'.lian_options('lian_input_border_color').';
				--input-ptext-color:'.lian_options('lian_input_ptext_color').';
				--breadcrumb-color:'.lian_options('lian_breadcrumb_color').';
				--main-font:'.lian_options('lian_typography_main_font').';
				--main-font-size:'.lian_options('lian_typography_main_size').';
				--main-font-weight:'.lian_options('lian_typography_main_weight').';
				--main-line-height:'.lian_options('lian_typography_main_lineheight').';
				--h1-font:'.lian_options('lian_typography_h1_font').';
				--h1-font-size:'.lian_options('lian_typography_h1_size').';
				--h1-font-weight:'.lian_options('lian_typography_h1_weight').';
				--h1-line-height:'.lian_options('lian_typography_h1_lineheight').';
				--h2-font:'.lian_options('lian_typography_h2_font').';
				--h2-font-size:'.lian_options('lian_typography_h2_size').';
				--h2-font-weight:'.lian_options('lian_typography_h2_weight').';
				--h2-line-height:'.lian_options('lian_typography_h2_lineheight').';
				--h3-font:'.lian_options('lian_typography_h3_font').';
				--h3-font-size:'.lian_options('lian_typography_h3_size').';
				--h3-font-weight:'.lian_options('lian_typography_h3_weight').';
				--h3-line-height:'.lian_options('lian_typography_h3_lineheight').';
				--h4-font:'.lian_options('lian_typography_h4_font').';
				--h4-font-size:'.lian_options('lian_typography_h4_size').';
				--h4-font-weight:'.lian_options('lian_typography_h4_weight').';
				--h4-line-height:'.lian_options('lian_typography_h4_lineheight').';
				--h5-font:'.lian_options('lian_typography_h5_font').';
				--h5-font-size:'.lian_options('lian_typography_h5_size').';
				--h5-font-weight:'.lian_options('lian_typography_h5_weight').';
				--h5-line-height:'.lian_options('lian_typography_h5_lineheight').';
				--h6-font:'.lian_options('lian_typography_h6_font').';
				--h6-font-size:'.lian_options('lian_typography_h6_size').';
				--h6-font-weight:'.lian_options('lian_typography_h6_weight').';
				--h6-line-height:'.lian_options('lian_typography_h6_lineheight').';
			}
		';

		// Add Custom Css - Settings
		$css .= (!empty(lian_options('lian_general_css')) ? lian_options('lian_general_css'): '');

		// Remove whitespace
		$css = preg_replace('/\s+/', ' ', $css);
		$css = preg_replace('/\s*([\{\}:;,])\s*/', '$1', $css);
		$css = preg_replace('/;}/', '}', $css);
		
		return $css;
	}


	/**
	* Return Dynamic JS
	* @author Alireza Dr.
	*/
	public static function lian_dynamic_js(){

		// Add Custom JS - Settings
		$js = (!empty(lian_options('lian_general_js')) ? lian_options('lian_general_js'):'');

		// Remove whitespace
		$js = preg_replace('/\s+/', ' ', $js);
		$js = preg_replace('/\s*([\{\}:;,])\s*/', '$1', $js);
		$js = preg_replace('/;}/', '}', $js);

		return $js;
	}

}