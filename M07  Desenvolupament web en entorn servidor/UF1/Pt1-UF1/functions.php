<?php
function displayQuestions($bool, $code, $arrQuestions)
{
    $alphabet = range('A', 'Z');

    if ($bool) {
        $questions =  explode(';', $arrQuestions[$code]);
?>
        <form method="POST" action="index.php">
            <?php
            echo '<h2 class="mt-5 mb-4">' . $questions[0] . '</h2>';
            $numQuestion = 1;
            for ($i = 1; $i < sizeof($questions); $i++) {
                if ($i % 2 != 0) {
                    echo <<<HER
                        <p class="form-text">Selecciona la respuesta correcta</p>
                        <p class="fs-5">$questions[$i]</p>
                        HER;
                } else {
                    $numAnwsers = explode(':', $questions[$i]);
                    for ($j = 0; $j < sizeof($numAnwsers); $j++) {
                        echo <<<HER
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="$numQuestion" value="$numQuestion$alphabet[$j]">
                            <label class="form-check-label" for="flexRadioDefault1">
                            $numAnwsers[$j]
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
                <button type="submit" class="btn btn-primary">Ver resultados</button>
            </div>
        </form>
<?php
    } else {
        echo "no existes este test";
    }
}
?>