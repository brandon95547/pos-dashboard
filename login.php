<?php
  require './header.php';
  switch($_SERVER['HTTP_HOST']) {
    case "hounds.raptorwebsolutions.com" :
      $stores = array("Hounds");
    break;
    case "ohiodrivein.raptorwebsolutions.com" :
      $stores = array("Midway");
    break;
    case "mayfield.raptorwebsolutions.com" :
      $stores = array("Mayfield");
    break;
    default :
    $stores = array();
  }
?>

    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="mt-4 mb-4 main-title">LOGIN BELOW</h1>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="errors"></div>
          <form id="login-form" class="ts-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Select Store</label>
              <select class="form-control" name="store">
                <?php
                  foreach($stores as $store) {
                    echo '<option>' . $store . '</option>';
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="loader">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" name="createAccount" value="0">
          </form>
        </div>
      </div>
    </main>

    <?php
      require "footer.php";
    ?>