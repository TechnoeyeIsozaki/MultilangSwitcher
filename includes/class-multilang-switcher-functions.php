<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 他のプラグインやテーマ内から現在のロケールを取得できる関数を定義
 */

if ( ! function_exists( 'multilang_switcher_get_locale' ) ) {
	function multilang_switcher_get_locale() {
		if ( ! session_id() ) {
			session_start();
		}
		return isset( $_SESSION['multilang_current_locale'] ) ? $_SESSION['multilang_current_locale'] : 'ja';
	}
}

/**
 * 利用可能な言語一覧を取得する関数
 * キーがロケールコード、値が表示用ラベルとなる連想配列を返す
 */
if ( ! function_exists( 'multilang_switcher_get_languages' ) ) {
	function multilang_switcher_get_languages() {
		$languages = array(
			'ja'    => '日本語',
			'ja_ruby' => 'やさしい日本語',
			'en_US' => 'English',
			'zh_CN' => '简体中文',
			'ko'    => '한국어',
			'vi'    => 'Tiếng Việt',
			'fil'   => 'Filipino',
			'ne'    => 'नेपाली',
			'id'    => 'Bahasa Indonesia',
			'my'    => 'မြန်မာဘာသာ',
			'th'    => 'ภาษาไทย',
			'pt'    => 'Português',
		);
		return $languages;
	}
}
