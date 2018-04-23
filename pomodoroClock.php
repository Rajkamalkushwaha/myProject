<html>
<head>
<link rel="stylesheet" href="pomodoroClock.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var breakValue=5;
var sessionValue=25;
$(document).ready(function(){
$("#value1").html(breakValue);
  $("#value").html(sessionValue);
  $(".fill").html(sessionValue);
  $('.sessionCtrl').click(function(){
  if(num==='-1'){
 sessionValue=sessionValue--;
  $("#value").html(sessionValue);
  }
  
  });
});

  
</script>
<style>
@import "bourbon";

@import url(https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:300);

// colors
$green: #99CC00;
$black: #333333;
$white: #fff;

// variables
$font: Open Sans, Arial;
  
* {
  margin: 0;
  font-family: $font;
}

html, body, main {
  height: 100%;
  overflow: hidden;
  background-color: $black;
}

h1 {
  display: block;
  background-color: $black;
  margin: 0 auto;
  color: white;
  text-align: center;
  font-family: 'Pacifico';
  font-size: 5em;
}
body{
    background: #1d1f20;
}

header {
  display: flex;
  justify-content: center;
  text-align: center;
  margin: 0 auto;
  color: $white;
  text-transform: uppercase;
  padding: 20px;
  
  .session {
    font-size: .8em;
    display: flex;
    .breakCtrl, .sessionCtrl {
      display: inline;
      padding-left: 30px;
      padding-right: 30px;
    }
    .minus, .plus {
      background-color: $black;
      color: $white;
      border: none;
      cursor: pointer;
      font-size: 2em;
      outline: none;
    }
    
    .time {
      font-size: 2.5em;
      padding-left: 10px;
      padding-right: 10px;
    }
  }
}

section {
  background-color: $black;
  height: 100%;
  color: $white;
  .title {
    text-align: center;
    line-height: 180px;
    font-size: .8em;
  }
  .timer {
    margin: 0 auto;
    text-align: center;
    width: 300px;
    height: 300px;
    font-size: 4em;
    border: 2px solid $green;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    z-index: 20;
    overflow: hidden;
    &:before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      border-radius: 50%;
      z-index: 2;
      border: 4px solid $black;
    }
  }
  .fill {
    content: '';
    position: absolute;
    background: $green;
    bottom: 0;
    right: 0;
    left: 0;
    z-index: -1;
  }
}
* {
    margin: 0;
    font-family: Open Sans, Arial;
	}
	
	header .session {
    font-size: .8em;
    display: flex;
}

header {
    display: flex;
    justify-content: center;
    text-align: center;
    margin: 0 auto;
    color: #fff;
    text-transform: uppercase;
    padding: 20px;
}
header .session .time {
    font-size: 2.5em;
    padding-left: 10px;
    padding-right: 10px;
}


header .session .minus, header .session .plus {
    background-color: #1d1f20;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 2em;
    outline: none;
}
header .session .breakCtrl, header .session .sessionCtrl {
    display: inline;
    padding-left: 30px;
    padding-right: 30px;
}
section .timer {
    margin: 0 auto;
    text-align: center;
    width: 300px;
    height: 300px;
    font-size: 4em;
    border: 2px solid #99CC00;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    z-index: 20;
    overflow: hidden;
}
section .timer {
    margin: 0 auto;
    text-align: center;
    width: 300px;
    height: 300px;
    font-size: 4em;
    border: 2px solid #99CC00;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    z-index: 20;
    overflow: hidden;
}
section .title {
    text-align: center;
    line-height: 180px;
    font-size: .8em;
}
section {
    height: 100%;
    color: #fff;
}
</style>
</head>
</body>
<h1> SpiceGems</h1>
<header>
<div class="session">
  <div class="breakCtrl">
   <p>break length</p>
    <button class="minus" onclick="breakLengthChange(-1)">-</button>
	<span class="Time ng-binding" id="value1"></span>
<button class="plus" onclick="breakLengthChange(1)">+</button>	
</div>
  <div class="sessionCtrl">
   <p>session length</p>
    <button class="minus" onclick="breakLengthChange(-1)">-</button>
	<span class="Time ng-binding" id='value'></span>
<button class="plus" onclick="breakLengthChange(1)">+</button>	
</div>
</div>
</header> 
<section onclick="toggleTimer()">
    <div class="timer">
      <p class="title binding">Session</p>
      <p class="binding"></p><span class="fill" style="{'height':fillHeight, 'background':fillColor }" style="height: 58.0952%; background: rgb(153, 204, 0);"></span>
    </div>
  </section>   
</body>
	  </html>