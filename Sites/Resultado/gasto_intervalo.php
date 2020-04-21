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

            $f_s = $_POST["f_start"];
            $f_s2 = str_replace('-', '/', $f_s);  
            $f_e = $_POST["f_end"];
            $f_e2 = str_replace('-', '/', $f_e);  

			$query_string  = "SELECT U.uid, U.nombre, SUM(V.precio)
            FROM(SELECT tid FROM Tickets WHERE '$f_s2' <= Tickets.f_compra INTERSECT SELECT tid FROM Tickets WHERE Tickets.f_compra <= '$f_e2') AS T, Usuarios AS U, TUV, Viajes AS V 
            WHERE U.uid = TUV.uid AND V.vid = TUV.vid AND T.tid = TUV.tid GROUP BY U.uid, U.nombre;";
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
							<li><a href="../index.html">Home</a></li>
							<li><a href="../generic.html">Ipsum veroeros</a></li>
							<li><a href="../generic.html">Tempus etiam</a></li>
							<li><a href="../generic.html">Consequat dolor</a></li>
							<li><a href="../elements.html">Elements</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Lista de ciudades</h1>
							<table class = "alt">	
								<?php
									echo "<tr><th>Identificador de usuario</th><th>Nombre de usuario</th><th>Fecha de inicio</th><th>Fecha de término</th><th>Nombre del hotel</th></tr>";
									foreach ($result as $r) {
									echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td></tr>";
									}
								?>
							</table>
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