<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Project</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    {{ View::make('header') }}

    @yield('content')

    {{ View::make('footer') }}



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

<style>
.custom-login{
    height: 500px;
    padding-top: 10px
}

.slider-image{
  height: 300px !important;
  width: 100%;
}

.trending-img{
  height: 100px;
}

.trending-items{
  float: left;
  width: 20%;
}

.trending-wrapper{
  margin: 20px;
}

.detail-img{
  height: 200px;
}

.search-box{
  width: 500px !important;
}
.search-items a{

  text-decoration: none;
  color: black;
}

.cart-list-divider{
  border-bottom: 1px solid #cccccc;
  margin-bottom: 20px;
  padding-bottom: 20px;
}
</style>
</html>