<?php 
include_once('header.php');
?>

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