<?php

	session_start();
	include("dados_conexao.php");
	
	if ($_POST) {

		try	{   // tenta fazer a conexão e executar o INSERT

			$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario); //istancia a classe PDO
			$comandoSQL = "INSERT INTO tb_usuarios (nick) VALUES ('$_POST[nick]');";
			$grava = $conecta->prepare($comandoSQL); //testa o comando SQL
			$grava->execute(array()); 
			$_SESSION['nick_sala'] = $_POST['nick'];
			$_SESSION['cor_nick'] = $_POST['cor'];
			header("Location: sala_bate_papo.php"); //redirecionamento

		}
        catch(PDOException $e) { // casso retorne erro

			echo('Deu erro: ' . $e->getMessage()); 

		}

	} 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Chat Brabo</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>

    <div class="container">

        <br>
        <div class="well"><h1><strong>Super Chat <strong>Brabo</strong></h1></div>
        
        <form method="post">

            <div class="panel">
            <div class="panel-heading">Digite seu nick</div>
            <div class="panel-body">

                <div class="col-md-4">

                    <div class="center">

                        <input type="text" name="nick" class="form-control" size="10" required>	<br/>

                        <div class="pad">

                            Escolha um cor:
                            <input type="color" name="cor">

                        </div>

                    </div>
                    
                    <br><br>
                    
                    <div class="center">

                        <button type="submit" class="btn"> Entrar </button>

                    </div>

                </div>
                
            </div>

        </form>

	</div>

</body>
</html>