<?php 
include_once('header.php');
?>

<main>
    <header>
        <img src="/peliculas/cliente/images/<?=$pelicula['id']?>.jpg" 
             alt="Portada de <?=$pelicula['titulo']?>">
        <h2><?=$pelicula['titulo']?></h2>
    </header>

    <section>
        <h3>Ficha técnica</h3>
        <ul>
            <li>Año: <?=$pelicula['ano']?></li>
            <li>Género/s: <?= str_replace(';', ', ', $pelicula['genero']) ?></li>
            <li>Director: 
                <a href="/peliculas/cliente/director.php?id=<?=$director['id']?>">
                    <?=$director['nombre']?> <?=$director['apellidos']?>
                </a>
            </li>
        </ul>
    </section>

    <section>
        <h3>Sinopsis</h3>
        <p><?=$pelicula['sinopsis']?></p>
    </section>

    <section>
        <h3>Actores</h3>
    </section>
</main>

<?php 
include_once('footer.php');
?>