<?php
	require ("connect.php");

	$cnpj = $_GET['cnpj'];
	$razsoc = $_GET['razsoc'];
	$nome_fant = $_GET['nome_fant'];

	$query = "SELECT id_cliente, razao_social, nome_fantasia, cnpj FROM cliente WHERE cnpj LIKE '%" . $cnpj . "%' AND razao_social LIKE '%" . $razsoc . "%' AND nome_fantasia LIKE '%" . $nome_fant . "%' ORDER BY id_cliente";

	$resultado = query($conexao, $query);
	$num = mysqli_num_rows($resultado);

	if ($num>0) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
 			echo "<td><center>". $row['nome_fantasia'] . "</center></td> <td><center>". $row['cnpj'] . "</center></td> 			
 			<td><center><a class='btn btn-primary' href='atualizar.php?prod=" . $row['id_cliente'] . "' role='button'>" .
			"<span class='glyphicon glyphicon-plus' aria-hidden='true'></span></a></center></td>" .
			"<td><center><a class='btn btn-primary' href='pedidos.php?prod=" . $row['id_cliente'] . "' role='button'>" .
			"<span class='glyphicon glyphicon-minus' aria-hidden='true'></span></a></center></td>" .
			"<td><center><a class='btn btn-primary' href='compra.php?prod=" . $row['id_cliente'] . "' role='button'>" .
			"<span class='glyphicon glyphicon-cog' aria-hidden='true'></span></a></center></td>";
 			echo "</tr>";
		}
	} else {
		echo '<p>Nenhum produto encontrado.</p>';
	}
?>
