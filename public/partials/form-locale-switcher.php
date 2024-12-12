<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 利用可能な言語配列を関数から取得
$languages = multilang_switcher_get_languages();
?>
<form method="post" action="">
	<label for="multilang_switcher_locale"><?php _e('Select Language', 'multilang-switcher'); ?></label>
	<select name="multilang_switcher_locale" id="multilang_switcher_locale" onchange="this.form.submit();">
		<?php foreach ( $languages as $lang_code => $label ): ?>
			<option value="<?php echo esc_attr( $lang_code ); ?>" <?php selected( $lang_code, $current_locale ); ?>>
				<?php echo esc_html( $label ); ?>
			</option>
		<?php endforeach; ?>
	</select>
</form>
