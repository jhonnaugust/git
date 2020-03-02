<?php
require_once("../model/banco.php");

class editarController {

    private $editar;
    private $nome;
    private $cpf;
    private $cnpj;
    private $nome_empresa;
    private $ganhos;
    private $id;
    private $email;
    private $tel;
    

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
   
    private function criarFormulario($id){
        if(isset($id)){
        
        $row = $this->editar->pesquisaEmpresa($id);
        $this->nome             =$row['EMPR_NOME'];
        $this->cpf              =$row['EMPR_CPF'];
        $this->cnpj             =$row['EMPR_CNPJ'];
        $this->nome_empresa     =$row['EMPR_EMPRESA'];
        $this->ganhos           =$row['EMPR_GANHOS'];
        $this->email            =$row['CONT_EMAIL'];
        $this->tel              =$row['CONT_TELEFONE'];      
           
        }
    }
    
    public function editarFormulario($nome,$cpf,$cnpj,$nome_empresa,$ganhos,$id,$email,$tel){
        if($this->editar->updateEmpresa($nome,$cpf,$cnpj,$nome_empresa,$ganhos,$id,$email,$tel) == TRUE){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../view/index.php'</script>";
            
        }else{
            echo "<script>alert('Erro ao atualizar registro!');history.back()</script>";
        }
    }
    
    //Metodos Get
    public function getId(){
        return $this->id;
    }
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
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getTel(){
        return $this->tel;
    }
    
}

$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);

    

if($_POST){
    $editar->editarFormulario($_POST['nome'],$_POST['cpf'],$_POST['cnpj'],$_POST['nome_empresa'],$_POST['ganhos'],$_POST['id'],$_POST['email'], $_POST['tel']);   
}
?>
