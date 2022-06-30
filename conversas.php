<?php 

	session_start();

?>
	
<!DOCTYPE html>
<html>
<head>
    <title>SuperChat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php

        include("dados_conexao.php");	// carrega os dados da conexão.
        try
        {
            $conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario);
            $consultaSQL = "SELECT * FROM tb_mensagens ORDER BY id_mensagem DESC";
            $exComando = $conecta->prepare($consultaSQL); //testar o comando
            $exComando->execute(array());
            
            echo("<div class='main' id='chat'>");
            foreach($exComando as $resultado) {

                echo("<h4>".$resultado["de"].": ".$resultado["mensagem"]."</h4>"); //Observe que o seu nome aparece na cor escolhida.
            
            }
            
            echo("</div>");

        }
        catch(PDOException $erro) {

            echo("Errrooooo! foi esse: " . $erro->getMessage());

        }

    ?>

</body>
</html>