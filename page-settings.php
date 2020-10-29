<?php
  require './header.php';

  require "settings.php";

  $servername = "127.0.0.1";
  $username = $sqlUser;
  $password = $sqlPass;

  $conn = new mysqli($servername, $username, $password, $sqlDb);

  $result = $conn->query("select openForBusiness from store where site_id = $site_id");
  $row = $result->fetch_assoc();
  $openForBusiness = $row['openForBusiness'];
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
        <form id="settings-form">
          <div class="text-right mb-3">
            <button type="submit" class="btn btn-primary">Save Settings</button>
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
                <td>
                  <input type="radio" name="open-for-business"<?php echo $openForBusiness ? ' checked' : ''; ?> value=1> Yes &nbsp; 
                  <input type="radio" name="open-for-business"<?php echo !$openForBusiness ? ' checked' : ''; ?> value=0> No
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </main>

    <?php
      require "footer.php";
    ?>