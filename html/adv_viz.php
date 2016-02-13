<!DOCTYPE html>
<html>
    <head>
        <title>Advanced Viz Search</title>
	    <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />  
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script src="../js/bootstrap.js"></script>
    </head>
    <body> 
        <?php include 'header.php';?>
		
        <div id="container">																																																																																		
		    <div id="content">			
			    <div class="col_left">				
					<div class="news">
					    <span id="span1">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" /></a><br/ >
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
					<div class="news">
						<span id="span2">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" width="25" height="25" /></a><br/ >
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>					
					</div>
					<div class="news">
						<span id="span3">Featured</span>
						<a href="#"><img src="../images/arr.png" alt="pic" width="25" height="25" /></a><br/ >
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
                        Enter Name: <input type="text" name="name"><br />
						Enter Type: <input type="text" name="type"><br />
						Enter Date: <input type="text" name="date"><br />
                        <input type="submit" name="submit" value="Search">
                    </form>
                    </div>	
				</div>			
		    </div>
	    </div> <!-- end container -->
		
        <?php include 'footer.php';?>
