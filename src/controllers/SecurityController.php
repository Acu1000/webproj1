<?php

require_once 'AppController.php';

class SecurityController extends AppController {

    public function displayLogin(string $message = "") {
        return $this->render("login", ["message" => $message]);
    }

    public function login() {
        $url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/dashboard");

        $email = $_POST['email'];
        $password = $_POST['password'];

        return $this->render("dashboard", []);
    }

    public function displayRegister(string $message = "") {
        return $this->render("register", []);
    }

    public function register() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // incorrect "repeat password"
        if ($password !== $password2) {
            return $this->displayRegister("Repeated password does not match");
        }

        // TODO: hash password
        $userRepository = new UserRepository();
        $userRepository->createUser($email, $password);
    }

}