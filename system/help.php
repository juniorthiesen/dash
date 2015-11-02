<?php 



//========================================//
//Proteção//

//controla acesso publico
function AcessPublic(){
	if(IsLogged())
		Redirect(URL_PAINEL);
}

//controla acesso privado
function AcessPrivate(){
	if(!IsLogged())
		Redirect(URL_BASE);
}

//========================================//

//========================================//
//SESSÃO//

//efetua logout
function DoLogout(){
	if(isset($_GET['logout']))
		DeleteSession();
}



//destroi sessão
function DeleteSession(){
	unset($_SESSION['userLog']);
	AcessPrivate();
}



//cria a sessão 
function CreateSession($username, $password){
	$key = GetKey($username, $password);
	userLog($key);
	AcessPublic();
}



//recupera o User Log
function userLog($value = null){
	if($value === null)
		return $_SESSION['userLog'];
	else
		$_SESSION['userLog'] = $value;
}

//verifica login
function IsLogged(){
	if(!isset($_SESSION['userLog']) || empty($_SESSION['userLog']))
		return false;
	else
		return true;
}

//========================================//


// Gera key usuario
function KeyGen(){
	return sha1(rand().time());
}



//recupera post
function GetPost($key = null){
	if($key === null)
		return $_POST;
	else
		return (isset($_POST[$key])) ? DBEscape($_POST[$key]) : false;
	
}

//redireciona
function Redirect($url){
	header("Location:".$url);
	die();
}

//criptografar senhas
function CryptPassword($password){
	return sha1($password);
}


 ?>