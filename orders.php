<?php
  require './header.php';
?>

<script type="text/javascript">
  function printArea(areaName) {
    var prtContent = document.getElementById(areaName);
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
  }   
</script>


    <!-- Begin page content -->
    <main role="main" class="container" id="order-management-screen">
      
      <audio id="mainAudio" src="./assets/109662_grunz_success.mp3"></audio>

      <div class="row">
          <div class="col-lg-12 text-center">
              <h1 class="mt-4 mb-4 main-title">ORDER MANAGEMENT</h1>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="table-data"></div>
        </div>
      </div>

    </main>


<!-- Modal -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="receipt-wrap"></div>
      <form id="orderDetailsForm">
        <div class="errors"></div>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" id="orderName" placeholder="Name" readonly>
        </div>
        <div class="form-group">
          <label for="">Order ID</label>
          <input type="text" name="orderId" class="form-control" id="orderID" placeholder="Order ID" readonly>
        </div>
        <div class="form-group">
          <label for="">Order Ready?</label>
          <select name="ready" id="isReady" class="form-control" id="">
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
        </div>
        <div class="text-right loader-wrap">
          <img src="./assets/loading.gif" style="width: 32px; height: 32px">
          <button onclick="printArea('receipt-wrap')" type="button" class="btn btn-light"><i class="fa fa-print"></i> Print</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="audioModal" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="audioModalLabel">Order Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Therer are orders waiting to be filled.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Confirm</button>
      </div>
    </div>
  </div>
</div>

    <?php
      require "footer.php";
    ?>