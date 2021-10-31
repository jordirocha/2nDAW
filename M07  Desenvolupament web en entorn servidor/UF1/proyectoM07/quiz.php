<?php
require_once "functions.php";
require_once "questions.php";
loadBody();

// Inserts the quiz form that user introduce on the input
$code = $_GET['code'];
$file = fopen("enquestes/4IVDr8.txt", "r");
echo fgets($file);
echo "helloWorld";
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
        
            <input type="hidden" class="form-control" value="<?php echo $code ?>" name="code" />
        
        <input type="submit" value="Check results" class="btn btn-primary" name="results">
    </div>
</form>




</div>

</body>

</html>