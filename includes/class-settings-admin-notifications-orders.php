<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used in the administration area.
 *
 * @link       https://www.otimizeit.com.br
 * @since      1.0.0
 *
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 */

/**
 * @since      1.0.0
 * @package    Admin_Notifications_Orders
 * @subpackage Admin_Notifications_Orders/includes
 * @author     Luancarlos Rocha <luanbam@hotmail.com>
 */

class Settings_Admin_Notifications_Orders { 

    public function __construct() {
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_admin_ajax();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-notifications-orders-hooks.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-notifications-orders-ajax.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-settings-admin-notifications-orders-admin.php';
    }

    private function define_admin_hooks() {
        add_action('woocommerce_checkout_order_processed', array( 'Admin_Notifications_Orders_Hooks', 'insert_notification' ));
    }

    private function define_admin_ajax() {
        add_action('wp_ajax_handles_admin_notifications_orders', array('Admin_Notifications_Orders_Ajax', 'handles_new_notifications')); 
        add_action('wp_ajax_get_admin_notifications_orders', array('Admin_Notifications_Orders_Ajax', 'get_notifications')); 
    }

}

new Settings_Admin_Notifications_Orders();