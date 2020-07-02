<?php
/**
 * @link              https://www.otimizeit.com.br
 * @since             1.0.0
 * @author            Luancarlos Rocha
 * @package           admin_notifications_orders
 * 
 * 
 * Plugin Name:       WooCommerce Order Notification Plugin
 * Plugin URI:        https://www.otimizeit.com.br
 * Description:       This plugin allows the administrator to receive push notifications for woocommerce orders.
 * Version:           1.0.0
 * Author:            Otimizeit
 * Author URI:        https://www.otimizeit.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-notifications-orders
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-settings-page-activator.php
 */

global $wpdb;
define( 'ADMIN_NOTIFICATIONS_ORDERS_VERSION', '1.0.0' );
define(	'ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME', $wpdb->prefix."admin_notifications_orders");
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-notifications-orders-activator.php
 */
function activate_admin_notifications_orders() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-notifications-orders-activator.php';
	Admin_Notifications_Orders_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-notifications-orders-deactivator.php
 */
function deactivate_admin_notifications_orders() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-notifications-orders-deactivator.php';
	Admin_Notifications_Orders_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_notifications_orders' );
register_deactivation_hook( __FILE__, 'deactivate_admin_notifications_orders' );


/**
 * The core plugin class
 *
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-settings-admin-notifications-orders.php';

?>