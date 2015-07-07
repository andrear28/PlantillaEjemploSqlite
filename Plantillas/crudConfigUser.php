<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearConfigUsuario();
		}else if ($accion == 'ver'){
			verConfiguracionUsuarios();
		}else if ($accion == 'update'){
			updateUser();
		}else if ($accion == 'delete'){
			deleteConfigUser();
		}

	}

	function crearConfigUsuario(){
		/* Proteccion de Datos */
		$params = array(
			':Usuario' => $_POST['Usuario'],
			':Piel' => $_POST['Piel'],
			':Respuestas' => $_POST['Respuestas']
		);

		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO ConfigUsuarios 
					(Usuario, Piel, Respuestas) 
				VALUES 
					(:Usuario,:Piel,:Respuestas)';

		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location: viewConfigUser.php?result=true');
		}else{
			header('Location: addConfigUser.php?result=false');
		}
	}

	function verConfiguracionUsuarios(){
		$query = "SELECT * FROM ConfigUsuarios";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				echo "    <td>".$value['idconfigUsuarios']."</td>";
				echo "    <td>".$value['Usuario']."</td>";
				echo "    <td>".$value['Piel']."</td>";
				echo "    <td>".$value['Respuestas']."</td>";

				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getUser($id){
		$query = "SELECT * FROM ConfigUsuarios WHERE idconfigUsuarios = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updateUser(){

		/* Proteccion de Datos */
		$params = array(
			':idCUser' => $_SESSION['idCUser'],
			':Usuario' => $_POST['Usuario'],
			':Piel' => $_POST['Piel'],
			':Respuestas' => $_POST['Respuestas'],
			
			
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE ConfigUsuarios SET
					Usuario = :Usuario,
					Piel = :Piel,
					Respuestas = :Respuestas
					
				 WHERE idconfigUsuarios = :idCUser;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idUser']);
			$_SESSION['idUser'] = NULL;
			header('Location: viewConfigUser.php?result=true');
		}else{
			header('Location: editConfigUser.php?result=false');
		}
	}

	function deleteConfigUser(){

		$idUser = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM ConfigUsuarios
				 WHERE idconfigUsuarios = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location: viewConfigUser.php?result=true');
		}else{
			header('Location: viewConfigUser.php?result=false');
		}
	}

?>