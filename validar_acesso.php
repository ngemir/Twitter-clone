<?php 

	session_start(); //Inicia a sessão

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$objDb = new db();

	$link = $objDb->conecta_mysql();

	$sql = "SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

	$resultado_id = mysqli_query($link, $sql);

	//update true/false
	//insert true/false
	//select false/resource
	//delete true/false

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id); //exibe apenas a primeira ocorrencia da consulta
	
		if (isset($dados_usuario['usuario'])) {

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		
		} else {
			header('Location: index.php?erro=1'); //Força o redirecionamento
		}
	}else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site.';
	}
	
?>