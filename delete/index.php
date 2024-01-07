
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
	<h1>DELETE korisnika -> DML </h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test3") or die('Error connecting to MySQL server.');

    print '<h2>Users</h2>
        <hr style="border-bottom:1px solid grey">';

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $query  = "DELETE FROM users WHERE id=" . (int)$_GET['edit']; 
            $result = @mysqli_query($MySQL, $query);
    
            print '<p class="alert alert-danger">Podaci su uspješno obrisani!</p>';

        }

        $query  = "SELECT * FROM users";
        $result = @mysqli_query($MySQL, $query);
        while($row = @mysqli_fetch_array($result)) {
            print "<p><a href=index.php?edit=". $row['id'] ."><i class='bi bi-trash'></i></a> " . $row['user_firstname'] . " <span style='color:green'>" . $row['user_lastname'] . "</span></p>";
        }
	   
	 ?>
</div>
</body>
</html>
