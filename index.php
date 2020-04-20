<?php
session_start();

$conn = mysqli_connect('sql305.unaux.com', 'unaux_25580668', '9umc017o34ns0', 'unaux_25580668_registros');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 


$query = "SELECT * FROM productos";
    $result = $conn->query($query);
   


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $precios[] =  $row["precio"];
            $skus[] = $row["sku"];
        }
    } else {
        echo "0 results";
    }

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: iniciarsesion.php");
}


$inicio_usuario;
$registro_cerrar;


if(isset($_SESSION['loggedIn'])){
    $inicio_usuario = $_SESSION['nomusuario'];
    $registro_cerrar = "Cerrar Sesión";
    $linkIU = "carrito.php";
    $linkRC = "index.php?logout='1'";
	
    //$conn->close();
	

}else{
    $inicio_usuario = "Iniciar Sesión";
    $registro_cerrar = "Registrarse";
    $linkIU = "iniciarsesion.php";
    $linkRC = "registro.php";
   }

   

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TecOnline</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="menu-container">
	  <div class="menu">
		  <div class="mini-logo"><a href="index.php"><img src="imagenes/TecOnline.png" alt="" width="60" height="30" /></a> </div>
		  
		  <div class="signup"><a href="<?php echo $linkRC ?>"><?php echo $registro_cerrar ?></a></div>
		  <div class="login"><a href="<?php echo $linkIU ?>"><?php echo $inicio_usuario ?></a></div>
		  
		</div>
	  </div>
	
	<div class="barra-compras"><a href="#"><img src="imagenes/shopping-cart32 (Personalizado).png" alt=""></a></div>
	
	<div class="header-container">
		
    	<div class="header">
	    <div class="opciones">Menú</div>
		<div class="logo"><img src="imagenes/TecOnline.png" alt=""></div>
		<div class="social">
			
			<div><a href="https://facebook.com/TecOnline" target="_blank"><img class= "redes" src="imagenes/facebook.svg" alt="" width="30"></a></div>
			<div><a href="tel:87-14-54-57" target="_blank"><img class= "redes" src="imagenes/phone.svg" alt="" width="30"></a></div>
			<div><a href="https://instagram.com/TecOnline" target="_blank"><img class= "redes" src="imagenes/025-instagram.svg" alt="" width="30"></a></div>
			</div>
		
		</div>	
	</div>
	
	
	<div class="photo-grid-container">
		  <div class="photo-grid">
			  <div class="photo-grid-item first-item"><p>Disco Duro 1TB</p>
				  <img src="imagenes/discoduro.jpg" alt="" width="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[0] ?></li>
					<li>SKU:<?php  echo $skus[0] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
		    </div>
			  <div class="photo-grid-item"><p>Mousepad Omen</p>
				  <img src="imagenes/mousepad.jpg" alt="" width="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[1] ?></li>
					<li>SKU:<?php  echo $skus[1] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
			  </div>
			  <div class="photo-grid-item"><p>Memoria Ram 2GB</p>
				  <img src="imagenes/ram.jpg" alt="" width="200" height="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[2] ?></li>
					<li>SKU:<?php  echo $skus[2] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
			  </div>
			  <div class="photo-grid-item"><p>Router Asus</p>
				  <img src="imagenes/router.jpg" alt="" width="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[3] ?></li>
					<li>SKU:<?php  echo $skus[3] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
			  </div>
			  <div class="photo-grid-item"><p>Tableta Digitalizadora</p>
				  <img src="imagenes/tableta.jpg" alt="" width="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[4] ?></li>
					<li>SKU:<?php  echo $skus[4] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
			  </div>
			  <div class="photo-grid-item last-item"><p>USB Maxell 16GB</p>
				  <img src="imagenes/usba.jpg" alt="" width="200">
				  <hr>
				  <ul class="listado">
				  	<li>Precio:<?php echo $precios[5] ?></li>
					<li>SKU:<?php  echo $skus[5] ?></li>
					<li>Seleccionar: <input type="checkbox"></li>
			    </ul>
			  </div>
		  </div>
		
	  </div>
	
	<div class="contenedor-carrito">
		<div class="carrito"><a href="cart.php">Agregar al carrito</a></div>
	</div>
	
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
