<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$strindConection = "us-cdbr-iron-east-05.cleardb.net";
$hostname_conexao = "ec2-54-197-253-210.compute-1.amazonaws.com";
$database_conexao = "heroku_b3a6eeed51132eb";
$username_conexao = "bc4f6c49b48f09";
$password_conexao = "8c812a4a";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>


