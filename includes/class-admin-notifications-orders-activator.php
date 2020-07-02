<?php 
/**
* Fired during plugin activation
*
* @link       https://www.otimizeit.com.br
* @since      1.0.0
*
* @package    Admin_Notifications_Orders
* @subpackage Admin_Notifications_Orders/includes
*/

/**
* Fired during plugin activation.
*
* This class defines all code necessary to run during the plugin's activation.
*
* @since      1.0.0
* @package    Admin_Notifications_Orders
* @subpackage Admin_Notifications_Orders/includes
* @author     Luancarlos Rocha <luanbam@hotmail.com>
*/
class Admin_Notifications_Orders_Activator {

   /**
    * Creating the table to store the latest notifications
    *
    * @since    1.0.0
    */
   public static function activate() {
      global $wpdb;

      $table_name = ADMIN_NOTIFICATIONS_ORDERS_TABLE_NAME;

      $charset_collate = $wpdb->get_charset_collate();
   
      $sql = "CREATE TABLE $table_name (
      `id` bigint(20) NOT NULL AUTO_INCREMENT,
      `cod_order` bigint(20) NOT NULL,
      `customer` varchar(100),
      `total` float,
      `view` bigint(1) DEFAULT 0 NOT NULL,
      `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id)
      ) $charset_collate;";
      
      if ( !function_exists( 'dbDelta' ) ) {
       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      }
       
      dbDelta( $sql );
   }

}



?>