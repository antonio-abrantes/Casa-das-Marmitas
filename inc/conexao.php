<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conexao = "ec2-54-197-253-210.compute-1.amazonaws.com";
$database_conexao = "d1eunm11v5sl4q";
$username_conexao = "txoyhygxyzenuj";
$password_conexao = "90fb0d5420ab5351bb1a49418a0812d878b120ad0b0dc4eea347a4ead58dee3d";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>


