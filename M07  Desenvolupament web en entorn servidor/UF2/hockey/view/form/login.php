<div class="min-vh-100 d-flex justify-content-center align-items-center text-center">
    <main class="form-signin">
        <form method="post">
            <a href="index.php">
                <img class="mb-4" src="https://freepngimg.com/thumb/logo/88052-league-pittsburgh-national-nashville-yellow-penguins-hockey.png" height="167">
            </a>
            <h1 class="h3 mb-3 fw-normal">Inicieu sessió</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" placeholder="name@example.com">
                <label>Correu</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label>Contrasenya</label>
            </div>
            <div class="text-danger">
                <?php if (isset($_SESSION["errors"])) echo $_SESSION["errors"] ?>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordarme-m'he
                </label>
            </div>
            <input class="w-100 btn btn-lg btn-warning" type="submit" name="action" value="login"></input>
        </form>
    </main>
</div>