<?php 
include_once('header.php');
?>

<section class="filtro">
    <h2>Filtrar</h2>
    <form action="" method="POST">
        <label for="filtro-titulo">Que contenga en el título: </label>
        <input id="filtro-titulo" name="titulo" type="text" value="<?=$titulo?>">

        <label for="filtro-genero">Género: </label>
        <input id="filtro-genero" name="genero" type="text" value="<?=$genero?>">

        <label for="filtro-director">Director: </label>
        <input id="filtro-director" name="director" type="text" value="<?=$director?>">

        <label for="filtro-actor">Actor: </label>
        <input id="filtro-actor" name="actor" type="text" value="<?=$actor?>">

        <label for="filtro-ano-desde">Año (desde): </label>
        <input id="filtro-ano-desde" name="ano-desde" type="number" 
                min="1940" max="2025"  value="<?=$anoDesde?>">

        <label for="filtro-ano-hasta">Año (hasta): </label>
        <input id="filtro-ano-hasta" name="ano-hasta" type="number" 
                min="1940" max="2025" value="<?=$anoHasta?>">

        <input type="submit" value="Filtrar">
    </form>
</section>

<main>
    <h2>Peliculas</h2>

    <table class="tabla-peliculas">
        <thead>
            <tr>
                <th>Portada</th>
                <th>Título</th>
                <th>Año</th>
                <th>Director</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peliculas as $pelicula) { 
                $id = $pelicula['id'];
                $titulo = $pelicula['titulo'];
                $url = "/peliculas/cliente/pelicula.php?id=$pelicula[id]";
                $ano = $pelicula['ano'];
                $director = $pelicula['director'];
                $paises = str_replace(";", ", ", $pelicula['pais']);
            ?>
                <tr>
                    <td>
                        <img src="/peliculas/cliente/images/<?=$id?>.jpg">
                    </td>
                    <td>
                        <a href="<?=$url?>"><?=$titulo?></a>
                    </td>
                    <td><?=$ano?></td>
                    <td>
                        <a href="/peliculas/cliente/director.php?id=<?=$director['id']?>">
                            <?=$director['nombre']?> <?=$director['apellidos']?>
                        </a>
                    </td>
                    <td><?=$paises?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php 
include_once('footer.php');
?>