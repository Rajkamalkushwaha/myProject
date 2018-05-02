<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="simon.css" rel="stylesheet"/>
<script src="simon.js"></script>
</head>
<body>
<div class="wrap">
<div class="wrap-in">
  <div class="rw">
    <div class="t-l inline push green unclickable" id='3' ></div><div class="t-r inline push red but unclickable" id='2'></div>
  </div>
  <div class="rw">
    <div class="b-l inline push yellow unclickable" id='1'></div><div class="b-r inline push blue but unclickable" id='0'></div>
  </div>
</div>
   <div class="center">
     <h1 class="brand"><span class="small">spiceGems</span><br/>Simon</h1>
     <div class="rw">
       <div class="display inline">
         <h1 class="count led-off">--</h1>
         <h3 class="label">COUNT</h3>
       </div>
       <div class="btn-box inline">
         <div class="round-btn full-red but clickable" id="start"></div>
         <h3 class="label">START</h3>
       </div>
       <div class="btn-box inline">
         <div class="round-btn but clickable" id="mode"></div>
         <h3 class="label">STRICT</h3>
         <div class="led" id="mode-led"></div>
       </div>
     </div>
     <div class="rw bot">
       <h3 class="label inline">OFF</h3>
       <div class="sw-slot inline">
         <div class="switch" id="pwr-sw"></div>
       </div>
       <h3 class="label inline">ON</h3>
     </div>
  </div>
</div>
</body>
</html>