<?php
/**
 * Ajax configuration
 *
 * @link       https://www.otimizeit.com.br
 * @since      1.0.0
 *
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 */

/**
 * 
 * @since      1.0.0
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 * @author     Luancarlos Rocha <luanbam@hotmail.com>
 */
class Admin_Notifications_Orders_Ajax {

    /**
     * Receives the request via ajax
     * Handles new notifications
     */
    public static function handles_new_notifications() {
        global $wpdb;
        $table_name = ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME;

        $results = $wpdb->get_results("SELECT * FROM $table_name WHERE view = 0");
        
        foreach ($results as $notification) {
            $wpdb->query("UPDATE $table_name SET view = 1 WHERE id = $notification->id");
        }

        wp_send_json($results);
    }

    /**
     * Receives the request via ajax
     * Return notifications 
     */
    public static function get_notifications() {
        global $wpdb;
        $table_name = ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME;

        $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY date DESC");
        
        wp_send_json($results);
    }
}
