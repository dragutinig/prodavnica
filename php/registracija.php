<!DOCTYPE html>
<html>
 <head>
 	
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../css/logovanje.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
	  
  </head>
  <body class="container">
  
  
 <?php include "header.php"; ?>
	 	<?php
		require_once("konekcija.php");	
		?>	
 
<div class="login">
      
		<div class="login-screen">
			<div class="app-title">
				<h1>Registracija</h1>
			</div>
			
			<!-- the form sends all customer's information to the dodaj.php, where they should be checked and eventually written in the dbe -->
			<!-- all fields are required -->
			
			<form action="dodaj.php" method="post" class="login-form" >

			 
				<div class="control-group">
				<input type="text" class="login-field"  placeholder="Ime" id="login-name" name="ime" required>
				
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="text" class="login-field"  placeholder="Prezime" id="login-name" name="prezime" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" placeholder="Username" id="login-name" name="username" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
				<!-- TO DO: regarding the password, there's a REGEX needed, and also md5 encryption -->
				<div class="control-group">
				<input type="password" class="login-field"  placeholder="Password" id="login-name" name="password" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field"  placeholder="Telefon" id="login-name" name="telefon" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field"  placeholder="E-mail" id="login-name" name="e-mail"  required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
			
				<div class="control-group">
				<input type="text" class="login-field"  placeholder="Adresa" id="login-name" name="adresa" required >
			
				</div>
				  
				 <div class="styled-select blue semi-square">
				
				<select id="grad" name="idgrad" required> 
				<option value="" disabled selected >  Odaberite grad </option>
					 
		        </select>
				</div>
				
				

				  <input class="btn btn-primary btn-large btn-block"  type="submit"  value="registruj me" >
				</form>
		
	
		</div>
	</div>
	<!-- this function gets json from listanjeGradova.php and lists all the cities in #grad select field -->
	<!-- JQUERY getJSON METHOD -->
	  <script type="text/javascript">
	        
			(function osvezi() { 
			$.getJSON("listanjeGradova.php", function(gradovi){
				$.each(gradovi, function(kljuc, grad){
					$("#grad").append('<option value="'+grad.idgrad+'">'+grad.ime+' </option>');
				});
			});
		} )();
		</script>
	</body>
	
	</html>