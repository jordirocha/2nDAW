<?php

function headerMain()
{
  // Notation heredoc
  echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="ex1.php">Ex 1</a>
          <a class="nav-link active" aria-current="page" href="ex2.php">Ex 2</a>
          <a class="nav-link active" aria-current="page" href="ex3.php">Ex 3</a>
          <a class="nav-link active" aria-current="page" href="ex4.php">Ex 4</a>
          <a class="nav-link active" aria-current="page" href="ex5.php">Ex 5</a>
          <a class="nav-link active" aria-current="page" href="ex6.php">Ex 6</a>
        </div>
      </div>
    </div>
  </nav>
    ';
}
