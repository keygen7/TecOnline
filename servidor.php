<?php
session_start();

// Inicializa las variables 
$username = "";
$email    = "";
$errors = array(); 

// conexión a la base de datos
$db = mysqli_connect('sql305.unaux.com', 'unaux_25580668', '9umc017o34ns0', 'unaux_25580668_registros');

// Registro del usuario
//reg_user es el nombre de atributo que debe tener nuestro boton de registro
if (isset($_POST['reg_user'])) {
  // recibe todos los valores del usuario
  $username = mysqli_real_escape_string($db, $_POST['usuario']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //  validación de la forma: se asegura que las formas son correctamente llenadas ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Ese necesario un nombre de usuario"); }
  if (empty($email)) { array_push($errors, "Es necesario proporcionar un email"); }
  if (empty($password_1)) { array_push($errors, "Es necesario establecer una constraseña"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Los dos constraseñas no coinciden");
  }

  // primero revisa la base de datos en busqueda  
  // de un usuario con el mismo nombre o email repetido
  $user_check_query = "SELECT * FROM usuarios WHERE nomusuario='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si el usuario existe
    if ($user['nomusuario'] === $username) {
      array_push($errors, "Este usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Este email ya existe");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO usuarios (nomusuario, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['nomusuario'] = $username;
  	$_SESSION['success'] = "Acabas de iniciar sesión";
	$_SESSION["loggedIn"] = true;
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['usuario']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Nombre de usuario es requerido");
    }
    if (empty($password)) {
        array_push($errors, "La contraseña es requerida");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM usuarios WHERE nomusuario='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['nomusuario'] = $username;
          $_SESSION['success'] = "Acabas de iniciar sesión";
		  $_SESSION["loggedIn"] = true;
          header('location: index.php');
        }else {
            array_push($errors, "Combinación usuario/contraseña incorrecta");
        }
    }
  }