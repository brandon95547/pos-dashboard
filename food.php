<?php
  require './header.php';
?>

    <!-- Begin page content -->
    <main role="main" class="container" id="food-management-screen">
      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="mt-4 mb-4 main-title">FOOD MANAGEMENT</h1>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="table-data"></div>
        </div>
      </div>
    </main>


    <!-- Modal -->
<div class="modal fade" id="foodDetailsModal" tabindex="-1" role="dialog" aria-labelledby="foodDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="foodDetailsModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="foodDetailsForm">
        <div class="errors"></div>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="foodTitle" class="form-control" id="food-title" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="foodPrice" class="form-control" id="food-price" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="">Category</label>
          <select name="category" class="form-control" id="category">
            <option>FROM THE GRILL</option>
            <option>SNACKS</option>
            <option>BEVERAGES</option>
            <option>MISCELLANEIOUS</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">In Stock?</label>
          <input type="checkbox" checked id="in-stock" name="inStock" value=1>
        </div>
        <div class="text-right loader-wrap">
          <img src="./assets/loading.gif" style="width: 32px; height: 32px">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <input type="hidden" name="foodId" id="foodId">
      </form>
      </div>
    </div>
  </div>
</div>

    <?php
      require "footer.php";
    ?>