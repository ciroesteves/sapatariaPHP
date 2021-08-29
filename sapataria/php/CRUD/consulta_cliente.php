<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"]){
?>  
<html>
    <head>
        <meta charset="UTF=8" />
        <title>Sapataria</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Estilos/simples.css" />
        <link rel="icon" href="../Imagens/icon.png" />
    </head>
    <body>
    <h2>Consulta ao Clientes</h2>
    <?php
        if(isset($_GET['bot_apagar']))
        {
            $cod_apagar = $_GET['consultados_cliente'];

            $apagar = "delete  from tbcliente where CPF = '$cod_apagar'";
            $executar_apagar = mysqli_query($conn, $apagar);
            if($executar_apagar){
                echo "Os Dados Selecionados Foram Apagados do Banco de Dados.";
            }else{
                echo "Erro ao Apagar os Dados.";
            }
        }
        else if(isset($_GET['bot_alterar']))
        {  
            $cod_alterar = $_GET['consultados_cliente'];
            $buscar = "select *from tbcliente where CPF = '$cod_alterar'";
            $buscado = mysqli_query($conn, $buscar);
            $row = mysqli_fetch_array($buscado);
        ?>
        <div class="d-flex justify-content-center">
        <form class="w-50 p-3" method="$_GET" action="alterar_cliente.php">
          <div class="row mb-2">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="nome_clie" name="nome_clie" value="<?php echo $row['nome'];?>" size="25" maxlength="15" class="form-control" />
                <label class="form-label" for="nome_clie">Nome</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="sobrenome_clie" name="sobrenome_clie" value="<?php echo $row['sobrenome'];?>" size="25" maxlength="20" class="form-control" />
                <label class="form-label" for="sobrenome_clie">Sobrenome</label>
              </div>
            </div>
          </div>
        
          <div class="form-outline mb-2">
            <input type="text" id="cpf_clie" name="cpf_clie" value="<?php echo $row['CPF'];?>" readonly size="25" maxlength="11" class="form-control" />
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
        </div>
            <div>
            <form method="$_GET" action="alterar_cliente.php">
            <div><label>Nome</label><input class="" type="text" name="nome_clie" /></div>
            <div><label>Sobrenome</label><input type="text" name="sobrenome_clie"/></div>
            <div><label>Sexo</label><input type="text" name="sexo_clie" value="<?php echo $row['sexo'];?>"/></div>
            <div><label>Nascimento</label><input type="text" name="nasc_clie" value="<?php echo $row['nascimento'];?>"/></div>
            <div><label>CPF</label><input type="text" name="cpf_clie" value="<?php echo $row['CPF'];?>" readonly/></div>
            <div><label>E-mail</label><input type="text" name="email_clie" value="<?php echo $row['email'];?>"/></div>
            <div><label>Telefone</label><input type="text" name="tel_clie" value="<?php echo $row['telefone'];?>"/></div>
            <div><label>CEP</label><input type="text" name="cep_clie" value="<?php echo $row['CEP'];?>"/><</div>
            <div><label>Cidade</label><input type="text" name="cidade_clie" value="<?php echo $row['cidade'];?>"/></div>
            <div><label>Bairro</label><input type="text" name="bairro_clie" value="<?php echo $row['bairro'];?>"/></div>
            <div><label>Endereço</label><input type="text" name="end_clie" value="<?php echo $row['endereco'];?>"/></div>
            <div><label>Comprado</label><input type="text" name="comprado_clie" value="<?php echo $row['Comprado'];?>"/></div>
            <input type="submit" value="Enviar" />
            </form>
        </div>
        <?php
        }else{
    ?>
    <form method="GET">
    <?php
            $nome = $_GET['pesq_nome_clie'];
            $sobrenome = $_GET['pesq_sobrenome_clie'];
            $cpf = $_GET['pesq_cpf_clie'];
    
            $consulta_cliente = "select *from tbcliente where (nome = '$nome' and sobrenome like '$sobrenome%') or CPF = '$cpf'; ";
            $executar = mysqli_query($conn, $consulta_cliente);
            while ($linha = mysqli_fetch_array($executar)){
    ?>
        <div id="cxconsulta">
            <input name="consultados_cliente" type="radio" value="<?php echo $linha['CPF'] ?>" />
            <div><label>Nome</label><input type="text" value="<?php echo $linha['nome'];?>" readonly /></div>
            <div><label>Sobrenome</label><input type="text" value="<?php echo $linha['sobrenome'];?>" readonly /></div>
            <div><label>Sexo</label><input type="text" value="<?php echo $linha['sexo'];?>" readonly /></div>
            <div><label>Nascimento</label><input type="text" value="<?php echo $linha['nascimento'];?>" readonly /></div>
            <div><label>CPF</label><input type="text" value="<?php echo $linha['CPF'];?>" readonly /></div>
            <div><label>E-mail</label><input type="text" value="<?php echo $linha['email'];?>" readonly /></div>
            <div><label>Telefone</label><input type="text" value="<?php echo $linha['telefone'];?>" readonly /></div>
            <div><label>CEP</label><input type="text" value="<?php echo $linha['CEP'];?>" readonly /></div>
            <div><label>Cidade</label><input type="text" value="<?php echo $linha['cidade'];?>" readonly /></div>
            <div><label>Bairro</label><input type="text" value="<?php echo $linha['bairro'];?>" readonly /></div>
            <div><label>Endereço</label><input type="text" value="<?php echo $linha['endereco'];?>" readonly /></div>
            <div><label>Comprado</label><input type="text" value="<?php echo $linha['Comprado'];?>" readonly /></div>
        </div>   
    <?php
        }
    }
    ?>
        <input type="submit" name="bot_alterar" value="Alterar">
        <input type="submit" name="bot_apagar" value="Apagar">
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