<?php
	namespace controle{
		include 'processaAcesso.php';
		
		$controle = new ProcessaAcesso;
		if(@$_POST['enviar']){
			$login = $_POST['login'];
			$senha = md5 ($_POST['senha'];
			$usuario = $controle->verificaAcesso($login, $senha);
			
			if($usuario[0]['id_tipo_acesso'] == 1){
				header("Location: pagina1.html");
			}else if($usuario[0]['id_tipo_acesso'] == 2){
				header("Location: pagina2.html");
			}else{
				header("Location: pagina3.html");
		}else if($_POST['cadastrar']){
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$tipo_usuario = $_POST['tipo_usuario'];
			$arr = array('login_usuario' => $login, 'senha_usuario' => $senha, 'id_tipo_acesso' => $tipo_usuario);
			if(!$controle->cadastraUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$tipo_acesso = $controle->verificaAcesso($login, $senha);
				if($tipo_acesso[0]['id_tipo_acesso'] == 1){
					header("Location: pagina1.html");
				}else if($tipo_acesso{
					header("Location: pagina2.html");
				}
			}
		}
	}
?>
