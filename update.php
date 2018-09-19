<?php
include_once('db/consultas.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] :' ';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
$r = search($id); //Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

if(!empty($_POST['nombre']) || !empty($_POST['posicion']) || !empty($_POST['carrera']) || !empty($_POST['email']) || !empty($_POST['id2']) ){
  upDepo($id,$_POST['nombre'],$_POST['posicion'],$_POST['carrera'],$_POST['email'],$_POST['id2']);
  header("location: index.php");
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Editar Deportista</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="update.php?id=<?php echo($id)?>">

                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre"><br>

                  <label for="nombre">Posicion:</label>
                  <input type="text" name="posicion"><br>

                  <label for="email">Carrera:</label>
                  <input type="text" name="carrera"><br>

                  <label for="contraseña">Email:</label>
                  <input type="email" name="email"><br>
                  
                  <label for="nombre">Deporte:</label>
                  <input type="text" name="id2" placeholder ="Ingrese: 1 para Futbol , 2 para Basketball "><br>

                  <button type="submit" class="success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>