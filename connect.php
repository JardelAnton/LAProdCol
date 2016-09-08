<? 
	$host ='localhost';
	$bd = 'LAprodcol';
	$user = 'root';
	$pass = '';

	$link = mysqli_connect($host,$user,$pass) or die(mysql_error());
	mysqli_select_db($link,$bd);
?>
