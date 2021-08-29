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
        <?php
        include_once 'CRUD/conexao.php';
        ?>
    </head>
    <body>
        <!-- Aqui é onde é feito o cadastro e a inserção de dados para consulta -->
    <?php
    if(isset($_GET['consul_func']))
    {
        echo '<h1>Consulta de Funcionários</h1>
                <div class="formulario"><form method="GET" action="CRUD/consulta_func.php">
                <label>Usuário/ID</label><input type="text" name="pesq_id_func" size="25" maxlength="6" /><br/>
                <label>Nome</label><input type="text" name="pesq_nome_func" size="25" maxlength="15" /><br/>
                <input class="botao_voltar" type="submit" value="Consultar" /></div>
            </form>
            <a href="menu.php"><button class="botao_voltar">Voltar</button></a>';
    }
    else if(isset($_GET['cadastrar_func']))
    {
        echo '<h1>Cadastro de Funcionários</h1>
        <form id="cadastro_func" method="POST" action="CRUD/cadastro_func.php" >
            <label>Usuário/ID</label><input type="text" name="id_func" size="25" maxlength="6" /><br/>
            <label>Senha</label><input type="password" name="senha_func" size="25" maxlength="8" /><br/>
            <label>Nome</label><input type="text" name="nome_func" size="25" maxlength="15" /><br/>
            <label>Sobrenome</label><input type="text" name="sobrenome_func" size="25" maxlength="20" /><br/>
            <label>Sexo</label><select name="sexo_func">
                <option value="Masculino" selected>Masculino</option>
                <option value="Feminino">Feminino</option>
            </select><br/>
            <label>Nascimento</label><input type="date" name="nasc_func" /> <br/>
            <label>CPF</label><input type="text" name="cpf_func" size="25" maxlength="11" /> <br/>
            <label>E-mail</label><input type="text" name="email_func" size="25" maxlength="25" /><br/>
            <label>Telefone</label><input type="text" name="tel_func" size="25" maxlength="11" /><br/>
            <label>Função</label><input type="text" name="func_func" size="25" maxlength="10" /><br/>
            <label>CEP</label><input type="text" name="cep_func" size="25" maxlength="8" /><br/>
            <label>Cidade</label><input type="text" name="cidade_func" size="25" maxlength="25" /><br/>
            <label>Bairro</label><input type="text" name="bairro_func" size="25" maxlength="25" /><br/>
            <label>Endereço</label><input type="text" name="end_func" size="25" maxlength="25" /><br/>
            <input class="botao_voltar" type="submit" value="Enviar"/>
        </form>
        <a href="menu.php"><button class="botao_voltar">Voltar</button></a>';
    }else if(isset($_GET['rank_func'])){
        $consulta_func = "select *from tbfuncionario order by vendido DESC";
        $executar = mysqli_query($conn, $consulta_func);
        while ($linha = mysqli_fetch_array($executar)){
        ?>
        <fieldset>
            <span><label>ID</label><input type="text" value="<?php echo $linha['id'];?>" readonly/></span><br/>
            <span><label>Nome</label><input type="text" value="<?php echo $linha['nome'];?>" readonly/></span><br/>
            <span><label>Sobrenome</label><input type="text" value="<?php echo $linha['sobrenome'];?>" readonly/></span><br/>
            <span><label>Sexo</label><input type="text" value="<?php echo $linha['sexo'];?>" readonly/></span><br/>
            <span><label>Nascimento</label><input type="text" value="<?php echo $linha['nascimento'];?>" readonly/></span><br/>
            <span><label>CPF</label><input type="text" value="<?php echo $linha['cpf'];?>" readonly/></span><br/>
            <span><label>E-mail</label><input type="text" value="<?php echo $linha['email'];?>" readonly/></span><br/>
            <span><label>Telefone</label><input type="text" value="<?php echo $linha['telefone'];?>" readonly/></span><br/>
            <span><label>Função</label><input type="text" value="<?php echo $linha['funcao'];?>"/></span><br/>
            <span><label>CEP</label><input type="text" value="<?php echo $linha['cep'];?>" readonly/></span><br/>
            <span><label>Cidade</label><input type="text"value="<?php echo $linha['cidade'];?>" readonly/></span><br/>
            <span><label>Bairro</label><input type="text" value="<?php echo $linha['bairro'];?>" readonly/></span><br/>
            <span><label>Endereço</label><input type="text"value="<?php echo $linha['endereco'];?>" readonly/></span><br/>
            <span><label>Vendido</label><input type="text" value="<?php echo $linha['vendido'];?>" readonly/></span><br/><br/><br/>
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
