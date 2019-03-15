<html>
 <head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">

     <title>  Porudzbine </title>
     <meta charset="UTF-8">
	<!-- this is the page made for admins only: where admin can review all orders made by customers -->
 </head>


 <body> <div class="container" >

     <?php include "header.php";?>
          
          <div class="container" style='padding-right: 46px';>
       	   <h1>Porudzbine</h1>

       <?php
         require_once("konekcija.php");
         if (isset($_POST['submit']))
     {
        $idKor = $_POST["idkorisnika"];
		// if POST[submit] is set that means that admin wants to delete this specific order from the list of orders
		// this is made for this project's purposes, and it means that the products are send by the admin to the customer's physical address
            mysqli_query($link,"DELETE FROM `porudzbine` WHERE korisnici_idkorisnici='$idKor' ") ;
            header("location:porudzbine.php");
            }
		// we select DISTINCT users so we can arrange all the orders (for each user - his orders)
         $rezultat=mysqli_query($link, "SELECT DISTINCT korisnici_idkorisnici FROM porudzbine");
         $nizRazlicitihKorisnika= array();
         while ($redRazlicitihKorisnika=mysqli_fetch_assoc($rezultat)) {
           $nizRazlicitihKorisnika[]=$redRazlicitihKorisnika;
           $korisnik=$redRazlicitihKorisnika['korisnici_idkorisnici'];

            $ukupnaCena=0;

           $uzimanjeKorisnika=mysqli_query($link, "SELECT * FROM korisnici WHERE idkorisnici= '$korisnik'");
           $nizIzTabeleKorisnici= array();
           while ($reed=mysqli_fetch_assoc($uzimanjeKorisnika)) {
           $nizIzTabeleKorisnici[]=$reed;
           $idKorisnici=$reed['idkorisnici'];

           echo  "<div class='row' style=' border: 1px solid #e0e0e0;  box-shadow: 0 0 1px black; border-radius:4px; margin-bottom:10px; padding:10px'>";

           $idartikli=mysqli_query($link, "SELECT artikli_idartikli FROM porudzbine WHERE korisnici_idkorisnici='$korisnik'");
           $NizArtikalaIzPorudzbina= array();
           echo "<div class='col-md-6' style='float:left;'>
                  <table class='table table-striped'>
                  <tr> <th>Ime</th>
                        <th>Slika</th>
                        <th>Broj</th>
                         <th>cena</th>
                                </tr> ";
           while ($noviRed=mysqli_fetch_assoc($idartikli)) {
           $NizArtikalaIzPorudzbina[]=$noviRed;
           $id=$noviRed['artikli_idartikli'];
           $artikli=mysqli_query($link, "SELECT * FROM artikli WHERE idartikli= '$id'");
           $NizKompletnihArtikala= array();

           while ($Red=mysqli_fetch_assoc($artikli)) {
           $NizKompletnihArtikala[]=$Red;
            $ukupnaCena=$ukupnaCena + $Red['cena'] ;
           $artikalR=$Red['idartikli'];
            $brojPatika=mysqli_query($link, "SELECT * FROM porudzbine WHERE artikli_idartikli='$artikalR' AND korisnici_idkorisnici= '$idKorisnici'");
             $nNiz=array();
            while($nRed=mysqli_fetch_assoc($brojPatika)){
             $nNiz[]=$nRed;
             $broj=$nRed['velicine'];
             $Patike=mysqli_query($link, "SELECT broj FROM velicine WHERE idvelicine='$broj'");
             $pBroj=mysqli_fetch_array($Patike);


              echo "<tr><td>{$Red['naziv']}</td>
                    <td><div style='width: 15%'><img class='group list-group-image img-fluid' style='width:100%' src={$Red['slika']} alt='' /><div></td>
                        <td>{$pBroj[0]}</td>
                    <td>{$Red['cena']}</td></tr>";

            }

              

           }

           }
		   
		   // showing the full price of a user's order, and his personal details, so that admin could send him articles
           echo "</table> <h4 style='text-align: right; margin-bottom: 20px; color:red;'> Ukupna cena: {$ukupnaCena} RSD</h4> </div>";
       	         echo" <div class='col-md-6' style='float:right;'>
                       <table class='table table-striped table-hover'>
                       <tr><th>Ime</th><td>{$reed['ime']}</td></tr>
                       <tr><th>Prezime</th><td> {$reed['prezime']}</td></tr>
                       <tr><th>Username</th><td>{$reed['username']}</td></tr>
                       <tr><th>Telefon</th><td>{$reed['telefon']}</td></tr>
                       <tr><th>E-mail</th><td>{$reed['e-mail']}</td></tr>
                       <tr><th>Adresa</th><td>{$reed['adresa']}</td></tr>";
                       $idgrada=$reed['grad_idgrad'];
                       $nazivGrada=mysqli_query($link, "SELECT ime FROM grad WHERE  idgrad='$idgrada'");
                        $imeGrada=mysqli_fetch_array($nazivGrada);

          echo         "<tr><th>Grad</th><td>{$imeGrada[0]}</td></tr>
                       </table>
       	               </div>
                       <form action='porudzbine.php' method='post'>
                       <input type='hidden' name='idkorisnika' value={$korisnik}>
                       <input type='submit' class='btn btn-primary btn-lg btn-block' name='submit' value='Posalji'>
                       </form>
                       </div><br>";
                

         }

         }




       ?>



 </div>
 </body>
 </html>
