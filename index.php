
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Prijava korisnika</title>
  </head>
  <style>
	body { margin: 10px;}
	
  </style>
<body>
<div class="container">
	<h1>Prijava korisnika</h1>
	<?php 
    $MySQL = mysqli_connect("localhost","root","","test5") or die('Error connecting to MySQL server.');
    session_start();  

    if (isset($_GET['id'])) {
        $query  = "SELECT user_firstname, user_lastname FROM users WHERE id=" . $_GET['id'];
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result);
        print '<form>
            <input type="text" name="firstname" value="'.$row['user_firstname'].'" placeholder="Ime"><br>
            <input type="submit" value="Pošalji">
        </form>';
    }
        
    if (isset($_POST["user"]) && isset($_POST["pass"]))   {
       if ($_POST["user"] == "admin" && $_POST["pass"] == "123")     {  
		   $_SESSION["username"] = $_POST["user"]; 
			   echo "<p style='color: green;font-weight:bold;font-size:16px;'>Uspješna prijava!</p>";
	    }     
	    else {  echo "<p>Neuspješna prijava!</p>";     }   
		

	   }
	   if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
        if (!isset($_GET['menu'])) { $_GET['menu'] = 1; }
		echo "<p><b>Dobrodošao:</b> " . $_SESSION["username"] ."</p>";
		echo '<p><a href="signout.php">Odjavi se</a></p>
                <ul>
                    <li><a href="index.php?menu=1">News</a></li>
                    <li><a href="index.php?menu=2">Users</a></li>
                </ul>';
                if ($_GET['menu'] == 1) {
                    print '<h1>News</h1>';
                }
                if ($_GET['menu'] == 2) {
                    print '<h1>Users</h1>';
                    
                    
                    
                    $query  = "SELECT * FROM users ORDER BY id DESC";
                    $result = @mysqli_query($MySQL, $query);
                    while($row = @mysqli_fetch_array($result)) {
                        print "<p><a href='index.php?id=" . $row['id'] . "'>edit</a> ". $row['user_firstname'] . " <span style='text-decoration:underline'>" . $row['user_lastname'] . "</span></p>";
                    }
                }
	   }
       else {
        
            print '
            <form action="index.php" method="POST" name="signin">
                
                <div class="form-check">
                    <label for="user">Korisnik:*</label>
                    <input type="text" id="user" name="user" class="form-control" required>
                </div>
                <div class="form-check">
                    <label for="pass">Lozinka:*</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <input type="submit" value="Pošalji" class="btn btn-primary">
            </form>';
       
       }
	   
	 ?>
</div>
</body>
</html>