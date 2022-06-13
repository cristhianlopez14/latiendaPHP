<!DOCTYPE html>
<html lang="en-EN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}" />
</head>
<body>

  <nav class="grey darken-1">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
      @yield('contenido')
  </div>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, []);
      });
  </script>

<script src="{{asset('materialize/js/materialize.js') }}"> </script>

</body>
</html>