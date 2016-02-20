<!DOCTYPE html>
<html>
    <head>
        <title>Search Visualization</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" /> 		
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script src="../js/bootstrap.js"></script>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../js/bootstrap.min.js"></script>		
		<script src="../js/color_active.js"></script>			
		<link rel="stylesheet" href="../css/mycss.css" type="text/css" media="screen" />  
    </head>
    <body>   
		<?php include 'header.php';?>
		<?php include 'carousel_slider.php';?>	
		
        <div id="container">																																																																																		
		    <div id="content">			
			    <div class="col_left">				
					<div class="news">
					    <span id="span1">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" /></a><br />
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
					<div class="news">
						<span id="span2">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" width="25" height="25" /></a><br />
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>					
					</div>
					<div class="news">
						<span id="span3">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" width="25" height="25" /></a><br />
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
				</div>
				<div class="col_right">
                    <h1>Search a Visualization</h1>	
					<div class="form"> 
                    	<form method="post" id="searchBar" action="/~scherman/prj5-site-design/viz.php">
                        Enter Name: <input type="text" name="name">
                        <input type="submit" name="submit" value="Search">
                    </form>
                    </div>	
				</div>			
		    </div>
	    </div>        
        
		<?php include 'footer.php';?>

	</body>
</html>	
	