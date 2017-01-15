<?php
    require ("connect.php");

    if(!isset($_SESSION['name']))
        header("Location:index.php");
    
    if(isset($_POST['cadprod'])){
        mysqli_autocommit($conexao, FALSE);
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO produto(`nome`,`preco`,`descricao`) VALUES ('$nome', '$descricao')";
        try {
            $cons = mysqli_query($conexao ,$sql);
            if(!$cons){
                throw new Exception("Dados inconsistentes.", 1);
            }
            $a = mysqli_commit($conexao);
            if(!$a) 
                throw new Exception("Não foi possivel efetivar o cadastro, problema com o banco. Consulte Administrador", 1);
            else
                $_SESSION['msg'] = $nome." cadastrado com sucesso.";    
        }catch (Exception $e) {
            mysqli_rollback($conexao);
            $_SESSION['msg'] = $e->getMessage();
        }
        mysqli_autocommit($conexao, TRUE);
    }

    if(isset($_POST['cadg'])){
        $nome = $_POST['nome'];
        $busca = "SELECT * FROM grupo WHERE nome = '$nome'";
        $cons = mysqli_query($conexao ,$busca);
        while($res = mysqli_fetch_array($cons)){
            if($res['nome']== $nome){
                $_SESSION['msg']="O Grupo ".$nome." já existe.";
                break;
            }
        }
        if($res['nome']!= $nome){
            $sql = "INSERT INTO grupo(`nome`) VALUES ('$nome')";
            $cons = mysqli_query($conexao ,$sql);
            if(!$cons)
                $_SESSION['msg']="O Grupo ".$nome.' não pode ser cadastrado.<br/> <p style="color:red;">Erro: '.mysqli_error($conexao).'</p>';
            else
                $_SESSION['msg']="O Grupo ".$nome." foi cadastrado com sucesso.";

            $sql = "UPDATE grupo SET codg=codg  WHERE nome= '$nome'";
            $cons = mysqli_query($conexao ,$sql);
        }
    }

    if(isset($_POST['cadlocal'])){
        $nome = $_POST['nome'];

        $busca = "SELECT * FROM local WHERE nome = '$nome'";
        $cons = mysqli_query($conexao ,$busca);
        while($res = mysqli_fetch_array($cons)){
            if($res['nome']== $nome){
                $_SESSION['msg']="O Local ".$nome." já existe.";
                break;
            }
        }
        if($res['nome']!= $nome){
            $sql = "INSERT INTO local(`nome`) VALUES ('$nome')";
            $cons = mysqli_query($conexao ,$sql);
            if(!$cons)
                $_SESSION['msg']="O Local ".$nome.' não pode ser cadastrado.<br/> <p style="color:red;">Erro: '.mysqli_error($conexao).'</p>';
            else
                $_SESSION['msg']="O Local ".$nome." foi cadastrado com sucesso.";
        }
    }

    if(isset($_POST['cadforn'])){
        $razao = $_POST['razao'];
        $nomef = $_POST['nomef'];
        $cnpj = $_POST['cnpj'];
        $insc_estadual = $_POST['insc_estadual'];

        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];
        $uf = $_POST['uf'];
        $cidade = $_POST['cidade'];

        $fone = $_POST['fone'];
        $nome = $_POST['nome'];


        $sql = "INSERT INTO endereco(`rua`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `uf`) VALUES ('$rua', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$uf')";
        $cons = mysqli_query($conexao ,$sql);
            
        $sql = "INSERT INTO cliente (`cnpj`,`razao_social`,`nome_fantasia`,`insc_estadual`) VALUES ('$cnpj','$razao', '$nomef', '$insc_estadual')";
        $cons = mysqli_query($conexao ,$sql);
        
        if(!$cons)
            $_SESSION['msg']="O Local ".$nome.' não pode ser cadastrado.<br/> <p style="color:red;">Erro: '.mysqli_error($conexao).'</p>';
        else
            $_SESSION['msg']="O Local ".$nome." foi cadastrado com sucesso.";


         $sql = "SELECT * FROM cliente WHERE `cnpj` = '$cnpj'";
        $cons = mysqli_query($conexao ,$sql);
        $cons = mysqli_fetch_array($cons);
        $cons = $cons['id_cliente'];
       
        $sql = "INSERT INTO telefone(`numero_fone`, `id_cliente`, `nome`) VALUES ('$fone', $cons, '$nome')";
        $cons = mysqli_query($conexao ,$sql);

    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulário Cadastro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript">
            function opera(){
                if(<?php if(isset($_GET['cadp'])) echo '1';else echo '0';?>){
                    document.getElementById('cadp').style.display='block';
                    document.getElementById('cadf').style.display='none';
                }else if(<?php if(isset($_GET['cadf'])) echo '1';else echo '0';?>){
                    document.getElementById('cadf').style.display='block';
                    document.getElementById('cadp').style.display='none';
                }
            }
            function showalarm() {
                document.getElementById("alarme").style.display="block;";
            }
            function formatar(mascara, documento){
              var i = documento.value.length;
              var saida = mascara.substring(0,1);
              var texto = mascara.substring(i)
              
              if (texto.substring(0,1) != saida){
                        documento.value += texto.substring(0,1);
              }
            }
        </script>
    </head>

    <body onload="opera();">
        <div class="container">
            <?php require_once ("menu-principal.php"); ?>
            <div id="cadf" class="col-sm-12">
                <h3><b>Cadastro de Cliente</b></h3>
                <form action="cliente.php?cadf=1" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <input type="text" name="razao" class="form-control" required="required" placeholder="Razão Social">
                            <input type="text" name="nomef" placeholder="Nome Fantasia" class="form-control">
                            <input type="text" name="cnpj" class="form-control" placeholder="CNPJ" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)"/>
                            <input type="text" name="insc_estadual" class="form-control" placeholder="Inscrição Estadual"/>
                            <br />
                            <input type="text" name="rua" placeholder="Rua" class="form-control">
                            <input type="text" name="numero" placeholder="Número" class="form-control">
                            <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                            <input type="text" name="cep" class="form-control" placeholder="CEP">
                            <input type="text" name="uf" placeholder="UF" class="form-control" required="required">
                            <input type="text" name="cidade" placeholder="cidade" class="form-control">
                            <br />
                            <input type="text" name="nome" placeholder="Contato" class="form-control" >
                            <input type="text" name="fone" class="form-control" name="fone" maxlength="13" placeholder="Telefone" OnKeyPress="formatar('## #####-####', this)">
                            

                        </div>
                    </div>
                    <input type="submit" name="cadforn" value="Cadastrar" class="btn btn-primary">
                </form>
            </div>


            <?php
            
                if(isset($_SESSION['msg'])){
                    $mensagem = substr($_SESSION['msg'], -8);
                    if (strcmp($mensagem, "sucesso.") == 0) {
                        echo '<div class="alert alert-success">' . $_SESSION['msg'] . '</div>';
                    } else {
                        echo '<div class="alert alert-danger">' . $_SESSION['msg'] . '</div>';
                    }
                    unset($_SESSION['msg']);
                }
            ?>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
