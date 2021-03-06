<!DOCTYPE html>
<html>
  <head>
    <title>Geocoding Service</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="index.js"></script>
  </head>
  <body>
    <div id="floating-panel">
      <input id="address" type="textbox" value="Sydney, NSW" />
      <input id="submit" type="button" value="Geocode" />
    </div>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7Dg8nq0_0jPI3-oTh-y0nEsO8ocAYsro&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>