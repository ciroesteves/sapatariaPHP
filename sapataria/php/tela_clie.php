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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" href="../Imagens/icon.png" />
        <?php
        include_once 'CRUD/conexao.php';
        ?>
    </head>
    <body>
        <!-- Aqui é onde é feito o cadastro e a inserção de dados para consulta -->
    <?php
    if(isset($_GET['consul_clie']))
    {
        echo '
        <h1>Consulta de Clientes</h1>
            <form method="GET" action="CRUD/consulta_cliente.php">
                <label>CPF</label><input type="text" name="pesq_cpf_clie" size="25" maxlength="11" /><br/>
                <label>Nome</label><input type="text" name="pesq_nome_clie" size="25" maxlength="15" /><br/>
                <label>Sobrenome</label><input type="text" name="pesq_sobrenome_clie" size="25" maxlength="20" /><br/>
                <input class="botao_voltar" type="submit" value="Consultar" />
            </form>
            <a href="menu.php"><button class="botao_voltar">Voltar</button></a>';
    }
    else if(isset($_GET['cadastrar_clie'])){
        echo '
        <h1>Cadastro de Clientes</h1>
        <div class="d-flex justify-content-center">
        <form class="w-50 p-3" method="POST" action="CRUD/cadastro_cliente.php">
          <div class="row mb-2">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="nome_clie" name="nome_clie" size="25" maxlength="15" class="form-control" />
                <label class="form-label" for="nome_clie">Nome</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="sobrenome_clie" name="sobrenome_clie" size="25" maxlength="20" class="form-control" />
                <label class="form-label" for="sobrenome_clie">Sobrenome</label>
              </div>
            </div>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="cpf_clie" name="cpf_clie" size="25" maxlength="11" class="form-control" />
            <label class="form-label" for="cpf_clie">CPF</label>
          </div>
          
          <div class="row mb-2">
            <div class="col">
              <div class="form-outline">
                <input type="date" id="nasc_clie" name="nasc_clie" size="25" class="form-control" />
                <label class="form-label" for="nasc_clie">Nascimento</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <select id="sexo_clie" name="sexo_clie" class="form-control">
                  <option value="Masculino" selected>Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <label class="form-label" for="sexo_clie">Sexo</label>
              </div>
            </div>
          </div>
        
          <div class="form-outline mb-2">
            <input type="email" id="email_clie" name="email_clie" size="25" maxlength="25"class="form-control" />
            <label class="form-label" for="email_clie">Email</label>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="tel_clie" name="tel_clie" size="25" maxlength="11" class="form-control" />
            <label class="form-label" for="tel_clie">Telefone</label>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="cep_clie" name="cep_clie" size="25" maxlength="8" class="form-control" />
            <label class="form-label" for="cep_clie">CEP</label>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="cidade_clie" name="cidade_clie" size="25" maxlength="25" class="form-control" />
            <label class="form-label" for="cidade_clie">Cidade</label>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="bairro_clie" name="bairro_clie" size="25" maxlength="25" class="form-control" />
            <label class="form-label" for="bairro_clie">Bairro</label>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="end_clie" name="end_clie" size="25" maxlength="25" class="form-control" />
            <label class="form-label" for="end_clie">Endereço</label>
          </div>
          
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-2">Cadastrar</button>
        </form>
        </div>';
    }else if(isset($_GET['rank_clie'])){
        $consulta_func = "select *from tbcliente order by Comprado DESC";
        $executar = mysqli_query($conn, $consulta_func);
        while ($linha = mysqli_fetch_array($executar)){
        ?>
        <fieldset>
        <span><label>Nome</label><input type="text" value="<?php echo $linha['nome'];?>" readonly /></span><br/>
            <span><label>Sobrenome</label><input type="text" value="<?php echo $linha['sobrenome'];?>" readonly /></span><br/>
            <span><label>Sexo</label><input type="text" value="<?php echo $linha['sexo'];?>" readonly /></span><br/>
            <span><label>Nascimento</label><input type="text" value="<?php echo $linha['nascimento'];?>" readonly /></span><br/>
            <span><label>CPF</label><input type="text" value="<?php echo $linha['CPF'];?>" readonly /></span><br/>
            <span><label>E-mail</label><input type="text" value="<?php echo $linha['email'];?>" readonly /></span><br/>
            <span><label>Telefone</label><input type="text" value="<?php echo $linha['telefone'];?>" readonly /></span><br/>
            <span><label>CEP</label><input type="text" value="<?php echo $linha['CEP'];?>" readonly /></span><br/>
            <span><label>Cidade</label><input type="text" value="<?php echo $linha['cidade'];?>" readonly /></span><br/>
            <span><label>Bairro</label><input type="text" value="<?php echo $linha['bairro'];?>" readonly /></span><br/>
            <span><label>Endereço</label><input type="text" value="<?php echo $linha['endereco'];?>" readonly /></span><br/>
            <span><label>Comprado</label><input type="text" value="<?php echo $linha['Comprado'];?>" readonly /></span><br/><br/><br/> 
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
