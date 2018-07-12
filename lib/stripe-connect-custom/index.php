<?php require_once("config/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
  
  <?php //require_once("views/site/head.php"); ?>
  <head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 </head>
  <body>

    <?php //require_once("views/site/nav.php"); ?>

   
      <p>
        <a class="btn btn-primary btn-block btn-xl" data-loading-text="Connecting..." href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?php echo CLIENT_ID; ?>&scope=read_write">Connect to Stripe</a>
      </p>
 
    <?php //require_once("views/site/footer.php"); ?>
    
    <script>
      $('.btn').on('click', function () {
        var $btn = $(this).button('loading')
      })
    </script>
  </body>
</html>