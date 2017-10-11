<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<style>
	body {
		padding-top: 70px;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('home') }}">GUARDA VALORES</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					<li><a href="{{ url('/login') }}">INICIO DE SESIÓN</a></li>
					<li><a href="{{ url('/register') }}">REGISTRAR</a></li>
					@else
					<li><a href="{{ url('returnFinafim') }}">FINAFIM</a></li>
					<li><a href="{{ url('returnFommur') }}">FOMMUR</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">ABC
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('returnAbc1') }}">LINEA 1</a></li>
								<li><a href="{{ url('returnAbc2') }}">LINEA 2</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">OTROS RECURSOS
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ url('returnSof') }}">SOF TUX</a></li>
									<li><a href="{{ url('returnSofsc') }}">SOF SC</a></li>
									<li><a href="{{ url('returnFin') }}">SOF FIN</a></li>
								</ul>
							</li>
							<li><a href="{{ url('returnLegales') }}">LEGALES</a></li>
						{{-- <li><a href="{{ url('returnAbc1') }}">ABC CAPITAL L1</a></li>
						<li><a href="{{ url('returnAbc2') }}">ABC CAPITAL L2</a></li> --}}
						{{-- <li><a href="{{ url('returnSof') }}">OTROS RECURSOS</a></li> --}}
						<li><a href="{{ url('admin/archives') }}">TODOS</a></li>
						<li><a href="#">{{ Auth::user()->name }}</a></li>
						<li> <a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							SALIR
						</a></li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
						@endif
					</ul>
				</div>

			</div><!-- /.container-fluid -->
		</nav>

		<div class="container">
			@yield('content')
		</div>
		<!-- Scripts -->
		<!-- jQuery 2.1.4 -->
		<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		@yield('scripts')
	</body>
	</html>