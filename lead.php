<?php

$link = mysqli_connect("us-cdbr-iron-east-05.cleardb.net:3306", "bf8080429f0084", "d7335d7d", "heroku_129f25c18edf245") or die(mysqli_error());

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_set_charset($link,"utf8");

$nome = $_POST["nome"];
$email = $_POST["email"];
$ip=$_SERVER['REMOTE_ADDR'];
if (strstr($ip, ":")) {
echo "O seu endereço IPv6 é o: $ip";
} else {
echo "O seu endereço IPv4 é o: $ip";
}
 

$insere = mysqli_query($link,"INSERT INTO usuarios( `nome` , `email` , `ip` , `tipo` )VALUES('$nome','$email','$ip', 'B2C')") or die(mysql_error());

if($insere)
{
       echo "Dados Inseridos Com Sucesso.";
	   echo '<script>alert("Cadastrado com Sucesso!!");</script>';
}
else{
       echo 'Não Foi Possivel Inserir seus dados.';
	   echo '<script>alert("Não Foi Possivel Cadastra-lo. Por Favor, contate o Administrador");</script>';
}

mysqli_close($link);

echo '<script>alert("Cadastro efetuado com SUCESSO!!");</script>';

header( 'Location: /index.html' ) ;
?>