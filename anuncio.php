<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta frente al bosque</h1>

    <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$3,000.000</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono parking">
                <p>3</p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono bedrooms">
                <p>4</p>
            </li>
        </ul>
        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
            reiciendis enim accusamus exercitationem magnam mollitia optio eius
            accusantium aut nam molestiae asperiores tenetur dicta rem ratione,
            eveniet, quo eaque. Labore.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
            reiciendis enim accusamus exercitationem magnam mollitia optio eius
            accusantium aut nam molestiae asperiores tenetur dicta rem ratione,
            eveniet, quo eaque. Labore</p>

        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
            reiciendis enim accusamus exercitationem magnam mollitia optio eius
            accusantium aut nam molestiae asperiores tenetur dicta rem ratione,
            eveniet, quo eaque. Labore.</p>
    </div>

</main>

<?php
incluirTemplate('footer');
?>