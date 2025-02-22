<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">

    <h2>Casas y depas en Ventas</h2>

    <!-- -->
    <?php
    $limite = 10; //esta variable se pasa el include
    include 'includes/templates/anuncios.php';
    ?>

</main>

<?php
incluirTemplate('footer');
?>