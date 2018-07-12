<?php

######### stripe integration#######
require_once('./config/config.php');


$params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_njOSnUbf6LCQzB6ntwlxs2ZQ",
	"public_live_key"  => "pk_live_fAJVL1bwczOL9qKCnEDW9oHw",
	"private_test_key" => "sk_test_CHCUKK957pYr93saTVNu3Gpc",
	"public_test_key"  => "pk_test_01Anm15MUoDQTfTeXdsI9cbS"
);

if ($params['testmode'] == "on") {
	$private_key=$params['private_test_key'];
	$pubkey = $params['public_test_key'];
} else {
	$private_key=$params['private_live_key'];
	$pubkey = $params['public_live_key'];
}

if(isset($_POST['stripeToken']))
{

	
	
	try {

	
		
		\Stripe\Stripe::setApiKey($private_key);

		$charge = \Stripe\Charge::create(array(
		  "amount" => "100000",
		  "currency" => "usd",
		  "source" => $_POST['stripeToken'],
		  "application_fee" => "10000",
		), array("stripe_account" => "acct_1BtAcQGH2ogMWpP9"));

		
	
			$result = "success";


	} catch(Stripe_CardError $e) {			

	echo $error = $e->getMessage();
		$result = "declined";

	} catch (Stripe_InvalidRequestError $e) {
		$result = "declined";		  
	} catch (Stripe_AuthenticationError $e) {
		$result = "declined";
	} catch (Stripe_ApiConnectionError $e) {
		$result = "declined";
	} catch (Stripe_Error $e) {
		$result = "declined";
	} catch (Exception $e) {

		if ($e->getMessage() == "zip_check_invalid") {
			$result = "declined";
		} else if ($e->getMessage() == "address_check_invalid") {
			$result = "declined";
		} else if ($e->getMessage() == "cvc_check_invalid") {
			$result = "declined";
		} else {
			$result = "declined";
		}		  
	}
	if($result="success")
	{
			
	echo "Payment done";
	}
######## end stripe integration#########
}
?>
<div class="container">

	

				<form id="payment-form" action="" method="POST">
				<div class="payment-errors"></div>
					<div class="form-group">
						<label> Credit Card Number</label>
						<input type="text" name="card_number" class="form-control" id="card_number" placeholder="1234 5678 9012 3456" data-stripe="number">
					</div>
					<div class="form-group">
						<label> CVV</label>
						<input type="text" name="cvv" id="cvv_number" required class="form-control" maxlength="3" placeholder="123" data-stripe="cvc" >
						<label> Expiry Date</label>
						<input type="text" name="expiry_motnh" required class="form-control" id="expiry_motnh" maxlength="2" placeholder="mm" data-stripe="exp_month" style="width:25%;display:inline-block;">
						&nbsp;-&nbsp;
						<input type="text" name="expiry_year" required class="form-control" id="expiry_year" maxlength="2" placeholder="yy" data-stripe="exp_year" style="width:25%; display:inline-block;">

					</div>
					<div class="form-group">
					</div>
					<input type="submit"  id="valid_credit_card" value="Submit" class="btn btn-primary btn-block" />
					
				</form>
			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
	Stripe.setPublishableKey('<?php echo $pubkey; ?>');
  
	jQuery(function($) {
	  var $form = $('#payment-form');
	  $form.submit(function(event) {
		 
		// Disable the submit button to prevent repeated clicks:
		
				setTimeout(function(){
					
					$form.find('#valid_credit_card').hide();
					
	
				}, 2000);
				
		// Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);
	
		// Prevent the form from being submitted:
		return false;
	  });
	

	function stripeResponseHandler(status, response) {
		
	  // Grab the form:
	  var $form = $('#payment-form');
	
	  if (response.error) { // Problem!
	
		// Show the errors on the form:
		$form.find('.payment-errors').text(response.error.message);
		
		$form.find('#valid_credit_card').show(); // Re-enable submission
		
	
	  } else { // Token was created!
	
		// Get the token ID:
		var token = response.id;

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" name="stripeToken">').val(token));
	
		// Submit the form:
		$form.get(0).submit();
	  }
	};
	});
</script>