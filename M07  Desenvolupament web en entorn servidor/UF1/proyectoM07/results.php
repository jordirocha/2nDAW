<?php
require_once "questions.php";
require_once "functions.php";
loadBody();
// Cheks if the answers are correct or not, will show both results

    // All anwsers [0]=> "0A" [1]=> "1C" [2]=> "2B" [3]=> "3B" [4]=> "4C"
    $code = $_POST['code'];
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
        
        <input type="hidden" class="form-control" value="$mssgOk" name="ok" />
        <input type="hidden" class="form-control" value="$mssgFail" name="fail" />
        
            <div class="col-12 text-center">
                <input type="submit" value="Generate PDF" class="btn btn-success" name="inform">
            </div>
        </form>
    EOT;
?>

</div>

</body>

</html>