<?php
require_once("../model/banco.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getConsultar();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['EMPR_NOME'] ."</th>";
            echo "<td>".$value['EMPR_CPF'] ."</td>";
            echo "<td>".$value['EMPR_CNPJ'] ."</td>";
            echo "<td>".$value['EMPR_EMPRESA'] ."</td>";
            echo "<td>".$value['CONT_EMAIL']."</td>";
            echo "<td> R$".$value['EMPR_GANHOS'] ."</td>";
            echo "<td><a class='btn btn-warning' href='editar.php?id=".$value['EMPR_ID']."'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['EMPR_ID']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}

