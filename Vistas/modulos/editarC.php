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

        <h1>Editar Consultorios</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <?php

                    $editC = new ConsultoriosC();
                    $editC -> EditarConsultoriosC();
                    $editC -> ActualizarConsultoriosC();

                    ?>

                </form>

            </div>

        </div>

    </section>
    
</div>