class driveInApp {
  constructor() {
    
    this.orderDetailsForm = $('#orderDetailsForm');
    this.audio = document.querySelector('#mainAudio');
    this.played = [];
    this.init();
  }
  init() {
    var _this = this;


    this.setupLoginFormHeader();
    this.setupSettingsForm();
    
    var loginForm = $('#login-nav');
    loginForm.find('button[type="submit"]').click(function(e) {
        e.stopPropagation();
    });

    // get orders if on orders screen
    if($('#order-management-screen').length > 0) {
      this.getOrders();
      setInterval(function() {
        _this.getOrders(); 
      }, 10000);
    }
    // get food items for admin if on food screen
    if($('#food-management-screen').length > 0) {
      this.getFoodItems();
    }
    this.setupEvents();
  }
  setupEvents() {
    let _this = this;

    $(document).on("click", '.order-details-btn', function(e) {
      var dataId = $(this).attr('data-id');
      _this.getOrderDetails(dataId);
    });

    $(document).on("click", '.food-details-btn', function(e) {
      var dataId = $(this).attr('data-id');
      _this.getFoodDetails(dataId);
    });

    $(document).on("click", '#audioModal .modal-footer button', function(e) {
      _this.audio.load();
    });

    $(document).on("submit", "#orderDetailsForm", function(e) {
      e.preventDefault();

      // let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      $('#orderDetailsForm').find('.loader-wrap img').show();
      $('#orderDetailsForm').find('.loader-wrap button').hide();

      let formData = $('#orderDetailsForm').serializeArray();
      
      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      });
      
      // console.log(data);

      $.ajax({
        url: 'http://bluechipadvertising.com/updateOrder.php?site_id=' + site_id,
        type: 'POST',
        data: { 
          id: data.orderId,
          ready: data.ready
        },
        dataType: 'json',
        success: function (data) {
          if(data.success == false) {
            _this.displayError(data.message, 'danger');
          }
          else {
            $('#orderDetailsModal').modal("hide");
            _this.getOrders();
          }
          $('#orderDetailsForm').find('.loader-wrap img').hide();
          $('#orderDetailsForm').find('.loader-wrap button').show();
        },
        error: function (request, error) {
          // $('#orderDetailsForm').find('img').remove();
          // $('#orderDetailsForm').find('.loader-wrap button').show();
        }
      });
    });
    $(document).on("submit", "#foodDetailsForm", function(e) {
      e.preventDefault();

      // let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      $('#foodDetailsForm').find('.loader-wrap img').show();
      $('#foodDetailsForm').find('.loader-wrap button').hide();

      let formData = $('#foodDetailsForm').serializeArray();
      
      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      });
      
      console.log(data);

      $.ajax({
        url: 'http://bluechipadvertising.com/updateItem.php?site_id=' + site_id,
        type: 'POST',
        data: { 
          id: data.foodId,
          title: data.foodTitle,
          price: data.foodPrice,
          category: data.category,
          isAvailable: data.inStock
        },
        dataType: 'json',
        success: function (data) {

          console.log(data);

          if(data.success == false) {
            _this.displayError(data.message, 'danger');
          }
          else {
            $('#foodDetailsModal').modal("hide");
            _this.getFoodItems();
          }
          $('#foodDetailsForm').find('.loader-wrap img').hide();
          $('#foodDetailsForm').find('.loader-wrap button').show();
        },
        error: function (request, error) {
          // $('#foodDetailsForm').find('img').remove();
          // $('#orderDetailsForm').find('.loader-wrap button').show();
        }
      });
    });

  }
  setupLoginFormHeader() {
    var loginForm = $('#login-form');
    var _this = this;
    loginForm.submit((e) => {
      
      e.preventDefault();

      let formData = loginForm.serializeArray();
      let error = '';

      let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      loginForm.find('.loader-wrap').append(loader);
      loginForm.find('.loader-wrap button').hide();

      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      })

      if(loginForm.find('[name="email"]').val() === '') {
        error = "email is required.<br>";
      }
      if(loginForm.find('[name="password"]').val() === '') {
        error = error +  "password is required.<br>";
      }

      if(error !== '') {
        _this.displayError(error, 'danger');
      }

      $.ajax({
        url: 'http://bluechipadvertising.com/signup.php?site_id=' + site_id,
        type: 'POST',
        data: { data },
        dataType: 'json',
        success: function (data) {
          // console.log(data);
          loginForm.find('img').remove();
          loginForm.find('.loader-wrap button').show();
          if(data.success === true) {
            _this.createUserSession(data.user);
            setTimeout(function() {
              let redirectLink = '';
              switch(site_id) {
                case 1 :
                  redirectLink = "http://hounds.raptorwebsolutions.com";
                  break;
                case 2 :
                  redirectLink = "http://ohiodrivein.raptorwebsolutions.com";
                  break;
                case 3 :
                  redirectLink = "http://mayfield.raptorwebsolutions.com";
                  break;
              }
              window.location = redirectLink;
            }, 1500);
          }
          else {
            _this.displayError('Login unsuccessful...', 'danger');
          }
        },
        error: function (request, error) {
          // console.log("Request: " + JSON.stringify(request));
          loginForm.find('img').remove();
          loginForm.find('.loader-wrap button').show();
        }
      });
    });
  }
  setupSettingsForm() {
    var settingsForm = $('#settings-form');
    var _this = this;
    settingsForm.submit((e) => {
      
      e.preventDefault();

      let formData = settingsForm.serializeArray();
      let error = '';

      // let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      // settingsForm.find('.loader-wrap').append(loader);
      // settingsForm.find('.loader-wrap button').hide();

      
      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      })
      
      if(error !== '') {
        _this.displayError(error, 'danger');
      }

      $.ajax({
        url: 'http://bluechipadvertising.com/store-settings.php?site_id=' + site_id,
        type: 'POST',
        data: { data },
        dataType: 'json',
        success: function (data) {
          console.log(data);
          // settingsForm.find('img').remove();
          // settingsForm.find('.loader-wrap button').show();
          if(data.success === true) {
            // _this.createUserSession(data.user);
            alert("Settings updated.");
            
          }
          else {
            _this.displayError('There was an error', 'danger');
          }
        },
        error: function (request, error) {
          console.log(error);
          // console.log("Request: " + JSON.stringify(request));
          // settingsForm.find('img').remove();
          // settingsForm.find('.loader-wrap button').show();
        }
      });
    });
  }
  displayError(error, type) {
    let markup = '<div class="alert alert-' + type + '" role="alert">' + error + '</div>';
    $('.errors').html(markup);

    $('.errors').fadeIn();
    setTimeout(function() {
      $('.errors').fadeOut();
    }, 3000);
  }
  getOrders() {

    let _this = this;

    $.ajax({
      url: 'http://bluechipadvertising.com/getOrderItems.php?site_id=' + site_id,
      type: 'GET',
      success: function (data) {

        let orders = JSON.parse(data);
        let shouldPlay = false;

        let ordersTable = '<table class="table">\
        <thead>\
          <tr>\
            <th scope="col">#</th>\
            <th scope="col">Name</th>\
            <th scope="col">Time</th>\
            <th scope="col">Action</th>\
          </tr>\
        </thead>\
        <tbody>';

        orders.forEach(function (value) {

          // value[0] name
          // value[1] order id
          // value[2] ready flag
          // value[3] ready flag

          if(value[3] == 0) {
            shouldPlay = true;
          }

          let buttonClass = value[2] == 1 ? ' btn-light' : ' btn-success';

          ordersTable += '<tr>\
          <td>' + value[1] + '</td>\
          <td>' + value[0] + '</td>\
          <td>' + value[4] + '</td>\
          <td><button type="button" class="btn order-details-btn' + buttonClass + '" data-id="' + value[1] + '" data-ready="' + value[2] + '">View Order</button></td>\
        </tr>';
        });

        
        ordersTable += '</tbody></table>';
        
        $('#table-data').html(ordersTable);
        
        if(shouldPlay) {

          let firstId = $('#table-data tr').eq(1).find('td').eq(0).text();
          console.log('first id', firstId);
          
          if(_this.played.indexOf(firstId) === -1) {
            _this.audio.loop = true;
            $('#audioModal').modal("show");
            _this.audio.play();
          }

          $('#table-data tr').each(function() {
            var id = $(this).find('td').eq(0).text();
            if(_this.played.indexOf(id) === -1) {
              _this.played.push(id);
              
            }
          });
        }

      },
      error: function (request, error) {
        // console.log(error);
      }
    });
    
  }
  getFoodItems() {

    let _this = this;

    $.ajax({
      url: 'http://bluechipadvertising.com/getFoodItems.php?site_id=' + site_id,
      type: 'GET',
      success: function (data) {

        let orders = JSON.parse(data);

        // console.log(orders);

        let ordersTable = '<table class="table">\
        <thead>\
          <tr>\
            <th scope="col">Title</th>\
            <th scope="col">Price</th>\
            <th scope="col">Category</th>\
            <th scope="col">Ready</th>\
          </tr>\
        </thead>\
        <tbody>';

        orders.forEach(function (value) {

          // value[0] title
          // value[1] price
          // value[2] category
          // value[3] id
          // value[4] ready

          ordersTable += '<tr>\
          <td>' + value[0] + '</td>\
          <td>' + value[1] + '</td>\
          <td>' + value[2] + '</td>\
          <td><button type="button" class="btn food-details-btn btn-light" data-id="' + value[3] + '" data-ready="' + value[4] + '">Edit Item</button></td>\
        </tr>';


        }); 

        ordersTable += '</tbody></table>';

        $('#table-data').html(ordersTable);

      },
      error: function (request, error) {
        // console.log(error);
      }
    });
    
  }
  getOrderDetails(orderId) {

    let _this = this;
    let receipt = '';

    $.ajax({
      url: 'http://bluechipadvertising.com/getFoodOrder.php?site_id=' + site_id + '&order_id=' + orderId,
      type: 'GET',
      success: function (data) {

        data = JSON.parse(data);
        data = data[0];

        let foodOrderItems = JSON.parse(data.food_order_items);

        let printHtml = '<div><strong>Order ID</strong>: ' + orderId + '</div>'
        printHtml += '<style>body{font-size: 19px;font-family: Arial, sans-serif;}</style>';
        printHtml += '<div><strong>Name:</strong> ' + data.name + '<br><br></div>'
        printHtml += '<div><strong>Time:</strong> ' + data.food_order_dtm + '<br><br></div>'

        foodOrderItems.items.forEach(function(subItem, subIndex) {

          if(subItem.quantity != 0) {

            printHtml += '<div><strong>' + subItem.title + '</strong>, Quantity: ' + subItem.quantity + '</div>'

            let c1 = []
            let c2 = []
            let c3 = []

            subItem.condiments.forEach((cItem, cIndex) => {
              switch(cItem.substring(cItem.length - 1, cItem.length)) {
                case '0' :
                  c1.push(cItem.substring(0, cItem.length - 2));
                break;
                case '1' :
                  c2.push(cItem.substring(0, cItem.length - 2));
                break;
                case '2' :
                  c3.push(cItem.substring(0, cItem.length - 2));
                break;
              }
            });

            let c1Markup = '';
            if(c1.length > 0) {
              c1.forEach((c1Item) => {
                c1Markup += c1Item + ',';
              })
              printHtml += '<div> &nbsp;&nbsp;&nbsp; #1' + '(' + c1Markup + ')</div>';
            }
            let c2Markup = '';
            if(c2.length > 0) {
              c2.forEach((c2Item) => {
                c2Markup += c2Item + ',';
              })
              printHtml += '<div> &nbsp;&nbsp;&nbsp; #2' + '(' + c2Markup + ')</div>';
            }
            let c3Markup = '';
            if(c3.length > 0) {
              c3.forEach((c3Item) => {
                c3Markup += c3Item + ',';
              })
              printHtml += '<div> &nbsp;&nbsp;&nbsp; #3' + '(' + c3Markup + ')</div>';
            }
          }

        }
          
          
        );

      // }

        printHtml += "<div>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.</div>";

        $('#receipt-wrap').html(printHtml);

        $('#orderName').val(data.name);
        $('#orderID').val(data.food_order_id);

        if(data.ready == 1) {
          $('#isReady option').eq(0).prop( "selected", false );
          $('#isReady option').eq(1).prop( "selected", true );
        }
        else {
          $('#isReady option').eq(0).prop( "selected", true );
          $('#isReady option').eq(1).prop( "selected", false );
        }

        $('#orderDetailsModal').modal("show");
      },
      error: function (request, error) {
        // console.log(error);
      }
    });
  }
  getFoodDetails(foodId) {

    let _this = this;

    $.ajax({
      url: 'http://bluechipadvertising.com/getFoodItem.php?site_id=' + site_id + '&id=' + foodId,
      type: 'GET',
      success: function (data) {

        data = JSON.parse(data);

        $('#foodDetailsModal .modal-title').text('Edit | ' + data.food_title);
        $('#foodDetailsModal #food-title').val(data.food_title);
        $('#foodDetailsModal #food-price').val(data.food_price);
        $('#foodDetailsModal #foodId').val(data.food_id);
        if(data.in_stock == 1) {
          $('#foodDetailsModal #in-stock').prop("checked", true);
        }
        else {
          $('#foodDetailsModal #in-stock').prop("checked", false);
        }

        $('#foodDetailsModal #category option').each(function() {
          
          if(data.food_category == $(this).val()) {
            $(this).prop("selected", "selected");
          }
          
        });

        $('#foodDetailsModal').modal("show");
      },
      error: function (request, error) {
        // console.log(error);
      }
    });
  }
  createUserSession(data) {
    $.ajax({
      url: '/createUserSession.php?site_id=' + site_id,
      type: 'POST',
      data: { data },
      success: function (data) {
        // console.log(data);
      },
      error: function (request, error) {
        // console.log("Request: " + JSON.stringify(request));
      }
    });
  }
  getCondiments() {
    
    var _this = this;

    $.ajax({
      url: 'http://bluechipadvertising.com/getCondiments.php?site_id=' + site_id,
      type: 'GET',
      success: function (data) {
        
        var html = '<table class="table table-striped">';
        html += '<thead><th>Title</th><th>Active</th><th>Action</th></thead>';
        JSON.parse(data).forEach(function(row) {
          html += '<tr><td>' + row.c_title + '</td><td>' + row.active + '</td><td><a class="edit-condiment" data-id="' + row.c_id + '" href="#"><i class="fa fa-pencil c-secure mr-2" aria-hidden="true"></i></a> | <a class="remove-condiment" data-id="' + row.c_id + '" href="#"><i class="fa fa-times c-secure ml-2" aria-hidden="true"></i></a></td></tr>';
        });
        html += '</table>';

        document.getElementById("condiments-table").innerHTML = html;
        _this.setupActions();

      },
      error: function (request, error) {
        console.log("Request: " + JSON.stringify(request));
      }
    });
  }
  setupCondimentsUpdateForm() {
    var _this = this;
    $(document).on("submit", "#condimentsForm", function(e) {
      e.preventDefault();

      // let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      $('#condimentsForm').find('.loader-wrap img').show();
      $('#condimentsForm').find('.loader-wrap button').hide();

      let formData = $('#condimentsForm').serializeArray();
      
      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      });
      
      $.ajax({
        url: 'http://bluechipadvertising.com/updateCondiment.php?site_id=' + site_id,
        type: 'POST',
        data: { 
          title: data['condiment-title'],
          active: data['condiment-active'],
          condimentId: data['condiment-id']
        },
        dataType: 'json',
        success: function (data) {
          if(data.success == false) {
            _this.displayError(data.message, 'danger');
          }
          else {
            $('#condimentsModal').modal("hide");
            _this.getCondiments();
          }
          $('#condimentsForm').find('.loader-wrap img').hide();
          $('#condimentsForm').find('.loader-wrap button').show();
        },
        error: function (request, error) {
          
        }
      });

    });
  }
  getCondimentDetails(condimentId) {
    $.ajax({
      url: 'http://bluechipadvertising.com/getCondiment.php?site_id=' + site_id,
      type: 'POST',
      data: { 
        condimentId: condimentId
      },
      dataType: 'json',
      success: function (data) {
        if(data.success == false) {
          
        }
        else {
          $('#condimentsForm [name="condiment-title"]').val(data.c_title);
          $('#condimentsForm button[type="submit"]').text("Update");
          if(data.active == 1) {
            $('#condimentsForm [name="condiment-active"]').eq(0).attr("checked", "checked");
          }
          else {
            $('#condimentsForm [name="condiment-active"]').eq(1).attr("checked", "checked");
          }
        }
        $('#condimentsForm').find('.loader-wrap img').hide();
        $('#condimentsForm').find('.loader-wrap button').show();
      },
      error: function (request, error) {
        
      }
    });
  }
  setupActions() {
    var _this = this;
    $('.remove-condiment').on("click", function(e) {
      e.preventDefault();
      var condimentId = $(this).attr("data-id");
      $('#removeCondimentModal [name="condiment-id"]').val(condimentId);
      $('#removeCondimentModal').modal("show");
      _this.setupCondimentsRemoveForm();
    });
    $('.edit-condiment').on("click", function(e) {
      e.preventDefault();
      var condimentId = $(this).attr("data-id");
      $('#condimentsModal [name="condiment-id"]').val(condimentId);
      _this.getCondimentDetails(condimentId);
      $('#condimentsModal').modal("show");
      _this.setupCondimentsUpdateForm();
    });
    $('.add-condiment').on("click", function(e) {
      $('#condimentsModal').modal("show");
      _this.setupCondimentsUpdateForm();
    });
  }
  setupCondimentsRemoveForm() {
    var _this = this;
    $(document).on("submit", "#removeCondimentForm", function(e) {
      console.log('remove form submitted');
      e.preventDefault();

      // let loader = '<img src="./assets/loading.gif" style="width: 24px; height: 24px">';
      $('#removeCondimentForm').find('.loader-wrap img').show();
      $('#removeCondimentForm').find('.loader-wrap button').hide();

      let formData = $('#removeCondimentForm').serializeArray();
      
      // build out data object for the post
      let data = {};
      formData.map((input) => {
        data[input.name] = input.value;
      });
      
      $.ajax({
        url: 'http://bluechipadvertising.com/removeCondiment.php?site_id=' + site_id,
        type: 'POST',
        data: { 
          condimentId: data['condiment-id'],
          condimentRemove: data['condiment-remove']
        },
        dataType: 'json',
        success: function (data) {
          if(data.success == false) {
            _this.displayError(data.message, 'danger');
          }
          else {
            $('#removeCondimentModal').modal("hide");
            _this.getCondiments();
          }
          $('#removeCondimentForm').find('.loader-wrap img').hide();
          $('#removeCondimentForm').find('.loader-wrap button').show();
        },
        error: function (request, error) {
          
        }
      });

    });
  }
}