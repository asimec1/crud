
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
	h1 { font-size:24px; }
    h2 { margin-top:30px; font-size:18px; }
  </style>
<body>
<div class="container">
	<h1>SELECT korisnika &rsaquo; DML &rsaquo; <strong>OOP</strong></h1>
	<?php 
    include("config.php");

    include("../menu.php");

    print '<h2>Users</h2>
        <ul>
            <li><a href="index.php?menu=1">SELECT ALL</a></li>
            <li><a href="index.php?menu=2">SELECT ALL &rsaquo; ORDER DESC firstname</a></li>
            <li><a href="index.php?menu=3">SELECT ALL &rsaquo; ORDER ASC lastname</a></li>
            <li><a href="index.php?menu=4">SELECT &rsaquo; WHERE lastname Doe</a></li>
            <li><a href="index.php?menu=5">SELECT &rsaquo; LIMIT 10</a></li>
            <li><a href="index.php?menu=6">SELECT &rsaquo; ORDER ASC lastname AND LIMIT 15</a></li>
        </ul>
        <hr style="border-bottom:1px solid grey">';
    
        
        class Database {
            private $host = "localhost";
            private $username = "eburza_pwa";
            private $password = "eburza_pwa";
            private $database = "eburza_pwa";
            private $conn;

            public function __construct() {
                // Povezivanje na bazu podataka
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                if ($this->conn->connect_error) {
                    die("Povezivanje nije uspjelo: " . $this->conn->connect_error);
                }
            }

            public function fetchUsers() {
                
                
                if (!isset($_GET['menu']) || $_GET['menu'] == 1) {
                    $query  = "SELECT * FROM crud_users";
                }
                else if ($_GET['menu'] == 2) {
                    $query  = "SELECT * FROM crud_users ORDER BY user_firstname DESC";
                }
                else if ($_GET['menu'] == 3) {
                    $query  = "SELECT * FROM crud_users ORDER BY user_lastname ASC";
                }
                else if ($_GET['menu'] == 4) {
                    $query  = "SELECT * FROM crud_users WHERE user_lastname='Doe'";
                }
                else if ($_GET['menu'] == 5) {
                    $query  = "SELECT * FROM crud_users LIMIT 10";
                }
                else if ($_GET['menu'] == 6) {
                    $query  = "SELECT * FROM crud_users ORDER BY user_lastname ASC LIMIT 15";
                }

                $result = $this->conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p><i class='bi bi-person'></i> ". $row['user_firstname'] . " <span style='color:green'>" . $row['user_lastname'] . "</span></p>";
                    }
                } else {
                    echo "0 rezultata";
                }
            }

            public function __destruct() {
                // Zatvaranje povezivanja
                $this->conn->close();
            }
        }

        // Kreiranje instance klase i dohvaćanje korisnika
        $db = new Database();
        $db->fetchUsers();
    ?>

</div>
</body>
</html>
