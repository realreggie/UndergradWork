$(function() {
    $('#searchform').submit(function() {
        var searchterms = $("#searchterms").val();
        // call our search twitter function
        getResultsFromYouTube(searchterms);
        return false;
    });
});

function getResultsFromYouTube (searchterms) {
    var apiKey = "dvx8XetpEWR1s0zjev3pe5TycVKymuL1";
        var titleKeyword = "lasagna";
        var url = "http://api.bigoven.com/recipes?pg=1&rpp=25&title_kw="+ searchterms + "&api_key="+apiKey;


        $.ajax({
            type: "GET",
            dataType: 'json',
            cache: false,
            url: url,
            success: function (data) {
                alert('success');
                console.log(data);
                $("#results").html(data);
            }
        });
    }
