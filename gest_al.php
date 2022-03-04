<?php require_once("recursos/config.php"); ?>
    <?php include(TEMPLATE . DS . "header.php"); ?>
    <?php include(TEMPLATE . DS . "navh.php"); ?>

    <?php
        $query = query("SELECT a.alumnos_ID, a.alumnos_nombres, a.alumnos_apellidos, a.alumnos_dni, a.alumnos_fechaNacimiento FROM alumnos a;");
        confirmar($query);
    ?>
    
    <div class="container-fluid px-4 col-md-12">
        <h1 class="mt-4">Administración de alumnos</h1>

        <?php include("registrar_al.php"); ?>
        <h2 style="color: green;">Relación de alumnos registrados</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                while($fila = fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $fila['alumnos_ID'] ?></td>
                    <td><?php echo $fila['alumnos_nombres'] ?></td>
                    <td><?php echo $fila['alumnos_apellidos'] ?></td>
                    <td><?php echo $fila['alumnos_dni'] ?></td>
                    <td><?php echo $fila['alumnos_fechaNacimiento'] ?></td>
                    <td><a class="btn btn-success btn-sm"  href="gest_al.php?editar=<?php echo $fila['alumnos_ID'] ?>">Editar</a></td>
                    <td><a class="btn btn-danger btn-sm" href="gest_al.php?borrar=<?php echo $fila['alumnos_ID'] ?>">Borrar</a></td>
                    <td><a href="gest_al.php?calificaciones=<?php echo $fila['alumnos_dni'] ?>" class="btn btn-primary btn-sm">Calificaciones</a></td>
                </tr>
            <?php
                }
            ?>         
            </tbody>
        </table>

        <?php
            if(isset($_GET['editar'])){
                $id = $_GET['editar'];
                $query = query("SELECT a.alumnos_ID, a.alumnos_nombres, a.alumnos_apellidos, a.alumnos_dni, a.alumnos_fechaNacimiento FROM alumnos a WHERE a.alumnos_ID = {$id};");
                $varfila = fetch_array($query);
                $id = $_GET['editar'];
        ?>
            <h2 class="text-center">Editar</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="editar_nombre">Nombres del alumno</label>
                    <input type="text" class="form-control" name="editar_nombre" id="editar_nombre" value="<?php echo $varfila['alumnos_nombres'] ?>">
                </div>
                <div class="form-group">
                    <label for="editar_apellido">Apellidos del alumno</label>
                    <input type="text" class="form-control" name="editar_apellido" id="editar_apellido" value="<?php echo $varfila['alumnos_apellidos'] ?>">
                </div>
                <div class="form-group">
                    <label for="editar_dni">DNI del alumno</label>
                    <input type="text" class="form-control" name="editar_dni" id="editar_dni" value="<?php echo $varfila['alumnos_dni'] ?>">
                </div>
                <div class="form-group">
                    <label for="editar_fechaNacimiento">Fecha de nacimiento del alumno</label>
                    <input type="text" class="form-control" name="editar_fechaNacimiento" id="editar_fechaNacimiento" value="<?php echo $varfila['alumnos_fechaNacimiento'] ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar" class="btn btn-warning" name="editar">
                </div>
            </form>
        <?php
            if(isset($_POST['editar'])){
                $nombres = $_POST['editar_nombre'];
                $apellidos = $_POST['editar_apellido'];
                $dni = $_POST['editar_dni'];
                $fecha = $_POST['editar_fechaNacimiento'];
                $query = query("UPDATE alumnos SET alumnos_nombres = '{$nombres}', alumnos_apellidos = '{$apellidos}', alumnos_dni = '{$dni}', alumnos_fechaNacimiento = '{$fecha}' WHERE alumnos_ID = {$id}");
                confirmar($query);
        ?>
                <meta http-equiv="refresh" content="0" />
        <?php
            }
            }
            // para borrar
            if(isset($_GET['borrar'])){
                $id = $_GET['borrar'];
                $query = query("DELETE FROM alumnos WHERE alumnos_ID = {$id}");
                confirmar($query);
        ?>
                <meta http-equiv="refresh" content="0; url = gest_al.php" />
        <?php
            }
            if(isset($_GET['calificaciones'])){
        ?>
            <div class="container-fluid px-4 col-md-5">
            <h2>Calificaciones de <?php echo $_GET['calificaciones'] ?></h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
        <?php
                $dni = $_GET['calificaciones'];
                $query = query("SELECT a.notas_curso, a.notas_calificacion FROM notas a WHERE a.notas_DNI = {$dni};");
                while($fila = fetch_array($query)){
        ?>
                <tr>
                    <td><?php echo $fila['notas_curso'] ?></td>
                    <td><?php echo $fila['notas_calificacion'] ?></td>
                </tr>
        <?php
                }
        ?>
                </tbody>
            </table>
            </div>
        <?php
            }
        ?>
    <?php include(TEMPLATE . DS . "footer.php"); ?>