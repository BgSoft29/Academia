<?php ob_start(); ?>
<?php require_once("recursos/config.php"); ?>
    <?php include(TEMPLATE . DS . "header.php"); ?>
    <?php include(TEMPLATE . DS . "navh.php"); ?>

    <?php
        $query = query("SELECT a.alumnos_ID, CONCAT(a.alumnos_nombres,' ',a.alumnos_apellidos) AS nombre , a.alumnos_dni FROM alumnos a;");
        confirmar($query);

    ?>
                
    <div class="container-fluid px-4 col-md-8">
        <h1 class="mt-4">Lista de alumnos</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres y Apellidos</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($fila = fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $fila['alumnos_ID'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['alumnos_dni'] ?></td>
                </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table>
<?php include(TEMPLATE . DS . "footer.php"); ?>
