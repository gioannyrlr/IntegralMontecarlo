<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Solución Integral Simple</title>

<!-- Icon -->
<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/styles.css">

<!-- Alertify -->
<link rel="stylesheet" href="css/alertify/alertify.min.css"/>
<link rel="stylesheet" href="css/alertify/default.min.css"/>
<script src="js/alertify.min.js"></script>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- JQuery  -->
<script src="js/jquery-2.1.3.min.js"></script>

<script>
$(function() {
	//AJAX
	jQuery('#button').click(function (e) {
		var simulaciones = jQuery("#simulaciones").val();
		jQuery.ajax({
			type: "POST",
			url: "submit.php",
			data: "simulaciones=" + simulaciones,
			success: function (data) {
				$('#resultado').html(data);
			}
		});				
		return false;
	});
});
</script>
</head>

<body style="background-color:#f1f1f5;">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand title">MÉTODO <span style="font-weight: 300;" class="span12">MONTE CARLO</span></a>				
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-boon">
					<div class="panel-body">
						<div class="col-md-12 imagen" style="text-align:center;">
							<img src="img/integral.png" style="height:120px;width:240px;">
						</div> 
						<div class="page-header" style="margin:0px 0 20px!important;"><span style="font-size:20px;"><img src="img/1.gif">&nbsp;Bienvenid@ - <b>Iniciar simulación</b></span></div>
							<div class="row">
								<form action="#" method="post">
									<div class="col-md-12">
										<input type="text" id="simulaciones" name="simulaciones" placeholder="Número de simulaciones" autocomplete="off"><br><br>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-16" style="text-align: center;">
										<input id="button" class="btn" type="submit" value="Iniciar">
									</div>
								</form>
							</div>
						<div id="resultado"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted" style="font-size: 20px; text-align: center;">LÓPEZ, GIOANNY C.I. 30.181.664</p>
		</div>
	</footer>
</body>
</html>