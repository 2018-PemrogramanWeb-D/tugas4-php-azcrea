<?php

session_start();

?>

<html>

<head>



	<title>Welcome!</title>



</head>

<body>

<h1>WELCOME! </h1>
Anda login sebagai: <?php echo $_SESSION["name"]; ?>
<br><br>


</body>	

</html>