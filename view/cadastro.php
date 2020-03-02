<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    
<div class="container">

    <form class="form-signin" method="post" action="../controller/ControllerCadastro.php" id="form" name="form" onsubmit="validar(document.form); return false;">
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required autofocus>
            </div>

            <div class="form-group col-md-6">
                <label for="inputCpf">Cpf</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Cpf" required>
            </div>
        </div>

        <div class="form-row col-2" >
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group col-md-6">
                <label for="inputTel">Telefone</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telefone">
            </div>
        </div>


        <div class="form-row col-2" >
            <div class="form-group col-md-6">
                <label for="inputEmpresa">Empresa</label>
                <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="Empresa">
            </div>

            <div class="form-group col-md-6">
                <label for="inputCnpj">Cnpj</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
            </div>
            
            <div align="center" class="form-group col-md-4" style="width: 100%;">
                <label for="inputGanhos">Ganhos</label>
                <input type="text" class="form-control" id="ganhos" name="ganhos" placeholder="Ganhos" onkeypress="formatarMoeda();" required>
            </div>
        </div>  

        
        <div align="center" class="form-group col-md-4 cadastrar">  
            <button type="submit" class="btn btn-primary" id="cadastrar">Gravar</button>
        </div>

    </form>

</div>
    
    
    <script language="javascript" type="text/javascript">
        function formatarMoeda() {
            var elemento = document.getElementById('ganhos');
            var valor = ganhos.value;

            valor = valor + '';
            valor = parseInt(valor.replace(/[\D]+/g, ''));
            valor = valor + '';
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
        }

    </script>
</body>

</html>
