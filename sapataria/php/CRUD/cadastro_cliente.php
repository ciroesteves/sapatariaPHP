<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"]){
?>  
    <?php
    include_once 'conexao.php';
        $nome = $_POST['nome_clie'];
        $sobrenome = $_POST['sobrenome_clie'];
        $sexo = $_POST['sexo_clie'];
        $nasc = $_POST['nasc_clie'];
        $cpf = $_POST['cpf_clie'];
        $email = $_POST['email_clie'];
        $tel = $_POST['tel_clie'];
        $cep = $_POST['cep_clie'];
        $cidade = $_POST['cidade_clie'];
        $bairro = $_POST['bairro_clie'];
        $end = $_POST['end_clie'];

        $sql = "insert into tbcliente (nome, sobrenome, sexo, nascimento, cpf, email, telefone, cep, cidade, bairro, endereco) 
        values ('$nome', '$sobrenome', '$sexo', '$nasc', '$cpf', '$email', '$tel', '$cep', '$cidade', '$bairro', '$end');";

        $query = mysqli_query($conn, $sql);

        echo "Dados salvos com sucesso.<br/><br/><br/>";
        echo '<a href="../menu.php"><button>Voltar</button></a>'
    ?>
<?php
}else{
    echo
    "<script>
    window.location.href='index.php'
    </script>";
}
?>