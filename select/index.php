
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>SQL NAREDBE</title>
  </head>
  <style>
	body { margin: 10px;}
    ul { list-style-type:none;}
	
  </style>
<body>
<div class="container">
	<h1>SELECT korisnika -> DML </h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test3") or die('Error connecting to MySQL server.');
    session_start();  

    print '<h2>Users</h2>
        <ul>
            <li><a href="index.php?menu=1">SELECT ALL</a></li>
            <li><a href="index.php?menu=2">SELECT ALL -> ORDER DESC firstname</a></li>
            <li><a href="index.php?menu=3">SELECT ALL -> ORDER ASC lastname</a></li>
            <li><a href="index.php?menu=4">SELECT -> WHERE lastname Doe</a></li>
            <li><a href="index.php?menu=5">SELECT -> LIMIT 10</a></li>
            <li><a href="index.php?menu=6">SELECT -> COMBINE ORDER ASC lastname AND LIMIT 15</a></li>
        </ul>
        <hr style="border-bottom:1px solid grey">';

        if (!isset($_GET['menu']) || $_GET['menu'] == 1) {
            $query  = "SELECT * FROM users";
        }
        else if ($_GET['menu'] == 2) {
            $query  = "SELECT * FROM users ORDER BY user_firstname DESC";
        }
        else if ($_GET['menu'] == 3) {
            $query  = "SELECT * FROM users ORDER BY user_lastname ASC";
        }
        else if ($_GET['menu'] == 4) {
            $query  = "SELECT * FROM users WHERE user_lastname='Doe'";
        }
        else if ($_GET['menu'] == 5) {
            $query  = "SELECT * FROM users LIMIT 10";
        }
        else if ($_GET['menu'] == 6) {
            $query  = "SELECT * FROM users ORDER BY user_lastname ASC LIMIT 15";
        }

        $result = @mysqli_query($MySQL, $query);
        while($row = @mysqli_fetch_array($result)) {
            print "<p><i class='bi bi-person'></i> ". $row['user_firstname'] . " <span style='color:green'>" . $row['user_lastname'] . "</span></p>";
        }
	   
	 ?>
</div>
</body>
</html>
