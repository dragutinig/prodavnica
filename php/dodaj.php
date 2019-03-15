
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<?php

    require_once("konekcija.php");
	session_start();
	// getting info from registracija.php via post method 
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$telefon = $_POST["telefon"];
	$email = $_POST["e-mail"];
	$adresa = $_POST["adresa"];
	$id= $_POST["idgrad"];

	// checking if a user with the given username already exists - it's a right way to check because a username is unique for each user
	$provera=mysqli_query($link, "SELECT * FROM korisnici WHERE username='$username';"); 
	// if the username doesn't exists already, we can enter new customer's info in the db; if it does we need to notify the user
       if ((mysqli_num_rows($provera)==0) && ($username!="admin")){
	   mysqli_query($link, "INSERT INTO `korisnici` ( `ime`, `prezime`, `username`, `password`, `telefon`, `e-mail`, `adresa` , `grad_idgrad` ) VALUES ('$ime' ,'$prezime', '$username', '$password', '$telefon', '$email',  '$adresa', '$id')" );
	   
	  // getting id from the new user so we can use it for the session 
	  $uzimanjeIDa=mysqli_query($link, "SELECT idkorisnici, username FROM korisnici WHERE username='$username'");
	    $userid=mysqli_fetch_array($uzimanjeIDa);
		
			// creating a cart for new user
		     mysqli_query($link, "INSERT INTO `korpa` ( korisnici_idkorisnici ) VALUES (' $userid[0]')" );
			 
			 // // getting user's cart id so we can use it for the session 
		     $uzimanjeIdKorpe=mysqli_query($link, "SELECT idkorpa FROM korpa WHERE  korisnici_idkorisnici='$userid[0]'");
		      $idkorpa=mysqli_fetch_array($uzimanjeIdKorpe);
			  
		// basic session info: cart id, is someone logged in? (boolean), user id, username
	      $_SESSION['idkorpe']=$idkorpa[0];
	      $_SESSION['ulogovan'] = true;
		   $_SESSION['idUlogovan'] = $userid[0];
		    $_SESSION['username']=$userid[1];
			
	   header('Location: index.php');
	   }
     else {?>
	 <!-- this is the message the user will get if the username he entered already exists -->
	  <script type='text/javascript'>

    $.confirm({
      theme: 'modern',
      columnClass: 'col-md-4 col-md-offset-4',
      title: 'Postojeci username',
      content: 'Pokusajte sa drugim?',
      buttons: {
   OK: function () {
     window.location.href = 'registracija.php';
   },
   odustani: function () {
       window.location.href = 'index.php';
   }

 }
 });

       </script>

	 <?php } ?>
