<div class="wrap">

	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">

		<div id="universal-message-container">
			<table class="form-table">

<tbody>
<tr>
<th scope="row">SVG Support</th>
<td> <fieldset><label for="allow-svg">
<input name="allow-svg" type="checkbox" id="allow-svg" <?php checked(get_option('allow-svg')); ?>>
	Allow SVG upload in Media library
	</label>
	<p class="description">All SVG files must begin with <code>&lt;?xml version="1.0" encoding="utf-8"?></code></strong></p>
</fieldset></td>
</tr>

<tr>
<th scope="row">Font Awesome <?php get_option('add-font-awesome')?></th>
<td> <fieldset><label for="add-font-awesome">
<input name="add-font-awesome" type="checkbox" id="add-font-awesome" <?php checked(get_option('add-font-awesome')); ?>>
	Include Font Awesome
	</label>
</fieldset></td>
</tr>

<tr>
<th scope="row">Chrome bar color</th>
<td>#&nbsp;<input name="chrome-bar-color" type="text" id="chrome-bar-color" aria-describedby="chrome-bar-color-description" value="<?php echo esc_attr( $this->deserializer->get_value( 'chrome-bar-color' ) ); ?>" class="regular-text ltr">
<p class="description" id="chrome-bar-color-description">Set the color of the Chrome bar in mobile apps (see <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android">the documentation</a> to learn more about this feature)</strong></p></td>
</tr>

<tr>
<th scope="row">Google Analytics</th>
<td><input name="g-analytics-id" type="text" id="g-analytics-id" aria-describedby="g-analytics-id-description" value="<?php echo esc_attr( $this->deserializer->get_value( 'g-analytics-id' ) ); ?>" placeholder="XX-XXXXXXXXX-X" class="regular-text ltr">
<p class="description" id="g-analytics-id-description">Set the Google Analytics Tracking ID to activate Google Analytics</strong></p></td>
</tr>

</tbody></table>

			<?php
			wp_nonce_field( 're-wp-settings-save', 're-wp-nonce-check' );
			submit_button();
			?>

		</form>

	</div>