function inIframe () { //check topmost window different from current window
   try { 
      return window.self !== window.top;    //top and self are both window object  
       } catch (e) { 
      return true; 
     } 
  }

function openURL(url){    //open new window
   window.open(url, 'Share', 'width=550, height=400, toolbar=0, scrollbars=1 ,location=0 ,statusbar=0,menubar=0, resizable=0');
  }

    $(document).ready(function () {
	     $('#text').html("A mathematician is a device for turning coffee into theorems.");
         $('#author').html("Paul Erdos");	
    
	$('#new-quote').click(function () {
	$.getJSON("result.json",function(result){
    $.each([result],function(i,value){            
		 var ran=Math.floor((Math.random() * 4)+1);
		 var currentQuote=result[ran].quote;
		 var currentAuthor=result[ran].author;
		
	     $('#text').html(result[ran].quote);
		 $('#author').html(result[ran].author);
		
    if(inIframe())
      {
        $('#tweet-quote').attr('href', 'https://twitter.com/intent/tweet?hashtags=quotes&related=freecodecamp&text=' + encodeURIComponent('"' + currentQuote + '" ' + currentAuthor));
        $('#tumblr-quote').attr('href', 'https://www.tumblr.com/widgets/share/tool?posttype=quote&tags=quotes,freecodecamp&caption='+encodeURIComponent(currentAuthor)+'&content=' + encodeURIComponent(currentQuote)+'&canonicalUrl=https%3A%2F%2Fwww.tumblr.com%2Fbuttons&shareSource=tumblr_share_button');
      }
      
  $('#tweet-quote').on('click', function() {
       if(!inIframe()) {
         openURL('https://twitter.com/intent/tweet?hashtags=quotes&related=freecodecamp&text=' + encodeURIComponent('"' + currentQuote + '" ' + currentAuthor));
       }

  $('#tumblr-quote').on('click', function() {
       if(!inIframe()) {
         openURL('https://www.tumblr.com/widgets/share/tool?posttype=quote&tags=quotes,freecodecamp&caption='+encodeURIComponent(currentAuthor)+'&content=' + encodeURIComponent(currentQuote)+'&canonicalUrl=https%3A%2F%2Fwww.tumblr.com%2Fbuttons&shareSource=tumblr_share_button');
       }
	
	  });
  });
		
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
	         $(".button").css("background-color",color[rand]);
			 $(".quote-box").css("color",color[rand]);
        });
		

 }); 





















