<?php
//importar conexion
//la ruta de este include osea este anuncio php debe ser relativa al del index principal, apesar que este file este en otra capeta
require  __DIR__ . '/../config/database.php';
//require es relativo al file que lo esta llamado
$db = conectarDB();

//consultar
$query = "SELECT * FROM propiedades LIMIT $limite";

//obtener resultados
$resultado = mysqli_query($db, $query);


?>


<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3> <?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono bedrooms" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div><!--Contenido anuncio-->
    </div><!--Anuncio-->
    <?php endwhile; ?>
</div><!--Contenedor de anuncio-->


<?php

//cerrar conexion
mysqli_close($db);

?>