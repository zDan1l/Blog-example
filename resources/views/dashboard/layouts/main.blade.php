<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Blog</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/dashboard.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
    </style>

  </head>
  <body>
    
     @include('dashboard.layouts.header')

      <div class="container-fluid">
        <div class="row">
          @include('dashboard.layouts.sidebar')
          @yield('container')
        </div>
      </div>


      <script src="/js/bootstrap.bundle.min.js"></script>
      
      
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      
      <script src="/js/dashboard.js"></script>
      
  </body>
</html>
