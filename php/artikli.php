<html>
 <head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title> Artikli </title>
     <meta charset="UTF-8">
     <!-- THIS IS A PAGE FOR ADMINS ONLY -->
 </head>
   
 
 <body class="container"> 
     <?php include "header.php";?>
     <div class="row">
           <div class="col-sm-8 col-sm-offset-2">
		   <!-- BOOTSTRAP table -->
           <table class="table table-striped ">
               <tr>
                    <th>ID</th>
                    <th>Kategorija</th>
                    <th>Slika</th>
                    <th>Ime</th>
                    <th>cena</th>
                    <th></th>
                    <th></th>

               </tr>
               <?php
              require_once("konekcija.php");
              
			  // if there is a post method that's set, that means that the page is loaded and an article with this id needs to be deleted from the db
             if (isset($_POST['submit'])){
            $idArt = $_POST['id'];
            mysqli_query($link, "DELETE FROM artikli WHERE idartikli='$idArt'");

            

          }
          
			// we list all articles from the db, put them into an array and then we loop through the array writting each row in the table 
             $rezultat= mysqli_query($link," SELECT * FROM artikli");
             $niz=array();
             while($red=mysqli_fetch_assoc($rezultat)){
              $niz[]=$red;
              echo "<tr><td>{$red['idartikli']}</td>";
               
              $id=$red['kategorija_idkategorija'];
              $imeKategorije=mysqli_query($link, " SELECT naziv FROM kategorija WHERE idkategorija='$id' ");
              

              $noviNiz=mysqli_fetch_array($imeKategorije);
                
               echo "<td>{$noviNiz[0]}</td>
      
                 <td><div style='width: 50%'><img class='group list-group-image img-fluid' style='width:100%' src={$red['slika']} alt='' /><div></td>
                    <td>{$red['naziv']}</td> 
                    <td>{$red['cena']}</td>
                    <td><a href='izmeni.php?id={$red["idartikli"]}' class='btn btn-success' role='button'>Izmeni</a> </td>
                    <td>
                    <form method='post' action='proba.php'>
                    <input type='hidden' name='id' value=".$red['idartikli'].">
                    <input type='submit' name='submit' value='obrisi' class='btn btn-danger'>
                    </form> </td></tr>";
             }
				// submit button with value "obrisi" is made for deleting the article: it sends the article id on this same page via post method
               
               ?>
             </table>
           </div>
         </div>
       </body>
       </html>
