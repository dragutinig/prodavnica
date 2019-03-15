<html>
 <head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title>  Korisnici </title>
     <meta charset="UTF-8">
	 <!-- this is the page made for admins only -->
	 <!-- made for reviewing the list of customers -->
 </head>
   
 
 <body class="container"> 
     <?php include "header.php";?>
     <div class="row">
     	 <div class="col-sm-8 col-sm-offset-2">
		 <!-- Bootstrap table -->
     	 <table class="table table-striped table-hover">
     	 	<tr>
     	 		<th>Ime</th>
     	 		<th>Prezime</th>
                    <th>Telefon</th>
                    <th>E-mail</th>
                    <th>Adresa</th>
                    <th>Grad</th>
     	 	</tr>
     	<?php

          require_once("konekcija.php");
          $rezultat=mysqli_query($link, "SELECT * FROM Korisnici ");
            $niz=array();
            while ($red=mysqli_fetch_assoc($rezultat)) {
                $niz[]=$red;
                $idgrada=$red['grad_idgrad'];
                $nazivGrada=mysqli_query($link, "SELECT ime FROM grad WHERE  idgrad='$idgrada'");
                 $imeGrada=mysqli_fetch_array($nazivGrada);

                echo "<tr><td>{$red['ime']} </td>
                       <td>{$red['prezime']} </td>
                       <td>{$red['telefon']} </td>
                       <td>{$red['e-mail']} </td>
                       <td>{$red['adresa']} </td>
                       <td>{$imeGrada[0]}</td></tr>";
            }
          ?>

</table>
</div>
</div>

</body>
</html>