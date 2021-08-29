<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"] && $_SESSION["funcao"] == 'Gerente'){
?>  
    <?php
    include_once 'conexao.php';
    $id = $_POST['id_func'];
    $senha = md5($_POST['senha_func']);
    $nome = $_POST['nome_func'];
    $sobrenome = $_POST['sobrenome_func'];
    $sexo = $_POST['sexo_func'];
    $nasc = $_POST['nasc_func'];
    $cpf = $_POST['cpf_func'];
    $email = $_POST['email_func'];
    $tel = $_POST['tel_func'];
    $func = $_POST['func_func'];
    $cep = $_POST['cep_func'];
    $cidade = $_POST['cidade_func'];
    $bairro = $_POST['bairro_func'];
    $end = $_POST['end_func'];
    $vend = $_POST['vend_func'];

        $alterar = "update tbfuncionario set 
        cpf='$cpf',
        senha='$senha',
        nome='$nome', 
        sobrenome='$sobrenome',
        sexo='$sexo', 
        nascimento='$nasc',
        email='$email', 
        telefone='$tel',
        funcao='$func', 
        CEP='$cep', 
        cidade='$cidade', 
        bairro='$bairro', 
        endereco='$end',
        vendido='$vend'
        where
        id='$id';";

        $query = mysqli_query($conn, $alterar);
        if($alterar){
            echo "Dados salvos com sucesso.<br/><br/><br/>";
        }
        echo '<a href="../menu.php"><button>Voltar</button></a>';
    ?>
<?php
}else{
    echo
    "<script>
    window.location.href='index.php'
    </script>";
}
?>