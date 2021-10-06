<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Exercici 4</title>
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center">
        <div>
            <h1 class="text-center">Exerici 4</h1>
            <form class="row g-3" action="ex4.php" method="POST">
                <div class="col-md-6">
                    <label for="email" class="form-label">Nickname</label>
                    <input type="text" class="form-control" name="nickname" placeholder="lletres o números i algun caràcter especial">
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="name" placeholder="nom real (només lletres)">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" placeholder="l'edat (només enter i entre 16 i 99 anys)">
                </div>
                <div class="col-6">
                    <label for="inputPes" class="form-label">Pes</label>
                    <input type="number" class="form-control" name="pes" placeholder="pes (amb o sense decimals i entre 40 i 300 kg)">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Sexo</label>
                    <div class="form-check">
                        <input class="form-check-input" value="Hombre" type="radio" name="sexe">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Hombre
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Mujer" type="radio" name="sexe">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mujer
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Estado civil</label>
                    <select class="form-select form-select-sm mb-3" name="estado" aria-label=".form-select-lg example">
                        <option selected value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Separado judicialmente">Separado judicialmente</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Aficiones</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Programación" name="box[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            Programación
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Lectura" name="box[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            Lectura
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Dibujo" name="box[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            Dibujo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Juegos" name="box[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            Juegos
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="correu electrònic">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <br>
            <div>
                <?php
                $nickname = true;
                $nickLetras = true;
                $nickCaract = true;
                $name = true;
                $nameLetras = true;
                $edad = true;
                $edadRango = true;
                $pes = true;
                $pesRango = true;
                $sexe = true;
                $box = true;
                $email = true;
                $emailFormat = true;

                // comprobaciones
                if (isset($_POST["nickname"]) and $_POST["nickname"] != "") {
                    if (preg_match("/\w/", $_POST["nickname"])) {
                        if (!preg_match("/[\?,#,!,¡]/", $_POST["nickname"])) {
                            $nickCaract = false;
                        }
                    } else {
                        $nickLetras = false;
                    }
                } else {
                    $nickname = false;
                }

                if (isset($_POST["name"]) and $_POST["name"] != "") {
                    if (!ctype_alpha($_POST["name"])) {
                        $nameLetras = false;
                    }
                } else {
                    $name = false;
                }

                if (isset($_POST["edad"]) and $_POST["edad"] != "") {
                    if (!ctype_alpha($_POST["edad"])) {
                        if ($_POST["edad"] < 16 or $_POST["edad"] > 99) {
                            $edadRango = false;
                        }
                    }
                } else {
                    $edad = false;
                }

                if (isset($_POST["pes"]) and $_POST["pes"] != "") {
                    if (!ctype_alpha($_POST["pes"])) {
                        if ($_POST["pes"] < 40 or $_POST["pes"] > 300) {
                            $pesRango = false;
                        }
                    }
                } else {
                    $pes = false;
                }

                if (isset($_POST["sexe"]) and $_POST["sexe"] != "") {
                    $sexe = true;
                } else {
                    $sexe = false;
                }

                if (isset($_POST["box"]) and $_POST["box"] != "") {
                    $box = true;
                } else {
                    $box = false;
                }

                if (isset($_POST["email"]) and $_POST["email"] != "") {
                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $emailFormat = false;
                    }
                } else {
                    $email = false;
                }

                // si todo es correcto mostramos toda la informacion sino le mostraremos solo los errores
                if (
                    $nickname and $nickLetras and $nickCaract and $name
                    and $nameLetras and $edad and $edadRango and $pes and $pesRango and $sexe
                    and $box and $email and $emailFormat
                ) {
                    $aficiones = implode(" ", $_POST["box"]);
                    echo <<<HER
                    Nickname: {$_POST["nickname"]}<br>
                    Nom: {$_POST["name"]}<br>
                    Edad: {$_POST["edad"]}<br>
                    Pes: {$_POST["pes"]}<br>
                    Sexe: {$_POST["sexe"]}<br>
                    Aficiones: {$aficiones}<br>
                    Email: {$_POST["email"]}
                    HER;
                } else {
                    if ($nickname) {
                        if (!$nickLetras or !$nickCaract) {
                            if (!$nickLetras) {
                                echo "<br>Falta poner letras o numero";
                            }
                            if (!$nickCaract) {
                                echo "<br>Falta poner caracter especial";
                            }
                        }
                    } else {
                        echo "<br>No has introducido nickname";
                    }

                    if ($name) {
                        if (!$nameLetras) {
                            echo "<br>Solo debe tener letras";
                        }
                    } else {
                        echo "<br>No has introducido nombre";
                    }

                    if ($edad) {
                        if (!$edadRango) {
                            echo "<br>Edad fuera de rango";
                        }
                    } else {
                        echo "<br>No has introducido edad";
                    }

                    if ($pes) {
                        if (!$pesRango) {
                            echo "<br>Peso fuera de rango";
                        }
                    } else {
                        echo "<br>No has introducido peso";
                    }

                    if (!$sexe) {
                        echo "<br>Sexo no introducido";
                    }

                    if (!$box) {
                        echo "<br>Seleccion aficiones";
                    }

                    if ($email) {
                        if (!$emailFormat) {
                            echo "<br>Email Formato incorrecto";
                        }
                    } else {
                        echo "<br>No has introducido email";
                    }
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>