<section class="py-5">
    <div class="container px-5">
        <form class="row g-3" method="post">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder  mb-5">Sistema de registre de jugadores</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Correu</label>
                <input type="email" class="form-control" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>" name="email">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contrasenya</label>
                <input type="password" class="form-control" value="<?php if (isset($_POST["passwd"])) echo $_POST["passwd"]; ?>" name="passwd">
            </div>
            <!-- <div class="col-md-6">
                <label class="form-label">Rol</label>
                <select name="role" class="form-select">
                    <option value="jugadora" selected>Player</option>
                    <option value="equiptecnic">Technician</option>
                </select>
            </div> -->
            <div class="col-md-6">
                <label class="form-label">Adreça</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST["address"])) echo $_POST["address"]; ?>" name="address">
            </div>
            <div class="col-md-6">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST["dni"])) echo $_POST["dni"]; ?>" name="dni">
            </div>
            <!-- Data for Player -->
            <div class="col-md-6">
                <label class="form-label">Nom complet</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST["name"])) echo $_POST["name"]; ?>" name="name">
            </div>
            <div class="col-6">
                <label class="form-label">Data de naixement</label>
                <input type="date" class="form-control" value="<?php if (isset($_POST["birthdate"])) echo $_POST["birthdate"]; ?>" name="birthdate">
            </div>
            <div class="col-6">
                <label class="form-label">És tècnic?</label><br>
                <input name="is_tech" class="form-check-input" type="checkbox">
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Yes
                </label>
            </div>
            <div class="col-md-6">
                <label class="form-label">Pes</label>
                <input type="number" class="form-control" value="<?php if (isset($_POST["weight"])) echo $_POST["weight"]; ?>" name="weight">
            </div>
            <div class="col-md-6">
                <label class="form-label">Alçada</label>
                <input type="number" class="form-control" value="<?php if (isset($_POST["height"])) echo $_POST["height"]; ?>" name="height">
            </div>
            <div class="col-md-6">
                <label class="form-label">Hockey posició</label>
                <select name="position" class="form-select">
                    <option value="Porter" selected>Porter</option>
                    <option value="Defensa">Defensa</option>
                    <option value="Mig campista">Mig campista</option>
                    <option value="Davanter">Davanter</option>
                </select>
            </div>
            <div class="col-12">
                <input type="submit" value="add" class="btn btn-primary" name="action">
            </div>
        </form>
    </div>
</section>