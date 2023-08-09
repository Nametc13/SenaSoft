<?php include("conexion.php");?>
<!-- conexion de los datos -->

<?php
// metodo post 

if ($_POST) {


    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $estado_tarea =$_POST["tarea"];


$objconexion = new conexion();
$sql="INSERT INTO datos (Id_tarea, nombre, descripcion, fecha,estado_tarea) 
        VALUES (NULL, '$nombre', '$descripcion', '9/8/2023' ,'$estado_tarea')";
$objconexion->ejecutar($sql);
}
// insertar los datos por la herencia de la conexion

if($_GET){
    $objconexion = new conexion();
    $sql="DELETE FROM datos WHERE `datos`.`Id_tarea` =".$_GET['borrar'];
    $objconexion->ejecutar($sql);
    // eliminar los datos por la herencia de la conexion
}

$objconexion = new conexion();
$resultado =$objconexion -> consultar("SELECT * FROM `datos`");
// visualizar los datos


?>


<!doctype html>
<html lang="en">

<head>
<title>Senasoft</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="card">
        <div class="card-header">
            datos de la lista
        </div>
        <div class="card-body">
            <!-- el formulario para el ingreso de datos -->
        <form action="index.php" method="post" enctype="multipart/form-data">
    
    Nombre de la tarea: <input class="form-control" type="text" name="nombre" id="">
    <br>

    
    descripcion:
        <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
    
        <br>
        estado de la tarea:
        <br>        
        Pendiente: <input type="radio" name="tarea" value="pendiente"><br>
        ejecucion: <input type="radio" name="tarea" value="ejecucion"><br>
        completada: <input type="radio" name="tarea" value="completar"><br> <br> 

        <br>

    
    <input class="btn btn-success" type="submit" value="Enviar tarea" name="sumit">
    </form>
        </div>
        <div class="card-footer text-muted">
            
        </div>
    </div>
            </div>
            <div class="col-md-6">
            <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <!-- tabla para mostrar los datos e eliminar los datos -->
                <tr>
                    
                    <th scope="col">Nombre de la tarea</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">Fecha creacion</th>
                    <th scope="col">Tipo de ejecucion</th>
                    <th scope="col">borrar</th>
                </tr>
            </thead>
            <tbody>
                <!-- para mostrar todos los datos en la tabla -->
            <?php 
            foreach ($resultado as $tarea){
            ?>
                <tr class="">

                    <td><?php echo $tarea['nombre']?></td>
                    <td><?php echo $tarea['descripcion']?></td>
                    <td><?php echo $tarea['fecha']?></td>
                    <td><?php echo $tarea['estado_tarea']?></td>
                    <td><a name="borrar" id="" class="btn btn-danger" href="?borrar=<?php echo $tarea['Id_tarea']?>">Eliminar</a></td>
                </tr>
                <?php 
            
            }
            ?>
            </tbody>
        </table>
    </div>
    
            </div>
        </div>
    </div>
    
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>