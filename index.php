<?php 

    require 'includes/app.php';
    $inicio = true;
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
            </div><!--cierre icono-->
        

        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
        </div><!--cierre icono-->

        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
        </div><!--cierre icono-->
    </div><!--cierre iconos-nosotros-->
 
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

      <?php 
      $limite = 3;
      include 'includes/templates/anuncios.php';      
      ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la Casa de tus Sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>10/08/2022</span> por: <span>Admin</span> </p>

                        <p>
                            Consejos para construir una terraz en el techo e tu casa con los mejores 
                            materiales y ahorrando dinero
                        </p>
                    </a>
                </div>


                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>10/08/2022</span> por: <span>Admin</span> </p>

                        <p>
                            Consejos para construir una terraz en el techo e tu casa con los mejores 
                            materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
 
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me
                    ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Bismar Mayta</p>

            </div>
        </section>
    </div>


    <?php 
incluirTemplate('footer');
?>