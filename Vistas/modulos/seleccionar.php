<section class="content">

<head>

  <link rel="stylesheet" href="Vistas/css/estilos.css" type="text/css">

</head>
    <center>

        <h1><b>Seleccione Modo de Ingreso al Sistema</b></h1>

    </center>

      <br>

      <div class="row">

        <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box" id="secrestyle">

            <div class="inner">

              <h3>Secretaria</h3>

              <p>Iniciar Session</p>

            </div>

            <div class="icon">

              <i class="fa fa-laptop"></i>

            </div>

            <a href="ingreso-Secretaria" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div> -->
        
        <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box" id="docstyle">

            <div class="inner">

              <h3>Servicio Tecnico</h3>

              <p>Iniciar Session</p>

            </div>

            <div class="icon">

              <i class="fa fa-wrench"></i>

            </div>
            
              <a href="ingreso-Doctor" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div> -->
        
        <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box" id="pacstyle">

            <div class="inner">

              <h3>Presupuesto</h3>

              <p>Iniciar Session</p>

            </div>

            <div class="icon">

              <i class="fa fa-pencil-square-o"></i>

            </div>

              <a href="ingreso-Paciente" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div> -->
       
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box" id="adminstyle">

            <div class="inner">

              <h3>Ingresar</h3>

              <p>Iniciar Session</p>

            </div>

            <div class="icon">

              <i class="fa fa-cog"></i>

            </div>

              <a href="ingreso-Administrador" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>
        
      </div>
     
    </section>


    <?php

      $columna = null;
      $valor = null;

      $resultado = InicioC::vertelwhatC($columna, $valor);

      foreach($resultado as $key => $value){

        $telf = $value['telefono'];
        $telfwhat = substr($telf, 1);

          echo '<div style="position:absolute; right:20px; bottom:90px;">

                  <h5>Horario: '.$value["horaE"].' a '.$value["horaS"].' hs</h5>
                  <h6>Direccion: '.$value["direccion"].'</h6>
                  <h6>Telefono: '.$value["telefono"].'</h6>
                </div>
                
                <div style="position:absolute; right:20px; bottom:40px;">
                 
                  <a href="https://api.whatsapp.com/send/?phone=595'.$telfwhat.'" target="_blank"><FONT SIZE=4><b>Contactenos</b></font>

                  <img src="Vistas/img/whatsapp.png">

                  </a>

                </div>';
        
      }
                    
    ?>

    <br>

  <div id="inferior">

    <h6><center>Copyright &copy; 2023 <a href="https://api.whatsapp.com/send/?phone=595971104575">SmartCenter-Paraguay</a>. Todos los derechos reservados. <b>Version</b> 0.0.1</center></h6>
    
  </div>
