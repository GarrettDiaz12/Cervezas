<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['usermail'] = $email;
      header('location:index.php');
   }else{
      $error[] = 'contraseña o email incorrecto.';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleAccess.css">
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">Iniciar Sesión</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="email" name="usermail" placeholder="Ingresa tu email" class="box" required>
        <input type="password" name="password" placeholder="Ingresa tu contraseña" class="box" required>
        <input type="submit" value="Iniciar Sesión" class="form-btn" name="submit">
        <p>¿Eres nuevo? <a href="register_form.php">!Registrate ahora!</a></p>
    </form>

</div>

</body>
</html>