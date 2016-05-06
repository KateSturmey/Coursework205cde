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
                <li class="active"><a href="Database.php">Latest Recipes</a></li>
                <li><a href="CustomerRecipe.php">Customer Recipes</a></li>
            </ul>
        </div>
    </div>
</nav>
            
<div class= "container">
	<div class = "row">
        <div class="col-md-6">
        	<div class= "well">
                    <div class= "page-header">
						<h2>Latest Customer Recipes</h2>
			            <p>Have a personal recipe, that you enjoy and think other people should know about?</br>
			             Send it us and we will review it and tell you what we think! And if we like it we may even 
			             add it too the website!</p>

    			<form method="post">
				Name<input type="text" name="inputName" value="" /><br />
				Favourite Recipe<input type="text" name="inputRec" value="" /><br />
				Location<input type="text" name="inputLoc" value="" /><br />
				<br />
				<input type="submit" name="submit" />
				</form>
</body>
	<div class="table">
	    <table class="table table-striped">
            <caption> Recipes </caption>
    <tr>
    <th>Name
    <th>Favourite Recipe
	<th>Location
    </tr>
		</div>
	</div>
</div>

</html>
<?php
//Connect to the database
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "Guests_db";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    
    $query = "SELECT * FROM Guests";
	$result = mysqli_query($db, $query);
	
	while($Guests = mysqli_fetch_assoc($result)) {
		echo "<tr>\n";
		echo " <td>" . $Guests['name'] . "\n";
		echo " <td>" . $Guests['FavouriteRecipe'] . "\n";
		echo " <td>" . $Guests['location'] . "\n";
		echo "</tr>\n";
	}
    
    $name = $_POST['inputName'];
	$rece = $_POST['inputRec'];
	$loco = $_POST['inputLoc'];
	
	if(!$_POST['submit']) {
		//echo "change this";
		//header('Location: Database.php');
		} else {
			mysqli_query($db, "INSERT INTO Guests (`ID`,`name`,`FavouriteRecipe`,`location`) 
							VALUES(NULL,'$name','$rece','$loco')") or die(mysqli_error());
			echo "Thanks";
			//header('Location: Database.php');
		}
?>
</table>