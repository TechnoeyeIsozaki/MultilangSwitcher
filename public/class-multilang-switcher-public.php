<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * フロントエンド向けの機能（ショートコード）を提供
 */
class Multilang_Switcher_Public {

	public function register_shortcodes() {
		add_shortcode( 'mlang_switcher', array( $this, 'render_locale_switcher' ) );
	}

	public function render_locale_switcher() {
		// 現在のロケールを取得
		$current_locale = multilang_switcher_get_locale();

		// 出力バッファ開始
		ob_start();
		include( MULTILANG_SWITCHER_DIR . 'public/partials/form-locale-switcher.php' );
		return ob_get_clean();
	}
}
