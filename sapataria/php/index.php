<html>
    <head>
        <meta charset="UTF=8" />
        <title>Sapataria</title>
        <link rel="stylesheet" type="text/css" href="../Estilos/login.css" />
        <link rel="icon" href="../Imagens/icon.png" />
        <?php
        include_once 'CRUD/conexao.php';
        ?>
    </head>
    <body>
        <!-- Abertura -->
        <div id="nome_loja">
            <div>
                <img id="icon" src="../Imagens/icon.png"/>
                <h1>Sapataria Sapatella</h1>
            </div>
        </div>
        <div id="menu">
            <div id=esquerda_menu>  
                <p>A Sapataria Sapatella foi fundada em 1980, em Sapatópolis. Desde então, vêm inovando e trazendo para a população sapatolense as maiores marcas e seus lançamentos.
                 O atendimento, estoque e o público fidelizado são os grandes diferenciais da empresa. Então...
                </p>
                <h3>Vamos Rumo ao Sucesso!!!</h3>
            </div>
            <div id=direita_menu>
                <h2>Login</h2>
                <form action="CRUD/validar.php" method="POST">
                        <div class="entrada">
                            <div class="cx"><label>Usuário/ID</label></div>
                            <input type="text" placeholder="Usuário" name="cxlogin" size="30" maxlength="6">
                        </div>
                        <div class="entrada">
                        <div class="cx"><label>Senha</label></div>
                        <input type="password" placeholder="Senha" name="cxsenha" size="30" maxlength="8">
                        </div>
                        <div class="entrada">
                        <div class="cx"><label>Função</label></div>
                        <select name="cxfuncao">
                        <option value="Vendedor" selected>Vendedor</option>
                        <option value="Gerente">Gerente</option>
                        </select>
                        </div>
                        <div>
                        <input id="botao" type="submit" value="Conectar" />
                        </div>
            </form>
            </div>
        </div>
    </body>
</html>