$(document).ready(function(){
	var entry='';
	var ans='';
    var hist='';
	var current;
	var count=0;

	$('button').on('click',function(){
	entry = $(this).attr("value");
    
	if(entry==='+' || entry==='-' || entry==='*' || entry==='/' || entry==='/'){
	  ans='';
	 }
	
	 if(count==0){
	 if(entry=='=' && entry.length!==0){
		 ans='='+eval(hist);
		 hist+=ans;
		 count++;
	 }
	 }else{
		 var n=hist.indexOf('=');
		 hist=hist.substring(n+1);
		 ans='='+eval(hist);
	 }
	
	  
	 if(entry==='ac' || entry==='ce'){
      ans = '';
      current = '';
      entry = '';
	  hist='';
	  count='0';
      $('#answer').html('0');
      $('#history').html('0');	
	 }else
	 {
		 if(entry!=='=' && ans.length<8 && hist.length<20){
   		     hist+=entry;
	    	 ans+=entry;
		   $('#answer').html(ans);
           $('#history').html(hist);
	   }else if(ans.length<8 && hist.length<20){
		  $('#answer').html(ans);
          $('#history').html(hist);
		  ans='';
          }else{
			  alert("length is out of limit");
		  }
	    }
	 });
 });