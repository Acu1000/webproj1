<?php

require_once 'Repository.php';

class UserRepository extends Repository
{

    public function getUsers(): ?array
    {
        try {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM users
            ');
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        }
        catch (Exception $e) {

        }
    }

    public function createUser(string $email, string $hashedPassword): void {
        try {
            $stmt = $this->database->connect()->prepare('
                INSERT INTO users (email, password) VALUES (?, ?);
            ');

            $stmt->execute([
                $email,
                $hashedPassword,
            ]);
        }
        catch (Exception $e) {

        }
    }

    public function getUserByEmail(string $email) {
        try {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM users WHERE email = :email
            ');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            return $users;
        }
        catch (Exception $e) {

        }
    }
}