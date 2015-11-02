<?php 
  require_once 'system/system.php';
  AcessPublic();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Degub</title>
</head>
<body>
	
	<?php 

	$username = 'admin';
	$password = '123';
	$password = CryptPassword($password);

	var_dump(CreateSession($username, $password));


	 ?>


</body>
</html>