<?php
    include_once 'conexao.php';
    SESSION_START();

    $login = isset($_POST['cxlogin'])?$_POST['cxlogin'] :"";
    $senha = isset($_POST['cxsenha'])?$_POST['cxsenha'] :"";
    $perfil= isset($_POST['cxfuncao'])?$_POST['cxfuncao'] :"";
    $senhacript = md5($senha);

    $log = mysqli_query($conn, "select *from tbfuncionario where id='$login' and senha='$senhacript' and funcao='$perfil';");
    $linha = mysqli_fetch_array($log);

    if($login == "" || $senha = ""){
        echo "Acesso restrito, efetue o login!";
    }
    else if($senhacript == $linha['senha'] && $perfil == $linha['funcao']){
        $_SESSION["usuario"] = $linha["nome"]; 
        $_SESSION["funcao"] = $linha["funcao"]; 
        $_SESSION["id"] = $linha["id"];
        echo "
            <script>
                window.location.href = '../menu.php';
            </script>
        ";
    }
    else if($senhacript != $linha['senha'] || $perfil != $linha['funcao']){
        echo "
        <script>
            window.location.href = '../index.php';
        </script>
    ";
        
    }
    
?>