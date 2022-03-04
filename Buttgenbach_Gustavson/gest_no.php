<?php require_once("recursos/config.php"); ?>
    <?php include(TEMPLATE . DS . "header.php"); ?>
    <?php include(TEMPLATE . DS . "navh.php"); ?>

<div class="container-fluid px-4 col-md-7" >
<h1 class="text-center mt-4">Administración de notas de alumnos</h1>
    <form action="" method="post" style="border: solid black; border-radius: 10px; margin-top: 20px; padding: 20px;">
        <h2 style="color: green;">Ingreso de calificaciones</h2>
        <div class="form-group">
            <label for="ingresar_dni">Ingrese el número de DNI</label>
            <input style="margin-top: 8px;" type="text" class="form-control" name="ingresar_dni" id="ingresar_dni">
        </div>
        <div class="form-group">
            <label for="ingresar_curso">Ingrese el nombre del curso</label>
            <input style="margin-top: 8px;" type="text" class="form-control" name="ingresar_curso" id="ingresar_curso">
        </div>
        <div class="form-group">
            <label for="ingresar_calificacion">Ingrese la calificacion</label>
            <input style="margin-top: 8px;" type="text" class="form-control" name="ingresar_calificacion" id="ingresar_calificacion">
        </div>
        <div style="margin-top: 10px;" class="form-group">
            <input type="submit" value="Ingresar Calificación" class="btn btn-warning" name="registrar">
        </div>
    </form>
    <?php
        if(isset($_POST['registrar'])){
            $dni = $_POST['ingresar_dni'];
            $curso = $_POST['ingresar_curso'];
            $calificacion = $_POST['ingresar_calificacion'];
            $query = query("INSERT INTO notas(notas_dni, notas_curso, notas_calificacion) VALUES ('{$dni}','{$curso}','{$calificacion}');");
            confirmar($query);
    ?>
            <meta http-equiv="refresh" content="0; url = gest_no.php" />
    <?php
        }
    ?>

    <form action="" method="post" style="border: solid black; border-radius: 10px; margin-top: 20px; padding: 20px;">
        <h2 style="color: green;">Gestionar calificación</h2>
        <div class="form-group">
            <label for="ingresar_dni">Ingrese el número de DNI del alumno</label>
            <input style="margin-top: 8px;" type="text" class="form-control" name="ingresar_dni" id="ingresar_dni">
        </div>
        <div style="margin: 10px auto;" class="form-group">
            <input type="submit" value="Consultar" class="btn btn-warning" name="consultar">
        </div>
    <?php
        // PARA REALIZAR LA CONSULTA DE NOTAS POR ALUMNO
        if(isset($_POST['consultar'])){
            $dni = $_POST['ingresar_dni'];
    ?>
            <table class="table table-hover">
            <thead>
                <h4>Calificaciones de: <?php echo $dni ?></h4>
                <tr>
                    <th>Curso</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
    <?php
            $query = query("SELECT a.notas_dni,a.notas_curso, a.notas_calificacion FROM notas a WHERE a.notas_dni = {$dni}");
            confirmar($query);
            while($fila = fetch_array($query)){
    ?>
                <tr>
                    <td><?php echo $fila['notas_curso'] ?></td>
                    <td><?php echo $fila['notas_calificacion'] ?></td>
                    <td><a class="btn btn-success btn-sm"  href="gest_no.php?editar=<?php echo $fila['notas_dni'] ?>">Editar</a></td>
                    <td><a class="btn btn-danger btn-sm" href="gest_no.php?borrar=<?php echo $fila['notas_dni'] ?>">Borrar</a></td>
                </tr>
    <?php
            }
    ?>
            </tbody>
            </table>
    <?php
        }
        // PARA EDITAR NOTAS DEL ALUMNO
        if(isset($_GET['editar'])){
            $dni = $_GET['editar'];
            $query = query("SELECT a.notas_dni,a.notas_curso, a.notas_calificacion FROM notas a WHERE a.notas_dni = {$dni}");
            $varfila = fetch_array($query);
            

    ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="editar_calificacion">Ingresar Nueva calificación</label>
                    <input type="text" class="form-control" name="editar_calificacion" id="editar_calificacion" value="">
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar" class="btn btn-warning" name="editar">
                </div>
                <?php
                    if(isset($_POST['editar'])){
                        $calificacion = $_POST['editar_calificacion'];
                        $query = query("UPDATE notas SET notas_calificacion = '{$calificacion}' WHERE notas_dni = {$dni}");
                ?>
                        <meta http-equiv="refresh" content="0; url = gest_no.php" />
                <?php
                    }
                ?>
            </form>
    <?php
        }

        // PARA BORRAR 
        if(isset($_GET['borrar'])){
            $dni = $_GET['borrar'];
            $query = query("DELETE FROM notas WHERE notas_dni = {$dni}");
            confirmar($query);
    ?>
            <meta http-equiv="refresh" content="0; url = gest_no.php" />
    <?php
        }
    ?>
    </form>
    
</div>    
    

    <?php include(TEMPLATE . DS . "footer.php"); ?>