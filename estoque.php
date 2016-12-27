<?php
    require ("connect.php");


    if(isset($_POST['entrega'])){
        $nfe =$_POST['nnfe'];
        $data=$_POST['data'];
        $hora=$_POST['hora'];
        $sql ="INSERT INTO entrega VALUES ('$nfe','$data', '$hora')";
        $res = mysqli_query($conexao,$sql);
        if($res){
            echo'<script>alert("Registrado");</script>';
        }
    }

    if(isset($_POST['estocar'])){
        $nfe =$_POST['produto'];
        $data=$_POST['data'];
        $hora=$_POST['hora'];
        $qtd =$_POST['qtd'];
        $uni =$_POST['unidade'];

        $sql ="INSERT INTO estoque ('produto','data', 'hora','qtd', 'unidade')VALUES ('$produto','$data', '$hora','$qtd', '$unidade')";
        $res = mysqli_query($conexao,$sql);
        if($res){
            echo'<script>alert("Registrado");</script>';
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

</head>

<body>

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
    <div class="container">

        <!-- Marketing Icons Section -->
    <table>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estoque</h1>
            </div>
            <td>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Saída de Produtos</h4>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <p>Número da Nota Fiscal Eletronica:</p>
                            <select name="nnfe">
                                <option>Selecione:</option>
                                    <?php 
                                        $sql = "SELECT * FROM compra WHERE status = 0";
                                        $res = mysqli_query($conexao,$sql);
                                        while($tupla = mysqli_fetch_assoc($res)){
                                            echo'<option value="'.$tupla['codc'].'"">'.$tupla['codc'].'</option>';
                                        }
                                    ?>
                            </select>
                        <br/>
                        Data: <input type="Date" name ="data" value=<?php echo'"'.date("d-m-Y").'"' ;?>/><br/>
                        Hora: <input type="Time" name ="hora" value=<?php echo'"'.date("h:i").'"' ;?>/><br/>
                        <input type="submit" name="entrega" value="Registrar">
						</form>                        

                    </div>
                </div>
            </div>
            </td>
            <td>
           <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i>Registrar entrada de processados</h4>
                    </div>
                     <div class="panel-body">
                     <form>
                        <p>Produto:</p>
                            <select name="produto">
                                <option>Selecione:</option>
                                    <?php 
                                        $sql = "SELECT * FROM produto";
                                        $res = mysqli_query($conexao,$sql);
                                        while($tupla = mysqli_fetch_assoc($res)){
                                            echo'<option value="'.$tupla['codp'].'"">'.$tupla['embalagem'].$tupla['valor'].'</option>';
                                        }
                                    ?>
                            </select>
                            <br/>
                        Data: <input type="Date" name="data" value=<?php echo'"'.date("d-m-Y").'"' ;?>/><br/>
                        Hora: <input type="time" name="hora" value=<?php echo'"'.date("h:i").'"' ;?>/><br/>
						Quantidade :<input name="qtd" type="Number"placeholder="0.00"/></br/>
                        Kg<input name="unidade" type="Radio"/> Volumes<input name="unidade" type="Radio"/></br/>	</br/>
			                      
                        <input type="submit" name="estocar" value="Registrar">
                        </form>

                    </div>
                </div>
            </div>
            </td>
		</div>
        <!-- /.row -->
    </table>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
