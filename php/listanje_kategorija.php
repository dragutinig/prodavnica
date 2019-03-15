<?php
 require_once ("konekcija.php");
 // listing all categories from the db and putting them into JSON, so we can reach them from index.php
 
   $listanjeKategorija= mysqli_query($link, "SELECT * FROM kategorija ");
   
   $niz=array();
   
   while ($red=mysqli_fetch_assoc($listanjeKategorija)){
   
   $niz[]=$red;
  }
	echo json_encode($niz);
  ?>