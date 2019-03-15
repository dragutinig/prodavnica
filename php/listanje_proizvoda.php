<html>
 <head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <title>  Početna </title>
     <meta charset="UTF-8">
	<!-- this is the age where products are listed, and on this same page we have the whole send-to-cart functionality -->
 </head>


 <body  class="container">
     <?php include "header.php" ;?>
 <?php if(isset($_POST['submit'])){
    //session_start();
	
	// if POST[submit] is set it means that the user send a product to his cart
	// checking if the user is (not) logged, and if he's not we need to notice him / her
    if (!isset($_SESSION['ulogovan'])){

       echo "<script type='text/javascript'>
       $.alert('Niste ulogovani');
       </script>";

   }
   // if the user is logged, we can get all his/her basic info from the session
else{
    require_once("konekcija.php");
    $id=$_POST["idArtikla"];
    $idKorpa=$_SESSION['idkorpe'];
    $broj=$_POST['broj'];

   ?>

   	       <script type='text/javascript'>
            $.confirm({
              theme: 'modern',
              columnClass: 'col-md-4 col-md-offset-4',
              title: 'Poslati u korpu?',
              content: 'Ovaj proizvod ce biti poslat u korpu',
              buttons: {
           OK: function () {

             var phpqry =    <?php
              mysqli_query($link," INSERT INTO `artikli_has_korpa` (`artikli_idartikli`, `korpa_idkorpa`, velicine_idVelicine) VALUES ('$id', '$idKorpa','$broj' )");


              ?>

             window.location.href = 'listanje_proizvoda.php';
           },
           odustani: function () {
               window.location.href = 'listanje_proizvoda.php';
           }

         }
       });

          </script>


 <?php  }}

 require_once("konekcija.php");
 
 // this is where we get the chosen category id, and thi is how we know which products to list on this page
    if (isset($_GET['id'])){
      $id=$_GET["id"];
      $_SESSION['listanjePr']=$id;

    }
    else {
      $id=$_SESSION['listanjePr'];
    }



$listanjeProizvoda=mysqli_query($link, "SELECT * FROM artikli WHERE kategorija_idkategorija=$id");
 $niz=array();

  echo "<div class='container' id='products' class='row view-group' style='    padding-right: 45px;'>";
  while($red=mysqli_fetch_assoc($listanjeProizvoda)){
	$niz[]=$red;



     echo       "<div class='item col-xs-4 col-lg-4 grid-group-item' >
                <div class='thumbnail card'
                style='height:350px; margin-bottom:20px'>
                  <div class='img-event'>
                  <img class='group list-group-image img-fluid' style='width:100%' src={$red['slika']} alt='' />
                </div>
                <div class='caption card-body'>
                 <h4 class='group card-title inner list-group-item-heading'>
                  {$red['naziv']} </h4>
                     <div class='row'>
                       <div class='col-xs-12 col-md-6'>
                        <p class='lead'>
                          Cena {$red['cena']} RSD</p>
                        </div>
                        <div class='col-xs-12 col-md-6'>
                        <form action='listanje_proizvoda.php' method='post'>
                        <input type='hidden' name='idArtikla' value=".$red['idartikli'].">
                        
                        <select name='broj' required>
                        <option value='' disabled selected >Broj</option>";

    if($red['kategorija_idkategorija']==1){
      $muskiBrojevi=mysqli_query($link, "SELECT * FROM velicine WHERE broj>=39");
     $mNiz=array();
     while($mRed=mysqli_fetch_assoc($muskiBrojevi)){
     $mNiz[]=$mRed;
       echo "<option value={$mRed['idvelicine']}>{$mRed['broj']}</option>"; 
     }
  }
    else{ 
      $zenskiBrojevi=mysqli_query($link, "SELECT * FROM velicine WHERE broj<43");
      $zNiz=array();
      while($zRed=mysqli_fetch_assoc($zenskiBrojevi)){
      $zNiz[]=$zRed;
      echo "<option value={$zRed['idvelicine']}>{$zRed['broj']}</option>";  
      }
    }
	// this is where the user submits a product to his cart: STEP 1 FOR SENDING PRODUCT INTO CART
       echo             "</select>
                          <input type='submit' class='btn btn-primary' name='submit' value='Dodaj u korpu'>
                      </form>
                       </div>
                    </div>
                </div>
               </div>
            </div>";


  }




?>
  </div>

  </body>
  </html>
