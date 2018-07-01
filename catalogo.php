<?php
/**
 * catalogo.php
 *
 * Copyright (c) 2011,2017 Antonio Blanco http://www.ablancodev.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Antonio Blanco
 * @package catalogo
 * @since catalogo 1.0.0
 *
 * Plugin Name: Catalogo
 * Plugin URI: http://www.eggemplo.com
 * Description: Simple catalog plugin
 * Version: 1.0.0
 * Author: eggemplo
 * Author URI: http://www.ablancodev.com
 * Text Domain: catalogo
 * Domain Path: /languages
 * License: GPLv3
 */
if (! defined ( 'CATALOGO_CORE_DIR' )) {
	define ( 'CATALOGO_CORE_DIR', WP_PLUGIN_DIR . '/catalogo' );
}
define ( 'CATALOGO_FILE', __FILE__ );

define ( 'CATALOGO_PLUGIN_URL', plugin_dir_url ( CATALOGO_FILE ) );

class Catalogo_Plugin {

	public static $notices = array ();


	public static function init() {
		add_action ( 'init', array (
				__CLASS__,
				'wp_init' 
		) );
		add_action ( 'admin_notices', array (
				__CLASS__,
				'admin_notices' 
		) );

		add_action('admin_init', array ( __CLASS__, 'admin_init' ) );

		register_activation_hook( CATALOGO_FILE, array( __CLASS__, 'activate' ) );

	}
	public static function wp_init() {
		load_plugin_textdomain ( 'catalogo', null, 'catalogo/languages' );

		add_action ( 'admin_menu', array (
				__CLASS__,
				'admin_menu' 
		), 40 );

		require_once 'core/class-catalogo-cpt.php';
		require_once 'core/class-catalogo-metabox.php';

		// styles & javascript
		add_action ( 'admin_enqueue_scripts', array (
				__CLASS__,
				'admin_enqueue_scripts' 
		) );
	}

	public static function admin_init() {

	}


	public static function admin_enqueue_scripts($page) {
		// css
		wp_register_style ( 'catalogo-admin-style', CATALOGO_PLUGIN_URL . '/css/admin-style.css', array (), '1.0.0' );
		wp_enqueue_style ( 'catalogo-admin-style' );

		// Our javascript
		wp_register_script ( 'catalogo-admin-scripts', CATALOGO_PLUGIN_URL . '/js/admin-scripts.js', array ( 'jquery' ), '1.0.0', true );
		wp_enqueue_script ( 'catalogo-admin-scripts' );

	}

	public static function admin_notices() {
		if (! empty ( self::$notices )) {
			foreach ( self::$notices as $notice ) {
				echo $notice;
			}
		}
	}

	/**
	 * Adds the admin section.
	 */
	public static function admin_menu() {
		$admin_page = add_menu_page (
				__ ( 'Catáºlogo', 'catalogo' ),
				__ ( 'Catálogo', 'catalogo' ),
				'manage_options', 'catalogo',
				array (
					__CLASS__,
					'catalogo_menu_settings' 
				),
				CATALOGO_PLUGIN_URL . '/images/settings.png' );
	}

	public static function catalogo_menu_settings() {
		// if submit
		if ( isset( $_POST ["catalogo_settings"] ) && wp_verify_nonce ( $_POST ["catalogo_settings"], "catalogo_settings" ) ) {
			// name
			update_option ( "catalogo_settings_name", sanitize_text_field ( $_POST ["catalogo_settings_name"] ) );
		}
		?>
		<h2><?php echo __( 'Catalogo', 'catalogo' ); ?></h2>

		<form method="post" action="" enctype="multipart/form-data" >
			<div class="">
				<p>
					<label><?php echo __( "Name", 'catalogo' );?></label> <input
						type="text" name="catalogo_settings_name"
						value="<?php echo get_option( "catalogo_settings_name" ); ?>" />
				</p>
				<?php
				wp_nonce_field ( 'catalogo_settings', 'catalogo_settings' )?>
					<input type="submit"
					value="<?php echo __( "Save", 'catalogo' );?>"
					class="button button-primary button-large" />
			</div>
		</form>
		<?php 
	}

	/**
	 * Plugin activation work.
	 *
	 */
	public static function activate() {
	}
}
Catalogo_Plugin::init();
