<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Estadias - temporada alta</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>

	<body class="is-preload">
		<?php
			$user = 'grupo99';
			$password = 'Bbdd314';
			$databaseName = 'grupo99e2';
			$db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");

			$uid = $_POST["userid"];

			$query_string  = "SELECT SUM(V.precio) FROM Usuarios AS U, TUV, Tickets AS T, Viajes AS V
            WHERE U.uid = TUV.uid AND TUV.tid = T.tid AND TUV.vid = V.vid AND U.uid = $uid AND T.f_compra <= CURRENT_DATE;";
			$query = $db -> prepare($query_string);
			$query -> execute();
            $result = $query -> fetchAll();
		?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="../index.php" class="logo">
									<span class="symbol"><img src="../images/logo.svg" alt="" /></span><span class="title">GoArt</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="../index.php">Home</a></li>
							<li><a href="../Resultado/usuarios.php">Usuarios</a></li>
							<li><a href="../Preguntas/ciudades_de_pais.php">Ciudades</a></li>
							<li><a href="../Preguntas/paises_visitados.php">Países visitados</a></li>
							<li><a href="../Preguntas/gasto_en_tickets.php">Gasto en tickets</a></li>
							<li><a href="../Resultado/estadias.php">Estadías en temporada alta</a></li>
							<li><a href="../Preguntas/gasto_intervalo.php">Gastos por fecha</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Monto gastado:</h1>
								<?php
									$dato = $result[0];
									echo "<h2 align='center'>$ $dato[0] </h2>";
								?>
                        </div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; GoArt. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a> and Luckbox314</li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>