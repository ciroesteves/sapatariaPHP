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
    $vend = $_POST['vend_prod'];

        $alterar = "update tbproduto set 
        marca = '$marca',
        modelo = '$model', 
        cor = '$cor',
        sexo = '$sexo', 
        tamanho = '$tam',
        quantidade = '$quant', 
        material = '$mat',
        estilo = '$estilo', 
        preco = '$preco', 
        vendido = '$vend'
        where
        codigo = '$cod';";

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