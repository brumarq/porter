<?php
require __DIR__ . '/../repositories/userRepository.php';

class UserService {
    public function getUser($email, $password) {
        $repository = new UserRepository();
        $users = $repository->getUser($email, $password);
        return $users;
    }

    public function addUser($email, $password, $firstName, $lastName) {
        $repository = new UserRepository();
        $users = $repository->addUser($email, $password, $firstName, $lastName);
        return $users;
    }
}

?>