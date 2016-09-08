<? 
	$host ='localhost';
	$bd = 'lairton';
	$user = 'root';
	$pass = '';

	$conexao = mysqli_connect($host,$user,$pass) or die(mysql_error());
	mysqli_select_db($conexao,$bd);
//	$conexao->autocommit(false);
?>
