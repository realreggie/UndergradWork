$(document).ready(function () {
    
    var allowAjaxHide = false;
    $('#ajaxIndicator').on('hide.bs.modal', function(event) {
        if (!allowAjaxHide) {
            event.preventDefault(); 
            allowAjaxHide = false;
        }
    });
    
    $('#getposts_form').submit(function (event) {
        event.preventDefault();
        
       // clear out our output areas first!
       $('#output').empty();
       $('#errors').empty();
        
        var startdate = $("#startdate").val();
        var enddate = $("#enddate").val();
        var title = $("#title").val();
        var limit = $("#limit").val();
        var favorites = $("#favorites").val();
        var body = $("#body").val();
        var sort = $("#sort").val();
        var sort_descending = $("#sort_descending").val();
 
        
        // ***** TODO: VALIDATE STARTDATE AND ENDDATE; DISPLAY VALIDATION ERRORS IN "ERRORS" DIV
        

	    // regular expression to match required date format
	    re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
	
	    if(startdate == " " || startdate == null) {
	      $('#errors').append("Input start date");
	      return false;
	    }
	    if(!startdate.match(re)){
	      $('#errors').append("Input valid start date");
	      return false;
	    }
	    if(enddate == " " || enddate == null) {
	      $('#errors').append("Input end date");
	      return false;
	    }
	    if(!enddate.match(re)){
	      $('#errors').append("Input valid end date: ");
	      return false;
	    }


        // make the ajax request
       $.ajax({
          url: 'getposts.html.php',
          data: {
              startdate: startdate,
              enddate: enddate,
              title: title,
              limit: limit,
              favorites: favorites,
			  body: body,
			  sort: sort,
			  sort_descending: sort_descending,
          },
          success: function (serverResponse) {
              $("#output").append(serverResponse);
          },
          error: function (jqXHR, textStatus, errorThrown) {
              // Since our script runs on Cloud9, let's make
              // a friendlier error message for ourselves
              
              // ***** TODO: MAKE THIS OUTPUT TO THE "ERRORS" DIV INSTEAD OF AN ALERT
              
              if (errorThrown == 'Service Unavailable') {
              	$('#errors').append("Your cloud 9 instance isn't running!");
              } else {
              	$('#errors').append('An unknown error occurred: ' + errorThrown);
              }
          },
          complete: function () {
              // remove the "let user know something is happening" thing, since the request is done
              allowAjaxHide = true;
              $("#ajaxIndicator").modal('hide');
          }
       });
       
       // let the user know something is happening in the meantime
      $("#ajaxIndicator").modal('show');
       
    });
    
});
