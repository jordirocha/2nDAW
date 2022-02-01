<div class="container px-5">
    <div class="text-danger">
        <?php
        if (isset($_SESSION["errors"])) echo $_SESSION["errors"];
        ?>
    </div>
    <div class="col-12 text-success">
        <?php if (isset($_SESSION["info"])) echo $_SESSION["info"] ?>
    </div>
</div>