<?php

  require_once("konekcija.php");
  
  $id=$_GET['id'];

       mysqli_query($link, "DELETE FROM `artikli_has_korpa` WHERE artikli_idartikli = '$id' ");

  //heading back to THE CART

  header('location: korpa.php');

?>