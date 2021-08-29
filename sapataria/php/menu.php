<?php
SESSION_START();
include_once 'CRUD/conexao.php';
if($_SESSION["usuario"]){
?>

<html>
    <head>
        <meta charset="UTF=8" />
        <title>Sapataria</title>
        <link rel="stylesheet" href="../Estilos/menu.css" />
        <link rel="icon" href="../Imagens/icon.png" />
    </head>
    <body>
    <?php
        if($_SESSION['funcao'] == 'Gerente'){
    ?>  
    <div id="cabeçalho">    
        <div id="titulo">
            <h1>Sapataria Sapatella</h1>
        </div>
        <div id="dados_user">
            <?php
                echo "<div>
                    <p>".$_SESSION['usuario']."</p>
                    <p>".$_SESSION['funcao']."</p>
                    <a href='CRUD/fimsessao.php'><button>Sair</button></a>
                </div>"
            ?>
        </div>
    </div>
    <div id="menu">
        <div id=esquerda_menu>  
            <form id="selecao" method="GET" action=""> <!-- Opçao para escolha para gerente -->
                <div class="opcoes"><input type="submit" name="botao_prod" value="Produtos"/></div>
                <div class="opcoes"><input type="submit" name="botao_clie" value="Clientes"/></div>
                <div class="opcoes"><input type="submit" name="botao_func" value="Funcionários"/></div>
            </form>
        </div>
        <div id=direita_menu>
            <?php
                if(isset($_GET['botao_prod']))
                {
                    echo '<h1>Produtos</h1>
                        <form method="GET" action="tela_prod.php">
                            <div class="opcoes"><input type="submit" name="consul_prod" value="Consulta"></div>
                            <div class="opcoes"><input type="submit" name="cadastrar_prod" value="Cadastro"></div>
                            <div class="opcoes"><input type="submit" name="rank_prod" value="Ranking"></div>
                        </form>';
                }
                else if(isset($_GET['botao_clie']))
                {
                    echo '<h1>Clientes</h1>
                        <form method="GET" action="tela_clie.php">
                            <div class="opcoes"><input type="submit" name="consul_clie" value="Consulta"></div>
                            <div class="opcoes"><input type="submit" name="cadastrar_clie" value="Cadastro"></div>
                            <div class="opcoes"><input type="submit" name="rank_clie" value="Ranking"></div>
                        </form>';
                }
                else if(isset($_GET['botao_func']))
                {
                    echo '<h1>Funcionários</h1>
                        <form method="GET" action="tela_func.php">
                            <div class="opcoes"><input type="submit" name="consul_func" value="Consulta"></div>
                            <div class="opcoes"><input type="submit" name="cadastrar_func" value="Cadastro"></div>
                            <div class="opcoes"><input type="submit" name="rank_func" value="Ranking"></div>
                        </form>';
                }
            ?>  
        </div>
    <?php
        }else{
    ?>
    <div id="cabeçalho">    
        <div id="titulo">
            <h1>Sapataria Sapatella</h1>
        </div>
        <div id="dados_user">
            <?php
                echo "<div>
                    <p>".$_SESSION['usuario']."</p>
                    <p>".$_SESSION['funcao']."</p>
                    <a href='CRUD/fimsessao.php'><button>Sair</button></a>
                </div>"
            ?>
        </div>
    </div>
    <div id="menu">
        <div id=esquerda_menu>  
            <form id="selecao" method="GET" action=""> <!-- Opçao para escolha para vendedor -->
                <div class="opcoes"><input type="submit" name="botao_prod" value="Produtos"/></div>
                <div class="opcoes"><input type="submit" name="botao_clie" value="Clientes"/></div>
                <div class="opcoes"><input type="submit" name="botao_func" value="Funcionários"/></div>
            </form>
        </div>
        <div id=direita_menu>
            <?php
                if(isset($_GET['botao_prod']))
                {
                    echo '<h1>Produtos</h1>
                        <form method="GET" action="tela_prod.php">
                            <div class="opcoes"><input type="submit" name="consul_prod" value="Consulta"></div>
                        </form>';
                }
                else if(isset($_GET['botao_clie']))
                {
                    echo '<h1>Clientes</h1>
                        <form method="GET" action="tela_clie.php">
                            <div class="opcoes"><input type="submit" name="consul_clie" value="Consulta"></div>
                            <div class="opcoes"><input type="submit" name="cadastrar_clie" value="Cadastro"></div>
                        </form>';
                }
                else if(isset($_GET['botao_func']))
                {
                    echo '<h1>Funcionários</h1>
                        <form method="GET" action="tela_func.php">
                            <div class="opcoes"><input type="submit" name="consul_func" value="Consulta"></div>
                        </form>';
                }
            ?>  
        </div>
    <?php
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