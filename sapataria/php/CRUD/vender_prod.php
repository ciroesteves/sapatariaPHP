<?php
SESSION_START();
include_once 'conexao.php';
if($_SESSION["usuario"]){
?>  
    <?php
    include_once 'conexao.php';
    $cod = $_POST['cod_vend_prod'];
    $quant_vend = $_POST['quant_vend_prod'];
    $vendedor = $_SESSION["id"];
    $cliente = $_POST['cliente_prod'];
 
    $aux_vender = "select *from tbproduto where codigo = '$cod'";
    $buscar_vender = mysqli_query($conn, $aux_vender);
    $valores = mysqli_fetch_array($buscar_vender);
    $vend_total = $valores['vendido'] + $quant_vend;
    $quant = $valores['quantidade'] - $quant_vend;
    $preco_total = $quant_vend * $valores['preco'];

    $aux_vendedor = "select *from tbfuncionario where id = '$vendedor'";
    $buscar_vendedor = mysqli_query($conn, $aux_vendedor);
    $dados_vendedor = mysqli_fetch_array($buscar_vendedor);
    $vend_vendedor = $dados_vendedor['vendido'] + $preco_total;

    $aux_cliente = "select *from tbcliente where CPF = '$cliente'";
    $buscar_cliente = mysqli_query($conn, $aux_cliente);
    $dados_cliente = mysqli_fetch_array($buscar_cliente);
    $comp_cliente = $dados_cliente['Comprado'] + $preco_total; 

    $vender_prod = "update tbproduto set
        quantidade = '$quant', 
        vendido = '$vend_total' 
        where
        codigo = '$cod';";
    
    $vender_func = "update tbfuncionario set 
        vendido = '$vend_vendedor' 
        where 
        id = '$vendedor';";
    $vender_clie = "update tbcliente set 
        Comprado = '$comp_cliente' 
        where 
        CPF = '$cliente';";

    $executar_prod = mysqli_query($conn, $vender_prod);
    $executar_func = mysqli_query($conn, $vender_func);
    $executar_clie = mysqli_query($conn, $vender_clie);

    if($executar_prod && $executar_func && $executar_clie){
            echo "Venda concluída com Sucesso!";
    }else{
            echo "Erro na Venda do Produto.".$quant.$vend_total.$cod.$vend_vendedor.$vendedor.$comp_cliente.$cliente;
    }
    ?>
<?php
}else{
    echo
    "<script>
    window.location.href='index.php'
    </script>";
}
?>