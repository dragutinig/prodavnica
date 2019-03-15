<html>
 <head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">

     <title>  Izmeni proizvod </title>
     <meta charset="UTF-8">

 </head>


 <body class="container">

     <?php include "header.php";?>

    <?php
    
    require_once("konekcija.php");

   if (isset($_POST['submit'])){
       $naziv=$_POST['naziv'];
       $cena=$_POST["cena"];
       $slika=$_POST["slika"];
       $kategorija=$_POST["kategorija"];

       mysqli_query($link,  "INSERT INTO artikli ( naziv, cena, slika, kategorija_idkategorija) VALUES ('$naziv','$cena','$slika','$kategorija' )");
             
   }
     
     
?>

     <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
    
     <form action="unosNovihProizvoda.php" method="POST">

   <input type="hidden" class="form-control mx-sm-3" name="id">

       <div>
       <label>Ime</label>
         <input type="text" class="form-control form-control-lg" style="margin-bottom:15px" name="naziv"  required>
         </div>

         <div>
       <label>Cena</label>
       <input type="text" class="form-control form-control-lg" style="margin-bottom:15px" name="cena"  required>
      </div>

    <div>
      <label>Slika</label>
      <input type="text" class="form-control form-control-lg " style="margin-bottom:15px" name="slika"  required>
    </div>

    <div>
      <label>Kategorija</label>
          <select class="form-control" name="kategorija" required >
          <option value="" disabled selected> Odaberite kategoriju </option>

        <?php 
          $imeKategorije=mysqli_query($link, " SELECT idkategorija, naziv FROM kategorija ");
     $noviNiz=array();
     while($reed=mysqli_fetch_assoc($imeKategorije)){
      $noviNiz[]=$reed;


        echo "<option value=". $reed['idkategorija'] ."> ". $reed["naziv"] ."</option> "; 

      }?>
   </select>
       <br>
        </div>
    <input type='submit' class="btn btn-primary btn-lg btn-block" name='submit' value='izmeni'>

     </form>





</div>
</div>


 </body>
 </html>
