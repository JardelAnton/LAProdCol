
<?php
    require('connect.php');
    //definindo o que vai ser realizado na pagina dos clientes
    $op;
    if(isset($_GET['op'])){
        if($_GET['op'] == "insert"){
            $op = 1;
        }else if($_GET['op'] == "update"){
            $op = 2;
        }else if($_GET['op'] == "delete"){
            $op = 3;
        }else if($_GET['op'] == "pay"){
            $op = 4;
        }

    }

    //Registrando o cadastro de um novo cliente
    if(isset($_POST['register'])){
        if(isset($_POST['cnpj'])){
            $cnpj = $_POST['cnpj'];
            $nome = $_POST['nome'];
            $cli = "INSERT INTO cliente(cnpj,nome)VALUES('$cnpj','$nome')";
            $a = mysqli_query($conexao,$cli);
            if(!$a){
               $_SESSION['error']= "Ocorreu um erro durante a inserção do cliente no banco de dados";
            }
        }
        if(isset($_POST['uf'])){
            $id = $_POST['cnpj'];
            $sql = "SELECT * FROM cliente WHERE cnpj = '$id'";
            $res = mysqli_query($conexao,$sql);
            while($sql = mysqli_fetch_assoc($res)){
                $identifica=$sql['codcli'];
                echo $identifica;
            }

            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $logra = $_POST['logradouro'];            
            $ender = "INSERT INTO endereco(identifica, uf,cidade, cep, bairro, logradouro)VALUES('$identifica', '$uf','$cidade', '$cep', '$bairro','$logra')";            

            $b = mysqli_query($conexao,$ender);
            if(!$b){
                $_SESSION['error']="Ocorreu um erro durante a inserção do endereço no banco de dados";
            }
        }
        if(isset($_POST['contact_name'])){
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $contact = $_POST['contact_name'];
            $phone = "INSERT INTO telefone(numero,identifica)VALUES('$phone','$nome')";
            $pessoa = "INSERT INTO pessoa (nome,email)VALUES('$contact','$email')";
            $c = mysqli_query($conexao,$pessoa);     
            $d = mysqli_query($conexao,$phone);
        }
    }

    //Atualizando o cadastro de um cliente
    if(isset($_POST['update'])){
        if(isset($_POST['cnpj'])){
            $cnpj = $_POST['cnpj'];
            $nome = $_POST['noneme'];
            $codc = $_POST['codc'];
            $cli = "UPDATE cliente SET cnpj='$cnpj',nome='$nome' WHERE codcli ='$codc'";
            $a = mysqli_query($conexao,$cli);
            if(!$a){
               $_SESSION['error']= "Ocorreu um erro durante a atualização do cliente no banco de dados";
            }
        }
        if(isset($_POST['uf'])){
            $id = $_POST['cnpj'];
            $sql = "SELECT * FROM cliente WHERE cnpj = '$id'";
            $res = mysqli_query($conexao,$sql);
            $sql = mysqli_fetch_assoc($res);
            
            $identifica=$sql['codcli'];

            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $logra = $_POST['logradouro'];   

            $ender = "UPDATE endereco SET uf='$uf',cidade='$cidade', cep='$cep', bairro = '$bairro', logradouro ='$logra' WHERE identifica ='$identifica'";            

            $b = mysqli_query($conexao,$ender);
            if(!$b){
                $_SESSION['error']="Ocorreu um erro durante a atualização do endereço no banco de dados";
            }
        }
    }


    //excluindo o cadastro de um cliente
    if(isset($_POST['delete']) && isset($_POST['empresa'])){        
        $names = $_POST['empresa'];
        $sql = "DELETE FROM cliente WHERE id='$names'";
        $res = mysqli_query($conexao,$sql);
        if($res){
            echo"Excluido";
        }

    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Eventos</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
        <script type="text/javascript">
            function load(){
                var op = <?php echo '"'.$_GET['op'].'"';?>;
                if( op == "insert"){
                    document.getElementById("insert").style.display="block";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="none";
                    document.getElementById("payreg").style.display="none";
                }else if(op == "update"){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="block";
                    document.getElementById("delete").style.display="none";
                    document.getElementById("payreg").style.display="none";
                }else if(op =="delete"){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="block";
                    document.getElementById("payreg").style.display="none";
                }else if(op == "payreg"){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="none";
                    document.getElementById("payreg").style.display="block";
                }
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
    <body onload="load()">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">L.A Produtos Coloniais</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container" id="insert">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar Clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="" id="register">
                                    <input id="jur" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" placeholder="CNPJ" required/>
                                    <br/>
                                    <input type="text" name="nome" placeholder="Nome ou Razão Social" required>
                                    <br/>
                                    <br/>
                                    <input type="text" name="uf" placeholder="UF" size="2" required>
                                    <br/>
                                    <input type="text" name="cidade" placeholder="Cidade" required>
                                    <br/>
                                    <input type="text" name="cep" placeholder="CEP" maxlength="9" OnKeyPress="formatar('#####-###', this)" required>
                                    <br/>
                                    <input type="text" name="bairro" placeholder="Bairro" required>
                                    <br/>
                                    <input type="text" name="logradouro" placeholder="Logradouro" required>
                                    <br/>
                                    <br/>
                                    <input type="text" name="contact_name" placeholder="Nome do Representante" required>
                                    <br/>
                                    <input type="text" name="email" placeholder="Email" required>
                                    <br/>
                                    <input type="text" name="phone" placeholder="Telefone" maxlength="14" OnKeyPress="formatar('##-####-#####', this)" required>     
                                <br/><br/>
                                <input type="submit" name="register" value="Cadastrar" />
                            </form>

                            <form method="post" action="" id="addcontact">
                                Empresa:
                                <select name="empresa">
                                    <option>Selecione:</option>
                                    <?
                                        $sql = "SELECT * FROM cliente";
                                        $res = mysqli_query($conexao,$sql);
                                        while($tupla = mysqli_fetch_assoc($res)){
                                            echo'<option value="'.$tupla['codcli'].'"">'.$tupla['nome'].'</option>';
                                        }
                                    ?>
                                </select><br/>
                                <input type="text" name="contact_name" placeholder="Nome do Representante" required>
                                <br/>
                                <input type="text" name="email" placeholder="Email" required>
                                <br/>
                                <input type="text" name="phone" placeholder="Telefone" maxlength="14" OnKeyPress="formatar('##-####-#####', this)" required/>
                                <input type="submit" name="select" value="Registrar" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="update">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atualizar Clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="cliente.php?op=update" id="fregister">
                              <select name="empresa">
                                <option>Selecione:</option>
                                <?
                                    $sql = "SELECT * FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value='.$tupla['codcli'].'>'.$tupla['nome'].'</option>';
                                    }
                                ?>
                            </select>
                                <input type="submit" name="select" value="Selecionar" />
                            </form>
                            <?php
                            if(isset($_POST['select']) && isset($_POST['empresa'])){
                            echo'
                            <script type="text/javascript">
                                document.getElementById("fregister").style.display="block";
                            </script>';
                                $names=$_POST['empresa'];
                                $sql = "SELECT * FROM cliente c join endereco e WHERE e.identifica=c.codcli and c.codcli = '$names'";
                                $res = mysqli_query($conexao,$sql);
                                while($tupla = mysqli_fetch_assoc($res)){
                                    echo'
                                        <form action="" method="post">
                                        <input name="codc" value = "'.$tupla['codcli'].'" size = 1 readonly/><br/> Cpf/cnpj:                                        
                                        ';?>
                                        <input id="jur1" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" value=<?php echo'"'.$tupla['cnpj'].'"/>';
                                        echo '</br/>
                                            Nome:<input type="text" name="nome" value="'.$tupla['nome'].'"><br/>
                                            Endereço:<br/>
                                            UF:<input type="text" name="uf" value="'.$tupla['uf'].'" size="2" required>
                                            <br/>
                                            Cidade:<input type="text" name="cidade" value="'.$tupla['cidade'].'" required>
                                            <br/>
                                        
                                        CEP:<input type="text" name="cep" value="'.$tupla['cep'].'" ';?>maxlength="9" OnKeyPress="formatar('#####-###', this)" required>
                                        <?php echo'
                                        <br/>
                                        Bairro:<input type="text" name="bairro" value="'.$tupla['bairro'].'" required>
                                        <br/>
                                        Logradouro:<input type="text" name="logradouro" value="'.$tupla['logradouro'].'" required>
                                        <br/>
                                            <input type="submit" name="update" value="Atualizar"/>
                                        </form>
                                    ';
                              }  
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="delete">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Deletar Clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                       <form method="post" action="" id="delete">
                              <select name="empresa">
                                <option>Selecione:</option>
                                <?php
                                    $sql = "SELECT * FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['id'].'"">'.$tupla['nome'].'</option>';
                                    }
                                ?>
                            </select>
                            <input type="submit" name="delete" value="Deletar"/>
                        <form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" id="payreg">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registrar pagamento de clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                       <form method="post" action="" id="payment">
                              <select name="empresa">
                                <option>Selecione:</option>
                                <?php 
                                    $sql = "SELECT name FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['name'].'"">'.$tupla['name'].'</option>';
                                    }
                                ?>
                            </select>
                            <input type="submit" name="selecinar" value="selecinar"/>
                        <form>
                        <?php 
                            if(isset($_POST['selecinar']) && isset($_POST['empresa'])){
                                echo'
                                <script type="text/javascript">
                                    document.getElementById("payment").style.display="none";
                                </script>';
                                $names=$_POST['empresa'];
                                $sql = "SELECT * FROM compra WHERE name = '$names' AND status=0";
                                $res = mysqli_query($conexao,$sql);
                                while($tupla = mysqli_fetch_assoc($res)){
                                    echo'
                                        <form action="" method="post">
                                        <input name=codc value = "'.$tupla['codc'].'" size = 1 readonly/><br/> Cpf/cnpj:                                        
                                        ';?>
                                        <?php if(strlen($tupla['cnpj'])==14){?>
                                        <input id="fis1" type="text" name="cnpj" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value=<?php echo'"'.$tupla['cnpj'].'"/>';}else{?>

                                        <input id="jur1" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" value=<?php echo'"'.$tupla['cnpj'].'"/>';}
                                        echo '</br/>
                                            Nome:<input type="text" name="name" value="'.$tupla['name'].'"><br/>
                                            Endereço:<input type="text" name="address" value="'.$tupla['address'].'"><br/>
                                            Email:<input type="text" name="email" value="'.$tupla['email'].'"><br/>
                                            Telefone:<input type="text" name="phone" value="'.$tupla['phones'].'"><br/>
                                    Contato:<input type="text" name="contact_name" value="'.$tupla['contact_name'].'"><br/><br/>
                                            <input type="submit" name="update" value="Atualizar">
                                        </form>
                                    ';
                                }
                            }
                        ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>