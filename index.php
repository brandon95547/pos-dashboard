<?php
  require './header.php';
?>

    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-4 mb-4 main-title">ADMIN AREA</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid p-4 bg-light">
        <div class="row ts-3 text-center">
            <div class="col-3"><a href="./food.php" class="btn-primary btn">FOOD</a></div>
            <div class="col-3"><a href="./orders.php" class="btn-primary btn">ORDERS</a></div>
            <div class="col-3"><a href="./condiments.php" class="btn-primary btn">CONDIMENTS</a></div>
            <div class="col-3"><a href="./page-settings.php" class="btn-primary btn">SETTINGS</a></div>
        </div>
    </div>
<?php
  require "footer.php";
?>