<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setCadastrar($nome,$cpf,$cnpj,$nome_empresa,$ganhos,$tel,$email,$id){
        $stmt   = $this->mysqli->prepare("INSERT INTO EMPRESA (EMPR_NOME, EMPR_CPF, EMPR_CNPJ, EMPR_EMPRESA, EMPR_GANHOS) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss',$nome,$cpf,$cnpj,$nome_empresa,$ganhos);
        
        $rs = $stmt->execute();
        
        //Contato
        $query  = $this->mysqli->query("SELECT LAST_INSERT_ID() INTO @ID");
        $stmt2  = $this->mysqli->prepare("INSERT INTO CONTATO (CONT_EMPR_ID, CONT_TELEFONE, CONT_EMAIL) VALUES (@ID,?,?)");
        $stmt2->bind_param('ss',$tel,$email);
        
        $rs2 = $stmt2->execute();
        
        
        if($rs && $rs2 == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function getConsultar(){
        $result = $this->mysqli->query("SELECT * FROM EMPRESA, CONTATO WHERE EMPR_ID = CONT_EMPR_ID");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        
        return $array;

    }

    public function deleteEmpresa($id){
        
        $this->mysqli->query("DELETE FROM CONTATO WHERE CONT_EMPR_ID = '".$id."';");
        
        if($this->mysqli->query("DELETE FROM EMPRESA WHERE EMPR_ID = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    
    public function pesquisaEmpresa($id){
        $result = $this->mysqli->query("SELECT * FROM EMPRESA, CONTATO WHERE EMPR_ID = CONT_EMPR_ID AND EMPR_ID ='".$id."';");
        
        return $result->fetch_array(MYSQLI_ASSOC);
               
    }
   
    
    public function updateEmpresa($nome,$cpf,$cnpj,$empresa_nome,$ganhos,$id, $email, $tel){
        $stmt = $this->mysqli->prepare("UPDATE EMPRESA SET EMPR_NOME = ?, EMPR_CPF = ?, EMPR_CNPJ = ?, EMPR_EMPRESA = ?, EMPR_GANHOS = ? WHERE EMPR_ID = '".$id."';");
        $stmt->bind_param('sssss',$nome,$cpf,$cnpj,$empresa_nome,$ganhos);
        
        $stmt2 = $this->mysqli->prepare("UPDATE CONTATO SET CONT_EMAIL = ?, CONT_TELEFONE = ? WHERE CONT_EMPR_ID = '".$id."';");
        $stmt2->bind_param('ss',$email,$tel);
        
        if($stmt->execute() && $stmt2->execute()== true){
            return true;
        }else{
            return false;
        }
    }
}
?>
