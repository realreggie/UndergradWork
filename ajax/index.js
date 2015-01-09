$(document).ready(function () {
    
    $('#test').click(function () {
       
       // clear out our output areas first!
       $('#output').text('');
       $('#errors').text('');
        
        // make the ajax request
       $.ajax({
          url: 'getposts.html.php',
          data: {
              startdate: '10/02/2014',
              enddate: '10/05/2014'
          },
          success: function (serverResponse) {
              alert(serverResponse);
              console.log(serverResponse);
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert('An error occurred!');
          },
          complete: {
              // TODO: remove the "let user know something is happening" thing, since the request is done
          }
       });
       
       // TODO: let the user know something is happening in the meantime
       
    });
    
});
