<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"] && $_SESSION["funcao"] == 'Gerente'){
?>      
    <?php
    include_once 'conexao.php';

        $cod = $_POST['cod_prod'];
        $marca = $_POST['marca_prod'];
        $model = $_POST['model_prod'];
        $cor = $_POST['cor_prod'];
        $sexo = $_POST['sexo_prod'];
        $tam = $_POST['tam_prod'];
        $quant = $_POST['quant_prod'];
        $mat = $_POST['mat_prod'];
        $estilo = $_POST['estilo_prod'];
        $preco = $_POST['preco_prod'];

        $sql = "insert into tbproduto (codigo, marca, modelo, cor, sexo, tamanho, quantidade, material, estilo, preco) 
        values ('$cod', '$marca', '$model', '$cor', '$sexo', '$tam', '$quant', '$mat', '$estilo', '$preco');";

        $query = mysqli_query($conn, $sql);


        if($sql){
            echo "Dados salvos com sucesso.<br/><br/><br/>";
        }else{
            echo "Erro!" ;
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