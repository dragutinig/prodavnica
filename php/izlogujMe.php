<?php
// by unseting and destroying session, we'll clear all its attributes

   session_start();
  session_unset();
					  
  session_destroy();
  
 header('Location: index.php');
?>
