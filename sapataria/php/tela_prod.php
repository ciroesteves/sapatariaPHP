<?php
SESSION_START();
include_once 'CRUD/conexao.php';
if($_SESSION["usuario"]){
?>
<html>
    <head>
        <meta charset="UTF=8" />
        <title>Sapataria</title>
        <link rel="stylesheet" href="../Estilos/tela.css" />
        <link rel="icon" href="../Imagens/icon.png" />
    </head>
    <body>    
        <!-- Aqui é onde é feito o cadastro e a inserção de dados para consulta -->
    <?php
    if(isset($_GET['consul_prod']))
    {
        echo '<h1>Consulta de Produtos</h1>
            <form method="GET" action="CRUD/consulta_prod.php">
                <label>Código</label><input type="text" name="pesq_cod_prod" size="25" maxlength="6" /><br/>
                <label>Marca</label><input type="text" name="pesq_marca_prod" size="25" maxlength="8" /><br/>
                <label>Sexo</label><select name="pesq_sexo_prod">
                    <option value="" selected>Escolha...</option>
                    <option value="Unisex">Unisex</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select><br/>
                <label>Tamanho</label><input type="text" name="pesq_tam_prod" size="25" maxlength="2" /><br/>
                <label>Estilo</label><input type="text" name="pesq_estilo_prod" size="25" maxlength="15" /><br/>
                <input class="botao_voltar" type="submit" value="Consultar" />
            </form>
            <a href="menu.php"><button class="botao_voltar">Voltar</button></a>';
    }
    else if(isset($_GET['cadastrar_prod']))
    {
        echo '<h1>Cadastro de Produtos</h1>
        <form id="cadastro_prod" method="POST" action="CRUD/cadastro_prod.php" >
            <label>Código</label><input type="text" name="cod_prod" size="25" maxlength="6" /><br/>
            <label>Marca</label><input type="text" name="marca_prod" size="25" maxlength="8" /><br/>
            <label>Modelo</label><input type="text" name="model_prod" size="25" maxlength="15" /><br/>
            <label>Sexo</label><select name="sexo_prod">
                <option value="" selected>Escolha...</option>
                <option value="Unisex">Unisex</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select><br/>
            <label>Tamanho</label><input type="text" name="tam_prod" size="25" maxlength="2" /><br/>
            <label>Cor</label><input type="text" name="cor_prod" size="25" maxlength="15" /><br/>
            <label>Material</label><input type="text" name="mat_prod" size="25" maxlength="15" /><br/>
            <label>Estilo</label><input type="text" name="estilo_prod" size="25" maxlength="15" /><br/>
            <label>Quantidade</label><input type="text" name="quant_prod" size="25" maxlength="15" /><br/>
            <label>Preço</label><input type="text" name="preco_prod" size="25" maxlength="15" /><br/>
            <input class="botao_voltar" type="submit" value="Enviar"/>
        </form>
        <a href="menu.php"><button class="botao_voltar">Voltar</button></a>';
    }else if(isset($_GET['rank_prod'])){
        $consulta_func = "select *from tbproduto order by vendido DESC";
        $executar = mysqli_query($conn, $consulta_func);
        while ($linha = mysqli_fetch_array($executar)){
        ?>
        <fieldset>
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
            <span><label>Vendido</label><input type="text"value="<?php echo $linha['vendido'];?>" readonly/></span><br/><br/><br/>  
        </fieldset>
        <?php
        }   
        echo '<a href="menu.php"><button class="botao_voltar">Voltar</button></a>';   
    }
    ?>
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
