<?php

require_once "ConexionBD.php";

class PacientesM extends ConexionBD{

    //Crear Pacientes
    static public function CrearPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, documento, telefono, usuario, clave, rol) VALUES (:apellido, :nombre, :documento, :telefono, :usuario, :clave, :rol)");

        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;
        
    }

    //Ver Pacientes
	static public function VerPacientesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}


    //Borrar Pacientes
    static public function BorrarPacienteM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;

    }


    //Actualizar Pacientes
    static public function ActualizarPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, documento = :documento, telefono = :telefono, usuario = :usuario, clave = :clave WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;

    }


    //Modelo de Ingreso de Paciente
    static public function IngresarPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, telefono, documento, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Ver Perfil del Paciente
    static public function VerPerfilPacienteM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, telefono, foto, rol, id FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();
        
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Actualizar Perfil de Paciente
    static public function ActualizarPerfilPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, documento = :documento, telefono = :telefono, foto = :foto WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

        if($pdo->execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;
        
    }

}