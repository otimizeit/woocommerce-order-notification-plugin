<?php
    $this->options = get_option( 'admin_notifications_orders_option_name' );
?>

<div class="wrap">
    <h1>Notificações de pedidos</h1>
    <form method="post" action="options.php">
    <?php
        // This prints out all hidden setting fields
        settings_fields( 'admin_notifications_orders_option_group' );
        do_settings_sections( 'admin-notifications-orders-setting-admin' );
        submit_button();
    ?>
    </form>
</div>
