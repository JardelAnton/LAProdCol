<? 
	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');

	$host ='localhost';
	$bd = 'lairton';
	$user = 'root';
	$pass = '';

	$conexao = mysqli_connect($host,$user,$pass) or die(mysql_error());
	mysqli_select_db($conexao,$bd);
	//mysqli_autocommit($conexao, False);
?>
