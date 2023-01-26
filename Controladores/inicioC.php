<?php

class InicioC{

    public function MostrarInicioC(){

        $tablaBD = "inicio";

        $id = "1";

        $resultado = InicioM::MostrarInicioM($tablaBD, $id);

        echo '<section class="content">

		<head>
		
		  <link rel="stylesheet" href="Vistas/css/estilos.css" type="text/css">
		
		</head>
			<center>
		
				<h1><b>Seleccione una operacion</b></h1>
		
			</center>
		
			  <br>
		
			  <div class="row">
		
				<div class="col-lg-3 col-xs-6">
				  
				  <div class="small-box" id="docstyle">
		
					<div class="inner">
		
					  <h4>Presupuesto Notebook</h4>
		
					  <p>Iniciar Session</p>
		
					</div>
		
					<div class="icon">
		
					  <i class="fa fa-laptop"></i>
		
					</div>
		
					<a href="ingreso-Secretaria" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
		
				  </div>
		
				</div>
				
				<div class="col-lg-3 col-xs-6">
				  
				  <div class="small-box" id="docstyle">
		
					<div class="inner">
		
					  <h4>Presupuesto PC</h4>
		
					  <p>Iniciar Session</p>
		
					</div>
		
					<div class="icon">
		
					  <i class="fa fa-desktop"></i>
		
					</div>
					
					  <a href="ingreso-Doctor" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
		
				  </div>
		
				</div>
				
				<div class="col-lg-3 col-xs-6">
				  
				  <div class="small-box" id="pacstyle">
		
					<div class="inner">
		
					  <h4>Servicio Tecnico</h4>
		
					  <p>Iniciar Session</p>
		
					</div>
		
					<div class="icon">
		
					  <i class="fa fa-wrench"></i>
		
					</div>
		
					  <a href="ingreso-Paciente" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
		
				  </div>
		
				</div>
			   
				
				
			  </div>
			 
			</section>
		
			<br>
		
		  <div id="inferior">
		
			<h6><center>Copyright &copy; 2023 <a href="https://api.whatsapp.com/send/?phone=595971104575">SmartCenter-Paraguay</a>. Todos los derechos reservados. <b>Version</b> 0.0.1</center></h6>
			
		  </div>
		<div class="box-body">
         
	          <div class="col-md-6 bg-primary" style="margin-top: 5%">
	            
	            <h1>Bienvenidos</h1>

	            <h3>'.$resultado["intro"].'</h3>

	            <hr>

	            <h2>Horario:</h2>
	            <h3>Desde: '.$resultado["horaE"].'</h3>
	            <h3>Hasta: '.$resultado["horaS"].'</h3>

	            <hr>

	            <h2>Dirección:</h2>
	            <h3>'.$resultado["direccion"].'</h3>

	            <hr>

	            <h2>Contactos:</h2>
	            <h3>Teléfono: '.$resultado["telefono"].' <br>
	            Correo: '.$resultado["correo"].'</h3>

	          </div>

	          <div class="col-md-6">
	            
	            <img src="'.$resultado["logo"].'" class="img-responsive">

	          </div>

	        </div>';

	}



	//Editar perfil Administrador
    public function EditarInicioC(){

        $tablaBD = "inicio";

        $id = "1";

        $resultado = InicioM::MostrarInicioM($tablaBD, $id);

        echo '<form method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <h2>Introducción:</h2>
                        <input type="text" class="input-lg" name="intro" value="'.$resultado["intro"].'">
                        <input type="hidden" class="input-lg" name="Iid" value="'.$resultado["id"].'">


						<div class="form-group">
							<h2>Horario:</h2>
							Desde:<input type="time" class="input-lg" name="horaE" value="'.$resultado["horaE"].'">
							Hasta:<input type="time" class="input-lg" name="horaS" value="'.$resultado["horaS"].'">
						</div>

                        <h2>Direccion:</h2>
                        <input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

                        <h2>Telefono:</h2>
                        <input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

                        <h2>Correo:</h2>
                        <input type="text" class="input-lg" name="correo" value="'.$resultado["correo"].'">

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <br><br>

						<h2>Logo:</h2>

                        <input type="file" name="logo">
                        <br>
                
                        <img src="http://localhost/clinica/'.$resultado["logo"].'" width="200px;">

                        <input type="hidden" name="logoActual" value="'.$resultado["logo"].'">

                        <br><br>

						<h2>Favicon:</h2>

                        <input type="file" name="favicon">
                        <br>
                
                        <img src="http://localhost/clinica/'.$resultado["favicon"].'" width="200px;">

                        <input type="hidden" name="faviconActual" value="'.$resultado["favicon"].'">

                        <br><br>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                    </div>

                </div>

            </form>';

    }


	//Actualizar contenido de Inicio
	public function ActualizarInicioC(){

		if(isset($_POST["Iid"])){

			$rutaLogo = $_POST["logoActual"];

			if(isset($_FILES["logo"]["tmp_name"]) && !empty($_FILES["logo"]["tmp_name"])){

				if(!empty($_POST["logoActual"])){

					unlink($_POST["logoActual"]);

				}

				if($_FILES["logo"]["type"] == "image/jpeg"){

					$rutaLogo = "Vistas/img/logo.jpeg";

					$logo = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);
					
					imagejpeg($logo, $rutaLogo);

				}

				if($_FILES["logo"]["type"] == "image/png"){

					$rutaLogo = "Vistas/img/logo.png";

					$logo = imagecreatefrompng($_FILES["logo"]["tmp_name"]);
					
					imagepng($logo, $rutaLogo);

				}

			}



			$rutaFavicon = $_POST["faviconActual"];

			if(isset($_FILES["favicon"]["tmp_name"]) && !empty($_FILES["favicon"]["tmp_name"])){

				if(!empty($_POST["faviconActual"])){

					unlink($_POST["faviconActual"]);

				}

				if($_FILES["favicon"]["type"] == "image/jpeg"){

					$rutaFavicon = "Vistas/img/favicon.jpeg";

					$favicon = imagecreatefromjpeg($_FILES["favicon"]["tmp_name"]);
					
					imagejpeg($favicon, $rutaFavicon);

				}

				if($_FILES["favicon"]["type"] == "image/png"){

					$rutaFavicon = "Vistas/img/favicon.png";

					$favicon = imagecreatefrompng($_FILES["favicon"]["tmp_name"]);
					
					imagepng($favicon, $rutaFavicon);

				}

			}


			$tablaBD = "inicio";

			$datosC = array("id"=>$_POST["Iid"], "intro"=>$_POST["intro"], "horaE"=>$_POST["horaE"], "horaS"=>$_POST["horaS"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "direccion"=>$_POST["direccion"], "logo"=>$rutaLogo, "favicon"=>$rutaFavicon);

			$resultado = InicioM::ActualizarInicioM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "inicio-editar";
				</script>';

			}


		}

	}


	//Controlador Favicon(Iconos Favoritos)
	public function FaviconC(){

		$tablaBD = "inicio";

		$id = "1";

		$resultado = InicioM::MostrarInicioM($tablaBD, $id);

		echo '<link rel="icon" type="" href="'.$resultado["favicon"].'">';

	}

	//Ver telefono para whatsapp
	static public function vertelwhatC($columna, $valor){

		$tablaBD = "inicio";

		$resultado = InicioM::MostrarTelfWhatM($tablaBD, $columna, $valor);

		return $resultado;

	}

}