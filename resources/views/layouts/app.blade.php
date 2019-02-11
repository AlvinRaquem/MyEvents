<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Bootstrap Core CSS -->
    {!! Html::style('/css/bootstrap.min.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('/css/modern-business.css') !!}
    <!-- Custom Fonts -->
    {!! Html::style('/font-awesome/css/font-awesome.min.css') !!}
    
<style>
.truncate {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

body{
    background-image: url("/img2/1.jpg");
    background-repeat: no-repeat;
    background-position: right top;
    background-attachment: fixed;
}
.photo {
    text-align: center; /*for centering images inside*/
}
.photo img {
    width: 300px; /*set the width or max-width*/
    height: 150px; /*this makes sure to maintain the aspect ratio*/
}
</style>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <script>
tinymce.init({ 
selector:'textarea',
  plugins : 'advlist autolink link image lists charmap print preview',
  menubar: false,
  });
  </script>

</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Anime Site Event</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>
                
                   
                    <li>
                        <a href="/AboutUs">About</a>
                    </li>
          
                     @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                    @elseif (Auth::user()->role=='admin')
                     <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                  
                    @else
                         <li>
                        <a href="{{route('events.index')}}">Events</a>
                    </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
   


        
        @yield('content')

<footer>
    <div class="container">
        &copy; {{ date('Y') }} BTIT-1 
    </div>
</footer>

    <!-- Scripts -->
    {{ Html::script('/js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    {{ Html::script('/js/bootstrap.min.js') }}
   <!-- Script to Activate the Carousel -->
  <!--   <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> -->
</body>
</html>
