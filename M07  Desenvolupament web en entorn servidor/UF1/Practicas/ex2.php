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
            <form class="row g-3" action="ex2.php" method="post">
                <div>
                    <h1 class="text-center">Validador Palíndromo</h1><br>
                    <div class="row g-3">
                        <div class="col-auto">
                            <label class="col-form-label">Palíndromo:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="sentence" class="form-control" placeholder="Tenet">
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
        // Original
        $sentence = $_POST["sentence"];
        $copySentence = $sentence;
        // Limpieza de caracteres
        $sentence = str_replace(['¡', '!', '¿', '?', ".", " ",','], '', $sentence);
        $sentence = str_replace(['á', 'à'], "a", $sentence);
        $sentence = str_replace(['é', 'è'], "e", $sentence);
        $sentence = str_replace(['í', 'ì'], 'i', $sentence);
        $sentence = str_replace(['ó', 'ò'], 'o', $sentence);
        $sentence = str_replace(['ú', 'ù'], 'u', $sentence);
        $sentence = strtolower($sentence);
        // Comprobacion de si es palindroma
        $palidrome = true;
        for ($i = 0; $i < strlen($sentence); $i++) {
            if ($sentence[$i] != $sentence[strlen($sentence) - 1 - $i]) {
                $palidrome = false;
                break;
            }
        }
        if ($palidrome) {
            echo "$copySentence es palíndroma.";
        } else {
            echo "$copySentence no es palíndroma.";
        }
        ?>
    </div>
</body>

</html>