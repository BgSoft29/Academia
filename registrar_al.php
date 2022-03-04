
<form action="gest_al.php" method="post">
    <h2 style="color: green;">Registrar nuevo alumno</h2>
    <div class="form-group">
        <label for="registrar_nombre">Nombres del alumno</label>
        <input type="text" class="form-control" name="registrar_nombre" id="registrar_nombre">
    </div>
    <div class="form-group">
        <label for="registrar_apellido">Apellidos del alumno</label>
        <input type="text" class="form-control" name="registrar_apellido" id="registrar_apellido">
    </div>
    <div class="form-group">
        <label for="registrar_dni">DNI del alumno</label>
        <input type="text" class="form-control" name="registrar_dni" id="registrar_dni">
    </div>
    <div class="form-group">
        <label for="registrar_fecha">Fecha de nacimiento del alumno</label>
        <input type="text" class="form-control" name="registrar_fecha" id="registrar_fecha">
    </div>
    <div style="margin: 12px 0;" class="form-group">
        <input type="submit" value="Crear Nuevo Registro" class="btn btn-success" name="crear">
    </div>
</form>
<?php
    if(isset($_POST['crear'])){
        $nombre = $_POST['registrar_nombre'];
        $apellido = $_POST['registrar_apellido'];
        $dni = $_POST['registrar_dni'];
        $fecha = $_POST['registrar_fecha'];
        query("INSERT INTO alumnos(alumnos_nombres, alumnos_apellidos, alumnos_dni, alumnos_fechaNacimiento) VALUES ('{$nombre}','{$apellido}','{$dni}','{$fecha}')");
        confirmar($query);
    ?>
        <meta http-equiv="refresh" content="0; url = gest_al.php" />
    <?php
    }
?>
