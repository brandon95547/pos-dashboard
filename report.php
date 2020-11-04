<?php
  require './header.php';
?>

    <!-- Begin page content -->
    <main role="main" class="container">
      
      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="pt-5 pb-4 main-title">DAILY REPORT</h1>
          </div>
      </div>
      <div class="row mb-3" style="position: relative">
        <div class="col"><strong>Report Date:</strong> <span class="report-date"><?php echo date("F j, Y", strtotime("-4 hour")); ?></span> | <i onclick="window.print()" class="fa fa-print c-primaryDark printer-icon" aria-hidden="true"></i></div>
        <div class="col"></div>
        <div class="col align-self-end">
          Select Date: <input class="datepicker" type="text">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="report-data"></div>
        </div>
      </div>

    </main>

    <?php
      require "footer.php";
    ?>