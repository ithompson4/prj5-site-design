<!DOCTYPE html>
<html>
    <head>
        <title>Result Viz Map</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="css/map_style.css" />		
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />  
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />
		<script src="final.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
    </head>
    <body>   
		<?php include 'html/header.php';?>
		
        <div>	
            <h1>Search Results:</h1>		
		    <div class="mapBox"></div>
            <div class="legendBox"></div>
	        <div id="rangeBox"></div>  
	    </div>
		
        <?php include 'html/footer.php';?>
		<script src="js/gettime.js"></script>	
