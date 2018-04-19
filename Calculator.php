<html>
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="calculatorStyle.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="calculator.js"></script>
<style>
#entry {
    margin-right: 10px;
    font-size: 35px;
}
</style>
</head>
<body>
<div class='container'>
  <div id='calculator'>

    <!-- TITLE -->

    <div id='title' class='text-center'>
      <h5><b>ELECTRONIC CALCULATOR</b></h5>
    </div>

    <!-- ENTRY BOX -->

    <div id='entrybox' class='text-right'>
      <div id='entry'>
        <p id='answer'>0</p>
      </div>
      <div id='history'>
        <p>0</p>
      </div>
    </div>

    <!-- BUTTONS -->

    <div id='buttons'>

      <button class='red' value='ac'>AC</button>
      <button class='red' value='ce'>CE</button>
      <button value='/'>&divide;</button>
      <button value='*'>x</button>

      <button value='7'>7</button>
      <button value='8'>8</button>
      <button value='9'>9</button>
      <button value='-'>-</button>

      <button value='4'>4</button>
      <button value='5'>5</button>
      <button value='6'>6</button>
      <button value='+'>+</button>


      <button value='1'>1</button>
      <button value='2'>2</button>
      <button value='3'>3</button>
      <button class='invisible'>N</button>

      <button id='zeroButton' value='0'>0</button>
      <button value='.'>.</button>
      <button id='equalButton' value='='>=</button>

    </div>
    <!-- end buttons -->
    <div id='tester'></div>
  </div>
  <!-- end calculator -->
</div>
<!-- end container -->

<footer id="footer" class="text-center">
  <div class="container">
    Designed & Coded by
    <a href="https://www.linkedin.com/in/rajkamal-kushwaha-219b10160/" target="_blank">
        Rajkamal kushwaha</a>
  </div>
</footer>
<body>
<html>