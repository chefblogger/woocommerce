<?php
/*
Plugin Name: Add Text to Checkout
Plugin URI: http://www.chefblogger.me
Description: add a text snippet to your checkout page
Author: Eric-Oliver Mächler
Author URI: http://www.ericmaechler.com
Version: 1.0
Requires at least: 3.5
Tested up to: 6.1
*/

add_filter('woocommerce_before_cart_table', 'cb_checkout_text', 10 );
function cb_checkout_text(){
    echo '<div class="gratislieferung">bei 100 chf warenkorbwert gibts gratis lieferung</div>';
}

?>