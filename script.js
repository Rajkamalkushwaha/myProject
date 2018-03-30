$(document).ready(function () {
	
$('#new-quote').click(function () {
	
	$.getJSON("result.json",function(result){
		
	 $.each([result],function(i,value){
		 var ran=Math.floor((Math.random() * 4)+1);
		$('#text').html(result[ran].quote);
		$('#author').html(result[ran].author);
		
	$(".quote-text").animate({
          opacity: 0
        }, 500,
        function() {
          $(this).animate({
            opacity: 1
          }, 500);
          $('#text').text(result.quote);
        });

      $(".quote-author").animate({
          opacity: 0
        }, 500,
        function() {
          $(this).animate({
            opacity: 1
          }, 500);
          $('#author').html(result.author);
		});
		
    });
});
	
	var color=['#525530','#455500','#454533','#458566','#125425'];
	 var rand=Math.floor(Math.random()*color.length);
	  $("body").css("background-color",color[rand]);
	         $(".button").css("color",color[rand]);
			 $(".quote-box").css("color",color[rand]);
        });
 }); 




















