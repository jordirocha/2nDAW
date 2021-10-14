<?php
session_start();
require_once "functions.php";
require_once "questions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>PRÀCTICA PUNTUABLE (DAW-2)</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">QuizHoot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container min-vh-100">
        <form class="row g-3 mt-5" method="POST" action="index.php">
            <div class="col-md-6">
                <label for="code" class="form-label"><strong>Input your code:</strong></label>
                <input type="text" class="form-control" value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>" name="code" placeholder="Introduce your code">
            </div>
            <div class="col-12">
                <input type="submit" value="Let's go!" class="btn btn-primary" name="codeInput">
            </div>
        </form>
        <br>
        <?php
        if (isset($_POST["codeInput"])) {
            $_SESSION["key"] =  filter_input(INPUT_POST, "code", FILTER_SANITIZE_SPECIAL_CHARS);
            if (preg_match('/^[a-zA-Z0-9]{4,10}+$/', $_SESSION["key"])) {
                  // Form for the test
                displayTest(array_key_exists($_SESSION["key"], $arrayEnquesta), $arrayEnquesta);
            } else {
                echo <<<HER
                <div class="alert alert-danger" role="alert">{$_POST["code"]} has invalid format.</div>
                HER;
            }
        }
        // Last form with conclusions and button to generate PDF
        if (isset($_POST["results"])) {
            checkAnswers($arrayRespostes);
        }

        ?>
    </div>
 
</body>

</html>