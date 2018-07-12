# woo-stript-connect

==== Woo Stript Multivendor Connect Addon ====

# Contributors: SynapseIndia
Plugin Name: Woo Stript Connect
Tags: WooCommerce plugin stripe alipay bitcoin,stripe alipay bitcoin for WooCommerce,stripe alipay for WooCommerce,stripe WooCommerce plugin,stripe payment gateway for WooCommerce,WooCommerce credit cards payment with stripe,stripe payment refunds,stripe WooCommerce addon,free stripe WooCommerce gateway,stripe for WooCommerce,stripe payment in wordpress
Author: SynapseIndia
Requires at least: WP 4.0  & WooCommerce 2.2+
Tested up to: 4.8 & WooCommerce 3.1.1
Version: 1.0.

== Description ==

This plugin acts as an addon for WooCommerce to add a payment method for WooCommerce for accept payment and distribute payment in multi-vendor account.This plugin uses Stripe API to create tokens and charge credit cards. 

= Features =
1. This Plugin required to stripe redirect uri like 
WEBSITE_URL/wp-admin/admin.php?page=stript_vendor_connected_action under below mentioned Srtipe URL https://dashboard.stripe.com/account/applications/settings 
2. No technical skills needed.
3. After plugin installation automatically create "Woo Stripe Vendor" roles
4. The assigned user under "Woo Stripe Vendor" role will access to add WooCommerce products.
5. Vendor should be connect their account with stripe gateway via "vendor stripe connect" navigation under vendor dashboard.
6. This plugin does not store **Credit Card Details**

== Installation ==

1. This plugin requires Woocommerce installation.
2. Upload 'woo-stript-connect' folder to the '/wp-content/plugins/' directory
3. Activate 'Woo Stript Connect' from wp plugin lists in admin area.
4. Plugin will appear in settings of WooCommerce
5. You can set the addon settings from 
   wocommmerce -> settings -> Checkout -> Stripe Cards Settings
6. You can check for Testing Card No <a href="https://stripe.com/docs/testing" target="_blank" >Here</a> 
7. **Make sure you have 2 Decimal Places in Pricing Options (WooCommerce > Settings > General > Currency Options) with Trailing Zeros Checked else the charge created by card will be incorrect**

