<?php
	session_start();
	require_once("install.php");
	/* REQUEST = $_POST $_GET */
	if (!empty($_REQUEST['action'])){
		$accion = $_REQUEST['action'];
		if($accion == 'crear'){
			crearPost();
		}else if ($accion == 'ver'){
			verpost();
		}else if ($accion == 'update'){
			updatepost();
		}else if ($accion == 'delete'){
			deletepost();
		}

	}

	function crearPost(){
		/* Proteccion de Datos */
		$params = array(
			':Utc ' => $_POST['Utc'],
			':Anio ' => $_POST['Anio'],
			':Mes ' => $_POST['Mes'],
			':Dia ' => $_POST['Dia'],
			':Hora ' => $_POST['Hora'],
			':Minuto ' => $_POST['Minuto'],
			':Segundo ' => $_POST['Segundo'],
			':Titulo ' => $_POST['Titulo'],
			':SubTitulo ' => $_POST['SubTitulo'],
			':Icono ' => $_POST['Icono'],
			':Texto ' => $_POST['Texto'],
			':Imagen ' => $_POST['Imagen']
			
		);


		/* Preparamos el query apartir del array $params*/
		$query = 'INSERT INTO Post 
					(Utc,Anio,Mes,Dia,Hora,Minuto,Segundo,Titulo,SubTitulo,Icono,Texto,Imagen) 
				VALUES 
					(:Utc,:Anio,:Mes,:Dia,:Hora,:Minuto,:Segundo,:Titulo,:SubTitulo,:Icono,:Texto,:Imagen)';
		
		/* Ejecutamos el query con los parametros */
		$result = excuteQuery("Usuarios","", $query, $params);
		if ($result > 0){
			header('Location:viewPost.php?result=true');
		}else{
			header('Location:addPost.php?result=false');
		}
	}

	function verpost(){
		$query = "SELECT * FROM Post";
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
				echo "    <td>".$value['Titulo']."</td>";
				echo "    <td>".$value['SubTitulo']."</td>";
				echo "    <td>".$value['Icono']."</td>";
				echo "    <td>".$value['Texto']."</td>";
				echo "    <td>".$value['Imagen']."</td>";
				
				echo "</tr>";
			}
		}else{
			echo "No se encontraron resultados";
		}
	}

	function getpost($id){
		$query = "SELECT * FROM Post WHERE idpost = '".$id."'";
		$result = newQuery("Usuarios", "", $query);
		if ($result != false || $result > 0){
			foreach ($result as $value) {
				return $value;
			}
		}else{
			return false;
		}
	}

	function updatepost(){

		/* Proteccion de Datos */
		$params = array(
			':idpst' => $_SESSION['idpst'],
			':Utc' => $_POST['Utc'],
			':Anio' => $_POST['Anio'],
			':Mes' => $_POST['Mes'],
			':Dia' => $_POST['Dia'],
			':Hora' => $_POST['Hora'],
			':Minuto' => $_POST['Minuto'],
			':Segundo' => $_POST['Segundo'],
			':Titulo' => $_POST['Titulo'],
			':SubTitulo' => $_POST['SubTitulo'],
			':Icono' => $_POST['Icono'],
			':Texto' => $_POST['Texto'],
			':Imagen' => $_POST['Imagen']
			
		);

		/* Preparamos el query apartir del array $params*/
		$query ='UPDATE Post SET
					Utc = :Utc,
					Anio = :Anio,
					Mes = :Mes,
					Dia = :Dia,
					Hora = :Hora,
					Minuto = :Minuto,
					Segundo = :Segundo,
					Titulo = :Titulo,
					SubTitulo = :SubTitulo,
					Icono = :Icono,
					Texto = :Texto,
					Imagen = :Imagen

				 WHERE idpost = :idpst;
				';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			unset($_SESSION['idpst']);
			$_SESSION['idpst'] = NULL;
			header('Location: viewPost.php?result=true');
		}else{
			header('Location: editPost.php?result=false');
		}
	}

	function deletepost(){

		$idpost = $_GET['id'];

		/* Proteccion de Datos */
		$params = array(
			':id' => $_GET['id'],
		);

		/* Preparamos el query apartir del array $params*/
		$query ='DELETE FROM Post
				 WHERE idpost = :id;';

		$result = excuteQuery("Usuarios", "", $query, $params);
		if ($result > 0){
			header('Location:viewPost.php?result=true');
		}else{
			header('Location:viewPost.php?result=false');
		}
	}

?>