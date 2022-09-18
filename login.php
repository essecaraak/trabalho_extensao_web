<?php
    include "conexao.inc";
    if(isset($_POST['entrar'])){
    $login=$_POST['login'];
    $senha=$_POST['senha'];
    $sql="SELECT * FROM usuario WHERE (cpf='$login' OR matricula='$login') AND (senha='$senha')";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $num=rand(1000,9000);
        session_start();
        $_SESSION['num']=$num;
        $_SESSION['login']=$login;
        switch ($row['perfil']) {
            case 'aluno':
               header("location:aluno-perfil-semprojeto.php?num1=$num");
                break;
            case 'profe':

                break;
            case 'coord':

                break;
        }
    }else{
        $err='credenciais incorretas';
    }
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/cadastro-aluno-prof.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/common.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <title>Login | Projeto Web 0</title>
</head>
<body>
    <header>
        <div class="center">
            <div class="logo"> <img src="imagens/rural_logo.png" height="85"> </div>
            <div class="menu">
                <a href="index.html">HOME</a>
                <a href="cadastro.html">CADASTRO</a>
                <a href="login.php" class="selecionado">LOGIN</a>
                <a href="sobre.html">SOBRE</a>
            </div>
        </div>
    </header>

    <div class="title">
        <h1>BEM-VINDO(A) DE VOLTA!</h1>
    </div>

    <section class="form">
        <div class="form-area login">
            <form method="POST">
                <div class="linha-1">
                    <label for="login">CPF ou Matrícula:</label>
                    <input type="text" name="login" id="login" maxlength="11">
                </div>
                
                <div class="linha-2 senha">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" maxlength="12">
                    <p><?php echo $err?></p>
                </div>
                <input type="submit" name="entrar" class="bozao-azul botao">
            </form>

            <div class="linha-3">
                <a class="link esqueceu-senha" href="#">Esqueceu a senha?</a>
            </div>
            

           

            <div class="cadastro">
                <p class="texto">Ainda não tem cadastro?</p>
                <a class="link link-cadastro" href="cadastro.html">Cadastre-se!</a>
            </div>
        </div>

        
        
    </section>

    <section class="footer">
        <footer>
            <p id="title">Projeto de Web 0 - UFRRJ</p>
            <p id="credits">Sarah, Bruna, Matheus e Paulo Gabriel</p>
        </footer>
    </section>
</body>
</html>
