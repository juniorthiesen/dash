<?php 
	// recupera key
	function GetKey($username, $password){
		$datauser = UserVerify($username, $password);
		return $datauser;
	}


	//verifica se existe usuario
	function UserVerify($username, $password){
		$password = CryptPassword($password);
		$query    = "SELECT * FROM gs_users WHERE username = '$username' AND password = '$password'";
		$result   = DBExecute($query);

		if(mysqli_num_rows($result) <= 0)
			return false;
		else{
			$data = mysqli_fetch_assoc($result);
			return $data['userkey'];
		}
}

	// Grava Registros
	function DBCreate($table, array $data){
		$table 	= DB_PREFIX.'_'.$table;
		$data 	= DBEscape($data);
		
		$fields	= implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";
		
		$query 	= "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} )";
		
		return DBExe($query);
	}

		// Protege contra SQL Injection
		function DBEscape($data){
		$link = DBConnect();
		
		if(!is_array($data))
			$data = mysqli_real_escape_string($link, $data);
		else {
			$arr = $data;
			
			foreach ($arr as $key => $value){
				$key 	= DBEscape( $key );
				$value	= DBEscape( $value );
				
				$data[$key] = $value;
			}
		}
		
		DBClose($link);
		return $data;
	}


	// Executa Querys post
	function DBExecute($query){
		$link 	= DBConnect();
		$result = @mysqli_query($link, $query) or die(mysqli_error($link));
		
		
		DBClose($link);
		return $result;
	}


	// Ler Registros
	function DBRead($table, $params = null, $fields = '*'){
		$table 	= DB_PREFIX.'_'.$table;
		$params = ($params) ? " {$params}" : null;
		
		$query 	= "SELECT {$fields} FROM {$table}{$params}";
		$result	= DBExecute($query);
		
		if(!mysqli_num_rows($result))
			return false;
		else {
			while ($res = mysqli_fetch_assoc($result)){
				$data[] = $res;
			}
			
			return $data;
		}
	}


	// Fecha Conexão com MySQL
	function DBClose($link){
		@mysqli_close($link) or die(mysqli_error($link));
	}

	// Abre com Conexão com MySQL
	function DBConnect(){
		$link = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
		mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
		
		return $link;
	}




 ?>