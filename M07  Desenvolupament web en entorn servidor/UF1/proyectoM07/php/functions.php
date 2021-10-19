<?php
// Function that insert the quiz form that user introduce to the input
function displayTest($arrayEnquesta, $code)
{
    $numQuestion = 0;
    $alphabet = range('A', 'Z');
    $questions = explode(';', $arrayEnquesta[$code]);
?>
    <form method="POST" action="results.php">
        <?php
        echo '<h2 class="mt-5 mb-4">' . $questions[0] . '</h2>';
        for ($i = 1; $i < sizeof($questions); $i++) {
            // All odd are questions and all even are possible answers
            if ($i % 2 != 0) {
                echo <<<HER
                <p class="form-text">Selecciona la respuesta correcta</p>
                <p class="fs-5">$questions[$i]</p>
                HER;
            } else {
                $answers = explode(':', $questions[$i]);
                for ($j = 0; $j < sizeof($answers); $j++) {
                    echo <<<HER
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="$numQuestion" value="$numQuestion$alphabet[$j]">
                    <label class="form-check-label" for="flexRadioDefault1">
                    $answers[$j]
                    </label>
                    </div>
                    HER;
                }
                $numQuestion++;
                echo "<br>";
            }
        }
        ?>
        <div class="col-12">
            <div class="d-none">
                <input type="text" class="form-control" value="<?php echo $code ?>" name="code" />
            </div>
            <input type="submit" value="Check results" class="btn btn-primary" name="results">
        </div>
    </form>
<?php
}
// Function that cheks if the answers are correct or not, will show both results
function checkAnswers($arrayRespostes, $code)
{
    // All anwsers [0]=> "0A" [1]=> "1C" [2]=> "2B" [3]=> "3B" [4]=> "4C"
    $solutions = explode(';', $arrayRespostes[$code]);
    $ok = 0;
    $mssgOk = "";
    $mssgFail = "";
    for ($i = 0; $i < sizeof($solutions); $i++) {
        // Each question we selected will be compared whit correct one, example: 1A == 1C? = False...
        if (isset($_POST[$i])) {
            if ($solutions[$i] == $_POST[$i]) {
                $ok++;
                $mssgOk .= $i + 1 . ", ";
            } else {
                $mssgFail .= $i + 1 . ", ";
            }
        } else {
            $mssgFail .= $i + 1 . ", ";
        }
    }
    $mssgOk = "You did $ok good from " . sizeof($solutions) . " questions: $mssgOk";
    $mssgFail = "You failed " . sizeof($solutions) - $ok .  " questions: $mssgFail";
    echo <<<EOT
        <div class="alert alert-success mt-5" role="alert">$mssgOk</div>
        <div class="alert alert-warning" role="alert">$mssgFail</div>
        <form method="POST" action="generatePDF.php">
        <div class="d-none">
        <input type="text" class="form-control" value="$mssgOk" name="ok" />
        <input type="text" class="form-control" value="$mssgFail" name="fail" />
        </div>
            <div class="col-12 text-center">
                <input type="submit" value="Generate PDF" class="btn btn-success" name="inform">
            </div>
        </form>
    EOT;
}
// Function that inserts structure of HTML, useful when we have more than once page 
function loadBody()
{
    echo <<<HER
            <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/index.css">
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
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
    HER;
}
?>