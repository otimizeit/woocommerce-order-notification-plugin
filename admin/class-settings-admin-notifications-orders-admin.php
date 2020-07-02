<?php
/**
 * The admin-specific functionality of the plugin.
 *
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

class Settings_Admin_Notifications_Orders_Admin {

    public function __construct() {
        add_action( 'admin_menu', array($this, 'menu_options_page') );    
    }
    
    public function menu_options_page() {
        add_menu_page(
            'Administração de notificações de pedidos',
            'Notificações de pedidos',
            'manage_options',
            'admin_notifications_orders',
            array($this, 'add_plugin_admin'),
            'dashicons-megaphone',
            20
        );
    }

    public function add_plugin_admin() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/settings-admin-notifications-orders-view.php';
    }

}




new Settings_Admin_Notifications_Orders_Admin();
?>