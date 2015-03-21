<?php
// create custom plugin settings menu
add_action('admin_menu', 'ff_create_menu');

function ff_create_menu() {
	add_menu_page('Theme Customizations', 'FF Settings', 'administrator', __FILE__, 'ff_settings_page');
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	register_setting( 'ff-settings-group', 'new_option_name' );
	register_setting( 'ff-settings-group', 'some_other_option' );
	register_setting( 'ff-settings-group', 'option_etc' );
}

function ff_settings_page() {
?>

<div class="wrap">
<h2>Theme Customizations</h2>

<form method="post" action="options.php">
	<?php settings_fields( 'ff-settings-group' ); ?>
	<?php do_settings_sections( 'ff-settings-group' ); ?>
	<table class="form-table">
		<tr valign="top">
		<th scope="row">New Option Name</th>
		<td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
		</tr>
		 
		<tr valign="top">
		<th scope="row">Some Other Option</th>
		<td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
		</tr>
		
		<tr valign="top">
		<th scope="row">Options, Etc.</th>
		<td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
		</tr>
	</table>
	<?php submit_button(); ?>
</form>
</div>
<?php } ?>