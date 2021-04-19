<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<style>
/*.auth_head{
   color: white; 
   font-size: 14px;
   background: #33CC9A;
} */

      body{
        width: 90%;
        text-align: center;
        margin: 0 auto;
        background: none;
      }

      header{
        font-size: 18px;
        margin: 10px 0;
        vertical-align: middle;
      }

      header a {
        cursor: pointer;
        //font-size: 16px;
        margin: 0 10px ;
      }

      footer{
        margin-bottom: 10px;
      }

      main{
        min-height: 87vh;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .container {
         max-width: 80%;
        }

      .pricing-header {
        max-width: 700px;
        }

      input[type=text], input[type=password], input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }  

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
</style>
   
<body>
    <!--<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">-->

                     <!--Collapsed Hamburger 
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>-->


            <!--        <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <div class="col-sm-8  offset-md-2 text-center navbar-brand" style="background: white;">
                        <a href="/" class="but">Депутати</a>
                    </div>
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>-->
<header>
<div class="row text-center border-bottom shadow-sm bg-secondary text-white align-middle " style="padding:10px; width: 100%; background: grey;">
  <div class="col-sm-2 text-center align-middle" style="background: none; font-size: 34px; color:white;">
    Visualtex
  </div>
  <div class="col-sm-4 text-center" style="background: none;">
    <div class="col-sm-12 h2">Персональний кабінет депутата</div> 
  </div> 
  <div class="nav navbar-nav col-sm-6 text-center" style="background: none;">
    <ul class="nav navbar-nav navbar-center text-white"> 
        <li><a class="p-2" href="/">Головна</a></li>
        <li><a class="p-2 text-white" href="/">Сессії</a></li>
        <li><a class="p-2 text-white" href="/">Депутати</a></li>
        <li><a class="p-2 text-white" href="/">Статистика</a></li>
    </ul>

                    <ul class="nav navbar-nav navbar-right"  style="background: none;">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Вхід</a></li>
                            <li><a href="{{ url('/register') }}">Реєстрація</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/profile') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('Profile-form').submit();">
                                            Профіль
                                        </a>
                                    </li>





                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Вихід
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
  </div>
</div>
</header>
    <!--            </div>
            </div>
        </nav>-->


        @yield('content')
    

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
