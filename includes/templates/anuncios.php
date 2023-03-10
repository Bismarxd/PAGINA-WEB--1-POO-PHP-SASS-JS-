<?php
    use App\Propiedad;

    
    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php')
    {
        $propiedades = Propiedad::all();
    }
    else
    {
        $propiedades = Propiedad::get(3);
    }

    //Funcion que pone limite a la descripcion
    function truncate(string $texto, int $cantidad) : string
    {
        if(strlen($texto) >= $cantidad) {
            return substr($texto, 0, $cantidad) . "...";
        } else {
            return $texto;
        }
    }

?>


<div class="contenedor-anuncio">
           
         <?php foreach($propiedades as $propiedad){ ?>

           <div class="anuncio">
              
                <img loading ="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
               <div class="contenido-anuncio">
                   <h3><?php echo $propiedad->titulo ; ?></h3>
                   <p><?php echo  truncate($propiedad->descripcion, 30); ?></p>
                   <p class="precio"><?php echo "$" . $propiedad->precio ; ?></p>

                   <ul class="iconos-caracteristicas">
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                           <p><?php echo $propiedad->wc ; ?></p>
                       </li>
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" >
                           <p><?php echo $propiedad->estacionamiento ; ?></p>
                       </li>
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                           <p><?php echo $propiedad->habitaciones ; ?></p> 
                       </li>
                   </ul>

                   <a href="anuncio.php?id=<?php echo $propiedad->id ; ?>" class="boton-amarillo-block">
                       Ver Propiedad
                   </a>

               </div><!--contenido-anuncio-->
           </div><!--anuncio-->

           <?php }?>

       </div><!--contenedor-anuncio-->

