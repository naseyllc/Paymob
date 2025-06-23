<?php
/*
Plugin Name: Paymob for WooCommerce – Subscriptions Edition
Plugin URI: https://nasey.dev
Description: Full integration with Paymob for managing WooCommerce Subscriptions. Supports manual and auto-renewals via Tokenization & Webhooks. Compatible with Dokan & Listeo.
Version: 1.0.0
Author: NASEY Dev
*/

if (!defined('ABSPATH')) exit;

// Load the gateway and settings
function init_paymob_subscription_gateway() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wc-gateway-paymob-subscription.php';
    require_once plugin_dir_path(__FILE__) . 'includes/paymob-api-handler.php';
    require_once plugin_dir_path(__FILE__) . 'includes/paymob-webhook-listener.php';
    require_once plugin_dir_path(__FILE__) . 'includes/paymob-subscription-functions.php';

    add_filter('woocommerce_payment_gateways', function($gateways) {
        $gateways[] = 'WC_Gateway_Paymob_Subscription';
        return $gateways;
    });
}
add_action('plugins_loaded', 'init_paymob_subscription_gateway');

// Admin Settings UI
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'admin/paymob-settings-page.php';
}
