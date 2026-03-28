<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo $page_title ?? "Kalkulator Kredytowy"; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo _APP_URL; ?>/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<?php include _ROOT_PATH.'/app/templates/top.php'?>
	<style>
		html {
			scroll-behavior: smooth;
		}
	</style>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- app_content -->
				<div id="main">
					<div class="inner"> <section id="app_content">
					<header>
						<h2>Parametry kredytu</h2>
					</header>
						<form method="post" action="<?php echo _APP_URL; ?>/app/calc.php#app_content">
								<div class="row gtr-uniform">
									
									<div class="col-12">
										<label for="id_kwota">Kwota kredytu (PLN)</label>
										<input type="text" name="kwota" id="id_kwota" value="<?php echo $kwota ?? ''; ?>" placeholder="np. 50000" />
									</div>
									
									<div class="col-6">
										<label for="id_oprocentowanie">Oprocentowanie (%)</label>
										<input type="text" name="oprocentowanie" id="id_oprocentowanie" list="oprocentowanie_lista" value="<?php echo $oprocentowanie ?? ''; ?>" placeholder="np. 7.5" />
										<datalist id="oprocentowanie_lista">
											<option value="3"><option value="5"><option value="7"><option value="10"><option value="12">
										</datalist>
									</div>

									<div class="col-6">
										<label for="id_lata">Liczba lat</label>
										<input type="text" name="lata" id="id_lata" value="<?php echo $lata ?? ''; ?>" placeholder="np. 5" />
									</div>

									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Oblicz ratę" class="primary" /></li>
											<li><a href="<?php echo _APP_URL; ?>" class="button">Resetuj</a></li>
										</ul>
									</div>
									
								</div> 
							</form>
							<?php if (isset($messages) && count($messages) > 0): ?>
								<div class="box" style="border-color: #f56a6a;">
									<h4>Wystąpiły błędy:</h4>
									<ul class="alt">
										<?php foreach ($messages as $msg) echo "<li>$msg</li>"; ?>
									</ul>
								</div>
							<?php endif; ?>

						<?php if (isset($result)): ?>
							<div class="box">
								<h3>Twoja miesięczna rata wynosi:</h3>
								<h2 style="color: #585858;"><?php echo number_format($result, 2, ',', ' '); ?> zł</h2>
							</div>
						<?php endif; ?>
					</section>
					</div>
				</div>
					
				<!-- footer -->
				<footer id="footer">
					<div class="inner">
						<?php if (!isset($result) && (!isset($messages) || count($messages) == 0)): ?>
							<section style="text-align: center;">
								<ul class="actions">
									<li><a href="#header" class="button small">Wróć na górę</a></li>
								</ul>
							</section>
						<?php endif; ?>
						<ul class="copyright">
							<li>Kalkulator Kredytowy</li>
							<li>Design: <a href="http://html5up.net">HTML5 UP</a> <a href="https://html5up.net/phantom">(Phantom)</a></li> 
						</ul>
					</div>
				</footer>

			</div>

		<!-- Scripts -->
			<script src="<?php echo _APP_URL; ?>/assets/js/jquery.min.js"></script>
			<script src="<?php echo _APP_URL; ?>/assets/js/browser.min.js"></script>
			<script src="<?php echo _APP_URL; ?>/assets/js/breakpoints.min.js"></script>
			<script src="<?php echo _APP_URL; ?>/assets/js/util.js"></script>
			<script src="<?php echo _APP_URL; ?>/assets/js/main.js"></script>

	</body>
</html>