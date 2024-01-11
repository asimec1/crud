
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
	label { display:block;margin-top:10px;margin-bottom:4px; }
    input[type="submit"] { margin-top:10px; }
    h1 { font-size:24px; }
    h2 { margin-top:30px; font-size:18px; }
  </style>
<body>
<div class="container">
	<h1>INSERT korisnika &rsaquo; DML </h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test3") or die('Error connecting to MySQL server.');

    print '<h2 style="margin-bottom:20px;">INSERT Users</h2>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query  = "INSERT INTO users (user_firstname, user_lastname) VALUES ('" . $_POST['user_firstname'] . "', '" . $_POST['user_lastname'] . "')"; 
        $result = @mysqli_query($MySQL, $query);

        print '<p class="alert alert-success">Podaci su uspješno spremljeni!</p>';
    }

    print '<form method="POST" id="MyForm">
                <div class="form-group">
                    <label for="ime">Ime:*</label>
                    <input type="text" id="ime" class="form-control" name="user_firstname" required placeholder="Ime">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:*</label>
                    <input type="text" id="prezime" class="form-control" name="user_lastname" required placeholder="Prezime">
                </div>
                <div class="form-group">
                    <input type="submit" value="Pošalji" class="btn btn-primary">
                </div>
            </form>';
	 ?>
</div>
</body>
</html>
