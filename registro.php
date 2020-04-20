<?php include('servidor.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Systema de registro PHP y MYSQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
</head>
<body>
	<body>
	<div class="menu-container">
	  <div class="menu">
		  <div class="mini-logo"><a href="index.php"><img src="imagenes/TecOnline.png" alt="" width="200" height="100" /></a> </div>
		  
		  
		  
		</div>
	  </div>
	
  <div class="header">
  	<h2>Registro</h2>
  </div>
	
  <form method="post" action="registro.php">
  	<?php include('errores.php'); ?>
  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="usuario" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Constraseña</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar contraseña</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrarse</button>
  	</div>
  	<p>
  		¿Ya eres un miembro? <a href="iniciarsesion.php">Iniciar sesión</a>
  	</p>
  </form>
		
<div class="footer">
		<div class="footer-item footer-uno">
			<p><strong>Nuestros Servicios</strong></p> <br>
			<ul>
				<li><a href="./seguridad.html">Sistemas de seguridad</a></li>
				<li><a href="./solar.html">Tecnología Solar</a></li>
				<li><a href="./software.html">Desarrollo de Software</a></li>
				<li><a href="./sap.html">Soporte y desarrollo SAP</a></li>

			</ul>
			<a href="#"></a>
		</div>
		<div class="footer-item footer-dos"><p><strong>¿Quienes somos?</strong></p><br>
		<p>Somos una empresa ubicada en <strong>Torreón, Coahuila</strong> dedicada a la integración de soluciones tecnológicas con más de 18 años en el mercado. Hemos tenido la oportunidad de brindar soluciones a <strong>múltiples empresas y particulares a nivel nacional.</strong></p>
		</div>
		<div class="footer-item footer-tres">
			<p><strong>Contacto</strong></p><br>
		  <p><strong>Germán Guerrero Martínez</strong></p>
			<p>Teléfono: 5513421341</p>
			<br>
			<p><strong>Paola Ibarra Carriedo</strong></p>
			<p>Teléfono: 5523428068</p><br>
			<p>Dirección: Av. Siempre viva 777, Col. Centro</p>
			
	  </div>
	</div>		
			
</body>
</html>