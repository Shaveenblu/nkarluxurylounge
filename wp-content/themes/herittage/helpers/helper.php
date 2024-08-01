<?php
if ( ! function_exists( 'herittage_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 */
	function herittage_template_part( $module, $template, $slug = '', $params = array() ) {
		echo herittage_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'herittage_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 */
	function herittage_get_template_part( $module, $template, $slug = '', $params = array() ) {

		$file_path = '';
		$html      =  '';

		$template_path = HERITTAGE_MODULE_DIR . '/' . $module;
		$temp_path = $template_path . '/' . $template;

		if ( ! empty( $temp_path ) ) {
			if ( ! empty( $slug ) ) {
				$file_path = "{$temp_path}-{$slug}.php";
				if ( ! file_exists( $file_path ) ) {
					$file_path = $temp_path . '.php';
				}
			} else {
				$file_path = $temp_path . '.php';
			}
		}

		$file_path = apply_filters( 'herittage_get_template_plugin_part', $file_path, $module, $template, $slug);

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		if ( $file_path && file_exists( $file_path ) ) {
			ob_start();
			include( $file_path );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'herittage_get_page_id' ) ) {
	function herittage_get_page_id() {

		$page_id = get_queried_object_id();

		if( is_archive() || is_search() || is_404() || ( is_front_page() && is_home() ) ) {
			$page_id = -1;
		}

		return $page_id;
	}
}

/* Convert hexdec color string to rgb(a) string */
if ( ! function_exists( 'herittage_hex2rgba' ) ) {
	function herittage_hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		if(empty($color)) {
			return $default;
		}

		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		$rgb =  array_map('hexdec', $hex);

		if($opacity){
			if(abs($opacity) > 1) {
				$opacity = 1.0;
			}
			$output = implode(",",$rgb).','.$opacity;
		} else {
			$output = implode(",",$rgb);
		}

		return $output;

	}
}

if ( ! function_exists( 'herittage_html_output' ) ) {
	function herittage_html_output( $html ) {
		return apply_filters( 'herittage_html_output', $html );
	}
}


if ( ! function_exists( 'herittage_theme_defaults' ) ) {
	/**
	 * Function to load default values
	 */
	function herittage_theme_defaults() {

		$defaults = array (
			'primary_color' => '#9B804E',
			'primary_color_rgb' => herittage_hex2rgba('#9B804E', false),
			'secondary_color' => '#3D3931',
			'secondary_color_rgb' => herittage_hex2rgba('#3D3931', false),
			'tertiary_color' => '#FBF6E8',
			'tertiary_color_rgb' => herittage_hex2rgba('#FBF6E8', false),
			'body_bg_color' => '#FFFCF2',
			'body_bg_color_rgb' => herittage_hex2rgba('#FFFCF2', false),
			'body_text_color' => '#3D3931',
			'body_text_color_rgb' => herittage_hex2rgba('#3D3931', false),
			'headalt_color' => '#3D3931',
			'headalt_color_rgb' => herittage_hex2rgba('#3D3931', false),
			'link_color' => '#000000',
			'link_color_rgb' => herittage_hex2rgba('#000000', false),
			'link_hover_color' => '#9B804E',
			'link_hover_color_rgb' => herittage_hex2rgba('#9B804E', false),
			'border_color' => '#9B804E',
			'border_color_rgb' => herittage_hex2rgba('#9B804E', false),
			'accent_text_color' => '#ffffff',
			'accent_text_color_rgb' => herittage_hex2rgba('#ffffff', false),

			'body_typo' => array (
				'font-family' => "Lora",
				'font-fallback' => '"Lora", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 16,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.6,
				'lh-desktop-unit' => ''
			),
			'h1_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 80,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'h2_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 70,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'h3_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 46,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'h4_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 30,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'h5_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 26,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'h6_typo' => array (
				'font-family' => "Forum",
				'font-fallback' => '"Forum", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 18,
				'fs-desktop-unit' => 'px',
				'lh-desktop' =>1,
				'lh-desktop-unit' => ''
			),
			'extra_typo' => array (
				'font-family' => "Lora",
				'font-fallback' => '"Lora", sans-serif',
				'font-weight' => 500,
				'fs-desktop' => 14,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.6,
				'lh-desktop-unit' => ''
			),

		);

		return $defaults;

	}
}