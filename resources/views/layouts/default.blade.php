<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('public/images/favicon.ico') }}" type="image/ico" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('public/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- FTP CSS -->
    <link href="{{ asset('pages_ftp/ftp.css') }}" rel="stylesheet">

  </head>

  <style>
    body {
      min-height: 90%;
    }
   .Main_header{
     width: 60%;
     text-align: center;
     font-size: 25px;
     color: white;
     margin: 20px auto;
   }
  .im_logo{
    width: 60%;
    display: block;
    margin: 20px auto;
  }
  .Org_header{
    width: 60%;
    text-align: center;
    font-size: 20px;
    color: white;
    margin: 10px auto;
  }
  .Page_Name{
    text-align: center;
    color: #000000;
    //min-height: 92vh;
  }
  .nav-sm p {
    display: none;
  }

  .btn-pult{
    width: 100%;
    psdding: 30px;
    height: 20vh;
    font-size: 10vh;
  }
  .Mess{
    text-align: center;
    font-size: 5vh;
    color: blue;
   }
  </style>
  @if(!Auth::check())
    <script>window.location = "/login_form";</script>
  @endif
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <img src="public/images/logo.png" class="im_logo">
            <p class="Org_header"> Білоцерківська<br/>міська рада</p>
            <p class="Main_header"> Особистий<br/>кабінет депутата</p>

            <div class="navbar nav_title" style="border: 0; height: 5px;">


            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">

              <div class="profile_info">
                <span>Вітаю,</span>
                <h2>
                  @if(Auth::check()) {{ Auth::user()->name }} @endif
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Головне меню</h3>
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-tablet"></i> Пульт депутата </a></li>

                  <li><a href="/poryadok"><i class="fa fa-edit"></i> Порядок денний </a></li>

                  <li><a href="/golosyvannia"><i class="fa fa-table"></i> Результати голосувань </a></li>


                  <li><a href="/rishennya"><i class="fa fa-clone"></i> Рішення </a></li>


                  <li><a><i class="fa fa-bar-chart-o"></i> Статистика <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/stat-vidviduvannja">Відвідування</a></li>
                      <li><a href="/stat-golosuvannya">Голосування</a></li>
                    </ul>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">


              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    @if(Auth::check()) {{ Auth::user()->name }} @endif
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                 <!-- <a class="dropdown-item"  href="{{ url('/profile') }}"> Профіль</a>-->
                   <a class="dropdown-item"  href="{{ url('/userlist') }}"> Користувачі</a>
                  <a class="dropdown-item"  href="{{ url('/help') }}"> Допомога</a>



                  <form method="POST" action="logout">
                  {!! csrf_field() !!}
                    <!--<a class="dropdown-item"  href="{{ url('/login_form') }}">-->
                      <button class="dropdown-item submit" >
                      <i class="fa fa-sign-out pull-right"></i> Вихід</button>
                  </form>

                  </div>
                </li>



                <!--<li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="public/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="public/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="public/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="public/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        <footer>
          <div class="pull-left">
             Writen by Maksim Oleynik <a href="http://www.visualtex.com.ua">Visual technology</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('public/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('public/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('public/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('public/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('public/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('public/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('public/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('public/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('public/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('public/build/js/custom.min.js') }}"></script>

    <!-- FTP Scripts -->
    <script src="{{ asset('pages_ftp/ftp.js') }}"></script>
    <script src="{{ asset('pages_ftp/printThis.js') }}"></script>

    <script src="{{ asset('public/pult.js') }}"></script>

  </body>
</html>
