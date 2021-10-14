<?php
function displayTest($existCode, $arrayEnquesta)
{
    if ($existCode) {
        $numQuestion = 0;
        $alphabet = range('A', 'Z');
        $questions = explode(';', $arrayEnquesta[$_SESSION["key"]]);
?>
        <form method="POST" action="index.php">
            <?php
            echo '<h2 class="mt-5 mb-4">' . $questions[0] . '</h2>';
            for ($i = 1; $i < sizeof($questions); $i++) {
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
                <input type="submit" value="Check results" class="btn btn-primary" name="results">
            </div>
        </form>
<?php
    } else {
        echo <<<HER
            <div class="alert alert-danger" role="alert">{$_SESSION["key"]} doesn't exist in the array.</div>
        HER;
    }
}

function checkAnswers($arrayRespostes)
{
    // [0]=> "0A" [1]=> "1C" [2]=> "2B" [3]=> "3B" [4]=> "4C"
    $solutions = explode(';', $arrayRespostes[$_SESSION["key"]]);
    $ok = 0;
    $mssgOk = "";
    $mssgFail = "";
    for ($i = 0; $i < sizeof($solutions); $i++) {
        // Each question we selected will be compared whit correct one, example: 1A == 0A? = False...
        if ($solutions[$i] == $_POST[$i]) {
            $ok++;
            $mssgOk .= $i + 1 . ", ";
        } else {
            $mssgFail .= $i + 1 . ", ";
        }
    }
    $mssgOk = "You did $ok good from " . sizeof($solutions) . " questions: $mssgOk";
    $mssgFail = "You failed " . sizeof($solutions) - $ok .  " questions: $mssgFail";
    echo <<<EOT
        <div class="alert alert-success" role="alert">$mssgOk</div>
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

?>