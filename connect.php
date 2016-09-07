<? 
	$host ='localhost';
	$bd = 'LAprodcol';
	$user = 'root';
	$pass = '';

	$link = mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($bd,$link);
?>
