<?php
require_once "functions.php";
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
        <div class="container-fluid">
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
        <div>
            <form class="row g-3" method="POST" action="index.php">
                <div class="col-md-6">
                    <label for="code" class="form-label"><strong>Input your code:</strong></label>
                    <input type="text" class="form-control" value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>" name="code" placeholder="Introduce your code">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lets go!</button>
                </div>
            </form>
        </div>

        <?php
        require_once "questions.php";
        // first step is spliting the original array by ";"
        
        if (isset($_POST["code"])) {
            $code = filter_input(INPUT_POST, "code", FILTER_SANITIZE_SPECIAL_CHARS);
            // echo $code;
            if (preg_match('/^[a-zA-Z0-9]{4,10}+$/', $code)) {
                // echo "correcto";
                displayQuestions(array_key_exists($code, $arrayEnquesta), $code, $arrayEnquesta);
                // if (array_key_exists($code, $arrayEnquesta)) {
                   
                // } else {
                //     echo " $code element don't exist in the array";
                // }
            } else {
                echo "Invalid format";
            }
        }

        ?>


    </div>

</body>

</html>