<!DOCTYPE html>
<html>
<head>
<title>Explore Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" /> 
</head>
<body>
	<div id="header">																												
		<ul class="menu">
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">News</a></li>
			<li><a href="viz.php">Explore</a></li>
			<li id="last"><a href="index.html">Compare</a></li>
		</ul>
        <ul class="user_log">
			<li><a href="index.html">Username</a></li>
			<li><a href="index2.html">Login</a></li>
        </ul>			
	</div>
	<div id="container">																																																																																		
		<div id="content">
			<div class="bg">
			    <div class="col_left">				
					<div class="news">
						<span id="span1">Featured</span>
						<a href="#"><img src="images/arr.png" alt="pic" width="25" height="25" /></a><br/ >
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
					<div class="news">
						<span id="span2">Featured</span>
						<a href="#"><img src="images/arr.png" alt="pic" width="25" height="25" /></a><br/ >
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>					
					</div>
					<div class="news">
						<span id="span3">Featured</span>
						<a href="#"><img src="images/arr.png" alt="pic" width="25" height="25" /></a><br/ >
						<p>Lorem ipsum dolor sit amet, sectetu adip scing varius interdum incid unt quis, libero. 
						Aenean mturpis. Maecenas hendrerit masa laoreet iaculipede mnisl ulamcorper. 
						Tellus er sodales enim, in tincidunt mauris in odio. Massa ac laoreet iaculipede nisl.</p>
						<a href="#" class="more">more info</a>
					</div>
				</div>
				<div class="col_right">
                    <h1>Search a Visualization</h1>
					<div class="form"> 
					<?php
                    // define variables and set to empty values
                    $nameErr = "";
                    $name = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
					    if (empty($_POST["name"])) {
							$nameErr = "Name is required";
                        } else {
							$name = test_input($_POST["name"]);
                            }   
                    }
                    function test_input($data) {
						$data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        Enter Name: <input type="text" name="name">
                        <span class="error">* <?php echo $nameErr;?></span>
                        <br /><br />
                        <input type="submit" name="submit" value="Search">
                    </form>

                    <?php
                    echo "<h2>Input:</h2>";
                    echo $name;
                    echo "<br />";
                    ?>
                    </div>				
				</div>				
			</div>
		</div>
	</div>
	
	<div id="footer">																																																																																																																																																																																																									
		<ul>
			<li><a href="index.html">Home</a>|</li>
			<li><a href="index2.html">News</a>|</li>
			<li><a href="index2.html">Explore</a>|</li>
			<li><a href="index2.html">Compare</a></li>
		</ul>
		<p>Copyright &copy;. All rights reserved. Design by <a href="#" title="Team 5">Team 5</a></p>
		<script type="text/javascript">
         //<![CDATA[
         var dt = new Date(document.lastModified);   // Get document last modified date
         document.write('<p>This page was last updated on '+dt.toLocaleString()) + '</p>';
        //]]>
        </script>
	</div>
</body>
</html>
