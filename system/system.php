<?php 

	Init();

	function ValidateLogin(){
		 if( isset( $_POST['send'] ) ){

        $data['username']  = strip_tags( trim( $_POST['username'] ) ) ;
        $data['password']  = strip_tags( trim( $_POST['password'] ) ) ;
        $username 		   = $data['username'];
        $password		   = $data['password'];


        if( empty( $data['username'] ) )
          echo 'Preencha o campo Usuário!';
        else if( empty( $data['password'] ) )
          echo 'Preencha o campo Senha!';
      else{

      	if(!UserVerify($username, $password))
      		echo 'Nome de Usuario ou Senha Incorretors!';
		else{

      		CreateSession($username, $password);
      	}

      }

	}
}




	//inicia o sistema
	function Init(){
		session_start();
		// chama config
		$configFile = $_SERVER['DOCUMENT_ROOT'].'/painel/system/config.php';
		if(!file_exists($configFile))
			die('Erro arquivo config.php não existe!');
		else
			require_once $configFile;

		//chama helpers
		if(!file_exists(FILE_HELP))
			die('Erro arquivo helpers.php não existe!');
		else
			require_once FILE_HELP;

				//chama database
		if(!file_exists(FILE_DATABASE))
			die('Erro arquivo database.php não existe!');
		else
			require_once FILE_DATABASE;


		DBConnect();
		DoLogout();




	}
 ?>