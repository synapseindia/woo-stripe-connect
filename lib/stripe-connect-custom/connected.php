<?php 
/**
 * WP Post Template: Connected Page
 * Template Name: Connected Page
 *
 */
 session_start();

require_once(WP_PLUGIN_DIR  .'/woo-stript-connect/lib/stripe-connect-custom/oauth/connect.php');


if (isset($account)): 
$accounts = array();
$accounts['id']= $account['id'];  
$accounts['email']= $account->email;
$accounts['business_name']= $account->business_name;
$accounts['country']= $account->country;
$accounts['default_currency']= $account->default_currency; 
$accounts['display_name']= $account->display_name;
$accounts['statement_descriptor']= $account->statement_descriptor;
$accounts['charges_enabled']= $account->charges_enabled ? 'True' : 'False'; 
$accounts['transfers_enabled']= $account->transfers_enabled ? 'True' : 'False'; 
$accounts['business_url']= $account->business_url;  
endif;

$url = get_permalink(255);
$_SESSION["accounts_details"] = $accounts;
wp_redirect( $url );
exit;

?>