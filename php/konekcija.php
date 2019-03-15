<?php
	$link = mysqli_connect("localhost", "root", "", "webprodavnica");
	 mysqli_set_charset($link, "utf8");
	if (!$link) {
		echo "Doslo je do greske u povezivanju sa bazom." .PHP_EOL;	
	}
?>