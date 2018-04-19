$(document).ready(function(){
	var log="";
	var entry='';
	var ans="";
	var defal='';
     var hist='';

	$('button').click(function(){
		
	entry = $(this).attr("value");
    console.log('entry: ' + entry);
		
	if(entry==='+' || entry==='-' || entry==='*' || entry==='/' || entry==='/' || entry==='='){
      log=defal;
	 
		  entry.slice(1);
	  
	  } 
	
	if(entry==='ac' || entry==='ce'){
      ans = '';
      current = '';
      entry = '';
      log = '';
	  hist='';
      $('#answer').html('0');
      $('#history').html('0');	
	 }else
	 {
		  hist+=entry;
		 log+=entry;
		 $('#answer').html(log);
        $('#history').html(hist);	
	 }
	});


});