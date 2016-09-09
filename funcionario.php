<!DOCTYPE html>
<?
    require "connect.php";
        
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

    // cadastrar funcionário
    if(isset($_POST['register'])){
        if(isset($_POST['cpf'])){
            if(strlen($_POST['cpf'])<= 10 ){
                unset($_POST['cpf']);
            }else if(isset($_POST['name'])){
                if(strlen($_POST['name']) == 0){
                    unset($_POST['name']);
                }else if(isset($_POST['nro_cart'])){
                    if(strlen($_POST['nro_cart']) == 0 ){
                        unset($_POST['nro_cart']);
                    }else if(isset($_POST['sal'])){
                        if(strlen($_POST['sal']) == 0 ){
                            unset($_POST['sal']);
                        }else if(isset($_POST['carga_hor'])){
                            if(strlen($_POST['carga_hor']) == 0 ){
                                unset($_POST['carga_hor']);
                            }else{
                                $cpf = $_POST['cpf'];
                                $nome = $_POST['name'];
                                $nro_cart = $_POST['nro_cart'];
                                $carga_hor = $_POST['carga_hor'];
                                $sal = $_POST['sal'];
                                $sql = "INSERT INTO funcionario(cpf,nome,nro_cart,carga_hor,sal) VALUES ('$cpf','$nome','$nro_cart','$carga_hor','sal')";
                                if(mysqli_query($conexao,$sql)){
                                    echo' <script>alert("Cadastrado");</script>';
                                    unset($_POST['cnpj']); 
                                    unset($_POST['contact_name']); 
                                    unset($_POST['phone']);
                                    unset($_POST['address']);
                                    unset($_POST['email']);
                                    unset($_POST['name']);
                                }else{
                                    echo mysqli_error($conexao);
                                    echo'alert("Ocorreu um erro no cadastro :( ");';   
                                }
                            }     
                        }     
                    }
                }
            }
        }
    }

    // atualizar funcionário
    if(isset($_POST['update'])){
        if(isset($_POST['cpf'])){
            if(strlen($_POST['cpf'])<= 10 ){
                unset($_POST['cpf']);
            }else if(isset($_POST['name'])){
                if(strlen($_POST['name']) == 0){
                    unset($_POST['name']);
                }else if(isset($_POST['nro_cart'])){
                    if(strlen($_POST['nro_cart']) == 0 ){
                        unset($_POST['nro_cart']);
                    }else if(isset($_POST['sal'])){
                        if(strlen($_POST['sal']) == 0 ){
                            unset($_POST['sal']);
                        }else if(isset($_POST['carga_hor'])){
                            if(strlen($_POST['carga_hor']) == 0 ){
                                unset($_POST['carga_hor']);
                            }else{
                                $codf=$_POST['codf'];
                                $cpf = $_POST['cpf'];
                                $nome = $_POST['name'];
                                $nro_cart = $_POST['nro_cart'];
                                $carga_hor = $_POST['carga_hor'];
                                $sal = $_POST['sal'];
                                $sql = "UPDATE funcionario SET cpf = '$cpf',nome='$nome' ,nro_cart= '$nro_cart',carga_hor='$carga_hor' ,sal='$sal' WHERE codf='$codf'";
                                if(mysqli_query($conexao,$sql)){
                                    echo' <script>alert("Cadastrado");</script>';
                                    unset($_POST); 
                                }else{
                                    echo mysqli_error($conexao);
                                    echo'alert("Ocorreu um erro no cadastro :( ");';   
                                }
                            }     
                        }     
                    }
                }
            }
        }
    }

    //Excluindo um funcionário
    if(isset($_POST['delete']) && isset($_POST['func'])){        
        $names = $_POST['func'];
        $sql = "DELETE FROM funcionario WHERE codf='$names'";
        $res = mysqli_query($conexao,$sql);
        if($res){
            echo' <script>alert("Excluido");</script>';
        }

    }


?>
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
                var op = <?echo $op;?>;
                if(op == 1){
                    document.getElementById("insert").style.display="block";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="none";
                }else if(op == 2){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="block";
                    document.getElementById("delete").style.display="none";
                }else if(op == 3){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="block";
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
                    <h1 class="page-header">Cadastrar Funcionário</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="" id="register">
                                <input id="fis" type="text" name="cpf" placeholder="CPF" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"/></br/>
                                <input type="text" name="name" placeholder="Nome"/></br/>                          
                                <input type="text" name="nro_cart" placeholder="Numero Carteira de trabalho"/></br/>
                                <input type="text" name="carga_hor" placeholder="Carga Horária"/></br/>
                                <input type="text" name="sal" placeholder="Salário" maxlength="9" OnKeyPress="formatar('####,##', this)"/></br/>

                                <input type="submit" name="register" value="Cadastrar" />
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
                    <h1 class="page-header">Atualizar Funcionário</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="" id="fregister">
                              <select name="func">
                                <option>Selecione:</option>
                                <?
                                    $sql = "SELECT * FROM funcionario";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['codf'].'"">'.$tupla['nome'].'</option>';
                                    }
                                ?>
                            </select>
                                <input type="submit" name="select" value="Selecionar" />
                            </form>
                            <?
                            if(isset($_POST['select']) && isset($_POST['func'])){
                            echo'
                            <script type="text/javascript">
                                document.getElementById("fregister").style.display="none";
                            </script>';
                                $names=$_POST['func'];
                                $sql = "SELECT * FROM funcionario WHERE codf = '$names'";
                                $res = mysqli_query($conexao,$sql);
                                while($tupla = mysqli_fetch_assoc($res)){
                                    echo'
                                        <form action="" method="post">
                                        <input name=codf value = "'.$tupla['codf'].'" size = 1 readonly/><br/> Cpf:                                        
                                        ';?>
                                        
                                        <input id="fis1" type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value=<? echo'"'.$tupla['cpf'].'"/>
                                        </br/>
                                            Nome:<input type="text" name="name" value="'.$tupla['nome'].'"><br/>
                                            Numero Carteira trab:<input type="text" name="nro_cart" value="'.$tupla['nro_cart'].'"><br/>
                                            Carga Horária:<input type="text" name="carga_hor" value="'.$tupla['carga_hor'].'"><br/>
                                            Salário:<input type="text" name="sal" value="'.$tupla['sal'].'"><br/><br/>
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

        <div class="container" id="delete">

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Deletar Clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <form method="post" action="" id="fregister">
                              <select name="func">
                                <option>Selecione:</option>
                                <?
                                    $sql = "SELECT * FROM funcionario";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['codf'].'"">'.$tupla['nome'].'</option>';
                                    }
                                ?>
                            </select>
                                <input type="submit" name="delete" value="Deletar" />
                            </form>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>