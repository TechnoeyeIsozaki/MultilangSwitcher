# Multilang Switcher

**Version:** 1.0.1  
**Author:** Technoeye 
**License:** GPLv2 or later  
**Requires at least:** WordPress 5.0  
**Tested up to:** WordPress 6.3  
**Requires PHP:** 7.4

---

## 概要
Multilang Switcher は、WordPressサイトを多言語化するためのシンプルなプラグインです。  
ユーザーが選択した言語（ロケール）をセッションに格納し、サイト表示言語を動的に切り替えます。

利用可能な言語配列（`$languages`）を `multilang_switcher_get_languages()` 関数から取得でき、言語切り替えUIでは、コンボボックスの選択変更時（onchange）に自動的にフォームが送信されるようになっています。

---

## 主な機能
- ロケールのセッション管理  
  ユーザーが選択したロケール（言語設定）をPHPセッションで管理します。

- 言語切り替えUI  
  ショートコード `[mlang_switcher]` を使用して、任意の場所に言語切り替え用コンボボックスを配置可能です。  
  コンボボックスから言語を選択すると即時にフォームが送信され、ロケールが更新されます。（submitボタン不要）

- 初期対応言語  
  ・日本語 (ja)  
  ・英語 (en_US)  
  ・マレーシア語 (ms)  

  デフォルト言語は ja です。

- ロケールおよび言語リスト取得用関数  
  ・`multilang_switcher_get_locale()` : 現在のロケールを取得  
  ・`multilang_switcher_get_languages()` : 利用可能な言語一覧（連想配列）を取得

---

## インストール方法
1. 「multilang-switcher」ディレクトリを「wp-content/plugins/」以下に配置します。  
   もしくは、zipファイルをWordPress管理画面の  
   「プラグイン > 新規追加 > プラグインのアップロード」からアップロードします。

2. WordPress管理画面の「プラグイン」一覧で "Multilang Switcher" を有効化します。

---

## 使い方

### 言語切り替えコンボボックスの表示
テーマのテンプレートファイル（例：header.php）や投稿・固定ページ内で、  
`[mlang_switcher]` ショートコードを利用します。

以下はテンプレートでの例です：  
`<?php echo do_shortcode('[mlang_switcher]'); ?>`

もし、`do_shortcode` の結果を別途変数に格納したい場合は以下のようにします：  
`<?php $result = do_shortcode('[mlang_switcher]'); echo $result; ?>`

また、`<?= do_shortcode('[mlang_switcher]'); ?>` と省略表記も可能です。

エディタ上で `[mlang_switcher]` と記述するだけでも表示されます。

コンボボックスで言語を選択すると、自動的にフォームが送信され、言語設定（ロケール）が更新されます。

### デフォルト言語
デフォルトは ja (日本語) です。ユーザーが言語を変更しなければ `ja` が適用されます。

### 利用言語のカスタマイズ
`multilang_switcher_get_languages()` 関数内の返り値となる連想配列を編集することで、使用言語を変更できます。  
例として、`fr_FR`（フランス語）を追加したい場合は：  
`'fr_FR' => 'Français'`  
を追加します。

### ロケールや言語一覧の取得
`multilang_switcher_get_locale()` を呼び出せば、現在適用されているロケール（ja, en_US, msなど）を取得できます。  
`multilang_switcher_get_languages()` で、利用可能な言語一覧（キー:ロケールコード、値:言語名）を取得できます。

これにより、他のテーマ・プラグインと連携させて、ロケールに応じた処理を行うことが容易になります。

---

## 制限事項
- 本プラグインは翻訳ファイル（.po, .mo）を提供しません。実際の多言語表示はテーマや他プラグインによる翻訳ファイルに依存します。
- セッションを利用するため、サーバー環境でセッション機能が有効である必要があります。

---

## よくある質問 (FAQ)

**Q. 翻訳ファイルは付属しますか？**  
A. 付属しません。テーマや他の翻訳対応プラグインが提供する翻訳ファイルを使用してください。

**Q. 選択した言語はどの程度保持されますか？**  
A. 選択されたロケールはセッションに保存されるため、ブラウザを閉じたりセッションが切れるまでは保持されます。  
   セッション終了後はデフォルト言語（ja）に戻ります。

**Q. デザインを変更したい**  
A. `public/partials/form-locale-switcher.php` を編集、またはCSSを適用して見た目をカスタマイズできます。

---

## ライセンス
このプラグインはGPLv2またはそれ以降のライセンスで配布されています。

---

## 著者情報
- Author: Technoeye
- Author URI: https://www.technoeye.com
