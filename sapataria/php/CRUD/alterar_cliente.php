<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"]){
?>
    <?php
    include_once 'conexao.php';
        $nome = $_GET['nome_clie'];
        $sobrenome = $_GET['sobrenome_clie'];
        $sexo = $_GET['sexo_clie'];
        $nasc = $_GET['nasc_clie'];
        $cpf = $_GET['cpf_clie'];
        $email = $_GET['email_clie'];
        $tel = $_GET['tel_clie'];
        $cep = $_GET['cep_clie'];
        $cidade = $_GET['cidade_clie'];
        $bairro = $_GET['bairro_clie'];
        $end = $_GET['end_clie'];
        $comp = $_GET['comprado_clie'];

        $alterar = "update tbcliente set 
        nome='$nome', 
        sobrenome='$sobrenome',
        sexo='$sexo', 
        nascimento='$nasc',
        email='$email', 
        telefone='$tel', 
        CEP='$cep', 
        cidade='$cidade', 
        bairro='$bairro', 
        endereco='$end',
        Comprado='$comp'
        where
        CPF='$cpf';";

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