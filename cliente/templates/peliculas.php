<?php 
include_once('header.php');

echo "<pre>";
print_r($respuesta['data']['datos']);
echo "</pre>";
?>

<main>
    <h2>Peliculas</h2>

    <table class="tabla-peliculas">
        <thead>
            <tr>
                <th>Portada</th>
                <th>Título</th>
                <th>Año</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peliculas as $pelicula) { 
                $imagen = $pelicula['imagen'];
                $titulo = $pelicula['titulo'];
                $url = "/peliculas/cliente/pelicula.php?id=$pelicula[id]";
                $ano = $pelicula['ano'];
                $director = $pelicula['director'];
                $paises = explode(";", $pelicula['pais']);
            ?>
                <tr>
                    <td>
                        <img src="/peliculas/cliente/images/<?=$imagen?>">
                    </td>
                    <td>
                        <a href="<?=$url?>"><?=$titulo?></a>
                    </td>
                    <td>1995</td>
                    <td>Quentin Tarantino</td>
                    <td>Estados Unidos</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php 
include_once('footer.php');
?>