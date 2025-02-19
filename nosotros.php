<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>
                25 Años de experiencia
            </blockquote>
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
    </div>
</main>

<section class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguiridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ipsam ad numquam error velit ducimus cumque dolor molestiae
                laborum quam dolorem maiores quaerat unde, a neque cum voluptatibus
                sunt molestias distinctio.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ipsam ad numquam error velit ducimus cumque dolor molestiae
                laborum quam dolorem maiores quaerat unde, a neque cum voluptatibus
                sunt molestias distinctio.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ipsam ad numquam error velit ducimus cumque dolor molestiae
                laborum quam dolorem maiores quaerat unde, a neque cum voluptatibus
                sunt molestias distinctio.</p>
        </div>
    </div>
</section>


<?php
incluirTemplate('footer');
?>