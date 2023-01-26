<?php

if($_SESSION["rol"] != "Paciente"){

    echo '<script>
    
    window.location = "inicio";
    </script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Historial de cita Medica</h1>

    </section>

    <section class="cotent">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped DT">

                    <thead>

                        <tr>
                            <th>N°</th>
                            <th>Fecha y Hora</th>
                            <th>Doctor</th>
                            <th>Consultorio</th>
                            <th>Borrar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $resultado = CitasC::VerCitasC();

                        foreach ($resultado as $key => $value) {

                            if($_SESSION["documento"] == $value["documento"]) {
                            
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["inicio"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_doctor"];

                                    $doctor = DoctoresC::DoctorC($columna, $valor);

                                    echo '<td>'.$doctor["apellido"].' '.$doctor["nombre"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_consultorio"];

                                    $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

                                    echo '<td>'.$consultorio[0]["nombre"].'</td>';

                                echo '  <td>

                                <div class="btn-group">

                                    

                                    <a href="http://localhost/clinica/cancelar-Cita/'.$value["id"].'">
                                        <button class="btn btn-primary"><i class="fa fa-trash-o"></i> Cancelar</button>
                                    </a>

                                </div>

                            </td>
                                </tr>';

                            }
                               

                        }

                        ?>
                       
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<?php
$borrarCi = new CitasC();
$borrarCi -> BorrarCitasC();