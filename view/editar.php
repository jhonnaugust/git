<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <?php require_once("../controller/ControllerEditar.php");?>
    
    <div class="container">

        <form class="form-signin" method="post" action="../controller/ControllerEditar.php" id="form" name="form" onsubmit="validar(document.form); return false;">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $editar->getNome(); ?>" placeholder="Nome" required autofocus>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCpf">Cpf</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $editar->getCpf(); ?>" placeholder="Cpf" required>
                </div>
            </div>

            <div class="form-row col-2" >
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $editar->getEmail(); ?>" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputTel">Telefone</label>
                    <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $editar->getTel(); ?>" placeholder="Telefone">
                </div>
            </div>


            <div class="form-row col-2" >
                <div class="form-group col-md-6">
                    <label for="inputEmpresa">Empresa</label>
                    <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="<?php echo $editar->getEmpresa(); ?>" placeholder="Empresa">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCnpj">Cnpj</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $editar->getCnpj(); ?>" placeholder="CNPJ">
                </div>

                <div align="center" class="form-group col-md-4" style="width: 100%;">
                    <label for="inputGanhos">Ganhos</label>
                    <input type="text" class="form-control" id="ganhos" name="ganhos" value="<?php echo $editar->getGanhos(); ?>" placeholder="Ganhos" onkeypress="formatarMoeda();" required>
                </div>
            </div>  


            <div align="center" class="form-group col-md-4 cadastrar">  
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary" id="cadastrar" name="submit">Atualizar</button>
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
