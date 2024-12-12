<?php
/**
 * Plugin Name: Multilang Switcher
 * Plugin URI:  https://example.com
 * Description: シンプルな多言語切り替えプラグイン。ユーザーが選択した言語(ロケール)をセッションに保持します。
 * Version:     1.0.0
 * Author:      Your Name
 * Author URI:  https://example.com
 * License:     GPL2
 * Text Domain: multilang-switcher
 * Domain Path: /languages
 */

// セキュリティ対策
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 定数定義
define( 'MULTILANG_SWITCHER_VERSION', '1.0.0' );
define( 'MULTILANG_SWITCHER_DIR', plugin_dir_path( __FILE__ ) );
define( 'MULTILANG_SWITCHER_URL', plugin_dir_url( __FILE__ ) );

// 必要ファイル読み込み
require_once MULTILANG_SWITCHER_DIR . 'includes/class-multilang-switcher.php';
require_once MULTILANG_SWITCHER_DIR . 'includes/class-multilang-switcher-session.php';
require_once MULTILANG_SWITCHER_DIR . 'includes/class-multilang-switcher-functions.php';
require_once MULTILANG_SWITCHER_DIR . 'public/class-multilang-switcher-public.php';

// プラグイン初期化
function multilang_switcher_init() {
	$plugin = new Multilang_Switcher();
	$plugin->run();
}
add_action( 'plugins_loaded', 'multilang_switcher_init' );
