<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ユーザーの選択したロケールをセッション管理するクラス
 */
class Multilang_Switcher_Session {

	public function maybe_start_session() {
		if ( ! session_id() ) {
			session_start();
		}
		// フォームからの投稿を受け取った場合はロケールをセッションにセット
		if ( isset( $_POST['multilang_switcher_locale'] ) ) {
			$this->set_locale( sanitize_text_field( $_POST['multilang_switcher_locale'] ) );
		}
	}

	public function set_locale( $locale ) {
		// 利用可能言語のロケールキー一覧を取得
		$available_locales = array_keys( multilang_switcher_get_languages() );
		if ( in_array( $locale, $available_locales, true ) ) {
			$_SESSION['multilang_current_locale'] = $locale;
		}
	}

	public function get_current_locale() {
		return isset( $_SESSION['multilang_current_locale'] ) ? $_SESSION['multilang_current_locale'] : '';
	}
}
