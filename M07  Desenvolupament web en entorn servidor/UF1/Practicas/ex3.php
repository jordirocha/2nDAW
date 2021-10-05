<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require_once "functions.php";
    headerMain();
    ?>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div>
            <!-- Formulario: action a qué archivo envio el formulario, method cómo lo envio -->
            <form class="row g-3" action="ex3.php" method="post">
                <div>
                    <h1 class="text-center">Validador DNI</h1><br>
                    <div class="row g-3">
                        <div class="col-auto">
                            <label class="col-form-label">DNI:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="dni" class="form-control" placeholder="15806137P">
                        </div>
                        <div class="col-auto">
                            <button id="btnSubmit" class="btn btn-primary mb-3">Validar</button>
                        </div>
                    </div>
                    <p id="result" class="text-center"></p>
                </div>
            </form>
        </div>
        <?php
        $words = [
            "T", "R", "W", "A", "G", "M", "Y", "F",
            "P", "D", "X", "B", "N", "J", "Z", "S",
            "Q", "V", "H", "L", "C", "K", "E"
        ];

        $dni = $_POST["dni"];
        if (strlen($dni) == 9) {
            $numerosDNI = substr($dni, 0, strlen($dni) - 1);
            $letraComprobacion = $words[$numerosDNI % 23];
            if ($dni == $numerosDNI . $letraComprobacion) {
                echo "es correcto.";
            } else {
                echo " no es correcto.";
            }
        } else {
            echo "formato incorrecto de dni.";
        }

        ?>
</body>

</html>