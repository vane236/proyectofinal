<style>
*{
	margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body{
	background: #f8fafc;
}

header{
	width: 100%;
}

.navegacion{
	width: 1200px;
    margin: 30px auto;
    background: #fff;
    
}

.navegacion ul{
    list-style: none;
}

.menu > li{
	position: relative;
	display: inline-block;
}

.menu > li > a{
	display: block;
	padding: 15px 20px;
	color: #353535;
	font-family: 'Open sans';
	text-decoration: none;
}

.menu li a:hover{
	color: #CE7D35;
	transition: all .3s;
}

/* Submenu*/

.submenu{
	position: absolute;
	background: #333333;
	width: 120%;
	visibility: hidden;
	opacity: 0;
	transition: opacity 1.5s;
}

.submenu li a h5{
	display: block;
	padding: 15px;
	color: #fff;
	font-family: 'Open sans';
	text-decoration: none;
}

.menu li:hover .submenu{
	visibility: visible;
	opacity: 1;
}

</style>

<body>
        <header>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
        
            <title>{{ config('app.name', 'Laravel') }}</title>
        
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" defer></script>
        
            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            

        <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            
            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="{{url('maestrosHome')}}"><h5>Dashboard</h5></a></li>
                    <li><a href="{{url('maestroDashboard/academias')}}">Academias</a></li>
                    <li><a href="{{url('maestroDashboard/cursos')}}">Cursos</a></li>
                    <li><a href="{{url('maestroDashboard/alumnos')}}">Alumnos</a></li>
                    <li><a href="{{url('maestros/'.Auth::user()->id.'/edit')}}">Configuración</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                
                
                        <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if(isset(Auth::user()->Foto))          
                    <img src="{{ asset('storage').'/'.Auth::user()->Foto }}" class="user-image" width="50" alt="User Image">
                    @endif
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                              document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Salir</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {!! csrf_field() !!}
                    </form>
                  </li>
                </ul>
              </li>
                </ul>
                
            </nav>
        </header>
        @yield('content')
    </body>