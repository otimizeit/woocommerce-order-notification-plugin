<?php
/**
 * Hooks configuration
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
class Admin_Notifications_Orders_Hooks {

    /**
     * Is called whenever an order situation changes to pedding.
     * I inserted a record in the bank with order information
     */
    public static function insert_notification($order_id) {
        global $wpdb;
        $table_name = ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME;

        $order          = wc_get_order($order_id);
        $customerName   = $order->get_billing_first_name() . ' ' .$order->get_billing_last_name();
        
        $itens_total    = 0;
        foreach ($order->get_items() as $item_id => $item_data) {
            $itens_total += $item_data->get_total(); 
        }

        $insert_query = "INSERT INTO $table_name (`cod_order`, `customer` ,`total`) VALUES ('".$order_id."','".$customerName."','".$itens_total."')";
        
        $wpdb->query( $insert_query );
    }
}
