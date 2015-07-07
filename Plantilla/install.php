<?php



	function createDB ($nameDB = "Usuarios", $pathDB = ""){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "<i class='fa fa-check-square-o'></i> Se ha creado/seleccionado la base de datos correctamente."."<br/>";

		    /* Creacion de la tabla Usuarios */
		    $query = "CREATE TABLE 'Usuarios' (
						'idUsuario'	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						'Usuario' TEXT NOT NULL,
						'Contrasena' TEXT NOT NULL,
						'Nombres'	TEXT NOT NULL,
						'ApellidoUno'	TEXT NOT NULL,
						'ApellidoDos' TEXT NOT NULL,
						'Titulo' TEXT NOT NULL,
						'Descripcion'	TEXT NOT NULL,
						'Foto'	TEXT NOT NULL,
						'WebPersonal'	TEXT NOT NULL,
                        'Email'	TEXT NOT NULL
						
					);"; //Creacion del query para crear la tabla.
		    $result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
		    echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla Usuarios."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla Usuarios."."<br/>";

		    /* Creacion de la tabla configuracion usuarios */
		    $query = "CREATE TABLE `ConfigUsuarios` (
						`idconfigUsuarios`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						`Usuario`	TEXT NOT NULL,
						`Piel`	TEXT NOT NULL,
						`Respuestas`	TEXT NOT NULL
						
					);";
			$result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
			echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla cConfigUsuarios."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla ConfigUsuarios."."<br/>";

		   // $db = NULL; //Cerramos la conexion a la Base de datos.



		    /* Creacion de la tabla configuracion usuarios */
		    $query = "CREATE TABLE `Post` (
						`idpost`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						`Utc`int NOT NULL,
						`Anio`int NOT NULL,
						`Mes`int NOT NULL,
						`Dia`	int NOT NULL,
						`Hora`int NOT NULL,
						`Minuto`	int NOT NULL,
						`Segundo`	int NOT NULL,
						`Titulo`	TEXT NOT NULL,
						`SubTitulo`	TEXT NOT NULL,
						`Icono`	TEXT NOT NULL,
						`Texto`	TEXT NOT NULL,
						`Imagen`	TEXT NOT NULL
						
					);";
			$result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
			echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla Post."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla Post."."<br/>";

		    //$db = NULL; //Cerramos la conexion a la Base de datos.


 /* Creacion de la tabla configuracion usuarios */
		    $query = "CREATE TABLE `logs` (
						`idlogs`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
						`Utc`	int NOT NULL,
						`Anio `	int NOT NULL,
						`Mes `	int NOT NULL,
						`Dia  `	int NOT NULL,
						`Hora  `	int NOT NULL,
						`Minuto  `	int NOT NULL,
						`Segundo  `	int NOT NULL,
						`Ip  `	TEXT NOT NULL,
						`Navegador   `	TEXT NOT NULL,
						`Usuario   `	TEXT NOT NULL,
						`Operacion    `	TEXT NOT NULL
				
						
					);";
			$result = $db->exec($query); //Ejecutamos el query. Se usa exec para todos los casos excepto para los select.
			echo ($result === false) ? "<i class='fa fa-times-circle'></i> No se pudo crear la Tabla logs."."<br/>" : "<i class='fa fa-check-square-o'></i> Se creo correctamente la Tabla logs."."<br/>";

		    $db = NULL; //Cerramos la conexion a la Base de datos.


		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

	/* Funcion para ejecutar querys de tipo Insert, Update, Deleted */
	function excuteQuery ($nameDB = "Usuarios", $pathDB = "", $query, $params=NULL){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    if ($params === NULL){
				/* Intentamos Ejecutar el Query */
		    	$result = $db->exec($query);
		    }else{
		    	/* Intentamos Ejecutar el Query */
		    	$cmd = $db->prepare($query);
		    	$result = $cmd->execute($params);
		    }

		    $db = NULL; //Cerramos la conexion a la Base de datos.
		    return ($result);
		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

	/* Funcion para ejecutar querys de tipo Selects */
	function newQuery ($nameDB = "Usuarios", $pathDB = "", $query){
		try {
			/* Creacion de la Base de Datos o Seleccion de la misma*/
		    $db = new PDO("sqlite:".$pathDB.$nameDB.".sqlite"); //Creamos una conexion
		    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    /* Intentamos Ejecutar el Query */
		    $result = $db->query($query);

		    $db = NULL; //Cerramos la conexion a la Base de datos.
		    return ($result);
		}catch(PDOException $e){
		    echo $e->getMessage();
		}
	}

?>