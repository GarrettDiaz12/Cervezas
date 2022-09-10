<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'El usuario ya existe';
   }else{
      if($pass != $cpass){
         $error[] = 'la contraseña no coincide!';
      }else{
         $insert = "INSERT INTO user_form(email, password) VALUES('$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
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
      <h3 class="title">!REGISTRATE AHORA!</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="Introduce tu email" class="box" required>
      <input type="password" name="password" placeholder="Introduce tu contraseña" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirma tu contraseña" class="box" required>
      <input type="submit" value="Registrate Ahora" class="form-btn" name="submit">
      <p>¿Tienes una cuenta? <a href="login_form.php">Inicia Sesión!</a></p>
   </form>

</div>

</body>
</html>