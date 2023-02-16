<?php

require '../../includes/app.php';
    
use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor();

//Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

 //Ejecutar el código de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
   //Crear Una Nueva Instancia
   $vendedor = new Vendedor($_POST['vendedor']);

   //Validar que no haya cambios vacios
   $errores = $vendedor->validar();

   //No hay Errores
    if (empty($errores)) {
        $vendedor->guardar();
    }

}

incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>    

        <a href="/admin" class="boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error;?>
            </div>
            
        <?php endforeach; ?>

        <!--Get mostrar atos en la url-->
        <!--POST obtener los datos de forma segura-->

        <form class="formulario" method="POST" action="/admin/vendedores/crear.php">
           <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
incluirTemplate('footer');
?>