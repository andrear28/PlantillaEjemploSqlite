<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearlogs();
		}else if ($accion == 'ver'){
			verlogs();
		}else if ($accion == 'update'){
			updatelogs();
		}else if ($accion == 'delete'){
			deletelogs();
		}

	}

	function crearlogs(){
		/* Proteccion de Datos */
		$params = array(
			':Utc ' => $_POST['Utc'],
			':Anio ' => $_POST['Anio'],
			':Mes ' => $_POST['Mes'],
			':Dia ' => $_POST['Dia'],
			':Hora ' => $_POST['Hora'],
			':Minuto ' => $_POST['Minuto'],
			':Segundo ' => $_POST['Segundo'],
			':Ip ' => $_POST['Ip'],
			':Navegador ' => $_POST['Navegador'],
			':Usuario ' => $_POST['Usuario'],
			':Operacion ' => $_POST['Operacion']
			
		);


		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO logs 
					(Utc,Anio,Mes,Dia,Hora,Minuto,Segundo,Ip,Navegador,Usuario,Operacion) 
				VALUES 
					(:Utc,:Anio,:Mes,:Dia,:Hora,:Minuto,:Segundo,:Ip,:Navegador,:Usuario,:Operacion)';
		
		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location:viewLogs.php?result=true');
		}else{
			header('Location:addLogs.php?result=false');
		}
	}

	function verlogs(){
		$query = "SELECT * FROM logs";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				echo "<tr>";
				//echo "    <td>".$value['idpost']."</td>";
				echo "    <td>".$value['Utc']."</td>";
				echo "    <td>".$value['Anio']."</td>";
				echo "    <td>".$value['Mes']."</td>";
				echo "    <td>".$value['Dia']."</td>";
				echo "    <td>".$value['Hora']."</td>";
				echo "    <td>".$value['Minuto']."</td>";
				echo "    <td>".$value['Segundo']."</td>";
				echo "    <td>".$value['Ip']."</td>";
				echo "    <td>".$value['Navegador']."</td>";
				echo "    <td>".$value['Usuario']."</td>";
				echo "    <td>".$value['Operacion']."</td>";
				
				
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getlogs($id){
		$query = "SELECT * FROM logs WHERE idlogs = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updatelogs(){

		/* Proteccion de Datos */
		$params = array(
			':idlog' => $_SESSION['idlog'],
			':Utc' => $_POST['Utc'],
			':Anio' => $_POST['Anio'],
			':Mes' => $_POST['Mes'],
			':Dia' => $_POST['Dia'],
			':Hora' => $_POST['Hora'],
			':Minuto' => $_POST['Minuto'],
			':Segundo' => $_POST['Segundo'],
			':Ip' => $_POST['Ip'],
			':Navegador' => $_POST['Ip'],
			':Usuario' => $_POST['Usuario'],
			':Operacion' => $_POST['Operacion']
		
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE logs SET
					Utc = :Utc,
					Anio = :Anio,
					Mes = :Mes,
					Dia = :Dia,
					Hora = :Hora,
					Minuto = :Minuto,
					Segundo = :Segundo,
					Ip = :Ip,
					SubTitulo = :SubTitulo,
					Navegador = :Navegador,
					Usuario = :Usuario,
					Operacion = :Operacion

				 WHERE idlogs = :idlog;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idlog']);
			$_SESSION['idlog'] = NULL;
			header('Location:viewLogs.php?result=true');
		}else{
			header('Location:editLogs.php?result=false');
		}
	}

	function deletelogs(){

		$idlog = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM logs
				 WHERE idpost = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location:viewLogs.php?result=true');
		}else{
			header('Location:viewLogs.php?result=false');
		}
	}

?>