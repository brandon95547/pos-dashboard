// Shorthand for $( document ).ready()
$(document).ready(function() {
    let app = new driveInApp();
    app.getReport();
    app.setupDatepicker();
  });