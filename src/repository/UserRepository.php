<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        if($user['id_user_parameters'] == null) {
            $user['id_user_parameters'] = 0;
        }

        if($user['id_user_macros'] == null) {
            $user['id_user_macros'] = 0;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id_user_parameters'],
            $user['id_user_macros']
        );
    }

    public function addNewUser(string $email, string $password): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $email,
            $password
        ]);
    }




}