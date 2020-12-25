<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">BIBLIOTECA DDJM</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navegation-sb" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navegation-sb">
				<ul class="navbar-nav ml-md-auto flex-column info-datos">
					<li class="nav-item"><a class="nav-link disabled">Equipo: <?php echo $hostname = gethostname(); ?></a></li>
					<li class="nav-item"><a class="nav-link disabled">
							IP: <?php $ip = $_SERVER["REMOTE_ADDR"];
								if ($ip == "::1" || $ip == "127.0.0.1") {
									echo $ip = "127.0.0.1";
								} else {
									echo $ip = "localhost";
								} ?></a>
					</li>
					<li class="nav-item">
						<!-- <a class="nav-link disabled">Conexi&oacute;n:</a> -->
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>