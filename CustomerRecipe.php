<!DOCTYPE>
<html lang="en">
    
<head>
    <title>Kate's Shakes</title>
    <meta charset="utf-8">
    <link href="css/mystyle.css" rel="stylesheet" type="text/css">
    <meta content="width=device-width, inital-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <center><img src="img/logo2.JPG"></center>
</head>

<body class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class= "container">
        
     <div class="container-fluid">
        <div class="navbar-header">
    
    <a class="navbar-brand" href="#"></a> </div>
	    <div class "collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="New.html">Home</a></li>
                <li><a href="recipes.html">Recipes</a></li>
                <li><a href="facts.html">Facts</a></li>
                <li><a href="contact.html">Contact us</a></li>
                <li><a href="Database.php">Latest Recipes</a></li>
                <li class="active"><a href="CustomerRecipe.php">Customer Recipes</a></li>
            </ul>
        </div>
    </div>

            </nav>
            
    <div class= "container">
	<div class = "row" id="bigCallout">
     <div class="col-md-6">
        	 <div class= "well">
                    <div class= "page-header">
				<header>
					<h2><a href="#" title="PlaceHolder">Our Reviewed Customer Recipes</a></h2>
				</header>
				<content>
					<p>Thank you all so much for sending in the recipes, we've had chance to review a few and give them a Kate'S shakes rating!</p>
	
				</content>
			

<div class="table-responsive">
	 <table class="table table-striped">
  <caption> Customer Recipes </caption>
  <tr>
    <th>Name
    <th>Smoothie Name
	  <th>Description
	  <th>Rating
  </tr>
  			</div>
		</div>
	</div>
</div>

<?php
//Connect to the database
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "CustomerRecipes_db";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    //echo "Connected successfully (".$db->host_info.")";
        
    // $query = "SELECT * FROM Guests";
    // $result = mysqli_query($db, $query);

    // echo "<table>"
    // echo "<tr><th>ID</th><th>Name</th><th>Favourite Recipe</th></tr>";
    
    // while ($row = mysqli_fetch_assoc($result)) {
    //     //echo "The ID is: " . $row['ID'] . " and the name is: " . $row['name'];
    //     $id = $row['ID'];
    //     $name = $row['name'];
    //     $favrec = $row['FavouriteRecipe'];
    //     echo "<tr><td>".$id."</td><td>".$name."</td><td>".$favrec."</td></tr>";
    // }
    // echo "</table>"
    
    $query = "SELECT * FROM CustomerRecipes";
	$result = mysqli_query($db, $query);
	
	while($CustomerRecipes = mysqli_fetch_assoc($result)) {
		echo "<tr>\n";
		echo " <td>" . $CustomerRecipes['Name'] . "\n";
		echo " <td>" . $CustomerRecipes['SmoothieName'] . "\n";
		echo " <td>" . $CustomerRecipes['Description'] . "\n";
		echo " <td>" . $CustomerRecipes['Rating'] . "\n";
		echo "</tr>\n";
	}

	