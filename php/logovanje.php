<!DOCTYPE html>
 <html>
 
  <head> 
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" type="text/css" href="../css/logovanje.css">
     <meta charset="UTF-8">
   <title> Logovanje </title>
  
  
 
  </head>
  
  <body class="container">
    <?php include "header.php" ;?>

 
 	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
			
			<!-- sending entered username and password to ulogujme.php, where we should check them and allow/decline the user's access -->
			
			<form method="post" action="ulogujme.php" class="login-form" >
				<div class="control-group">
				<input type="text" class="login-field"  placeholder="username" id="login-name" name="username" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field"  placeholder="password" id="login-pass" name="password" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input class="btn btn-primary btn-large btn-block" type="submit" value="Uloguj me">
				</form>
			
		</div>
	</div>
           
  </body>
</html> 