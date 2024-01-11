
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
  h1 { font-size:24px; }
  h2 { margin-top:30px; font-size:18px; }
	
  </style>
<body>
<div class="container">
	<h1>SELECT korisnika &rsaquo; DML</h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test3") or die('Error connecting to MySQL server.');

    print '<h2>Users (Countries)</h2>
        
        <hr style="border-bottom:1px solid grey">';
        $query  = "SELECT * FROM users";
        $query .= " LEFT JOIN countries ON countries.country_code = users.country_code";
        $result = @mysqli_query($MySQL, $query);
        while($row = @mysqli_fetch_array($result)) {
            print "<p><i class='bi bi-person'></i> ". $row['user_firstname'] . " <span style='color:green'>" . $row['user_lastname'] . "</span> " . ($row['country_name'] != '' ? "(" . $row['country_name'] . ")" : "" ) . "</p>";
        }
	   
	 ?>
</div>
</body>
</html>


