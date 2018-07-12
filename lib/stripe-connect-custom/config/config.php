<?php 
require_once(WP_PLUGIN_DIR  .'/woo-stript-connect/lib/stripe-connect-custom/vendor/autoload.php');
$woosetting = get_option('woocommerce_stripe_settings');
$testmode = $woosetting['stripe_sandbox'];
$adminratio = $woosetting['stripe_admin_ratio'];
if($testmode == 'yes')
{
	$publishableKey = $woosetting['stripe_testpublickey'];
	$clientID = $woosetting['stripe_testclientid'];
	$secretKey = $woosetting['stripe_testsecretkey'];
} else{
	$publishableKey = $woosetting['stripe_livepublickey'];
	$clientID = $woosetting['stripe_liveclientid'];
	$secretKey = $woosetting['stripe_livesecretkey'];
}
define("CLIENT_ID", $clientID); 
define("SECRET_KEY",$secretKey); 
define("PUBLICATION_KEY",$publishableKey); 
define("ADMIN_RATIO",$adminratio); 

$redirectUri = admin_url().'admin.php?page=stript_vendor_connect';
define("REDIRECT_URL", $redirectUri); 
//https://dashboard.stripe.com/account/applications/settings

\Stripe\Stripe::setApiKey(SECRET_KEY);
?>