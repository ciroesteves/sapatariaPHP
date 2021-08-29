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
    <h2>Consulta a Funcionários</h2>
    <?php
    // Quando o botao parar apagar for acionado
        if(isset($_GET['bot_apagar']))
        {
            $cod_apagar = $_GET['consultados_func'];
            $apagar = "delete  from tbfuncionario where id = '$cod_apagar'";
            $executar_apagar = mysqli_query($conn, $apagar);
            if($executar_apagar){
                echo "Os Dados Selecionados Foram Apagados do Banco de Dados.";
            }else{
                echo "Erro ao Apagar os Dados.";
            }
        }
    // Quando botao para alterar for acionado
        else if(isset($_GET['bot_alterar']))
        {  
            $cod_alterar = $_GET['consultados_func'];
            $buscar = "select *from tbfuncionario where id = '$cod_alterar'";
            $buscado = mysqli_query($conn, $buscar);
            $row = mysqli_fetch_array($buscado);
        ?>    
            <div>
            <form method="POST" action="alterar_func.php">
            <span><label>ID</label><input type="text" name="id_func" value="<?php echo $row['id'];?>" readonly/></span><br/>
            <span><label>Senha</label><input type="password" name="senha_func" value="<?php echo $row['senha'];?>"/></span><br/>
            <span><label>Nome</label><input type="text" name="nome_func" value="<?php echo $row['nome'];?>"/></span><br/>
            <span><label>Sobrenome</label><input type="text" name="sobrenome_func" value="<?php echo $row['sobrenome'];?>"/></span><br/>
            <span><label>Sexo</label><input type="text" name="sexo_func" value="<?php echo $row['sexo'];?>"/></span><br/>
            <span><label>Nascimento</label><input type="text" name="nasc_func" value="<?php echo $row['nascimento'];?>"/></span><br/>
            <span><label>CPF</label><input type="text" name="cpf_func" value="<?php echo $row['cpf'];?>"/></span><br/>
            <span><label>E-mail</label><input type="text" name="email_func" value="<?php echo $row['email'];?>"/></span><br/>
            <span><label>Telefone</label><input type="text" name="tel_func" value="<?php echo $row['telefone'];?>"/></span><br/>
            <span><label>Função</label><input type="text" name="func_func" value="<?php echo $row['funcao'];?>"/></span><br/>
            <span><label>CEP</label><input type="text" name="cep_func" value="<?php echo $row['cep'];?>"/></span><br/>
            <span><label>Cidade</label><input type="text" name="cidade_func" value="<?php echo $row['cidade'];?>"/></span><br/>
            <span><label>Bairro</label><input type="text" name="bairro_func" value="<?php echo $row['bairro'];?>"/></span><br/>
            <span><label>Endereço</label><input type="text" name="end_func" value="<?php echo $row['endereco'];?>"/></span><br/>
            <span><label>Vendido</label><input type="text" name="vend_func" value="<?php echo $row['vendido'];?>"/></span> <br/><br/><br/>
            <input type="submit" value="Enviar" />
            </form>
        </div>
        <?php
        }else{
    ?>
    <!-- Onde é feita a consulta -->
    <form method="GET">
    <?php
            $nome = $_GET['pesq_nome_func'];
            $id = $_GET['pesq_id_func'];
    
            $consulta_func = "select *from tbfuncionario where nome = '$nome' or id = '$id'; ";
            $executar = mysqli_query($conn, $consulta_func);
            while ($linha = mysqli_fetch_array($executar)){
    ?>
        <div id="cxconsulta">
            <input name="consultados_func" type="radio" value="<?php echo $linha['id'] ?>" />
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
        </div>   
    <?php
        }
    }
    // Só gerente tem acesso às alterações
    if($_SESSION['funcao'] == 'Gerente'){
    ?>
        <input type="submit" name="bot_alterar" value="Alterar">
        <input type="submit" name="bot_apagar" value="Apagar">
    <?php
    }
    ?>
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