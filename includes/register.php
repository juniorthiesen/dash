<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/painel/system/system.php';
    AcessPrivate();
 ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Tela Login</title>
    <link rel='stylesheet prefetch' href='http://code.jquery.com/ui/jquery-ui-git.css'>
        <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class="container">
  <div class="linha">
    <div class="coluna-12">
    <form action="" method="post">
    <h2>Registrar Usuário</h2>
    <label><?php 
        

        if( isset( $_POST['send'] ) ){

        $data['name']       = strip_tags( trim( $_POST['name'] ) ) ;
        $data['mail']       = strip_tags( trim( $_POST['mail'] ) ) ;
        $data['username']   = strip_tags( trim( $_POST['username'] ) ) ;
        $data['password']   = strip_tags( trim( $_POST['password'] ) ) ;
        $data['confirma']   = strip_tags( trim( $_POST['confirma'] ) ) ;
        $data['userkey']    = KeyGen();
        $data['register']   = date('Y-m-d H:i:s');
        $data['password']   = CryptPassword($data['password']);
        $data['confirma']   = CryptPassword($data['confirma']);


        if( empty( $data['name'] ) )
          echo 'Preencha o campo nome!';
        else if( empty( $data['mail'] ) )
          echo 'Preencha o campo Email!';
        else if( empty( $data['username'] ) )
          echo 'Preencha o campo Usuário!';
        else if( empty( $data['password'] ) )
          echo 'Preencha o campo Senha!';
        else if( empty( $data['confirma'] ) )
          echo 'Preencha o campo Confirma Senha!';
        else {

          $dbCheck = DBRead( 'users', "WHERE username = '". $data['username'] ."'" );

          if( $dbCheck )
            echo 'Desculpe, mas já existe um usuario com esse Username!';
          else{

            $dbCheck = DBRead( 'users', "WHERE mail = '". $data['mail'] ."'" );

          if( $dbCheck )
            echo 'Desculpe, mas já existe um usuario cadastrado com esse email!';

          else {

            if( DBCreate( 'users', $data ) )
              echo 'Seu Usuário foi criado com sucesso!';
            else
              echo 'Desculpe, ocorreu um erro...';

          }
          
          }
          
        }


        echo '<br><hr><br>';


      }

     ?></label>
     <label>Nome:</label>
      <input type="text" name="name" value="<?php echo GetPost('name'); ?>" />
      <label>Email:</label>
      <input type="text" name="mail" value="<?php echo GetPost('mail'); ?>" />
      <label>Usuário:</label>
      <input type="text" name="username" value="<?php echo GetPost('username'); ?>" />
      <label>Senha:</label>
      <input type="password" name="password" value="<?php echo GetPost('password'); ?>" />
      <label>Confirma Senha:</label>
      <input type="password" name="confirma" value="<?php echo GetPost('confirma'); ?>" />
      <button type="submit" name="send" value="Cadastrar">Registrar</button>
            <a href="<?php echo URL_BASE;  ?>" title="cadastrar-se">Login</a>
    </form>
    </div>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>