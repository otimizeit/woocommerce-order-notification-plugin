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

    private $options;

    public function __construct() {
        add_action( 'admin_menu', array($this, 'menu_options_page') );    
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    
    public function menu_options_page() {
        add_menu_page(
            'Administração da notificação do pedido',
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

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'admin_notifications_orders_option_group', // Option group
            'admin_notifications_orders_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'admin_notifications_orders_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'admin-notifications-orders-setting-admin' // Page
        );  

        unset($args);

        $args = array (
            'type'              => 'text',
            'id_settings_field' => 'titulo',
            'id'                => 'titulo',
            'name'              => 'admin_notifications_orders_option_name[titulo]',
            'required'          => true
        );

        add_settings_field(
            'titulo', // ID
            'Título', // Title
            array( $this, 'settings_page_render_settings_field' ), // Callback
            'admin-notifications-orders-setting-admin', // Page
            'admin_notifications_orders_section_id', // section
            $args // Args         
        );

        unset($args);

        $args = array (
            'type'              => 'text',
            'id_settings_field' => 'descricao',
            'id'                => 'descricao',
            'name'              => 'admin_notifications_orders_option_name[descricao]',
            'required'          => true
        );

        add_settings_field(
            'descricao',
            'Descrição',
            array( $this, 'settings_page_render_settings_field' ),
            'admin-notifications-orders-setting-admin', 
            'admin_notifications_orders_section_id',
            $args
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $new_input = array();
        
        if( isset( $input['titulo'] ) )
            $new_input['titulo'] = sanitize_text_field( $input['titulo'] );
        
        if( isset( $input['descricao'] ) )
            $new_input['descricao'] = sanitize_text_field( $input['descricao'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info() {
        print 'Configuração da notificação do pedido:';
    }

    public function settings_page_render_settings_field($args) {
        printf(
            '<input type="'.$args['type'].'" id="'.$args['id'].'" name="'.$args['name'].'" required="'.$args['required'].'" value="%s" />',
            isset( $this->options[$args['id_settings_field']] ) ? esc_attr( $this->options[$args['id_settings_field']]) : ''
        );
    }

}




new Settings_Admin_Notifications_Orders_Admin();
?>