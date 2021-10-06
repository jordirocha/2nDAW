<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Exercici 5</title>
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div>
            <h1 class="text-center">Exerici 5</h1>
            <form class="row g-3" action="ex5.php" method="POST">
                <div class="col-12">
                    <label for="number" class="form-label">Numero</label>
                    <input type="number" class="form-control" name="num" placeholder="enter entre 1 i 8 ">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <div>
                <?php
                if (isset($_POST["num"])) {
                    if ($_POST["num"] >= 1 and $_POST["num"] <= 8) {
                ?>
                        <form class="row g-3" action="ex5.php" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Dilluns</th>
                                        <th scope="col">Dimarts</th>
                                        <th scope="col">Dimecres</th>
                                        <th scope="col">Dijuos</th>
                                        <th scope="col">Divendres</th>
                                        <th scope="col">Dissabte</th>
                                        <th scope="col">Diumenge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dies = 0;
                                    for ($i = 0; $i < $_POST["num"]; $i++) {
                                        echo "<tr>";
                                        for ($j = 0; $j < 7; $j++) {
                                            $dies++;
                                            echo <<<HER
                                            <td>  <input class="form-check-input" type="checkbox" value="$dies" name="box[]">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            $dies
                                            </label> </td>
                                            HER;
                                            $dies > 30 ? $dies = 0 : "";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                <?php
                    }
                }
                ?>

                <?php
                if (isset($_POST["box"])) {
                    echo "Total de dias seleccionados: " .  sizeof($_POST["box"]) . "<br>Dias selecciondos: " . implode(" ", $_POST["box"]);
                }

                ?>

            </div>
        </div>
    </div>

</body>

</html>