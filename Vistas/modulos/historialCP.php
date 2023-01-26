<?php

if($_SESSION["rol"] != "Secretaria"){

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
                            <th>Paciente</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Borrar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $resultado = CitasC::VerCitasC();

                        foreach ($resultado as $key => $value) {

                           
                            
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["inicio"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_doctor"];

                                    $doctor = DoctoresC::DoctorC($columna, $valor);

                                    echo '<td>'.$doctor["nombre"].' '.$doctor["apellido"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_consultorio"];

                                    $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

                                    echo '<td>'.$consultorio[0]["nombre"].'</td>';

                                echo '<td>'.$value["nyaP"].'</td>
                                <td>'.$value["documento"].'</td>
                                <td>'.$value["telefono"].'</td>
                                <td><div class="btn-group">

                                    

                                <a href="http://localhost/clinica/historialCP/'.$value["id"].'">
                                    <button class="btn btn-primary"><i class="fa fa-trash-o"></i> Eliminar</button>
                                </a>

                            </div></td>
                                </tr>';

                            }

                        

                        ?>
                       
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<?php
$borrarCP = new CitasC();
$borrarCP -> BorrarCitasPacientesC();