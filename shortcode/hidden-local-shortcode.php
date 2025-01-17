<?php

/**
 * 現在のロケールをhidden要素として出力する関数
 *
 * この関数はセッションに保存されている現在のロケールを取得し、
 * hidden要素としてHTMLに埋め込むためのショートコードを提供します。
 * デフォルトのロケールは 'ja' です。
 *
 * @return string hidden要素のHTML
 */
function hidden_locale() {
    $locale = isset( $_SESSION['multilang_current_locale'] ) ? $_SESSION['multilang_current_locale'] : 'ja';

    $output = '<input type="hidden" id="multilang_switcher_locale" name="multilang_switcher_locale" value="' . esc_attr( $locale ) . '" />';

    return $output;
}

// ショートコードを登録
add_shortcode('hidden_locale', 'hidden_locale');