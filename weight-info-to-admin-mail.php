<?php
/*
Plugin Name: Add Weight to Admin-Emails
Plugin URI: http://www.chefblogger.me
Description: shows the total weight of the order in the admin email
Author: Eric-Oliver Mächler
Author URI: http://www.ericmaechler.com
Version: 1.0
Requires at least: 3.5
Tested up to: 6.1
*/

add_action('woocommerce_email_after_order_table','show_total_weight', 10, 4);
function show_total_weight( $order, $sent_to_admin, $plain_text, $email ){

    if ( 'new_order' != $email->id ) return;

    $total_weight = 0;

    foreach( $order->get_items() as $item_id => $product_item ){
        $quantity = $product_item->get_quantity(); // get quantity
        $product = $product_item->get_product(); // get the WC_Product object
        $product_weight = $product->get_weight(); // get the product weight
        // Add the line item weight to the total weight calculation
        $total_weight += floatval( $product_weight * $quantity );
    }

    // Styles
    $style1 = 'style="width: 100%; font-family: \'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif; color: #737373; border: 1px solid #e4e4e4; border-top:0;"';
    $style2 = '  style="text-align: left; border-top-width: 4px; color: #737373; border: 1px solid #e4e4e4; padding: 12px;border-top:0;"';
    $style3 = ' style="text-align: left; border-top-width: 4px; color: #737373; border: 1px solid #e4e4e4; padding: 12px;border-top:0;"';

    // Output
    echo "<table class='td' cellspacing='0' cellpadding='6' $style1><tr><th $style2>" . __( 'Total weight: ', 'woocommerce' ) . "</th><td $style3>" . $total_weight . " kg</td></tr></table>";
}