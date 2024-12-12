<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 全体の初期化や設定を行うメインクラス
 */
class Multilang_Switcher {

	protected $session_manager;
	protected $public;

	public function __construct() {
		$this->session_manager = new Multilang_Switcher_Session();
		$this->public = new Multilang_Switcher_Public();
	}

	public function run() {
		// セッションの開始処理をinitフックで行う
		add_action( 'init', array( $this->session_manager, 'maybe_start_session' ), 1 );
		
		// ロケールを切り替えるフィルタ
		add_filter( 'locale', array( $this, 'filter_locale' ) );
		
		// ショートコード登録
		add_action( 'init', array( $this->public, 'register_shortcodes' ) );
	}

	/**
	 * WPがロケールを決定する際にセッションから取得したロケールを返す
	 * デフォルトは 'ja' (日本語)
	 */
	public function filter_locale( $locale ) {
		$current_locale = $this->session_manager->get_current_locale();
		return $current_locale ? $current_locale : 'ja';
	}
}
