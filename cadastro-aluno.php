<?php
    include "conexao.inc";
    $nomeerr=$cpferr=$rgerr=$matriculaerr=$emailerr=$senhaerr="";
    $err=0;
    if(isset($_POST['CADASTRAR'])){

        $nome=trim(filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($nome)){
            $nomeerr="nome precisa ser preenchido";
            $err++;
        }
        if(empty($cpf=$_POST['cpf']) or strlen($cpf)<11){
            $cpferr="cpf precisa ser preenchido";
            $err++;
        }else if(!$cpf=filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_NUMBER_INT)){
            $cpferr="cpf precisa ser um numero";
            $err++;
        }
         if(empty($rg=$_POST['rg']) or strlen($rg)<10){
            $rgerr="rg precisa ser preenchido";
            $err++;
        }else if(!$rg=filter_input(INPUT_POST,'rg',FILTER_SANITIZE_NUMBER_INT)){
            $rgerr="rg precisa ser um numero";
            $err++;
        }
        if(empty($matricula=$_POST['matricula'])){
            $matriculaerr="matricula precisa ser preenchido";
            $err++;
        }else if(!$matricula=filter_input(INPUT_POST,'matricula',FILTER_SANITIZE_NUMBER_INT)){
            $matriculaerr="matricula precisa ser um numero";
            $err++;
        }
        if(empty($email=$_POST['email'])){
            $emailerr="email precisa ser preenchido";
            $err++;
        }else if(!$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL)){
            $emailerr="formato nao aceito";
            $err++;
        }
        
        $campus=$_POST['campus'];
        $curso=$_POST['curso'];
        $senha=trim(filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($senha)){
            $senhaerr="senha precisa ser preenchida";
            $err++;
        }else if($senha==trim(filter_input(INPUT_POST,'conf-senha',FILTER_SANITIZE_SPECIAL_CHARS))){
            $senhaerr="senhas precisam ser iguais";
        }
        if($err==0){
        $sql="INSERT INTO usuario VALUES ('$nome','$cpf','$matricula','$rg','$email','$senha','$campus','aluno','$curso',NULL,NULL)";
        if(mysqli_query($conn,$sql)){ header("location:login.php");}
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

    <title>Cadastro | Projeto Web 0</title>
</head>
<body>
    <header>
        <div class="center">
            <div class="logo"> <img src="imagens/rural_logo.png" height="85"> </div>
            <div class="menu">
                <a href="index.html">HOME</a>
                <a href="cadastro.html" class="selecionado">CADASTRO</a>
                <a href="login.php">LOGIN</a>
                <a href="sobre.html">SOBRE</a>
            </div>
        </div>
    </header>

    <div class="title">
        <h1>CADASTRE-SE COMO ALUNO</h1>
    </div>

    <section class="form">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="form-area">
                <div class="linha-1">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome">
                    <p><?php echo $nomeerr?></p>
                </div>
                
                <div class="linha-2">
                    <label for="cpf">CPF</label>
                    <input class="primeiro" type="text" name="cpf" id="cpf" maxlength="11">
                    <p><?php echo $cpferr?></p>

                    <label class="torto" for="rg">RG</label>
                    <input type="text" name="rg" id="rg" maxlength="10">
                    <p><?php echo $rgerr?></p>

                    <label class="torto" for="matricula">Matr??cula</label>
                    <input class="ultimo" type="text" name="matricula" id="matricula" maxlength="11" >
                    <p><?php echo $matriculaerr?></p> 
                </div>

                <div class="colunas">
                    <div class="coluna-1">
                        <div class="linha-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" maxlength="40">  
                            <p><?php echo $emailerr?></p>  
                        </div>
                        
                        <div class="linha-4">
                            <label for="campus">Campus</label>

                            <label for="curso">Curso</label>

                            <select name="campus" id="campus">
                                <option value="seropedica">SEROP??DICA</option>
                                <option value="nova-iguacu">NOVA IGUA??U</option>
                                <option value="tres-rios">TR??S RIOS</option>
                            </select>

                            <select name="curso" id="curso">
                                <option value="ADMINISTRA????O ">ADMINISTRA????O - 45</option>
                                <option value="ENGENHARIA DE ALIMENTOS">ENGENHARIA DE ALIMENTOS - 21</option>
                                <option value="PSICOLOGIA ">PSICOLOGIA - 38</option>
                                <option value="SISTEMAS DE INFORMA????O">SISTEMAS DE INFORMA????O - 39</option>
                            </select>    
                        </div>                 
                    </div>

                    <div class="coluna-2">
                        <div class="linha-3">
                            <label for="senha">Crie uma Senha</label>
                            <input type="password" name="senha" id="senha" maxlenght="12">
                            <p><?php echo $senhaerr?></p>
                        </div>

                        <div class="linha-4">
                            <label for="conf-senha">Confirme a Senha</label>
                            <input type="password" name="conf-senha" id="conf-senha" maxlenght="12">
                            <p><?php echo $senhaerr?></p>
                        </div>
                    </div>    
                </div>    
            </div>
            <input type="submit" name="CADASTRAR"  class="botao-verde botao" href="aluno-perfil-semprojeto.html">
        </form>

        
        
    </section>

    <section class="footer">
        <footer>
            <p id="title">Projeto de Web 0 - UFRRJ</p>
            <p id="credits">Sarah, Bruna, Matheus e Paulo Gabriel</p>
        </footer>
    </section>
</body>
</html>
