
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
	<h1>UPDATE korisnika &rsaquo; DML </h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test3") or die('Error connecting to MySQL server.');
    
    print '<h2>Users' . ((isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') ? ' &rsaquo; EDIT' : "") . '</h2>
        <hr style="border-bottom:1px solid grey">';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query  = "UPDATE users SET user_firstname='" . $_POST['user_firstname'] ."', user_lastname='" . $_POST['user_lastname'] ."', country_code='" . $_POST['country_code'] ."' WHERE id=" . (int)$_GET['edit']; 
            $result = @mysqli_query($MySQL, $query);
    
            print '<p class="alert alert-warning">Podaci su uspješno izmjenjeni!</p>';

        }

        if (isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            $query  = "SELECT user_firstname, user_lastname, country_code FROM users WHERE id=" . (int)$_GET['edit'];
            $result = @mysqli_query($MySQL, $query);
            $row = @mysqli_fetch_array($result);

            print '<a href="index.php" class="btn btn-light" style="margin-bottom:30px;">BACK</a>
            <form method="POST" id="MyForm">
                <div class="form-group">
                    <label for="ime">Ime:*</label>
                    <input type="text" id="ime" class="form-control" value="' . $row['user_firstname'] . '" name="user_firstname" required placeholder="Ime">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:*</label>
                    <input type="text" id="prezime" class="form-control" value="' . $row['user_lastname'] . '" name="user_lastname" required placeholder="Prezime">
                </div>
                <div class="form-group">
                    <label for="drzave">Država:*</label>
                    <select id="drzave" name="country_code" class="form-select form-select-lg">
                        <option>molimo odaberite</option>';
                        $query2  = "SELECT country_code, country_name FROM countries";
                        $result2 = @mysqli_query($MySQL, $query2);
                        while($row2 = @mysqli_fetch_array($result2)) {
                            print '<option '. ($row2['country_code'] == $row['country_code'] ? 'selected' : '') .' value="' . $row2['country_code'] . '">' . $row2['country_name'] . '</option>';
                        }
                    print '
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Pošalji" class="btn btn-primary">
                </div>
            </form>';
        }
        else {
            $query  = "SELECT * FROM users";
            $query .= " LEFT JOIN countries ON countries.country_code = users.country_code";
            $result = @mysqli_query($MySQL, $query);
            while($row = @mysqli_fetch_array($result)) {
                print "<p><a href=index.php?edit=". $row['id'] ."><i class='bi bi-pencil'></i></a> " . $row['user_firstname'] . " <span style='color:green'>" . $row['user_lastname'] . "</span>" . ($row['country_name'] != '' ? " (" . $row['country_name'] . ")" : "" ) . "</p>";
            }
        }
	   
	 ?>
</div>
</body>
</html>
