<?php
$SERVER = "localhost";
$USER = "root";
$PASS = "";
$DB = "buscaphp";

$conexao = mysqli_connect($SERVER, $USER, $PASS, $DB);
if(mysqli_connect_error()){
    echo "Falha na conexao com sua base de dados";
  }else{
      mysqli_query($conexao, "SET NAMES 'utf8'");
      mysqli_query($conexao, 'SET character_set_connection=utf8');
      mysqli_query($conexao, 'SET character_set_client=utf8');
      mysqli_query($conexao, 'SET character_set_results=utf8');
  }
?>