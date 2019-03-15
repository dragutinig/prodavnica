<?php
		 session_start();
		?>
<div style="position: sticky; top: 0; z-index: 1; background-color: white">
<div>
<h1 style="float: left"> Webshop </h1>
<?php
if(isset($_SESSION['username'])){
	echo
"<div id='imeKorisnika' style='float: right;'><h3>{$_SESSION['username']}</h3> </div>";}
?>
</div>
		     <div class="navbar">
                   <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Pocetna</a>

                     <a href="#footer"><i class="fa fa-fw fa-envelope"></i> Kontakt</a> 

					  <?php
					  // we'll show login and registration options only if no one is logged in at this moment
					  if ( (!isset ($_SESSION['ulogovan']) ) && (!isset ($_SESSION['admin']) )){
						?>

					  <a href="logovanje.php"><i class="fa fa-fw fa-user"></i> Login</a>
					   <a href="registracija.php"><i class="fa fa-fw fa-registered"></i> Registracija</a>
					 <?php }
					 // if admin is logged in, he needs to see options for reviewing articles, adding new ones, reviewing orders, and customers
					 else if (isset($_SESSION['admin'])){ ?>
					 <a href="izlogujME.php"><i  class="fa fa-fw fa-sign-out"></i> Izloguj se</a>
					  <a href="artikli.php"><i  class="fa fa-fw fa-book"></i> Artikli</a>
					  <a href="unosNovihProizvoda.php"><i  class="fa fa-fw fa-edit"></i> Unos novih artikala</a>
					  <a href="porudzbine.php"><i  class="fa fa-fw fa-cart-arrow-down"></i> Porudzbine</a>
					  <a href="korisnici.php"><i  class="fa fa-fw fa-address-card"></i> Korisnici</a>
					  
					 <?php }
					  else  { ?>
					  <!-- the last possible option is that the customer is logged in, so we'll show him/her the log out option, and his cart -->
					   <a href="izlogujME.php"><i  class="fa fa-fw fa-sign-out"></i> Izloguj se</a>
					    <div id="korpa"> <a href="korpa.php"><i  class="fa fa-fw fa-shopping-cart"></i> Korpa</a></div>
					  <?php
						 }
					  ?>

					 </div>

                     </div>
