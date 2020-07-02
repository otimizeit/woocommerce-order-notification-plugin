<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.otimizeit.com.br
 * @since      1.0.0
 *
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 * @author     Luancarlos Rocha <luanbam@hotmail.com>
 */
class Admin_Notifications_Orders_Deactivator {

	/**
	 * 
	 * Dropping the notification storage table
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        global $wpdb;

        $table_name = ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME;

        $wpdb->query("DROP TABLE IF EXISTS $table_name"); 
	}

}
