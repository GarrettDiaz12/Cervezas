
<?php

@include 'config.php';

session_start();

  
    $name = $_POST['name_contact'];
    $email = $_POST['usermail'];
    $number = $_POST['phone_number'];

    $select = " SELECT * FROM user_contact WHERE email = '$email' && number = '$number'";
    
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
       $error[] = 'El usuario ya envio solicitud';
    }else{
       if($pass != $cpass){
          $error[] = 'Este numero ya se registró para información!';
       }else{
          $insert = "INSERT INTO user_contact(name_user,email,number_info) VALUES('$name','$email','$number')";
          mysqli_query($conn, $insert);
         
          
          header('location:index.php');
       }
    
    
 }


?>