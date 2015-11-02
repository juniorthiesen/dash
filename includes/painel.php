<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/painel/system/system.php';
    AcessPrivate();
 ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<title>Painel</title>
</head>
<body>

<h2>Dashboard</h2>

<a href="?logout" title="Sair">Sair</a>
<a href="<?php echo URL_REGISTER ?>" title="Sair">Cadastrar Novo Usuario</a>
	
</body>
</html>