<section class="py-5">
    <div class="container px-5">
<form class="row g-3" method="post">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <div class="text-center">
                <h2 class="fw-bolder  mb-5">Resultats de la cerca</h2>
            </div>
        </div>
    </div>
    <table class="table table-hover table-dark table-striped caption-top" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">DNI</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                        foreach ($content as $data) {
            echo <<<JRR
                <tr>
                    <td>{$data->getPlayer()}</td>
                    <td>{$data->getDni()}</td>
                    <td><input type="radio" name="delPlayer" value="{$data->getDni()}"></td>
                    </tr>
                JRR;
                }
                ?>
    </tbody>
    </table>
    <div class="col-12">
        <input type="submit" value="deletePlayer" class="btn btn-primary text-uppercase" name="action">
    </div>
</form>
    </div>
</section>