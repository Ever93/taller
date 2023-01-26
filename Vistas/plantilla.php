<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Servicio Tecnico</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--FavIcon-->
  <?php
  $favicon = new InicioC();
  $favicon -> FaviconC();
  ?>
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">

  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
<!--Seccion de inicio de Session para los diferentes modulos-->
<?php

if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

echo '<div class="wrapper">';

include "modulos/cabecera.php";

if($_SESSION["rol"] == "Secretaria"){

  include "modulos/menuSecretaria.php";

}else if($_SESSION["rol"] == "Paciente"){

  include "modulos/menuPaciente.php";

}else if($_SESSION["rol"] == "Doctor"){

  include "modulos/menuDoctor.php";

}else if($_SESSION["rol"] == "Administrador"){

  include "modulos/menuAdmin.php";
}

#Seccion para permitir las diferentes plantillas

$url = array();

if(isset($_GET["url"])){

  $url = explode("/", $_GET["url"]);

  if($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "editarC" || $url[0] == "doctores" || $url[0] == "pacientes" || $url[0] == "perfil-Paciente" || $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" || $url[0] == "Citas" || $url[0] == "perfil-Administrador" || $url[0] == "perfil-A" || $url[0] == "secretarias" || $url[0] == "inicio-editar" || $url[0] == "cancelar-Cita" || $url[0] == "historialCP"){

    include "modulos/".$url[0].".php";

  }

}else{

    include "modulos/inicio.php";

}

    echo '</div>';

}else if(isset($_GET["url"])){

    if($_GET["url"] == "seleccionar"){

        include "modulos/seleccionar.php";

    }else if($_GET["url"] == "ingreso-Secretaria"){

      include "modulos/ingreso-Secretaria.php";

    }else if($_GET["url"] == "ingreso-Paciente"){

      include "modulos/ingreso-Paciente.php";

    }else if($_GET["url"] == "ingreso-Doctor"){

      include "modulos/ingreso-Doctor.php";

    }else if($_GET["url"] == "ingreso-Administrador"){

      include "modulos/ingreso-Administrador.php";

    }
    

}else{

  include "modulos/seleccionar.php";
}

?>

<script src="http://localhost/clinica/Vistas/bower_components/jquery/dist/jquery.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/fastclick/lib/fastclick.js"></script>

<script src="http://localhost/clinica/Vistas/dist/js/adminlte.min.js"></script>
<!--Seccion de llamada de dataTable-->
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Seccion de llamada defullCalendar -->
<script src="http://localhost/clinica/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!--Requerimos el scrip para traducir al español el calendario-->
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>

<script src="http://localhost/clinica/Vistas/js/doctores.js"></script>
<script src="http://localhost/clinica/Vistas/js/pacientes.js"></script>
<script src="http://localhost/clinica/Vistas/js/secretarias.js"></script>

<!--Usamos Javascript para trabajar con el calendario-->
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()

  $('#calendar').fullCalendar({

  //Ocultar los dias que no se pueden sacar turno
  //Por regla de indice en programacion
  //0=Domingo, 1=Lunes, 2=Martes, 3=Miercoles, 4=Jueves, 5=Viernes, 6=Sabado
    hiddenDays: [0,6],

    defaultView: 'agendaWeek',
//Mostramos los eventos en el calendario(Citas agendadas)
    events:[
            <?php
            $resultado = CitasC::VerCitasC();

            foreach ($resultado as $key => $value) {
              
              if($value["id_doctor"] == substr($_GET["url"], 7)){

                echo '{

                  id: '.$value["id"].',
                  title: "'.$value["nyaP"].'",
                  start: "'.$value["inicio"].'",
                  end: "'.$value["fin"].'"

                },';

              }elseif ($value["id_doctor"] == substr($_GET["url"], 6)) {
                echo '{

                  id: '.$value["id"].',
                  title: "'.$value["nyaP"].'",
                  start: "'.$value["inicio"].'",
                  end: "'.$value["fin"].'"

                },';

              }

            }
            
          ?>
    ],

//Seccion para que los pacientes puedan solicitar turnos con sus doctores de acuerdo a la hora laboral del doctor
    <?php

    if($_SESSION["rol"] == "Paciente"){

      $columna = "id";
      $valor = substr($_GET["url"], 7);

      $resultado = DoctoresC::DoctorC($columna, $valor);

      echo 'scrollTime: "'.$resultado["horarioE"].'",
            minTime: "'.$resultado["horarioE"].'",
            maxTime: "'.$resultado["horarioS"].'",';

    }elseif ($_SESSION["rol"] == "Doctor") {
      $columna = "id";
      $valor = substr($_GET["url"], 6);

      $resultado = DoctoresC::DoctorC($columna, $valor);

      echo 'scrollTime: "'.$resultado["horarioE"].'",
            minTime: "'.$resultado["horarioE"].'",
            maxTime: "'.$resultado["horarioS"].'",';

    }

    ?>

    dayClick:function(date,jsEvent,viw){

      $('#CitaModal').modal();

      var fecha = date.format();
      //Las citas por pacientes seran de una hora
      var hora2 = ("01:00:00").split(":");

      fecha = fecha.split("T");

      var dia = fecha[0];

      var hora = (fecha[1].split(":"));

      var h1 = parseFloat(hora[0]);
      var h2 = parseFloat(hora2[0]);

      var horaFinal = h1+h2;

      $('#fechaC').val(dia);

      $('#horaC').val(h1+":00:00");

      $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

      $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");

    }

  })

</script>
</body>
</html>