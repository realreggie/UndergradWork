$(document).ready(function () {
    
    var allowAjaxHide = false;
    
    var hideFunction = function(event) {
        if (!allowAjaxHide) {
            event.preventDefault(); 
            allowAjaxHide = false;
        }
    };
    $('#ajaxIndicator').on('hide.bs.modal', hideFunction);
    
    // determine if the user is logged into twitter
    $.ajax({
          url: '/api/index.php/tweetsTwitter/account/verify_credentials.json',
          success: function (userData) {
              $('#mytweets_signed_in').show();
              $('#mytweets_loading').show();
              
              console.log(userData);
              // user is logged in, show their data
              var userDataTemplate = $($("#userdata").prop("content")).clone();
              console.log(userDataTemplate);
              userDataTemplate.children('.username').text('@' + userData.screen_name);
              userDataTemplate.children('.userimg').attr('src', userData.profile_image_url_https);
              $('#mytweets_userdata').append(userDataTemplate);

              // get all the tweets for the current user
              $.ajax({
                  url: '/api/index.php/tweetsTwitter/statuses/home_timeline.json',
                  success: function(serverResponse) {
                      try {
                          for (var i = 0; i < serverResponse.length; i++) {
                                var tweet = serverResponse[i];
                                // get the template and copy it
                                var template = $($("#tweet").prop("content")).children().clone();
                                // fill in the data
                                template.find(".body").empty().append(linkify_entities(tweet));
                                template.find(".user").text('@' + tweet.user.screen_name);
                                
                                $("#mytweets_output").append(template);
                          }
                      } catch (ex) {
                          $('#mytweets_errors').text('An error occurred processing my tweets');
                      }
                  },
                  error: function() {
                      $('#mytweets_errors').text('An error occurred loading my tweets');
                  },
                  complete: function() {
                      $('#mytweets_loading').hide();
                  }
              });
          },
          error: function() {
              $('#mytweets').show();
          }
    })
    
    $('#getposts_form').submit(function (event) {
        event.preventDefault();
        
       // clear out our output areas first!
       $('#output').empty();
       $('#errors').empty();
        
        var search = $("#search").val();
        
        // validate all form input
        var errorMessages = '';
        var emptyStringPattern = /^\s*$/;
        
        if (emptyStringPattern.test(search)) {
            errorMessages += 'You must enter a search term.';
        }
        
        if (errorMessages.length > 0) {
            // When there are any validation errors, quit before the ajax call is made
            $("#errors").text(errorMessages);
            return;
        }
        
        // make the ajax request
       $.ajax({
          url: '/api/index.php/TwitterAppOnly/search/tweets.json',
          data: {
              q: search,
              lang: 'en',
          },
          success: function (serverResponse) {
              try {
                  console.log(serverResponse);
                  var statuses = serverResponse.statuses;
                  for (var i = 0; i < statuses.length; i++) {
                        var tweet = statuses[i];
                        // get the template and copy it
                        var template = $($("#tweet").prop("content")).children().clone();
                        // fill in the data
                        template.find(".body").empty().append(linkify_entities(tweet));
                        template.find(".user").text('@' + tweet.user.screen_name);
                        
                        $("#output").append(template);
                  }
              } catch (ex) {
                  console.error(ex);
                  $("#errors").text("An error occurred processing the data from Twitter");
              }
          },
          error: function (jqXHR, textStatus, errorThrown) {
              // Since our script runs on Cloud9, let's make
              // a friendlier error message for ourselves
              
              // ***** TODO: MAKE THIS OUTPUT TO THE "ERRORS" DIV INSTEAD OF AN ALERT
              
              if (errorThrown == 'Service Unavailable') {
                  $("#errors").text("Your cloud 9 instance isn't running!");
              } else {
                  $("#errors").text('An unknown error occurred: ' + errorThrown);
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
