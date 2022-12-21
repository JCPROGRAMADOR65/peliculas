<?php 
include_once('header.php');
?>

<main>
    <section>
        <h2><?="$nombre $apellidos"?></h2>
    </section>

    <section>
        <h3>Películas que ha trabajado</h3>
        <ul>
            <?php foreach ($peliculas as $idPelicula => $pelicula) { ?>
                <li>
                    <a href="/peliculas/cliente/pelicula.php?id=<?=$idPelicula?>">
                        (<?=$pelicula['ano']?>) <?=$pelicula['titulo']?>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </section>
</main>

<?php 
include_once('footer.php');
?>