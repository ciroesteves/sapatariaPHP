<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"]){
?>  
<html>
    <head>
        <meta charset="UTF=8" />
        <title>Sapataria</title>
        <link rel="stylesheet" href="../../Estilos/simples.css" />
        <link rel="icon" href="../Imagens/icon.png" />
    </head>
    <body>
    <h2>Consulta de Produtos </h2>
    <?php
        if(isset($_GET['bot_vender'])){
            $cod_vender = $_GET['consultados_prod'];
    ?>
            <form method="POST" action="vender_prod.php">
            <span><label>Código</label><input type="text" name="cod_vend_prod" value="<?php echo $cod_vender;?>" readonly/></span><br/>
            <span><label>Quantidade</label><input type="number" name="quant_vend_prod"/></span><br/>
            <span><label>Vendedor</label><input type="text" name="vendedor_prod" value="<?php echo $_SESSION["usuario"];?>" readonly/></span><br/>
            <span><label>CPF Cliente</label><input type="text" name="cliente_prod" maxlength="11" /></span><br/>
            <input type="submit" value="Concluir Venda" />      
    <?php        
        }
        else if(isset($_GET['bot_apagar']))
        {
            $cod_apagar = $_GET['consultados_prod'];
            $apagar = "delete  from tbproduto where codigo = '$cod_apagar'";
            $executar_apagar = mysqli_query($conn, $apagar);
            if($executar_apagar){
                echo "Os Dados Selecionados Foram Apagados do Banco de Dados.";
            }else{
                echo "Erro ao Apagar os Dados.";
            }
        }
        else if(isset($_GET['bot_alterar']))
        {  
            $cod_alterar = $_GET['consultados_prod'];
            $buscar = "select *from tbproduto where codigo = '$cod_alterar'";
            $buscado = mysqli_query($conn, $buscar);
            $row = mysqli_fetch_array($buscado);
        ?>
        
            <div>
            <form method="POST" action="alterar_prod.php">
            <span><label>Código</label><input type="text" name="cod_prod" value="<?php echo $row['codigo'];?>" readonly/></span><br/>
            <span><label>Marca</label><input type="text" name="marca_prod" value="<?php echo $row['marca'];?>"/></span><br/>
            <span><label>Modelo</label><input type="text" name="model_prod" value="<?php echo $row['modelo'];?>"/></span><br/>
            <span><label>Cor</label><input type="text" name="cor_prod" value="<?php echo $row['cor'];?>"/></span><br/>
            <span><label>Tamanho</label><input type="text" name="tam_prod" value="<?php echo $row['tamanho'];?>"/></span><br/>
            <span><label>Material</label><input type="text" name="mat_prod" value="<?php echo $row['material'];?>"/></span><br/>
            <span><label>Estilo</label><input type="text" name="estilo_prod" value="<?php echo $row['estilo'];?>"/></span><br/>
            <span><label>Gênero</label><input type="text" name="sexo_prod" value="<?php echo $row['sexo'];?>"/></span><br/>
            <span><label>Quantidade</label><input type="text" name="quant_prod" value="<?php echo $row['quantidade'];?>"/></span><br/>
            <span><label>Preço</label><input type="text" name="preco_prod" value="<?php echo $row['preco'];?>"/></span><br/>
            <span><label>Vendido</label><input type="text" name="vend_prod" value="<?php echo $row['vendido'];?>"/></span><br/>
            <input type="submit" value="Enviar" />
            </form>
        </div>
        <?php
        }else{
    ?>
    <form method="GET">
    <?php
            $cod = $_GET['pesq_cod_prod'];
            $marca = $_GET['pesq_marca_prod'];
            $sexo = $_GET['pesq_sexo_prod'];
            $tam = $_GET['pesq_tam_prod'];
            $estilo = $_GET['pesq_estilo_prod'];
    
            $consulta_prod = "select *from tbproduto where (codigo = '$cod') or (marca LIKE '$marca%' and sexo = '$sexo' and estilo = '$estilo' and tamanho = '$tam'); ";
            $executar = mysqli_query($conn, $consulta_prod);
            while ($linha = mysqli_fetch_array($executar)){
    ?>
        <div id="cxconsulta">
            <input name="consultados_prod" type="radio" value="<?php echo $linha['codigo'] ?>" />
            <span><label>Código</label><input type="text" value="<?php echo $linha['codigo'];?>" readonly/></span><br/>
            <span><label>Marca</label><input type="text" value="<?php echo $linha['marca'];?>" readonly/></span><br/>
            <span><label>Modelo</label><input type="text" value="<?php echo $linha['modelo'];?>" readonly/></span><br/>
            <span><label>Gênero</label><input type="text" value="<?php echo $linha['sexo'];?>" readonly/></span><br/>
            <span><label>Cor</label><input type="text" value="<?php echo $linha['cor'];?>" readonly/></span><br/>
            <span><label>Tamanho</label><input type="text" value="<?php echo $linha['tamanho'];?>" readonly/></span><br/>
            <span><label>Material</label><input type="text" value="<?php echo $linha['material'];?>" readonly/></span><br/>
            <span><label>Estilo</label><input type="text" value="<?php echo $linha['estilo'];?>" readonly/></span><br/>
            <span><label>Preço</label><input type="text" value="<?php echo $linha['preco'];?>"/></span><br/>
            <span><label>Quantidade</label><input type="text" value="<?php echo $linha['quantidade'];?>" readonly/></span><br/>
            <span><label>Vendido</label><input type="text"value="<?php echo $linha['vendido'];?>" readonly/></span><br/><br/>
        </div>   
    <?php
        }
    }
    if($_SESSION["funcao"] == 'Gerente'){
    ?>
        <input type="submit" name="bot_alterar" value="Alterar">
        <input type="submit" name="bot_apagar" value="Apagar">
    <?php
    }
    ?>
        <input type="submit" name="bot_vender" value="Vender">
    </form>
    <a href="../menu.php"><button>Voltar</button></a>
    </body>
</html>
<?php
}else{
    echo
    "<script>
    window.location.href='index.php'
    </script>";
}
?>