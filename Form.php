<!DOCTYPE html>
<html>
<head>
	<title> Registration and Login Section </title>
</head>
<style>
.error {color : #FF0000;}
</style>
<body>
<?php
$nameErr = $emailErr = $unameErr = $genderErr = "";
$name = $email =$uname = $gender = $tujuan = "";

if($_SERVER["REQUEST_METHOD"]) == "POST"){
	if (empty($_POST["name"])) {
	$nameErr = "Nama tidak boleh kosong";
	}
	else {
	$name = test_input($_POST["name"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$name))
		{
		$nameErr = "Hanya boleh Huruf dan Spasi";
		}
	}
	
	if (empty($_POST["uname"])) {$unameErr = "Username tidak boleh dikosongkan";}
	else {
	$uname = test_input($_POST["uname"]);
	if (!preg_match("/^[a-z_0-9]*$/".$uname)){
		$unameErr = "Hanya boleh huruf kecil, angka dan Underscore" ;
		}
	}
	
	if (empty($_POST["email"])) {$emailErr = "Email tidak boleh dikosongkan";}
	else {
	$email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-z_0-9]*$/".$email))  {
		$emailErr = "Format E-mail tidak valid"	
		}
	}
	
	if (empty($_POST["gender"])) { $genderErr = "Jenis Kelamin tidak boleh dikosongkan";}
	else { $gender = test_input($_POST["gender"]);}
	
	if (empty($_POST["tujuan"])){
		$tujuan = ""; }
	else{ $tujuan = test_input($_POST["tujuan"]);}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<h2> Registration Form Here </h2>
<p> <span class = "error">* Required Field</span> </p>
<form method ="post" action = "Success.php" >
	Nama : <input type="text"  name="name" placeholder="">
	<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	Username : <input type= "text" name="username" placeholder="">
	<span class = "error">* <?php echo $unameErr;?></span>
	<br><br>
	E-mail : <input type="text" name="email" placeholder="">
	<span class = "error">* <?php echo $emailErr;?></span>
	<br><br>
	Gender : 
	<input type = "radio" name = "gender" <? php if (isset($gender) && $gender == "male"
	echo "checked";?>Male			
	<input type = "radio" name = "gender" <? php if (isset($gender) && $gender == "female"
	echo "checked";?>Female
	<span class = "error">* <?php echo $genderErr;?></span>
	<br><br>
	Tujuan Daftar :
	<input type = "text" name = "tujuan" placeholder="">
	<br>
	<input type = "submit" name = "submit" value = "Submit">
</form>
<br> <br> <br>

</body>
</html>