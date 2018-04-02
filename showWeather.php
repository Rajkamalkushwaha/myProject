
<html>
<head>
<link href="styleWeather.css" rel="stylesheet" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/1.3.2/css/weather-icons.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.js"></script>

<script type="text/javascript" src="weather.js"></script>
  </head>
<body style="background-color:#d9edf7">
 <div class="container">
    <div class="row">
      <header class="col-xs-12 text-center">
        <h1>Free Spicegems </h1>
    <h1>   <i class="wi wi-hail"></i> Weather App</h1>
      </header>

      <div class="col-xs-8 col-xs-offset-2">
        <div class="text-center status">
          <p><span id="city"></span> <span id="country"></span></p>
          <p><span id="temp"></span><span class="temp" id="tempunit" ></span></p>
          <p id="desc"></p>
        </div>

        <div class="text-center all-icon">
          <div class="icon sun-shower hide ">
            <div class="cloud"></div>
            <div class="sun">
              <div class="rays"></div>
            </div>
            <div class="rain"></div>
          </div>
          <div class="icon thunder-storm hide thunderstom">
            <div class="cloud"></div>
            <div class="lightning">
              <div class="bolt"></div>
              <div class="bolt"></div>
            </div>
          </div>
          <div class="icon cloudy hide clouds">
            <div class="cloud"></div>
            <div class="cloud"></div>
          </div>
          <div class="icon flurries hide snow">
            <div class="cloud"></div>
            <div class="snow">
              <div class="flake"></div>
              <div class="flake"></div>
            </div>
          </div>
          <div class="icon sunny hide clear">
            <div class="sun">
              <div class="rays"></div>
            </div>
          </div>
          <div class="icon rainy hide rain">
            <div class="cloud"></div>
            <div class="rain"></div>
          </div>
        </div>

        <p class="text-center">Inspired By <a href="https://spicegems.com/" target="_blank">Spicegems</a></p>
      </div>
    </div>
  </div>
</body>
</html>


