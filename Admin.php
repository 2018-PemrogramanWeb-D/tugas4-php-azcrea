<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin Login </title>
</head>
<body>

<?php

$nameErr = $passErr = "";

$name = $password = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if(empty($_POST["name"])) {



    $nameErr = "Nama Wajib diisi!";

  }


  if(empty($_POST["password"])) {



    $passErr = "Password Wajib diisi!";

  }

  else{

    if($_POST['password'] != "admin"){

      $passErr = "Password yang anda input salah!";

      header("Location: http://localhost/tugas4-php-azcrea/Admin.php");

    }else{

      $_SESSION['password'] = test_input($_POST["password"]);

      $_SESSION['name'] = test_input($_POST["name"]);

      header("Location: http://localhost/tugas4-php-azcrea/Welcome.php");

    }
	
    

  }

}



function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

?>
	
<h2> TEST </h2>
<form method ="post" action = "Welcome.php">
	Username : <input type="text" name = "name" value ="" >
	<br>
	Password(admin) : <input type = "text" name = "password" value ="" > <br>
	<br>
	<input type = "submit" name = "login" value = "Login">
</form>
</body>
</html>