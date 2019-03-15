<html>
 <head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title>  Korpa </title>
     <meta charset="UTF-8">
		<!-- THIS IS A PAGE FOR LOGGED USERS ONLY -->
 </head>


 <body class="container">
     <?php include "header.php";?>
     <div class="row">
     	 <div class="col-sm-8 col-sm-offset-2">
		 <!-- Bootstrap table -->
     	 <table class="table table-striped table-hover">
     	 	<tr>
     	 		<th>Naziv proizvoda</th>
     	 		<th>cena</th>
				<th>broj</th>
     	 		<th></th>
     	 	</tr>
     	 <?php

     	  require_once("konekcija.php");
     	  $zbir=0;
		  // getting the cart id from the session - we entered these values after registration/loging
          $idKorpa=$_SESSION['idkorpe'];
     	  $rezultat=mysqli_query($link, "SELECT artikli_idartikli, velicine_idVelicine FROM artikli_has_korpa WHERE korpa_idkorpa='$idKorpa'");
     	  $niz = array();
     	  $treciNiz=array();
     	  while($red=mysqli_fetch_array($rezultat)){
     	  $niz[]=$red;
     	  $treciNiz[] = implode(",", $red);
     	  $nesto = implode(",", $red);
          $broj=$red['velicine_idVelicine'];
            $brojPatika=mysqli_query($link, "SELECT broj FROM velicine WHERE idvelicine='$broj'");
             $pBroj=mysqli_fetch_array($brojPatika);
     	  	  $artikli=mysqli_query($link, "SELECT * FROM artikli WHERE idartikli='$nesto'");
     	  while($reed=mysqli_fetch_assoc($artikli)){
     	  	$nizz[]=$reed;
     	  	$zbir=$zbir+$reed['cena'];
     	  	echo  "<tr><td> {$reed['naziv']}</td>
                 <td>{$reed['cena']}</td>
                 <td>{$pBroj[0]}</td>
                <td><a href='brisanje_izKorpe.php?id={$reed["idartikli"]}' class='btn btn-danger' role='button'>Obrisi</a> </td>";
     	  }
			//the last line means we send the id of the article via GET method to the page brisanje_izKorpe 
     	  }
            ?>
            <tr>
            	<th> cena </th>
              	<td colspan="2"><?php echo $zbir;?> RSD </td>
            </tr>
          </table>

       <?php
       		require_once("konekcija.php");
		// if there is a POST[submit] set, that means that the customer made the order! STEP 2 FOR ORDERING
       	 if (isset($_POST['submit']))
			{
			
            for($i=0; $i<count($treciNiz); $i++){
               $bbroj= $treciNiz[$i];
               $idUlogovan=$_SESSION['idUlogovan'];
               $korpa=$_SESSION['idkorpe'];
               $nekiKveri = mysqli_query($link,"SELECT velicine_idVelicine FROM artikli_has_korpa where artikli_idartikli='$bbroj' AND korpa_idkorpa='$korpa' ");
               $nekiBroj=mysqli_fetch_array($nekiKveri);
			   // we loop through all the products from the cart and insert each of them into db table porudzbine (ORDERS) - made for admins only
            mysqli_query($link,"INSERT INTO porudzbine (korisnici_idkorisnici, artikli_idartikli, velicine) VALUES ( '$idUlogovan','$bbroj', '$nekiBroj[0]')");
			// delete all the ordered products from the cart
             mysqli_query($link,"DELETE FROM artikli_has_korpa WHERE artikli_idartikli='$bbroj'AND korpa_idkorpa='$korpa' ") ;

             }
             ?>
              <script>
                   swal({title: "Kupovina obavljena!", text: "Uspesno ste porucili odabrane proizvode", icon: "success", button: false}).then(function(){
                     window.location.href="index.php";
                   }
                 );

                   </script>

                   <?php

            }
			
			// we send all the info to this same page via POST method: STEP 1 FOR ORDERING
			 echo  "<form action='korpa.php' method='post'>
                    <input type='submit' class='btn btn-primary btn-lg btn-block' name='submit' value='kupi'>
                    </form></div></div>"






       	 ?>


     



 </body>


</html>
