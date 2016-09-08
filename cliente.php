<!DOCTYPE html>
<?
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
            if(strlen($_POST['cnpj']) <=10 ){
                unset($_POST['cnpj']);
            }else if(isset($_POST['name'])){
                if(strlen($_POST['name']) == 0){
                    unset($_POST['name']);
                }else if(isset($_POST['email'])){
                    if(strlen($_POST['email']) == 0){
                        unset($_POST['email']);
                    }else if(isset($_POST['address'])){
                        if(strlen($_POST['address']) == 0 ){
                            unset($_POST['address']);
                        }else if(isset($_POST['phone'])){
                            if(strlen($_POST['phone']) == 0 ){
                                unset($_POST['phone']);
                            }else if(isset($_POST['contact_name'] )){
                                if(strlen($_POST['contact_name']) == 0 ){
                                    unset($_POST['contact_name']);
                                }else{
                                    $cnpj = $_POST['cnpj'];
                                    $name = $_POST['name'];
                                    $address = $_POST['address'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $contact = $_POST['contact_name'];
                                    $sql = "INSERT INTO cliente(cnpj,name,address,email,phones,contact_name) VALUES ('$cnpj','$name','$address','$email','$phone','$contact ')";
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
    }

    //Atualizando o cadastro de um cliente
    if(isset($_POST['update'])){
        if(isset($_POST['cnpj'])){
            if(strlen($_POST['cnpj']) <=10 ){
                unset($_POST['cnpj']);
            }else if(isset($_POST['name'])){
                if(strlen($_POST['name']) == 0){
                    unset($_POST['name']);
                }else if(isset($_POST['email'])){
                    if(strlen($_POST['email']) == 0){
                        unset($_POST['email']);
                    }else if(isset($_POST['address'])){
                        if(strlen($_POST['address']) == 0 ){
                            unset($_POST['address']);
                        }else if(isset($_POST['phone'])){
                            if(strlen($_POST['phone']) == 0 ){
                                unset($_POST['phone']);
                            }else if(isset($_POST['contact_name'] )){
                                if(strlen($_POST['contact_name']) == 0 ){
                                    unset($_POST['contact_name']);
                                }else{
                                    $cnpj = $_POST['cnpj'];
                                    $codc = $_POST['codc'];
                                    $name = $_POST['name'];
                                    $address = $_POST['address'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $contact = $_POST['contact_name'];
                                    $sql="UPDATE cliente SET cnpj='$cnpj',name='$name', address='$address', email='$email', phones='$phone', contact_name='$contact' WHERE codc='$codc'";
                                    if(mysqli_query($conexao,$sql)){
                                        echo' <script>alert("Atualizado");</script>';
                                        unset($_POST['cnpj']); 
                                        unset($_POST['contact_name']); 
                                        unset($_POST['phone']);
                                        unset($_POST['address']);
                                        unset($_POST['email']);
                                        unset($_POST['name']);
                                    }else
                                        echo'alert("Ocorreu um erro no cadastro :( ");';   
                                }
                            }
                        }
                    }   
                }
            }
        }
    }



    //Atualizando o cadastro de um cliente
    if(isset($_POST['delete']) && isset($_POST['empresa'])){        
        $names = $_POST['empresa'];
        $sql = "DELETE FROM cliente WHERE name='$names'";
        $res = mysqli_query($conexao,$sql);
        if($res){
            echo"Excluido";
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
                    document.getElementById("payreg").style.display="none";
                }else if(op == 2){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="block";
                    document.getElementById("delete").style.display="none";
                    document.getElementById("payreg").style.display="none";
                }else if(op == 3){
                    document.getElementById("insert").style.display="none";
                    document.getElementById("update").style.display="none";
                    document.getElementById("delete").style.display="block";
                    document.getElementById("payreg").style.display="none";
                }else if(op == 4){
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
            function teste1(){
                document.getElementById("jur").name="nada";
                document.getElementById("fis").name="cnpj";
                document.getElementById("jur").style.display="none";
                document.getElementById("fis").style.display="block";
            }
            function teste2(){
                document.getElementById("fis").name="nada";
                document.getElementById("jur").name="cnpj";
                document.getElementById("fis").style.display="none";
                document.getElementById("jur").style.display="block";
            }
            function teste3(){
                document.getElementById("jur1").name="nada";
                document.getElementById("fis1").name="cnpj";
                document.getElementById("jur1").style.display="none";
                document.getElementById("fis1").style.display="block";
            }
            function teste4(){
                document.getElementById("fis1").name="nada";
                document.getElementById("jur1").name="cnpj";
                document.getElementById("fis1").style.display="none";
                document.getElementById("jur1").style.display="block";
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
                                <input type="radio" name="tppessoa" onchange="teste1()"> CPF
                                <input type="radio" name="tppessoa" onchange="teste2()" checked> CNPJ
                                <br/>
                                <input id="fis" type="text" style="display:none;" name="cnpj" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder=<? if(isset($_POST['cnpj'])) echo '"'.$_POST['cnpj'].'"'; else echo'"CPF"'; ?>/>
                                <input id="jur" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" placeholder=<? if(isset($_POST['cnpj'])) echo '"'.$_POST['cnpj'].'"'; else echo'"CNPJ"'; ?>/></br/>
                                <input type="text" name="name" placeholder=<? if(isset($_POST['name'])) echo '"'.$_POST['name'].'"'; else echo'"Nome"'; ?>/></br/>                          
                                <input type="text" name="address" placeholder=<? if(isset($_POST['address'])) echo '"'.$_POST['address'].'"'; else echo'"Endereço"'; ?>/></br/>
                                <input type="text" name="email" placeholder=<? if(isset($_POST['email'])) echo '"'.$_POST['email'].'"'; else echo'"E-mail"'; ?>/></br/>
                                <input type="text" name="phone" maxlength="13" OnKeyPress="formatar('## ####-#####', this)"placeholder=<? if(isset($_POST['phone'])) echo '"'.$_POST['phone'].'"'; else echo'"Telefone"'; ?>/></br/>
                                <input type="text" name="contact_name" placeholder=<? if(isset($_POST['contact_name'])) echo '"'.$_POST['contact_name'].'"'; else echo'"Nome de contato"'; ?>/></br/>
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
                    <h1 class="page-header">Atualizar Clientes</h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="" id="fregister">
                              <select name="empresa">
                                <option>Selecione:</option>
                                <?
                                    $sql = "SELECT name FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['name'].'"">'.$tupla['name'].'</option>';
                                    }
                                ?>
                            </select>
                                <input type="submit" name="select" value="Selecionar" />
                            </form>
                            <?
                            if(isset($_POST['select']) && isset($_POST['empresa'])){
                            echo'
                            <script type="text/javascript">
                                document.getElementById("fregister").style.display="none";
                            </script>';
                                $names=$_POST['empresa'];
                                $sql = "SELECT * FROM cliente WHERE name = '$names'";
                                $res = mysqli_query($conexao,$sql);
                                while($tupla = mysqli_fetch_assoc($res)){
                                    echo'
                                        <form action="" method="post">
                                        <input name=codc value = "'.$tupla['codc'].'" size = 1 readonly/><br/> Cpf/cnpj:                                        
                                        ';?>
                                        <?if(strlen($tupla['cnpj'])==14){?>
                                        <input id="fis1" type="text" name="cnpj" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value=<? echo'"'.$tupla['cnpj'].'"/>';}else{?>

                                        <input id="jur1" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" value=<? echo'"'.$tupla['cnpj'].'"/>';}
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
                                <?
                                    $sql = "SELECT name FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['name'].'"">'.$tupla['name'].'</option>';
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
                                <?
                                    $sql = "SELECT name FROM cliente";
                                    $res = mysqli_query($conexao,$sql);
                                    while($tupla = mysqli_fetch_assoc($res)){
                                        echo'<option value="'.$tupla['name'].'"">'.$tupla['name'].'</option>';
                                    }
                                ?>
                            </select>
                            <input type="submit" name="selecinar" value="selecinar"/>
                        <form>
                        <?
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
                                        <?if(strlen($tupla['cnpj'])==14){?>
                                        <input id="fis1" type="text" name="cnpj" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value=<? echo'"'.$tupla['cnpj'].'"/>';}else{?>

                                        <input id="jur1" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" value=<? echo'"'.$tupla['cnpj'].'"/>';}
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