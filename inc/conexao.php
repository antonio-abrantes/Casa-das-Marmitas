<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conexao = "127.0.0.1";
$database_conexao = "bd_marmitas";
$username_conexao = "root";
$password_conexao = "";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>


