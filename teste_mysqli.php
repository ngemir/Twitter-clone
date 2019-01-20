<?php 

	require_once('db.class.php');

	$sql = "SELECT * FROM usuarios";

	$objDb = new db();

	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	//update true/false
	//insert true/false
	//select false/resource
	//delete true/false

	if($resultado_id){
		/* Retorna indice numerica 
		$dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_NUM);
		*/
		/* retorna indice associativa, tem o BOTH que mostra os dois
		$dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		*/
		$dados_usuario = array();

		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$dados_usuario[] = $linha; //associa a indice dinamico
		}

		foreach ($dados_usuario as $usuario) {
			echo $usuario['email'];
			echo "<br><br>";
		}
	
	}else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site.';
	}
	
?>