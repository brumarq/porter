<?php
require("../../config.php");

$email =  $_POST['email'];
$password =  $_POST['password'];
$response = new stdClass();

if (!empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email AND password=:password');
        $stmt->execute(['email' => $email, 'password' => $password]);
        
        if($stmt->rowCount() > 0){
            $user = $stmt->fetch();
            $_SESSION['unique_id'] = $user['id'];

            $response->message = "success";
        }else {
            $response->message = "Wrong credentials";
        }
    } else {
        $response->message = "Enter a valid email!";
    }
} else {
    $response->message = "Fill in all input fields!";
}

echo json_encode($response);
