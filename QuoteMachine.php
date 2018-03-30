<html>

<head>
<title>Random Quote Machine</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="./style.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>
<link href="mystyle.css" rel="stylesheet">
</head>

<body>


<div class="quote-box">
  <div class="quote-text">
    <i class="fa fa-quote-left"> </i><span id="text"></span>
  </div>
  <div class="quote-author">
    - <span id="author"></span>
  </div>
  <div class="buttons">
    <a class="button" id="tweet-quote" title="Tweet this quote!" target="_blank">
      <i class="fa fa-twitter"></i>
    </a>
     <a class="button" id="tumblr-quote" title="Post this quote on tumblr!" target="_blank">
      <i class="fa fa-tumblr"></i>
    </a>
    <button class="button" id="new-quote">New quote</button>
  </div>
</div>
<div class="footer"> by <a href="http://spicegems.com">SpiceGems</a></div>



</body>

</html>