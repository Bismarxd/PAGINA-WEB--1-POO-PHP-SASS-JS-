<?php 
    require '../../includes/app.php';
    
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();



    //debugear($propiedad);

    //Base de datos

    $db = conectarDB();

    $propiedad = new Propiedad;

    //Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();


    //Consultar Par obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    //debugear($errores);
        


    //Ejecutar el código de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //-------Crear una nueva instancia---------
    $propiedad = new Propiedad($_POST['propiedad']);


    //-------Subida de Archivos-------------
   

     //Generar un nombre único
     $nombreImagen = md5( uniqid(rand(), true)) . ".jpg";

     //Setear la imagen
        //Realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen'])  
        {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);    
        }

    //Validar
    $errores = $propiedad->validar();    
    if (empty($errores)) {

        //Crear la carpeta para subir imagenes
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
       
        //Guarda la Imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //Guarda en la base de datos
        $propiedad->guardar();

        
        
    }


   
}

    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Crear</h1>    

        <a href="/admin" class="boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error;?>
            </div>
            
        <?php endforeach; ?>

        <!--Get mostrar atos en la url-->
        <!--POST obtener los datos de forma segura-->

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
           <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
incluirTemplate('footer');
?>