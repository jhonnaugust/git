<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $nome;
    private $cpf;
    private $cnpj;
    private $nome_empresa;
    private $ganhos;
    private $email;
    private $id;
  

    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setCpf($string){
        $this->cpf = $string;
    }
    public function setCnpj($string){
        $this->cnpj = $string;
    }
    public function setEmpresa($string){
        $this->nome_empresa = $string;
    }
    public function setGanhos($string){
        $this->ganhos = $string;
    }
    
    public function setTel($string){
        $this->tel = $string;
    }
    
    public function setEmail($string){
        $this->email = $string;
    }
    
    public function setId($string){
        $this->id = $string;
    }


    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getEmpresa(){
        return $this->nome_empresa;
    }
    public function getGanhos(){
        return $this->ganhos;
    }
    
    public function getTel(){
        return $this->tel;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getId(){
        return $this->id;
    }
  


    public function incluir(){
        return $this->setCadastrar($this->getNome(),$this->getCpf(),$this->getCnpj(),$this->getEmpresa(),$this->getGanhos(),$this->getTel(),$this->getEmail(), $this->getId());
    }
    
}
?>
