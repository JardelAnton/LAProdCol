<?php //sessão
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Busca</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<script type="text/javascript">
			function preencheBusca() { // chama o arquivo loads.php para carregar a consulta
				var razsoc = document.getElementById("IdRazSoc").value;
				var nome_fant = document.getElementById("IdNomeFant").value;
				var cnpj = document.getElementById("IdCnpj").value;
				var url = 'loads.php?cnpj=' + cnpj + '&nome_fant='+ nome_fant +'&razsoc=' + razsoc;
				$.get(url, function(dataReturn) {
					$('#idpd').html(dataReturn); // Vai preencher no na div com o idpd
				});
			};
		</script>
	</head>
	<body onload="preencheBusca()">

		<div class="container">

			<?php require_once ("menu-principal.php"); ?>

			<div class="col-sm-12">
				<form name="fsearch" action="" method="POST">
					<div class="form-group row">
							<input id="IdRazSoc" type="search" name="razsoc" class="form-control"
							placeholder="Razão Social" oninput="preencheBusca()">						
							<input id="IdNomeFant" type="search" name="nomefant" class="form-control"
							placeholder="Nome Fantasia" oninput="preencheBusca()">
			    		<input id="IdCnpj" type="search" name="cnpj" class="form-control"
			      		placeholder="CNPJ" oninput="preencheBusca()">
						
					</div>
					<button type="submit" class="hide" disabled></button>
		  		</form>
			</div>

			<table class="table">
				<thead>
					<tr>
						<td><center><b>Razão Social</b></center></td>
						<td><center><b>CNPJ</b></center></td>
						<td><center><b>Atualizar</b></center></td>
						<td><center><b>Ver Pedidos</b></center></td>
						<td><center><b>Novo Pedido</b></center></td>
					</tr>
				</thead>
				<tbody id="idpd"></tbody>
	    </table>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	</body>
</html>
