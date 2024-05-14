<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Api de shibes</h1>
    <form method="post">
        <label for="">Introduce el número de shibes que quieres ver</label>
        <input type="text" id="numero" name="numero">
        <input type="submit" values="Enseñame shibes">
    </form>
    

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $numero = $_POST["numero"];
        $apiurl = "http://shibe.online/api/shibes?count=$numero";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiurl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta,true);

        
        foreach($array as $perros){?>
            <img src="<?php echo $perros ?>" alt="">
        <?php }
        
    }
    ?>
</body>
</html>