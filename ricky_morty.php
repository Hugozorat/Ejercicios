<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Personajes de Rick and Morty</title>
</head>
<body>
    <h1>Consulta de Personajes de Rick and Morty</h1>
    <form method="POST" action="">
        <label for="cantidad_personajes">Cantidad de personajes:</label>
        <input type="text" id="cantidad_personajes" name="cantidad_personajes" required><br><br>
        
        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select><br><br>

        <label for="especie">Especie:</label>
        <select id="especie" name="especie">
            <option value="human">Human</option>
            <option value="alien">Alien</option>
        </select><br><br>

        <button type="submit">Buscar Personajes</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad_personajes = $_POST["cantidad_personajes"];
        $genero = $_POST["genero"];
        $especie = $_POST["especie"];

        $url = "https://rickandmortyapi.com/api/character/?gender=$genero&species=$especie&limit=$cantidad_personajes";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $personajes = json_decode($respuesta, true);
        $count = 0;
        if (!empty($personajes['results'])) {
            echo "<h2>Resultados:</h2>";
            foreach ($personajes['results'] as $character) {
                if($count <= $cantidad_personajes){
                    echo "<p><strong>Nombre:</strong> " . $character['name'] . "<br>";
                    echo "<strong>Género:</strong> " . $character['gender'] . "<br>";
                    echo "<strong>Especie:</strong> " . $character['species'] . "<br>";
                    echo "<strong>Origen:</strong> " . $character['origin']['name'] . "</p>";
                    $count++;
                }
            }
        } else {
            echo "<p>No se encontraron personajes que coincidan con los criterios de búsqueda.</p>";
        }
    }
    ?>
</body>
</html>