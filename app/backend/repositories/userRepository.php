<?php
require_once __DIR__ . '/repository.php';

class UserRepository extends Repository
{
    function getUser($email, $password)
    {
        try {
            // Temporary
            require __DIR__ . '/../../config.php';

            try {
                $stmt = $conn->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
                $stmt->execute(['email' => $email, 'password' => $password]);

                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch();
                    $_SESSION['unique_id'] = $user['id'];

                    return "success";
                } else {
                    return "Wrong credentials!";
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function addUser($email, $password, $firstName, $lastName)
    {
        try {
            require __DIR__ . '/../../config.php';

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $checkEmail = $conn->prepare('SELECT email FROM users WHERE email=:email');
                $checkEmail->execute(['email' => $email]);

                if ($checkEmail->rowCount() == 0) { 
                    $stmt = $conn->prepare('INSERT INTO users (fName, lName, email, password)
                                            VALUES (:firstName, :lastName, :email, :password);
                                            SELECT LAST_INSERT_ID() as userId;'
                                            );
                    $stmt->execute(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => $password]);

                    if ($stmt->rowCount() > 0) {
                        $userId = $conn->lastInsertId();
                        $_SESSION['unique_id'] = $userId;
                        return "userAdded";
                    }
                }

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
