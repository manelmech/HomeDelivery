<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css2/styles.css" type="text/css"> 
    </head>
    <body id="page-top">
        <!-- Navigation-->
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

</br></br></br></br></br></br>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Voyagez a travers le monde des Colisers</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Avec Home delivery</p>
                       
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Notre entreprise est la pour vous</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus, nibh in efficitur fringilla, lorem arcu malesuada magna, quis rhoncus ipsum augue a eros. Proin vehicula feugiat magna, eu facilisis turpis tincidunt ut. Aenean scelerisque convallis sapien ac vehicula. Fusce lorem dui, lobortis et dictum non, mattis sit amet turpis. Sed condimentum vestibulum ante sed scelerisque. Curabitur nec nisi ut ex tincidunt commodo a vel mauris. Nam a vestibulum nisl. Sed id dolor vitae risus iaculis iaculis. Nulla at commodo est. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam maximus consectetur auctor. Sed imperdiet at lacus eget viverra. Proin at pulvinar risus. Vestibulum vel ipsum cursus, mattis odio sed, viverra odio.</p>
                    </div>
                </div>
            </div>
        </section>
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
