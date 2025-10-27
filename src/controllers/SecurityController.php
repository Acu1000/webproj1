<?php

require_once 'AppController.php';

class SecurityController extends AppController {

    public function login() {
        // TODO: authenticate and render dashboard

        return $this->render("login", ["message" => ""]);
    }

}