<?php
  require './header.php';
?>

    <main role="main" class="container">
        <!-- Begin page content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="pt-5 pb-4 main-title">ADMIN AREA</h1>
                </div>
            </div>
        </div>
        <div class="container p-4">
            <div class="row ts-3 text-center">
                <div class="col-3"><a href="./food.php" class="btn-primary btn btn-md"><i class="fa fa-cutlery c-white" aria-hidden="true"></i>&nbsp; FOOD</a></div>
                <div class="col-3"><a href="./orders.php" class="btn-primary btn btn-md"><i class="fa fa-list c-white" aria-hidden="true"></i>&nbsp; ORDERS</a></div>
                <div class="col-3"><a href="./condiments.php" class="btn-primary btn btn-md"><i class="fa fa-flask c-white" aria-hidden="true"></i>&nbsp; CONDIMENTS</a></div>
                <div class="col-3"><a href="./page-settings.php" class="btn-primary btn btn-md"><i class="fa fa-cog c-white" aria-hidden="true"></i>&nbsp; SETTINGS</a></div>
            </div>
            <div class="row ts-3 text-center mt-5">
                <div class="col-3"><a href="./report.php" class="btn-primary btn btn-md"><i class="fa fa-line-chart c-white" aria-hidden="true"></i>&nbsp; REPORT</a></div>
            </div>
        </div>
    </main>

<?php
  require "footer.php";
?>