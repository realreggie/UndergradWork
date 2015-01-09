$(document).ready(function () {
    
    // Disallow hiding the AJAX loading modal that pops up when searching
    var allowAjaxHide = false;
    var hideFunction = function(event) {
        if (!allowAjaxHide) {
            event.preventDefault(); 
        }
        allowAjaxHide = false;
    };
    $('#ajaxIndicator').on('hide.bs.modal', hideFunction);
    
    

    // Perform a Twitter search when the "public search" form is submitted
    $('#getposts_form').submit(function(event) {
        event.preventDefault();

        // clear out our output areas first!
        $('#output').empty();
        $('#errors').empty();

        var search = $("#search").val();

        // validate all form input, as needed
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
                // TODO: make "lang" use the dropdown in the form instead
                lang: 'en',
                // TODO: add parameter for "result_type"
            },
            
            success: function(serverResponse) {
                try {
                    console.log(serverResponse);
                    var statuses = serverResponse.statuses;
                    for (var i = 0; i < statuses.length; i++) {
                        var tweet = statuses[i];
                        // get the template and copy it
                        var template = $($("#tweet").prop("content")).children().clone();
                        // fill in the data
                        template.find(".body").text(tweet.text);
                        template.find(".user").text('@' + tweet.user.screen_name);
                        
                        // TODO: add badges data into HTML for retweets and favorites here

                        $("#output").append(template);
                    }
                }
                catch (ex) {
                    console.error(ex);
                    $("#errors").text("An error occurred processing the data from Twitter");
                }
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                // Since our script runs on Cloud9, let's make
                // a friendlier error message for ourselves
                if (errorThrown == 'Service Unavailable') {
                    $("#errors").text("Your cloud 9 instance isn't running!");
                }
                else {
                    $("#errors").text('An unknown error occurred: ' + errorThrown);
                }
            },
            
            
            
            complete: function() {
                // remove the "let user know something is happening" thing, since the request is done
                // (hide spinning circle modal)
                allowAjaxHide = true;
                $("#ajaxIndicator").modal('hide');
            }
        });



        // let the user know something is happening in the meantime
        // (spinning circle modal)
        $("#ajaxIndicator").modal('show');
           
    });
    
});
