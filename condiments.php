<?php
  require './header.php';
?>

    <!-- Begin page content -->
    <main role="main" class="container" id="condiments-screen">
      
      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="mt-4 mb-4 main-title">CONDIMENTS</h1>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="text-right mb-3">
            <button type="submit" class="add-condiment btn btn-primary">Create Condiment</button>
          </div>
          <div id="condiments-table">
            There are no items found.
          </div>
        </div>
      </div>

    </main>

    <!-- Modal -->
    <div class="modal fade" id="condimentsModal" tabindex="-1" role="dialog" aria-labelledby="condimentsModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="condimentsModalLabel">Add Condiment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="condimentsForm">
              <div class="errors"></div>
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="condiment-title" class="form-control" id="condiment-title" required placeholder="Title">
              </div>
              <div class="form-group">
                <label for="">Active</label>
                <div>
                  Yes <input type="radio" name="condiment-active" class="" id="condiment-active" checked value=1> 
                  No <input type="radio" name="condiment-active" class="" id="condiment-active" value=0>
                </div>
              </div>
              <div class="text-right loader-wrap">
                <img src="./assets/loading.gif" style="width: 32px; height: 32px">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
              <input type="hidden" name="condiment-id" value="0">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="removeCondimentModal" tabindex="-1" role="dialog" aria-labelledby="removeCondimentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="removeCondimentModalLabel">Remove Condiment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="removeCondimentForm">
              <div class="errors"></div>
              <div class="form-group">
                <div>
                  Yes <input type="radio" name="condiment-remove" class="" id="condiment-remove" value=1> 
                  No <input type="radio" name="condiment-remove" class="" id="condiment-remove" checked value=0>
                </div>
              </div>
              <div class="text-right loader-wrap">
                <img src="./assets/loading.gif" style="width: 32px; height: 32px">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <input type="hidden" name="condiment-id" value="0">
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      require "footer.php";
    ?>