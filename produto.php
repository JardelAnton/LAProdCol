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

			<div id="cadp" class="col-sm-12">
				<h3><b>Cadastro de Produto</b></h3>
				<form action="produto.php?cadp=<?php echo $_GET['cadp']; ?>" method="post" class="form-horizontal">
					<div class="form-group row">
						<div class="col-xs-3">
							<input type="text" name="nome" class="form-control" required="required" placeholder="Nome do Produto">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-3">
					    	<input type="number" class="form-control" name="price"  step="0.01" placeholder="Preço 00.01" />
						</div>
				  	</div>
					<div class="form-group">
						<div class="col-xs-3">
					    	<textarea name="descricao" class="form-control"  placeholder="Descrição detalhada do produto."></textarea> 
						</div>
				  	</div>
					<input type="submit" name="cadprod" value="Cadastrar" class="btn btn-primary">
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
