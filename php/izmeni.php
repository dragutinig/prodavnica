<html>
 <head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">

     <title>  Izmeni proizvod </title>
     <meta charset="UTF-8">
	 <!-- made for admin only: age for updating articles -->
 </head>


 <body class="container">

     <?php include "header.php";?>
     <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
    <?php
    require_once("konekcija.php");
   if (isset($_POST['submit'])){
    $id = $_POST["id"];
  $naziv = $_POST["naziv"];
  $cena = $_POST["cena"];
  $slika = $_POST["slika"];
  $kategorija = $_POST["kategorija"];

      mysqli_query($link, "UPDATE artikli SET naziv = '$naziv', cena = '$cena', slika = '$slika', kategorija_idkategorija = '$kategorija' WHERE idartikli ='$id'");
   header("location:proba.php");

   }
   else{

?>
     <form action="izmeni.php" method="POST">

     <?php
     require_once("konekcija.php");
     $id=$_GET['id'];
     $rezultat=mysqli_query($link,"SELECT * FROM artikli WHERE idartikli='$id'");
     	$niz=array();
     	while($red=mysqli_fetch_assoc($rezultat)){
     	$niz[]=$red;
     	echo '<input type="hidden" class="form-control mx-sm-3" name="id" value='.$id.'>

       <div>
    	 <label>Ime</label>
         <input type="text" class="form-control form-control-lg" style="margin-bottom:15px" name="naziv" value='.$red["naziv"].'>
         </div>

         <div>
    	 <label>Cena</label>
		<input type="text" class="form-control form-control-lg" style="margin-bottom:15px" name="cena" value='.$red["cena"].'>
		</div>

    <div>
    	<label>Slika</label>
		<input type="text" class="form-control form-control-lg " style="margin-bottom:15px" name="slika" value='.$red["slika"].' >
    </div>

    <div>
      <label>Kategorija</label>
          <select class="form-control" name="kategorija" required>
          <option value="" disabled selected> Odaberite kategoriju </option>';
    $imeKategorije=mysqli_query($link, " SELECT idkategorija, naziv FROM kategorija ");
     $noviNiz=array();
     while($reed=mysqli_fetch_assoc($imeKategorije)){
      $noviNiz[]=$reed;

     echo
       '<option value= '.$reed["idkategorija"].'>  '.$reed["naziv"].' </option>';
       }
       echo '</select>
       <br>
        </div>';
     	}

?>

    <!-- we submit new values for a specific article - send ne info via POST method to this same page -->
    <input type='submit' class="btn btn-primary btn-lg btn-block" name='submit' value='izmeni'>

     </form>




<?php } ?>
</div>
</div>


 </body>
 </html>
