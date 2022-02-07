<section class="py-5">
    <div class="container px-5">
        <form class="row g-3" method="post">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder  mb-5">Eliminació de jugadores</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST["name"])) echo $_POST["name"]; ?>" name="name">
            </div>
            <div class="col-md-6">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST["dni"])) echo $_POST["dni"]; ?>" name="dni">
            </div>
            <div class="col-12">
                <input type="submit" value="search" class="btn btn-primary text-uppercase" name="action">
            </div>
        </form>
    </div>
</section>