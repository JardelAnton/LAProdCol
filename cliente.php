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
                                    if(mysql_query($sql)){
                                        echo' <script>alert("Cadastrado");</script>';
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
                                    $name = $_POST['name'];
                                    $address = $_POST['address'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $contact = $_POST['contact_name'];
                                    $sql = "INSERT INTO cliente(cnpj,name,address,email,phones,contact_name) VALUES ('$cnpj','$name','$address','$email','$phone','$contact ')";
                                    if(mysql_query($sql)){
                                        echo' <script>alert("Cadastrado");</script>';
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
    if(isset($_POST['delete'])){        
        echo "deleta";
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
        </script>
        <?  
            if(isset($_POST['deletar'])){
                $r = rand(10000,2);
                echo '
                    <script type="text/javascript">
                        var r = prompt("Confirme a exclusao digitando o numero: '.$r.'");
                        if('.$r.'==r){';
                                $a='ola';
                                echo'Saindo do monstro a jaula';
                                $a=$_POST['cliente'];
                                echo $a;
                                $sql = "DELETE FROM cliente WHERE codc = $a";
                                mysql_query($sql);
                                echo'alert("Cliente excluido.");}
                        else{';
                            $a=0;
                            echo'alert("Os numeros nao conferem.");
                        }
                    </script>
                ';
                if($a=='ola'){
                    
                }else
                    echo"que diabo";
            }
        ?>

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
                    <a class="navbar-brand" href="index.html">L.A Produtos Coloniais</a>
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
                                <input id="fis" type="text" name="cnpj" placeholder=<? if(isset($_POST['cnpj'])) echo '"'.$_POST['cnpj'].'"'; else echo'"CPF / CNPJ"'; ?>/></br/>
                                <input type="text" name="name" placeholder=<? if(isset($_POST['name'])) echo '"'.$_POST['name'].'"'; else echo'"Nome"'; ?>/></br/>                          
                                <input type="text" name="address" placeholder=<? if(isset($_POST['address'])) echo '"'.$_POST['address'].'"'; else echo'"Endereço"'; ?>/></br/>
                                <input type="text" name="email" placeholder=<? if(isset($_POST['email'])) echo '"'.$_POST['email'].'"'; else echo'"E-mail"'; ?>/></br/>
                                <input type="text" name="phone" placeholder=<? if(isset($_POST['phone'])) echo '"'.$_POST['phone'].'"'; else echo'"Telefone"'; ?>/></br/>
                                <input type="text" name="contact_name" placeholder=<? if(isset($_POST['contact_name'])) echo '"'.$_POST['contact_name'].'"'; else echo'"Nome de contato"'; ?>/></br/>
                                <input type="submit" name="register" value="Cadastrar" />
                            </form>
                            <script type="text/javascript">
                                function teste1(){
                                    document.getElementById("jur").style.display="none";
                                    document.getElementById("fis").style.display="block";
                                }
                                function teste2(){
                                    document.getElementById("fis").style.display="none";
                                    document.getElementById("jur").style.display="block";
                                }

                            </script>
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
                            <form method="post" action="" id="register">
                                Pessoa: <input type="radio" name="tp_person" value="Fisica" <? if(isset($_POST['cpf'])) echo 'cheked'; ?> onClick="teste1();" >Física
                                <input type="radio" name="tp_person" value="Juridica" onClick="teste2();" <? if(isset($_POST['cnpj'])) echo 'cheked'; ?>>Jurídica</br/>
                                <input id="jur" type="text" name="cnpj" placeholder=<? if(isset($_POST['cnpj'])) echo '"'.$_POST['cnpj'].'"'; else echo'"CNPJ"'; ?>/></br/>
                                <input id="fis" type="text" name="cnpj" placeholder=<? if(isset($_POST['cpf'])) echo '"'.$_POST['cpf'].'"'; else echo'"CPF"'; ?>/></br/>
                                <input type="text" name="name" placeholder=<? if(isset($_POST['name'])) echo '"'.$_POST['name'].'"'; else echo'"Nome"'; ?>/></br/>                          
                                <input type="text" name="address" placeholder=<? if(isset($_POST['address'])) echo '"'.$_POST['address'].'"'; else echo'"Endereço"'; ?>/></br/>
                                <input type="text" name="email" placeholder=<? if(isset($_POST['email'])) echo '"'.$_POST['email'].'"'; else echo'"E-mail"'; ?>/></br/>
                                <input type="text" name="phone" placeholder=<? if(isset($_POST['phone'])) echo '"'.$_POST['phone'].'"'; else echo'"Telefone"'; ?>/></br/>
                                <input type="text" name="contact_name" placeholder=<? if(isset($_POST['contact_name'])) echo '"'.$_POST['contact_name'].'"'; else echo'"Nome de contato"'; ?>/></br/>
                                <input type="submit" name="update" value="Atualizar" />
                            </form>
                            <script type="text/javascript">
                                function teste1(){
                                    document.getElementById("jur").style.display="none";
                                    document.getElementById("fis").style.display="block";
                                }
                                function teste2(){
                                    document.getElementById("fis").style.display="none";
                                    document.getElementById("jur").style.display="block";
                                }

                            </script>
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
                        <form action="" method="POST">
                            <select name="cliente" id="idcli">
                                <option>Selecione:</option>
                            <? 
                                $sql = "SELECT * FROM cliente";
                                $res = mysql_query($sql);
                                while($tupla = mysql_fetch_array($res)){
                                    echo "<option id='legal' value = ".$cli.$tupla['codc'].">";
                                    echo $tupla['name'];
                                    echo "</option>";
                                }

                            ?>
                            </select>
                            <input type="submit" name="deletar" value="Deletar"/>
                        <form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>