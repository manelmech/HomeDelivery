
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

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="<?php echo URLROOT ?>/public/img/landing_back.jpg"  style="width:100%"><a href="<?php echo URLROOT; ?>/Pages/index">Login</a></img>
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="<?php echo URLROOT ?>/public/img/packages.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="<?php echo URLROOT ?>/public/img/banner.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


</br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br> </br>
 </br> </br></br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br> </br></br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br> </br>

<div class="box">


<?php  $i=1; foreach($data['annonces'] as $annonce): ?>

  <?php  if($annonce->Etat == 'Valide'): ?>
 
  <?php  if( $i<9): ?>
    <div class="warning">
    <img src="<?php echo URLROOT ?>/public/img/deliver<?php  echo $i ?>.jpeg"
         alt="An intimidating leopard.">
    <p>Transport de <?php echo $annonce->nomtranstype ?></p>
    
         
    <p id='descannonce'>A la recherche de transporteur  <?php  echo $annonce->nomtranstype ?> dont les cara.......<a href="<?php echo URLROOT; ?>/Users/detailAnnonce?id=<?php echo $annonce->idannonce; ?>&postule=false">Lire la suite</a></p>
    </div>
    <?php endif; $i++; ?>

    <?php  endif; ?>
<?php endforeach; ?>


</div>






<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
* {
  font-family: 'Open Sans', sans-serif;
}


h2{
font-size: 40px;
    text-transform: uppercase;
    posiposition: center;
}
.signupSection {
  background: url(https://dm0qx8t0i9gc9.cloudfront.net/watermarks/image/rDtN98Qoishumwih/storyblocks-business-man-holding-box-on-the-background-of-world-map-and-packages-man-working-in-international-delivery-service-international-delivery-concept-vector-flat-design-illustration-horizontal-layout_HuMM4qzh3-_SB_PM.jpg);
  background-repeat: no-repeat;
  position: relative;
  top: 90%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 600px;
  text-align: center;
  display: flex;
  color: white;
  box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
}

.info {
  width: 45%;
  background: rgba(20, 20, 20, .8);
  padding: 30px 0;
  border-right: 5px solid rgba(30, 30, 30, .8);
  h2 {
    padding-top: 30px;
    font-weight: 300;
  }
  p {
    font-size: 18px;
  }
  .icon {
    font-size: 8em;
    padding: 20px 0;
    color: rgba(10, 180, 180, 1);
  }
}

.signupForm {
  width: 70%;
  padding: 30px 0;
  background: rgba(20, 40, 40, .8);
  transition: .2s;
  h2 {
    font-weight: 300;
  }
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
}

.noBullet {
  list-style-type: none;
  padding: 0;
}

#join-btn {
  border: 1px solid rgba(10, 180, 180, 1);
  background: rgba(20, 20, 20, .6);
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  &:hover {background: rgba(20, 20, 20, .8);
    padding: 10px 80px;
  }
}

.fourchetteopt{
  
  
  border-radius: 6px;
  position: relative;
  width: 20
}



.fourchetteopt .select select{
  background: transparent;
  line-height: 1;
  border: 0;
  padding: 0;
  border-radius: 0;
  width: 50%;
  position: relative;
  z-index: 2;
  font-size: 1em;
  color:black
}


.box {
  
   width:80%; padding:60px
   width:1400px; margin:0 auto;
  
   
  
}



.warning {
   
  background-color: #ff0;
  display: inline-block;
  width: 260px;
  height: 300px;
  padding: 2px;
  border: 1px ridge rgba(10, 180, 180, 1);    
  background-color: #F8F8FF;
  margin:2px;
  border-radius: 5px;
    
    
}

.warning img {
    width: 100%;
    height:50%
}

.warning p {
    font: small-caps bold 1rem sans-serif;
    text-align: center;
}

#descannonce{

  font: small-caps 1rem sans-serif;
    text-align: center;


}



</style>



<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 7000); // Change image every 2 seconds
}
</script>


  





