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
            <h1 class="text-center">Exerici 6</h1>
            <form class="row g-3" action="ex6.php" method="POST">
                <div class="col-12">
                    <label for="number" class="form-label">Numero</label>
                    <input type="number" class="form-control" name="num" placeholder="mayor a 1">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <div>
                <?php
                if (isset($_POST["num"])) {
                    if ($_POST["num"] >= 1) {

                ?>

                        <form class="row g-3" action="resultado6.php" method="POST">
                            <div class="col-12">
                                <label for="number" class="form-label">Numero</label>
                                <?php

                                for ($i = 0; $i < $_POST["num"]; $i++) {
                                    echo <<<HER
                                    <input type="number" class="form-control" name="numeros[]" placeholder="Numero">
                                    HER;
                                }

                                ?>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Resultados</button>
                            </div>
                        </form>


                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>