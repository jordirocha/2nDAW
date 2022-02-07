    <header class="p-3 bg-dark text-white">
        <div class="container px-5">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="https://freepngimg.com/thumb/logo/88052-league-pittsburgh-national-nashville-yellow-penguins-hockey.png" alt="" height="46">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <?php
                    if (!isset($_COOKIE["role"])) {
                        echo <<<JRR
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Primer equipo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.php?menu=team&option=news">Actualidad</a></li>
                            <li><a class="dropdown-item" href="index.php?menu=player&option=listPlayers">Jugadoras</a></li>
                            <li><a class="dropdown-item" href="index.php?menu=team&option=listClassification">Classificació</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Entrades</a>
                    </li>
                    JRR;
                    } elseif ($_COOKIE["role"] == "jugadora") {
                        echo <<<JRR
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?menu=player&option=myProfile">Veure dades</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?menu=user&option=modifyMyProfile">Modificar dades</a>
                </li>
                JRR;
                    } elseif ($_COOKIE["role"] == "equiptecnic") {
                        echo <<<JRR
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jugadora
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?menu=player&option=displayForm">Afegir jugadora</a></li>
                        <li><a class="dropdown-item" href="index.php?menu=player&option=displayFormDelete">Esborrar jugadora</a></li>
                        <li><a class="dropdown-item" href="index.php?menu=player&option=listAll">Listar jugadores</a></li>
                    </ul>
                </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Partit
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="">Editar l’alineació</a></li>
                        <li><a class="dropdown-item" href="">Possible alineació</a></li>
                    </ul>
                </li>
                JRR;
                    }
                    ?>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search">
                </form>
                <div class="text-end">
                    <?php if (!isset($_COOKIE["role"])) {
                        echo <<<JRR
                        <a class="btn btn-warning" href="index.php?menu=user&option=formLogin">Login</a>
                        JRR;
                    } else {
                        echo <<<JRR
                            <a class="btn btn-warning" href="index.php?menu=user&option=logout">Logout</a>
                        JRR;
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>


    <?php if (empty($_GET)) {
        echo <<<JRR
            <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Club d’hoquei Minerva</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Amunt Minerva! Set joves jugadores d'hoquei i la seva nova entrenadora lluiten per salvar la secció
                                femenina del seu club, al mateix temps que intenten trobar el seu lloc, tant dins com fora de
                                l'equip.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-warning btn-lg px-4 me-sm-3" href="#features">Apunta't-hi</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Saber-ne més</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="http://www.totmataro.cat/index.php?option=com_joomgallery&view=image&format=raw&id=39854&type=cr10" alt="..."></div>
                </div>
            </div>
        </header>
        JRR;
    } ?>