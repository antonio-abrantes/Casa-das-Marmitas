<?php

class Sql {

    public $conn;

    public function __construct(){

        return $this->conn = mysqli_connect("ec2-54-197-253-210.compute-1.amazonaws.com", "txoyhygxyzenuj", "90fb0d5420ab5351bb1a49418a0812d878b120ad0b0dc4eea347a4ead58dee3d", "d1eunm11v5sl4q");

    }

    public function gravar($query){
        mysqli_query($this->conn, $query);
    }

    public function query($string_query){

        return mysqli_query($this->conn, $string_query);

    }

    public function __destruct(){

        mysqli_close($this->conn);

    }

    public function select($query){

        $result = $this->query($query);
        $data = array();

        while ($row = mysqli_fetch_array($result)) {

            //Formatar os dados em UTF-8 no caso de conterem carteres especiais
//            foreach ($row as $key => $value) {
//                $row[$key] = utf8_encode($value);
//            }
            array_push($data, $row);
        }

        unset($result);
        return $data;
    }

    public function selectPorId($query){

        $result = $this->query($query);

        $tamanho = "";

        while ($row = mysqli_fetch_array($result)) {

            $tamanho = $row["tamanho"];

        }
        return $tamanho;
    }

}

?>