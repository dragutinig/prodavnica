<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<?php
   session_start();
				// getting username and password from logovanje.php using the post method
			   $username = $_POST["username"];
	           $password = $_POST["password"];

			   require_once("konekcija.php");
			   // checking if there is a user or an admin in the db who has BOTH username and password entered
			   $provera=mysqli_query($link, "SELECT * FROM korisnici WHERE username='$username' AND password='$password';");
			   $proveraAdmin=mysqli_query($link, "SELECT * FROM admin WHERE username='$username' AND password='$password';");
			   
			   // getting user id and his cart id so we could use them for the session attributes
			   $uzimanjeIDa=mysqli_query($link, "SELECT idkorisnici FROM korisnici WHERE username='$username'");
	           $userid=mysqli_fetch_array($uzimanjeIDa);
	           $uzimanjeIdKorpe=mysqli_query($link, "SELECT idkorpa FROM korpa WHERE  korisnici_idkorisnici='$userid[0]'");
		       $idkorpa=mysqli_fetch_array($uzimanjeIdKorpe);

			   if (mysqli_num_rows($provera)>0){
				   $_SESSION['idUlogovan'] = $userid[0];
				   $_SESSION['username'] = $username;
			   	$_SESSION['idkorpe']=$idkorpa[0];
			   $_SESSION['ulogovan'] = true;
			   header('Location: index.php');
			   }

				else if (mysqli_num_rows($proveraAdmin)>0 ){
				$_SESSION['admin'] = true;
				    header('Location: index.php');
				   }
				   
			   else {?>
			   <!-- if the username AND password are not in the db and belonging to the one id, we need to let user know and give him a chance to try again/give up -->
			     <script type='text/javascript'>
           $.confirm({
             theme: 'modern',
             columnClass: 'col-md-4 col-md-offset-4',
             title: 'Pogresan username ili password',
             content: 'Pokusajte ponovo?',
             buttons: {
          OK: function () {


            window.location.href = 'logovanje.php';
          },
          odustani: function () {
              window.location.href = 'index.php';
          }

        }
        });

       </script>

	 <?php } ?>
