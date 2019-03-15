<html>
 <head>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
     <title>  Početna </title>
     <meta charset="UTF-8">

 </head>


 <body onload="izlistavanje" class="container" >
 <!-- including header in every file to make the code shorter and cleaner -->
     <?php include "header.php";?>




 <!-- on the first page we list categories: using this generic way, so we could see new categories, if there are any -->
 <!-- using jQuery getJSON method -->
   <div id="listanje"> </div>

    	 <script type="text/javascript">
		(function izlistavanje() {
			$.getJSON("listanje_kategorija.php", function(kategorija){
				$.each(kategorija, function(kljuc, kat){
				$("#listanje").append('<div style="width:50%; height:380px; float:left; margin-top:20px; text-align:center" > <a href ="listanje_proizvoda.php?id='+kat.idkategorija +'" >  <img  src=" '+kat.slika+' "style=width:70%; height:70%; margin-left:15%; margin-top:20px; "> <br> <big class="text-muted"> '+kat.naziv+' </big> </a></div> ');
				});
			});
		})();

         </script>
<!-- including footer in every file to make the code shorter and cleaner -->
 <?php include "footer.php";?>

 </body>


</html>
