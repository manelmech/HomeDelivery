<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Soon - Website Under Construction Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo URLROOT ?>/public/lib/img/favicon.png" rel="icon">
  <link href="<?php echo URLROOT ?>/public/lib/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo URLROOT ?>/public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo URLROOT ?>/public/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo URLROOT ?>/public/css2/styles.css" type="text/css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Soon
    Template URL: https://templatemag.com/soon-website-under-construction-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>


   
<?php 
  require APPROOT . '/views/includes/head.php';

?>



<div id="logo-landing">

  <h3 class="btn-login"><a href="<?php echo URLROOT; ?>/Users/login">Login</a></h3>

<img  id="logoimg" src="<?php echo URLROOT ?>/public/img/logo.png" alt="" height="140%"  >
  

</div>



<div id="section-landing">


<?php
    require APPROOT . '/views/includes/navigation.php';
?>
  

</div>

</br></br></br></br></br></br></br></br>

  <div id="h">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Statistics</h1>
          <h5>VOYAGEZ AU TOUR DU MONDE ENTIER Á TRAVERS LE MONDE DES COLIS</h5>
          <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
          <div class="countdown-header">
            <div class="countdown" data-date="2018/11/15"></div>
          </div>
        </div>
      </div>
      <!--/row-->
    </div>
    <!--/container-->
  </div>
  <!--/H-->

 

  <div id="g">
    <div class="container">
      <div class="row centered">
        <h1>Subscribe to stay informed</h1>
        <div class="col-md-6 col-md-offset-3">
          <form role="form" action="register.php" method="post" enctype="plain">
            <input type="email" name="email" class="subscribe-input" placeholder="Enter your e-mail address..." required>
            <button class='btn btn-conf btn-blue' style="  background-color: #ffa500" type="submit">Subscribe</button>
          </form>
        </div>
      </div>
      <!--/row-->

      <div class="row mt">
        <div class="col-md-3">
        <h1>+3000 Annonces</h1>
        </div>
        <div class="col-md-5">
        <h1>+2000 Transporteurss</h1>
        </div>
        <div class="col-md-4">
        <h1>+2000 Chauffeurs</h1>
        </div>
      </div>
      <!--/row-->
    </div>
    <!--/container-->
  </div>
  <!--/div-->



  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>Soon</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/soon-website-under-construction-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created with Soon template by <a href="https://templatemag.com/">TemplateMag</a>
      </div>
    </div>
  </div>
  <!-- / copyrights -->

  <!-- JavaScript Libraries -->
  <script src="<?php echo URLROOT ?>/public/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT ?>/public/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo URLROOT ?>/public/lib/php-mail-form/validate.js"></script>
  <script src="<?php echo URLROOT ?>/public/lib/countdown/jquery.plugin.min.js"></script>
  <script src="<?php echo URLROOT ?>/public/lib/countdown/jquery.countdown.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
