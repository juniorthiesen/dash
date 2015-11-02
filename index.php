<?php 
  require_once 'system/system.php';
  AcessPublic();
 ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Tela Login</title>
    <link rel='stylesheet prefetch' href='http://code.jquery.com/ui/jquery-ui-git.css'>
        <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container login">
  <div class="linha">
    <div class="coluna-12 clogin">
    <form action="" method="post">
     <h2>Login</h2>
     <?php ValidateLogin(); ?>
      <label>Usuario:</label>
      <input type="text" name="username" value="<?php GetPost('username')?>"/>
       <label>Senha:</label>
      <input type="password" name="password"  value="<?php GetPost('password')?>"/>
      <button type="submit" name="send" value="Cadastrar">Entrar</button>
    </form>
    </div>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>
</html>