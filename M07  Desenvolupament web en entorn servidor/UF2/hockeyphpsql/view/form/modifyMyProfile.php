<section class="py-5">
    <div class="container px-5">
        <form class="row g-3" method="post">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder  mb-5">Modificació de dades</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Adreça</label>
                <input type="text" class="form-control" value="<?php echo $content->getAddress() ?>" name="address">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contrasenya</label>
                <input type="text" class="form-control" value="<?php echo $content->getPassword() ?>" name="passwd">
            </div>
            <div class="col-12">
                <input type="submit" value="modify" class="btn btn-primary text-uppercase" name="action">
            </div>
        </form>
    </div>
</section>