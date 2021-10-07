<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Exercici 6</title>
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div>
            <h1 class="text-center">Resultados ejercicio 6</h1>
            <?php
            // Mostramos los numeros introducidos
            $nums = $_POST["numeros"];
            echo "Números: " . implode(", ", $_POST["numeros"]);

            if (isset($_POST["resultado"]) and $_POST["resultado"] == "media") {
                $total = 0;
                for ($i = 0; $i < sizeof($nums); $i++) {
                    $total += $nums[$i];
                }
                echo "<br>Media aritmetica: " . $total / sizeof($nums);
            }

            if (isset($_POST["resultado"]) and $_POST["resultado"] == "mayor") {
                echo "<br>Número mayor: " . max($nums);
            }

            ?>
        </div>
    </div>

</body>

</html>