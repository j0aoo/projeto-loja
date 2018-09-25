<?php 
	
	define('Host', 'localhost');
	define('User', 'root');
	define('Pass', '');
	define('BD', 'p_loja');

	$conexao = mysqli_connect(Host, User, Pass, BD);

	define('Charset', 'utf8');

	mysqli_set_charset($conexao, Charset);

?>