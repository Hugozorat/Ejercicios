<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Api de Ricky y Morty</h1>

    <form action="">
        <label for="">Cantidad de personajes</label>
        <input type="text"><br><br>
        <label for="">Género</label>
        <select name="" id="">
            <option value="">Female</option>
            <option value="">Male</option>
        </select>
        <label for="">Especie</label>
        <select name="" id="">
            <option value="">Human</option>
            <option value="">Alien</option>
        </select>
    </form>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            $genero = $_POST['genero'];
            $especie = $_POST['especie'];
                $apiurl = "https://rickandmortyapi.com/documentation/";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiurl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                $rickymoarty = json_decode($respuesta,true);

                

                
            }

            ?>

</body>
</html>