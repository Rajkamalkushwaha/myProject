<html>
<title>Convert Roman Number</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script></script>
<style>
html, body, main {
  font-family: "Lucida Grande","Lucida Sans Unicode", Tahoma, Sans-Serif;

  position: relatiave;
  margin: 0; padding: 0;
  padding-top: 10px;
  width: 100%; height: 100%;
  background-color: #092B40;
  color:#fff;
}
div {
    background-color: #009688ad;
    width: 235px;
    border: 7px solid #771436;
    padding: 0px;
    margin: 33px;
}
</style>
</head>
<body>
<center style="margin-top:300px">
<h1>Roman Numeral Converter</h1>
Enter No:<input type="text" id="num"></input>
<button id="ConvertValue" name="Convert" >Convert</button>
<div>
<p id="roman"><h3>Convert Roman number<h3></p></div>
 <p class="text-center">Inspired By <a href="https://spicegems.com/" target="_blank">Spicegems</a></p>
</center>
<script>
$(document).ready(function(){
$("#ConvertValue").click(function (){
	$('#roman').html(convertToRoman($('input:text').val()));
 });
});
	
	
 function convertToRoman(num){
 var result="";
  var decimalValue=[1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
  var romanValue=['M','CM','D','CD','C','XC','L','XL','X','IX','V','IV','I'];
     for(var i=0;i<decimalValue.length;i++){
       
       while(decimalValue[i]<=num){
       result+=romanValue[i];
         num-=decimalValue[i];
       }
     }
 
 return result;
}

</script>

</body>
</html>