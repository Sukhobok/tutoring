<?php
/*
	Backup/Restore Theme Options
	@ https://digwp.com/2013/01/backup-restore-theme-options/
	Go to "Appearance > Backup Options" to export/import theme settings
	(based on "Gantry Export and Import Options" by Hassan Derakhshandeh)

	Usage:
	1. Add entire backup/restore snippet to functions.php
	2. Edit 'option_tree' to match your theme options
*/
class XBackupRestoreThemeOptions {
	
	
	public function __construct()
    {
		add_action('admin_menu', array(&$this, 'admin_menu'));	
    }
	
	function admin_menu() {
		// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
		// $page = add_submenu_page('themes.php', 'Backup Options', 'Backup Options', 'manage_options', 'backup-options', array(&$this, 'options_page'));

		// add_theme_page($page_title, $menu_title, $capability, $menu_slug, $function);

		$page = add_submenu_page('spacex', 'Backup Options', 'Backup Options', 'manage_options', 'backup-options', array(&$this, 'options_page'));
	
		add_action("load-{$page}", array(&$this, 'import_export'));
	}
	function import_export() {
		if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
			header("Cache-Control: public, must-revalidate");
			header("Pragma: hack");
			header("Content-Type: text/plain");
			header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
			echo serialize($this->_get_options());
			die();
		}
		if (isset($_POST['upload']) && check_admin_referer('option_tree', 'option_tree')) {
			if ($_FILES["file"]["error"] > 0) {
				$type = 'error';
				$message = __( 'Fail to update options.', 'spacex' );
			} else {
				$options = unserialize(file_get_contents($_FILES["file"]["tmp_name"]));
				if ($options) {
					foreach ($options as $option) {
						update_option($option->option_name, unserialize($option->option_value));
					}
				}
			}
			$type = 'updated';
			$message = __( 'Options updated', 'spacex' );
			add_settings_error(
				'updateOptionError',
				esc_attr( 'settings_updated' ),
				$message,
				$type
			);
		}
	}



	function options_page() { ?>

		<div class="wrap">
            <?php settings_errors(); ?>
			<h2>Backup/Restore Theme Options</h2>
			<form action="admin.php?page=backup-options" method="POST" enctype="multipart/form-data">
				<style type="text/css" scoped>#backup-options td { display: block; margin-bottom: 20px; }</style>
                
                <?php
             
				?>
				<table id="backup-options">
					<tr>
						<td>
							<h3>Backup/Export</h3>
							<p>Here are the stored settings for the current theme:</p>
							<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()"><?php echo serialize($this->_get_options()); ?></textarea></p>
							<p><a href="?page=backup-options&action=download" class="button-secondary">Download as file</a></p>
						</td>
						<td>
							<h3>Restore/Import</h3>

							<p><label class="description" for="upload">Restore a previous backup</label></p>
							<p><input type="file" name="file" /> <input type="submit" name="upload" id="upload" class="button-primary" value="Upload file" /></p>
							<?php if (function_exists('wp_nonce_field')) wp_nonce_field('option_tree', 'option_tree'); ?>
						</td>
					</tr>
				</table>
			</form>
		</div>

	<?php }
	function _display_options() {
		$options = unserialize($this->_get_options());
	}
	function _get_options() {
		global $wpdb;
		return $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name = 'option_tree'"); // edit 'option_tree' to match theme options
	}
}
new XBackupRestoreThemeOptions();