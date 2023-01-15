<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            return null;
        }

//        if($user['id_user_parameters'] == null) {
//            $user['id_user_parameters'] = 0;
//        }
//
//        if($user['id_user_macros'] == null) {
//            $user['id_user_macros'] = 0;
//        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id_user']
        );
    }

    public function getUserById(int $idUser): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            return null;
        }

//        if($user['id_user_parameters'] == null) {
//            $user['id_user_parameters'] = 0;
//        }
//
//        if($user['id_user_macros'] == null) {
//            $user['id_user_macros'] = 0;
//        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id_user']
        );
    }

    public function addNewUser(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
    }




}