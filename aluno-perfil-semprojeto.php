<?php
    session_start();
   
    $login=$_SESSION['login'];   
    if(isset($_SESSION['num'])){
        $num1=$_GET['num1'];
        if ($num1<>$_SESSION['num']){
            echo "login nao efetuado";
            exit();
        }
    }
    include "conexao.inc";


    $sql="SELECT * FROM usuario WHERE (cpf='$login' OR matricula='$login')";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $nome=$row['nomeusu'];
        $curso=$row['curso'];
    }

?>
<html>
    <head>
        <title>Perfil | Projeto Web 0</title>
        <link href="css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/common.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    </head>
    <body>

        <header>
            <div class="center">
                <div class="logo"> <img src="imagens/rural_logo.png" height="85"> </div>
                <div class="menu">
                    <div class="perfil">
                        <a href="#" class="selecionado">PERFIL</a>
                        <ul>
                            <li><a class="navitem" href="atualizar-dados-semprojeto.html">Atualizar dados</a></li>
                        </ul>
                    </div>    
                    <div class="perfil">
                    <a href="#" class="selecionado">SEU PROJETO</a>
                    <ul>
                        <li><a class="navitem" href="aluno-perfil-semprojeto.html">pagina inicial</a></li>
                        <li ><a class="navitem" href="#">Enviar relatório</a></li>
                        <li ><a class="navitem" href="#">Solicitar encerramento de vínculo</a></li>
                        <li ><a class="navitem" href="#">Ver historico</a></li>
                        <li ><a class="navitem" href="#">Incluir certificado de participação</a></li>
                        <li ><a class="navitem" href="#">Renovar contrato</a></li>
                        <li><a class="navitem" href="buscar-projetos-semprojeto.html">buscar projetos</a></li>
                    </ul>
                    </div>
                    <div class="perfil">
                    <a href="#" class="selecionado"><svg width="20" height="20" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.775 21.0938H4.22501C3.57501 21.0938 3.00626 20.7562 2.68126 20.1656C2.35626 19.575 2.43751 18.9 2.76251 18.3094L3.65626 16.875C5.11876 14.5969 5.85001 11.9813 5.85001 9.28125C5.85001 6.15937 7.80001 3.29063 10.6438 2.27813C11.1313 1.35 12.025 0.84375 13 0.84375C13.975 0.84375 14.8688 1.35 15.3563 2.27813C18.2 3.29063 20.15 6.15937 20.15 9.28125C20.15 11.9813 20.8813 14.5969 22.3438 16.875L23.2375 18.3094C23.5625 18.9 23.6438 19.575 23.3188 20.1656C23.075 20.7562 22.425 21.0938 21.775 21.0938Z" fill="#1F1F1F"/>
                        <path d="M9.0188 22.7812C9.42505 24.7219 11.05 26.1562 13 26.1562C14.95 26.1562 16.575 24.7219 16.9813 22.7812H9.0188Z" fill="#1F1F1F"/>
                        </svg> </a>
                    <ul>
                        <li ><a class="navitem" href="#">sem notificações</a></li>
                       
                    </ul>
                    </div>   
                </div>
            </div>
        </header>

            <section class="pagfixa">
                <div class="div-esquerda">
                    <div class="info">
                        <div class="info-peq">
                            <p class="texto"><?php echo "'$nome' | '$curso' | 2022.1"?></p>
                            <p class="texto" id="data"><?php echo date("m-y")?></p>
                        </div>

                        <div class="info-grande">
                            <p class="texto" id="projeto">SEM PROJETO</p>
                        </div>

                        <div class="procurar-projetos">
                            <a class="botao-verde" href="buscar-projetos-semprojeto.html">PROCURAR PROJETOS</a>
                        </div>
                        
                    </div>
                    <div class="div-horas-totais">
                        <h2 class="titulo-semibold">HORAS TOTAIS</h2>
                        <div class="div-porcent-horas">

                        </div>
                        <a class="botao-azul historico" href="#">VER HISTÓRICO</a>
                    </div>
                </div>

                <div class="div-direita">
                    <div class="div-tarefas">
                        <h1 id="tarefas">TAREFAS DA SEMANA</h1>
                        <br>
                        <p>Quando você estiver vinculado a um projeto, suas tarefas semanais aparecerão aqui.</p>
                    </div>
                </div>
            </section>

            <section class="footer">
                <footer>

                </footer>
            </section>
            
    </body>
</html>
