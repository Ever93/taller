<?php

class CitasC{

    //Pedir cita paciente
    public function EnviarCitaC(){

        if(isset($_POST["Did"])){

            $tablaBD = "citas";

            $Did = substr($_GET["url"], 7);

            $datosC = array("Did"=>$_POST["Did"], "Pid"=>$_POST["Pid"], "nyaC"=>$_POST["nyaC"], "Cid"=>$_POST["Cid"], "documentoC"=>$_POST["documentoC"], "telefonoC"=>$_POST["telefonoC"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"],);

            $resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                window.location = "Doctor/"'.$Did.';
                </script>';
            }
        }
    }


    //Mostrar Citas agendadas
    static public function VerCitasC(){

        $tablaBD = "citas";

        $resultado = CitasM::VerCitasM($tablaBD);

        return $resultado;

    }

    //Pedir cita como doctor
	public function PedirCitaDoctorC(){

		if(isset($_POST["Did"])){

			$tablaBD = "citas";

			$Did = substr($_GET["url"], 6);

			$datosC = array("Did"=>$_POST["Did"], "Cid"=>$_POST["Cid"], "nombreP"=>$_POST["nombreP"], "documentoP"=>$_POST["documentoP"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

			$resultado = CitasM::PedirCitaDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "Citas/"'.$Did.';
				</script>';

			}

		}

	}

     //Borrar Citas desde menu Pacientes
     public function BorrarCitasC(){

        if (substr($_GET["url"], 14)){

            $tablaBD = "citas";

            $id = substr($_GET["url"], 14);

            $resultado = CitasM::BorrarCitasM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                window.location = "http://localhost/clinica/cancelar-Cita";
                </script>';
            }

        }

    }

    //Borrar citas de Pacientes desde Menu Secretaria
    public function BorrarCitasPacientesC(){

        if (substr($_GET["url"], 12)){

            $tablaBD = "citas";

            $id = substr($_GET["url"], 12);

            $resultado = CitasM::BorrarCitasPacientesM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                window.location = "http://localhost/clinica/historialCP";
                </script>';
            }

        }

    }
}