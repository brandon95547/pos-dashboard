<?php
  require './header.php';
?>

    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="mt-4 mb-4 main-title">SETTINGS</h1>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
        <div class="text-right">
          <a href="#" class="btn btn-secondary">Save Settings</a>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Setting</th>
              <th scope="col">Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Open for business?</td>
              <td><input type="radio" name="open-for-business" checked value=1> Yes &nbsp; <input type="radio" name="open-for-business" value=0> No</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </main>

    <?php
      require "footer.php";
    ?>