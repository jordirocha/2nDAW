<?php
require_once "functions.php";
require_once "questions.php";
loadBody()
?>
<form class="row g-3 mt-5" method="POST" action="index.php">
    <div class="col-md-6">
        <label for="code" class="form-label"><strong>Input your code:</strong></label>
        <input type="text" class="form-control" value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>" name="code" placeholder="Introduce your code">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Let's go!</button>
    </div>
</form>
<br>
<?php
if (isset($_POST["code"])) {
    $code = filter_input(INPUT_POST, "code", FILTER_SANITIZE_SPECIAL_CHARS);
    if (preg_match('/^[a-zA-Z0-9]{4,10}+$/', $code)) {
        if (key_exists($code, $arrayEnquesta)) {
           header("Location: quiz.php?code=$code");
        } else {
            echo <<<HER
                <div class="alert alert-danger" role="alert">{$code} doesn't exist in the array.</div>
            HER;
        }
    } else {
        echo <<<HER
                <div class="alert alert-danger" role="alert">{$code} has invalid format.</div>
                HER;
    }
}
?>
</div>

</body>

</html>