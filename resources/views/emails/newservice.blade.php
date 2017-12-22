<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Correo desde YoungMéxico</title>
</head>
<body>
	<header>
		<nav class="white">
    		<div class="nav-wrapper">
      			<a href="#" class="brand-logo center">Young<span class="teal-text">México</span></a>
  				<!--ul id="nav-mobile" class="left hide-on-med-and-down">
			        <li><a href="sass.html">Sass</a></li>
			        <li><a href="badges.html">Components</a></li>
			        <li><a href="collapsible.html">JavaScript</a></li>
  				</ul-->
			</div>
  		</nav>
	</header>
	<main>
		<h2 class="center">Hola, {{ $user->name }}</h2>
		<p class="flow-text" align="center">Un nuevo Servicio <strong>{{ $service->title }}</strong> ha sido publicado en YoungMéxico.</p>
	</main>
</body>
</html>