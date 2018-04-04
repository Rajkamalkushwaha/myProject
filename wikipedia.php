<html>
<head>
<script src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="wikipedia.js"></script>
<link rel="stylesheet" href="wikipedia.css">
<style>
html, body, main {
  font-family: "Lucida Grande","Lucida Sans Unicode", Tahoma, Sans-Serif;

  position: relatiave;
  margin: 0; padding: 0;
  padding-top: 10px;
  width: 100%; height: 100%;
  background-color: #092B40;
}
.center{
	color: #fff;
	position:absolute;
    top:45%;
    left:45%;

}
a {
    text-decoration: none !important;
}
input[type="text"]
{
    font-size:24px;
}

</style>
</head>
<body>
<div class="center">
 <img src="https://image.ibb.co/e6vOFQ/wikipedia.png" alt="Wikipedia Logo" style="padding-left: 80px;">
<form>
<a href='https://en.wikipedia.org/wiki/Special:Random' target='_blank' style='color:#fff;'>Click here for a random article</a><br/><br/>
<input input type="text" id="search" style="height: 36px;padding-top: 12px; width: 200px;" ></input>
<button id="doit" ><i class="fas fa-search" style="width: 30px;height: 30px;color:#D96F32 "></i></button>
<p style="margin-left: 32px;">Click icon to search</p>
 <p id="results">results appended here: </p>
 </form>
</div>
<div id="mainDisp"></div>
</body>
</html>