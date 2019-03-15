 <?php
    require_once("konekcija.php");
	
	// listing all cities from the db, and putting them into JSON so we can reach them and list them in the registration form
	
    $rezultat=mysqli_query($link,"SELECT * FROM grad;");
    $niz=array();
	while($red= mysqli_fetch_assoc($rezultat) ){
		  $niz[]= $red;
		 
	}
	echo json_encode($niz);	 
    
 ?> 