<aside class="main-sidebar">
    
    <section class="sidebar">

      <ul class="sidebar-menu">
        
        <li>
          <a href="http://localhost/clinica/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        <li>
          <a href="http://localhost/clinica/Ver-consultorios">
            <i class="fa fa-medkit"></i>
            <span>Consultorios</span>
          </a>
        </li>

        <li>
          <?php
          echo '<a href="http://localhost/clinica/historial/'.$_SESSION["id"].'">';
          ?>
            <i class="fa fa-calendar-check-o"></i>
            <span>Historial</span>
          </a>
        </li>

        <li>
          <?php
          echo '<a href="http://localhost/clinica/cancelar-Cita">';
          ?>
            <i class="fa fa-times"></i>
            <span>Cancelar Cita</span>
          </a>
        </li>

      </ul>

    </section>
   
  </aside>