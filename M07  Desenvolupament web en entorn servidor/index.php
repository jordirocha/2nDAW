<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Tabla de multiplicar</title>
</head>

<body>
<?php
require "h2.php";
?>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div>
            <!-- Formulario: action a qué archivo envio el formulario, method cómo lo envio -->
            <form class="row g-3" action="index.php" method="get">
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Email</label>
                    <input type="text" class="form-control-plaintext" value="Introduce número:">
                </div>
                <div class="col-auto">
                    <label for="number" class="visually-hidden">numero</label>
                    <input type="text" name="number" class="form-control" placeholder="Número">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Calcular</button>
                </div>
            </form>
            <?php
            $num = $_GET["number"] ? $_GET["number"] : 0;
            if ($num > 0 && $num < 20) { ?>
                <h1 class="text-center">Tabla de multiplicar <?php echo $num ?> </h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>X</th>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<th>$i</th>";
                        }
                        ?>
                    </tr>
                    <?php
                    for ($i = 1; $i <= $num; $i++) {
                        echo "<tr>";
                        echo "<th>$i</th>";
                        for ($j = 1; $j <= 10; $j++) {
                            echo "<td>" . ($j * $i) . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "$num no es valido.";
            }
            ?>
        </div>
    </div>

</body>

