<?php
require __DIR__ . '/../repositories/userRepository.php';

class UserService {
    public function getUser($email, $password) {
        $repository = new UserRepository();
        $users = $repository->getUser($email, $password);
        return $users;
    }
}

?>