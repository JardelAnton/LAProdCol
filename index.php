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
    	function Clientes(){
    		document.getElementById("Clientes").style.display="block";
    		document.getElementById("Funcionarios").style.display="none";
    		document.getElementById("Estoque").style.display="none";
    	}
    	function Funcionarios(){
    		document.getElementById("Funcionarios").style.display="block";
    		document.getElementById("Estoque").style.display="none";
    		document.getElementById("Clientes").style.display="none";
    	}
    	function Estoque(){
    		document.getElementById("Estoque").style.display="block";
    		document.getElementById("Funcionarios").style.display="none";
    		document.getElementById("Clientes").style.display="none";
    	}
    </script>    
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
    <button class="navbar-brand" onClick="Clientes();">Clientes</button>
    <button class="navbar-brand" onClick="Funcionarios();">Funcionarios</button>
    <button class="navbar-brand" onClick="Estoque();">Estoque</button>
    <button class="navbar-brand" onClick="Outro();">Outros</button>


    <!-- Page Content -->
    <div class="container" id="Clientes" style="display:none">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Clientes</h1>
            </div>  
            <div class="col-md-3"><a href="cliente.php?op=pay">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Registrar Pagamento</h4>
                    </div>
                    <div class="panel-body">
                        <p>Adicionar pagamento efetuado por cliente</p>
                    </div>
                </div>
                </a>
            </div>          
            <div class="col-md-3"><a href="cliente.php?op=insert">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Cadastrar</h4>
                    </div>
                    <div class="panel-body">
                        <p><br/>Cadastrar novos clientes</p>
                    </div>
                </div>
                </a>
            </div>
			<div class="col-md-3"><a href="cliente.php?op=update">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Atualizar</h4>
                    </div>
                    <div class="panel-body">
                        <p><br/>Atualizar clientes ja existentes</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3"><a href="cliente.php?op=delete">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Excluir</h4>
                    </div>
                    <div class="panel-body">
                        <p><br/>Excluir cliente</p>
                    </div>
                </div>
            </div></a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


     <!-- Page Content -->
    <div class="container" id="Funcionarios" style="display:none">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Funcionarios</h1>
            </div>  
            <div class="col-md-3" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Registrar Pagamento</h4>
                    </div>
                    <div class="panel-body">
                        <p>Adicionar pagamento efetuado por cliente</p>
                    </div>
                </div>
            </div>          
            <div class="col-md-3"><a href="funcionario.php?op=insert">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Cadastrar</h4>
                    </div>
                    <div class="panel-body">
                        <p>Cadastrar novos funcionarios</p>
                    </div>
                </div>
            </div></a>
			<div class="col-md-3"><a href="funcionario.php?op=update">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Atualizar</h4>
                    </div>
                    <div class="panel-body">
                        <p>Atualizar funcionario ja existentes</p>
                    </div>
                </div>
            </div></a>
            <div class="col-md-3"><a href="funcionario.php?op=delete">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Excluir</h4>
                    </div>
                    <div class="panel-body">
                        <p>Excluir funcionario</p>
                    </div>
                </div>
            </div></a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


     <!-- Page Content -->
    <div class="container" id="Estoque" style="display:none">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estoque</h1>
            </div>  
            <div class="col-md-3"><a href="estoque.php?op=entrega">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Registrar Entrega</h4>
                    </div>
                    <div class="panel-body">
                        <p>Adicionar entrega a cliente</p>
                        <button onClick="delete_cli();">Registrar</button>
                    </div>
                </div>
            </div></a>
            <div class="col-md-3"><a href="estoque.php?op=deposito">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Registrar Deposito</h4>
                    </div>
                    <div class="panel-body">
                        <p>Adicionar deposito no containers</p>
                        <button onClick="insert_cli();">Registrar</button>
                    </div>
                </div>
            </div></a>
			<div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Atualizar</h4>
                    </div>
                    <div class="panel-body">
                        <p>Atualizar clientes ja existentes</p>
                        <button onClick="update_cli();">Atualizar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Excluir</h4>
                    </div>
                    <div class="panel-body">
                        <p>Excluir cliente</p>
                        <button onClick="delete_cli();">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
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
