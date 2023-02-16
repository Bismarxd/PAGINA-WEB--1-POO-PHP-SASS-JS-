<?php

require '../../includes/app.php';   
use App\Vendedor;
estaAutenticado();

//Validar que sea un id valido

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id)
{
    header('location: /admin');
}


//Obtener el Arreglo del Vendedor
$vendedor = Vendedor::find($id);

//Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

 //Ejecutar el código de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
   //Asignar los valores
   $args = $_POST['vendedor'];

    //Sincronizar objeto en memoria con loq ue usuario escribio
   $vendedor->sincronizar($args);


   //Validacion
   $errores = $vendedor->validar();


   if (empty($errores))
   {
    $vendedor->guardar();
   }

}

incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>    

        <a href="/admin" class="boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error;?>
            </div>
            
        <?php endforeach; ?>

        <!--Get mostrar atos en la url-->
        <!--POST obtener los datos de forma segura-->

        <form class="formulario" method="POST">
           <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
incluirTemplate('footer');
?>