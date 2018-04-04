function build_wiki_search_url(pattern) {
    var base_url = "https://en.wikipedia.org/w/api.php";
    var format = "&format=json";
    var request_url = "?action=query&format=json&list=search&srsearch=";
    var url = base_url + request_url + pattern;
    return url;
}
$(document).ready(function() {
    $("#doit").click(function(e) {
        e.preventDefault();
        console.log("Submit button clicked");
        var pattern = $("#search").val();
        var url = build_wiki_search_url(pattern);
       $.ajax( {
            type: "GET",
            url: url,
            dataType: 'jsonp',
            success: function(data) {
               var result=data.query.searchinfo;
			   $("#result").html(result);
		 
		
            },
            error: function(errorMessage) {
                 console.log("damnn");
              }
            } );
			
    });
});
	 