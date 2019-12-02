<!doctype html>
<html lang="pt-br">
  <head>
  	<meta charset="utf-8">
  	<title>Meu site</title>
  </head>
  <body>
  	<h2>Acesso</h2>
  	<br><br>
  	<form method="post">
  		Login: <input type="text" name="login"><br>
  		Senha: <input type="password" name="senha"><br>
      <div style="color: red">
        <?php
        include_once "classes/Consulta.php";
        if(isset($_POST['verificar'])){
            $consulta = new Consulta();

            $ver = $consulta->consultaUser($_POST['login'],$_POST['senha']);
            if(isset($ver[0]['login'])){
              session_start();
              $_SESSION['adm'] = $ver[0]['login'];
              print_r($_SESSION['adm']);
              header("Location:index.php");
            }
        }
        ?>
      </div>
  		<input type="submit" name="verificar" value="Entrar">
  	</form>
  </body>
</html>
