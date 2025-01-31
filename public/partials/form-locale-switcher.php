<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 利用可能な言語配列を関数から取得
$languages = multilang_switcher_get_languages();
?>
<form method="post" action="" id="language-switcher-form">
	<ul id="multilang_switcher_locale" class="lang-switcher__menu">
		<?php foreach ( $languages as $lang_code => $label ): ?>
			<li data-locale="<?php echo esc_attr( $lang_code ); ?>" <?php if ($lang_code === $current_locale) echo 'class="selected"'; ?>>
				<?php echo esc_html( $label ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<input type="hidden" name="multilang_switcher_locale" id="selected-locale" value="">
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const listItems = document.querySelectorAll('#multilang_switcher_locale li');
	const form = document.getElementById('language-switcher-form');
	const hiddenInput = document.getElementById('selected-locale');

	listItems.forEach(item => {
		item.addEventListener('click', function() {
			hiddenInput.value = this.getAttribute('data-locale');
			form.submit();
		});
	});
	
	// ruby-buttonがクリックされたときの処理を追加
	const rubyButton = document.getElementById('ruby-button');
	if (rubyButton) {
		rubyButton.addEventListener('click', function() {
			hiddenInput.value = 'ja_ruby';
			form.submit();
		});
	}
});
</script>