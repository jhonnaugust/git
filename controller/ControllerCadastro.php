<?php
require_once("../model/cadastroEmpresa.php");

class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setCnpj($_POST['cnpj']);
        $this->cadastro->setEmpresa($_POST['nome_empresa']);
        $this->cadastro->setGanhos($_POST['ganhos']);
        $this->cadastro->setTel($_POST['tel']);
        $this->cadastro->setEmail($_POST['email']);

        
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!);history.back()</script>";
      
        }
    }
}
new cadastroController();
